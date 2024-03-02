<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');
/**
 * WhoDrugs Controller
 *
 * @property WhoDrug $WhoDrug
 */
class WhoDrugsController extends AppController
{


	public $components = array('Search.Prg');
	public $paginate = array();
	public $presetVars = array(
		array('field' => 'id', 'type' => 'value'),
		array('field' => 'drug_name', 'type' => 'value'),
	);

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->WhoDrug->recursive = 0;
		$this->set('whoDrugs', $this->paginate());
	}

	public function admin_index()
	{
		$this->Prg->commonProcess();
		$criteria = $this->WhoDrug->parseCriteria($this->passedArgs);
		// $criteria['Sadr.user_id'] = $this->Auth->user('id');
		$this->paginate['conditions'] = $criteria;
		$this->WhoDrug->recursive = -1;
		$this->paginate['limit'] = 20;
		$this->paginate['order'] = array('WhoDrug.drug_name' => 'asc');
		$this->set('whoDrugs', $this->paginate());
	}
	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		$this->set('whoDrug', $this->WhoDrug->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->WhoDrug->create();
			if ($this->WhoDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The who drug has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The who drug could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_add()
	{
		if ($this->request->is('post')) {
			$this->WhoDrug->create();
			if ($this->WhoDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The who drug has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The who drug could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null)
	{
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WhoDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The who drug has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The who drug could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->WhoDrug->read(null, $id);
		}
	}

	public function admin_edit($id = null)
	{
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WhoDrug->save($this->request->data)) {
				$this->Session->setFlash(__('The who drug has been saved'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The who drug could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->WhoDrug->read(null, $id);
		}
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		if ($this->WhoDrug->delete()) {
			$this->Session->setFlash(__('Who drug deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Who drug was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null)
	{
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->WhoDrug->id = $id;
		if (!$this->WhoDrug->exists()) {
			throw new NotFoundException(__('Invalid who drug'));
		}
		if ($this->WhoDrug->delete()) {
			$this->Session->setFlash(__('Who drug deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Who drug was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_sync()
	{
		// set_time_limit(600);
		$HttpSocket = new HttpSocket();
		$options = array(
			'header' => array(
				'umc-client-key' => Configure::read('drug_client_key'),
				'umc-license-key' => Configure::read('drug_license_key'),
				'Content-Type' => 'application/json',
			)
		);
		// //Request Access Token
		$initiate = $HttpSocket->get(
			Configure::read('drug_base_url'),
			false,
			$options
		);
		if ($initiate->isOk()) {
			$data = $initiate->body;
			$data = json_decode($data);
			// for each data in the array
			$this->WhoDrug->query('TRUNCATE TABLE who_drugs');
			//create a array to store the data 

			foreach ($data as $drug) {
				// save the drug to the database
				$this->WhoDrug->create();
				$isGeneric=$drug->isGeneric;
				if($isGeneric){
					$gen="Y";
				}else{
					$gen="N";
				}
				$data = array(
					'WhoDrug' => array(
						'drug_name' => $drug->drugName,
						'MedId' => $drug->medicinalProductID,
						'generic' => $gen,
						'drug_record_number' =>  $drug->drugCode
					)
				);
				 
			}
			$this->Flash->success('Drug list successfully updated');
			$this->redirect($this->referer());
		} else {
			$body = $initiate->body;
			$this->Flash->error($body);
			$this->redirect($this->referer());
		}
	}
}
