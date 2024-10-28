<?php
declare(strict_types=1);

namespace App\Controller\Reporter;

use App\Controller\AppController;

/**
 * Pqmps Controller
 *
 * @property \App\Model\Table\PqmpsTable $Pqmps
 * @method \App\Model\Entity\Pqmp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PqmpsController extends AppController
{

    public $page_options = array('25' => '25', '50' => '50', '100' => '100');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $criteria = array();

        $criteria['Pqmps.user_id'] = $this->Auth->user('id');
        $this->paginate = [
            'contain' => ['Users', 'Counties', 'SubCounties', 'Countries', 'Designations'],
            'conditions' => $criteria
        ];
        $pqmps = $this->paginate($this->Pqmps);

        $this->set('page_options', $this->page_options);
        $this->set(compact('pqmps'));

        $counties = $this->Pqmps->Counties->find('list', array('order' => array('Counties.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Pqmps->Designations->find('list', array('order' => array('Designations.name' => 'ASC')));
        $this->set(compact('designations'));

        $countries = $this->Pqmps->Countries->find('list', array('order' => array('Countries.name' => 'ASC')));
        $this->set(compact('countries'));
    }

    /**
     * View method
     *
     * @param string|null $id Pqmp id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pqmp = $this->Pqmps->get($id, [
            'contain' => ['Users', 'Counties', 'SubCounties', 'Countries', 'Designations', 'Pqmps', 'Aefis', 'AttachmentsOld', 'Devices', 'Medications', 'Sadrs', 'Transfusions'],
        ]);

        $this->set(compact('pqmp'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $report = $this->Pqmps->newEmptyEntity();
        $data = [
            'user_id' => $this->Auth->User('id'),
            'reference_no' => 'new', //'PQHPT/'.date('Y').'/'.$count,
            'report_type' => 'Initial',
            'designation_id' => $this->Auth->User('designation_id'),
            'county_id' => $this->Auth->User('county_id'),
            'institution_code' => $this->Auth->User('institution_code'),
            'address' => $this->Auth->User('institution_address'),
            'reporter_name' => $this->Auth->User('name'),
            'reporter_email' => $this->Auth->User('email'),
            'reporter_phone' => $this->Auth->User('phone_no'),
            'contact' => $this->Auth->User('institution_contact'),
            'name_of_institution' => $this->Auth->User('name_of_institution')
        ];
        $report = $this->Pqmps->patchEntity($report, $data);
        if ($this->Pqmps->save($report)) {
        $this->Flash->success(__('The PQHPT has been created'));
        $this->redirect(array('action' => 'edit', $report->id));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Pqmp id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pqmp = $this->Pqmps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pqmp = $this->Pqmps->patchEntity($pqmp, $this->request->getData());
            if ($this->Pqmps->save($pqmp)) {
                $this->Flash->success(__('The pqmp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pqmp could not be saved. Please, try again.'));
        }
        $users = $this->Pqmps->Users->find('list', ['limit' => 200])->all();
        $counties = $this->Pqmps->Counties->find('list', ['limit' => 200])->all();
        $subCounties = $this->Pqmps->SubCounties->find('list', ['limit' => 200])->all();
        $countries = $this->Pqmps->Countries->find('list', ['limit' => 200])->all();
        $designations = $this->Pqmps->Designations->find('list', ['limit' => 200])->all();
        $this->set(compact('pqmp', 'users', 'counties', 'subCounties', 'countries', 'designations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pqmp id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pqmp = $this->Pqmps->get($id);
        if ($this->Pqmps->delete($pqmp)) {
            $this->Flash->success(__('The pqmp has been deleted.'));
        } else {
            $this->Flash->error(__('The pqmp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
