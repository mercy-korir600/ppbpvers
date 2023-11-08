<?php
App::uses('AppController', 'Controller');
/**
 * SadrDescriptions Controller
 *
 * @property SadrReaction $SadrReaction
 * @property PaginatorComponent $Paginator
 */
class SadrReactionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SadrReaction->recursive = 0;
		$this->set('sadrDescriptions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SadrReaction->exists($id)) {
			throw new NotFoundException(__('Invalid sadr description'));
		}
		$options = array('conditions' => array('SadrReaction.' . $this->SadrReaction->primaryKey => $id));
		$this->set('sadrDescription', $this->SadrReaction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SadrReaction->create();
			if ($this->SadrReaction->save($this->request->data)) {
				$this->Flash->success(__('The sadr description has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The sadr description could not be saved. Please, try again.'));
			}
		}
		$sadrs = $this->SadrReaction->Sadr->find('list');
		$this->set(compact('sadrs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SadrReaction->exists($id)) {
			throw new NotFoundException(__('Invalid sadr description'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SadrReaction->save($this->request->data)) {
				$this->Flash->success(__('The sadr description has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The sadr description could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SadrReaction.' . $this->SadrReaction->primaryKey => $id));
			$this->request->data = $this->SadrReaction->find('first', $options);
		}
		$sadrs = $this->SadrReaction->Sadr->find('list');
		$this->set(compact('sadrs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->SadrReaction->exists($id)) {
			throw new NotFoundException(__('Invalid sadr reaction'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SadrReaction->delete($id)) {
			$this->Flash->success(__('The sadr reaction has been deleted.'));
		} else {
			$this->Flash->error(__('The sadr reaction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
 
}
