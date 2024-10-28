<?php

declare(strict_types=1);

namespace App\Controller\Reporter;

use App\Controller\AppController;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 * @method \App\Model\Entity\Aefi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AefisController extends AppController
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

        $criteria['Aefis.user_id'] = $this->Auth->user('id');
        $this->paginate = [
            'contain' => ['Users', 'Pqmps', 'Counties', 'SubCounties', 'Designations'],
            'conditions' => $criteria
        ];
        $aefis = $this->paginate($this->Aefis);

        $this->set('page_options', $this->page_options);
        $this->set(compact('aefis'));

        $counties = $this->Aefis->Counties->find('list', array('order' => array('Counties.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $designations = $this->Aefis->Designations->find('list', array('order' => array('Designations.name' => 'ASC')));
        $this->set(compact('designations'));
    }

    /**
     * View method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aefi = $this->Aefis->get($id, [
            'contain' => ['Users', 'Pqmps', 'Counties', 'SubCounties', 'Designations', 'Aefis', 'AefiDescriptions', 'AefiListOfVaccines', 'AefiReactions', 'AttachmentsOld'],
        ]);

        $this->set(compact('aefi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $aefi = $this->Aefis->newEmptyEntity();
        $data = [
            'user_id' => $this->Auth->User('id'),
            'reference_no' => 'new', //'AEFI/'.date('Y').'/'.$count,
            'report_type' => 'Initial',
            'pqmp_id' => $id,
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
        $aefi = $this->Aefis->patchEntity($aefi, $data);
        if ($this->Aefis->save($aefi)) {
            $this->Flash->success(__('The AEFI has been created'));
            $this->redirect(array('action' => 'edit', $aefi->id));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aefi = $this->Aefis->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            if ($this->Aefis->save($aefi)) {
                $this->Flash->success(__('The aefi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aefi could not be saved. Please, try again.'));
        } 
        $this->request = $this->request->withParsedBody($aefi->toArray());

        // debug($this->request);
        // exit;

        $users = $this->Aefis->Users->find('list', ['limit' => 200])->all();
        $pqmps = $this->Aefis->Pqmps->find('list', ['limit' => 200])->all();
        $counties = $this->Aefis->Counties->find('list', ['limit' => 200])->all();
        $subCounties = $this->Aefis->SubCounties->find('list', ['limit' => 200])->all();
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200])->all();     
        $vaccines = $this->Aefis->AefiListOfVaccines->Vaccines->find('list')->all();  
        // debug($vaccines);
        // debug($designations);
        // exit; 
        $this->set(compact('aefi', 'vaccines','users', 'pqmps', 'counties', 'subCounties', 'designations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aefi = $this->Aefis->get($id);
        if ($this->Aefis->delete($aefi)) {
            $this->Flash->success(__('The aefi has been deleted.'));
        } else {
            $this->Flash->error(__('The aefi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
