<?php
App::uses('AppController', 'Controller');
    App::uses('Sanitize', 'Utility');
    App::uses('CakeText', 'Utility');

    /**
     * Sfms Controller (Suspected Falsified Medicine Workflow Engine)
     *
     * @property Sfm $Sfm
     * @property SearchComponent $Search
     */
    class SfmsController extends AppController
    {
        public $components = array('Search.Prg');
        public $paginate = array();
        public $presetVars = true;
        public $page_options = array('25' => '25', '50' => '50', '100' => '100');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow(                                                                                                                                                      
        'guest_add', 'guest_edit', 'api_add', 'api_view'                                                                                                                     
    );                                                                                                                                                                       
        
    }

        public function generateReferenceNumber()
        {
            $count = $this->Sfm->find('count', array(
                'fields' => 'Sfm.reference_no',
                'conditions' => array(
                    'Sfm.submitted_date BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")),
                    'Sfm.reference_no !=' => 'new',
                    'Sfm.reference_no IS NOT NULL'
                )
            ));
            $count++;
            $count = ($count < 10) ? "0$count" : $count;
            $reference = 'SFM/' . date('Y') . '/' . $count;

            $exists = $this->Sfm->find('count', array('conditions' => array('Sfm.reference_no' => $reference)));
            if ($exists) {
                $count++;
                $reference = 'SFM/' . date('Y') . '/' . $count;
            }

            return $reference;
        }

        public function createAuditTrail($type, $message)
        {
            $audit = array(
                'user_id' => $this->Auth->User('id'),
                'type' => $type,
                'message' => $message,
                'model' => 'Sfm',
                'ip_address' => $this->request->clientIp()
            );
            $this->loadModel('AuditTrail');
            $this->AuditTrail->create();
            $this->AuditTrail->save($audit);
        }

        public function notifyCountyPharmacist($sfm = null)
        {
            return true;
        }
    public function index()
    {
        if (in_array($this->Auth->User('group_id'), array(1, 2, 4))) {
            $this->manager_index();
            return $this->render('manager_index');
        } else {
            return $this->reporter_index();
        }
    }                                                                                                                                                                        
       
    public function add($id = null)
    {
        return $this->reporter_add($id);
    }

    public function edit($id = null)
    {
        return $this->reporter_edit($id);
    }

    public function view($id = null)
    {
        if (in_array($this->Auth->User('group_id'), array(1, 2, 4))) {
            $this->manager_view($id);
            $this->render('manager_view');
        } else {
            $this->reporter_view($id);
            $this->render('reporter_view');
        }
    }

    public function delete($id = null)
    {
        $this->reporter_delete($id);
    }

    public function export_pdf($id = null)
    {
        return $this->redirect(array('action' => 'view', $id));
    }

    public function reporter_index()
    {
        if (!$this->Auth->User('id')) {
            return $this->redirect(array('controller' => 'users', 'action' => 'login', 'reporter' => false, 'admin' => false, 'manager' => false, 'partner' => false));
        }

        $this->Prg->commonProcess();
        $page_options = $this->page_options;

        $conditions = array(
            'Sfm.user_id' => $this->Auth->User('id'),
            'OR' => array(
                'Sfm.deleted' => 0,
                'Sfm.deleted IS NULL'
            )
        );

        $parsedConditions = $this->Sfm->parseCriteria($this->passedArgs);
        $conditions = array_merge($conditions, $parsedConditions);

        $limit = isset($this->passedArgs['limit']) ? $this->passedArgs['limit'] : 25;
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array('Sfm.created' => 'desc'),
            'contain' => array('County', 'SubCounty')
        );

        $sfms = $this->paginate('Sfm');
        $counties = $this->Sfm->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $designations = $this->Sfm->Designation->find('list');
        $this->set(compact('sfms', 'counties', 'designations', 'page_options'));
        $this->set('redir', 'reporter');
    }                                                                                                                                                                        
      

        public function reporter_add($id = null)
        {
            $userId = $this->Auth->user('id');
            if (empty($userId)) {
                $this->Session->setFlash(__('Your session has expired. Please log in again to create a report.'), 'alerts/flash_error');
                return $this->redirect(array('controller' => 'users', 'action' => 'login', 'reporter' => false));
            }

            $this->Sfm->create();
            $this->Sfm->save(array('Sfm' => array(
                'user_id' => $userId,
                'reference_no' => 'new',
                'report_type' => 'Initial',
                'designation_id' => $this->Auth->user('designation_id'),
                'county_id' => $this->Auth->user('county_id'),
                'reporter_name' => $this->Auth->user('name'),
                'reporter_email' => $this->Auth->user('email'),
                'reporter_phone' => $this->Auth->user('phone_no'),
                'name_of_institution' => $this->Auth->user('name_of_institution'),
                'submitted' => 0
            )), false);

            $this->createAuditTrail('SfmAdded', 'Created new SFM report ID: ' . $this->Sfm->id);
            $this->Session->setFlash(__('New SFM Report created successfully.'), 'alerts/flash_success');

            return $this->redirect(array('controller' => 'sfms', 'action' => 'edit', $this->Sfm->id, 'reporter' => true));
        }

        public function reporter_edit($id = null)
        {
            $userId = $this->Auth->user('id');
            if (empty($userId)) {
                $this->Session->setFlash(__('Your session has expired. Please log in to edit reports.'), 'alerts/flash_error');
                return $this->redirect(array('controller' => 'users', 'action' => 'login', 'reporter' => false));
            }

            $this->Sfm->id = $id;
            if (!$this->Sfm->exists()) {
                $this->Session->setFlash(__('Invalid or non-existent SFM Report.'), 'alerts/flash_error');
                return $this->redirect(array('controller' => 'sfms', 'action' => 'index', 'reporter' => true));
            }

            $sfm = $this->Sfm->read(null, $id);

            // Ownership Protection
            if ($sfm['Sfm']['user_id'] != $userId) {
                $this->Session->setFlash(__('You are not authorized to edit this report.'), 'alerts/flash_error');
                return $this->redirect(array('controller' => 'sfms', 'action' => 'index', 'reporter' => true));
            }
           if ($sfm['Sfm']['submitted'] > 1) {                                                                                                                                 
  $this->Session->setFlash(__('Submitted reports cannot be edited. You may view or send a follow-up report.'), 'alerts/flash_error');                             
 return $this->redirect(array('controller' => 'sfms', 'action' => 'view', $id, 'reporter' => true));                                                             
} 

            if ($this->request->is('post') || $this->request->is('put')) {
                $data = $this->request->data;
                unset($data['Attachment']);
                $data['Sfm']['user_id'] = $userId;

                if (isset($data['submitReport']) && $data['submitReport'] == 'submit') {
                    $data['Sfm']['submitted'] = 2;
                    $data['Sfm']['submitted_date'] = date('Y-m-d H:i:s');
                    if (empty($data['Sfm']['reference_no']) || $data['Sfm']['reference_no'] == 'new') {
                        $data['Sfm']['reference_no'] = $this->generateReferenceNumber();
                    }
                }

                if ($this->Sfm->save($data)) {
                    $this->createAuditTrail('SfmEdited', 'Updated SFM report ID: ' . $id);
                    $this->Session->setFlash(__('The SFM report has been updated successfully.'), 'alerts/flash_success');
                    return $this->redirect(array('controller' => 'sfms', 'action' => 'index', 'reporter' => true));
                } else {
                    $this->Session->setFlash(__('Could not update the report. Please try again.'), 'alerts/flash_error');
                }
            } else {
                $this->request->data = $sfm;
            }

            $counties = $this->Sfm->County->find('list', array('order' => array('County.county_name' => 'ASC')));
            $subCounties = array();
            if (!empty($sfm['Sfm']['county_id'])) {
                $subCounties = $this->Sfm->SubCounty->find('list', array(
                    'conditions' => array('SubCounty.county_id' => $sfm['Sfm']['county_id']),
                    'order' => array('SubCounty.sub_county_name' => 'ASC')
                ));
            }
            $designations = $this->Sfm->Designation->find('list');
            $sub_counties = $subCounties;
            $this->set(compact('counties', 'subCounties', 'sub_counties', 'designations', 'sfm'));
        }

        public function reporter_view($id = null)
        {
            $userId = $this->Auth->User('id');
            if (empty($userId)) {
                $this->Session->setFlash(__('Your session has expired. Please log in to view reports.'), 'alerts/flash_error');
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            $this->Sfm->id = $id;
            if (!$this->Sfm->exists()) {
                $this->Session->setFlash(__('Invalid SFM Report.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));
            }

            $sfm = $this->Sfm->find('first', array(
                'conditions' => array('Sfm.id' => $id),
                'contain' => array('County', 'SubCounty', 'Designation', 'Attachment')
            ));

            if (!empty($sfm['Sfm']['user_id']) && $sfm['Sfm']['user_id'] != $userId && !in_array($this->Auth->User('group_id'), array(1, 2, 4))) {
                $this->Session->setFlash(__('You are not authorized to view this report.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));
            }

            $this->set(compact('sfm'));
        }

        public function reporter_followup($id = null)
        {
            $userId = $this->Auth->User('id');
            if (empty($userId)) {
                $this->Session->setFlash(__('Your session has expired. Please log in.'), 'alerts/flash_error');
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            $this->Sfm->id = $id;
            if (!$this->Sfm->exists()) {
                $this->Session->setFlash(__('Invalid Master Report.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));
            }

            $master = $this->Sfm->read(null, $id);
            if ($this->request->is('post') || $this->request->is('put')) {
                $data = $this->request->data;
                unset($data['Attachment']);
                $data['Sfm']['sfm_id'] = $id;
                $data['Sfm']['user_id'] = $userId;
                $data['Sfm']['report_type'] = 'Followup';
                $data['Sfm']['reference_no'] = $master['Sfm']['reference_no'];
                $data['Sfm']['submitted'] = 2;
                $data['Sfm']['submitted_date'] = date('Y-m-d H:i:s');

                $this->Sfm->create();
                if ($this->Sfm->save($data)) {
                    $this->createAuditTrail('SfmFollowup', 'Created follow-up report for SFM ID: ' . $id);
                    $this->Session->setFlash(__('Follow-up report submitted successfully.'), 'alerts/flash_success');
                    return $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->request->data = $master;
                unset($this->request->data['Sfm']['id']);
                $this->request->data['Sfm']['report_type'] = 'Followup';
            }

            $counties = $this->Sfm->County->find('list');
            $subCounties = $this->Sfm->SubCounty->find('list');
            $countries = $this->Sfm->Country->find('list');
            $designations = $this->Sfm->Designation->find('list');
            $sub_counties = $subCounties;
            $this->set(compact('counties', 'subCounties', 'sub_counties', 'countries', 'designations', 'master'));
        }

        public function reporter_delete($id = null)
        {
            $userId = $this->Auth->User('id');
            if (empty($userId)) {
                $this->Session->setFlash(__('Your session has expired. Please log in.'), 'alerts/flash_error');
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            $this->Sfm->id = $id;
            if (!$this->Sfm->exists()) {
                $this->Session->setFlash(__('Invalid SFM Report.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));
            }

            $sfm = $this->Sfm->read(null, $id);

            if ($sfm['Sfm']['user_id'] != $userId) {
                $this->Session->setFlash(__('You are not authorized to delete this report.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));
            }

            if ($sfm['Sfm']['submitted'] > 1) {
                $this->Session->setFlash(__('Submitted reports cannot be deleted.'), 'alerts/flash_error');
                return $this->redirect(array('action' => 'index'));
            }

            $this->Sfm->saveField('deleted', 1);
            $this->Sfm->saveField('deleted_date', date('Y-m-d H:i:s'));
            $this->Session->setFlash(__('Report deleted successfully.'), 'alerts/flash_info');
            return $this->redirect(array('action' => 'index'));
        }
        public function guest_add()
        {
            if ($this->request->is('post')) {
                $data = $this->request->data;
                unset($data['Attachment']);
                $data['Sfm']['report_type'] = 'Initial';
                $data['Sfm']['submitted'] = 2;
                $data['Sfm']['submitted_date'] = date('Y-m-d H:i:s');
                $data['Sfm']['reference_no'] = $this->generateReferenceNumber();

                $this->Sfm->create();
                if ($this->Sfm->save($data)) {
                    $this->createAuditTrail('GuestSfmAdded', 'Public submission of SFM report ref: ' . $data['Sfm']['reference_no']);
                    $this->Session->setFlash(__('Thank you! Your Suspected Falsified Medicine report has been submitted. Tracking Ref: ' . $data['Sfm']['reference_no']), 'alerts/flash_success');
                    return $this->redirect(array('action' => 'guest_add'));
                } else {
                    $this->Session->setFlash(__('Report submission failed. Please check form errors.'), 'alerts/flash_error');
                }
            }

            $counties = $this->Sfm->County->find('list');
            $designations = $this->Sfm->Designation->find('list');
            $this->set(compact('counties', 'designations'));
        }
        public function manager_index()
        {
            $this->Prg->commonProcess('Sfm');
            $page_options = $this->page_options;

            $conditions = array('Sfm.deleted' => 0, 'Sfm.submitted >=' => 1);
            $parsedConditions = $this->Sfm->parseCriteria($this->passedArgs);
            $conditions = array_merge($conditions, $parsedConditions);

            $limit = isset($this->passedArgs['limit']) ? $this->passedArgs['limit'] : 25;
            $this->paginate = array(
                'conditions' => $conditions,
                'limit' => $limit,
                'order' => array('Sfm.created' => 'desc'),
                'contain' => array('User', 'County', 'SubCounty')
            );

            $sfms = $this->paginate('Sfm');
            $users = $this->Sfm->User->find('list', array('conditions' => array('User.group_id' => array(2, 4))));
            $this->set(compact('sfms', 'users', 'page_options'));
        }

        public function manager_view($id = null)
        {
            $this->Sfm->id = $id;
            if (!$this->Sfm->exists()) {
                throw new NotFoundException(__('Invalid SFM Report'));
            }

            $sfm = $this->Sfm->find('first', array(
                'conditions' => array('Sfm.id' => $id),
                'contain' => array('User', 'County', 'SubCounty', 'Designation', 'Attachment')
            ));
            $this->set(compact('sfm'));
        }

        public function manager_assign()
        {
            if ($this->request->is('post')) {
                $data = $this->request->data;
                unset($data['Attachment']);
                if (!empty($data['Sfm']['id']) && !empty($data['Sfm']['assigned_to'])) {
                    $this->Sfm->id = $data['Sfm']['id'];
                    $this->Sfm->saveField('assigned_to', $data['Sfm']['assigned_to']);
                    $this->Sfm->saveField('assigned_by', $this->Auth->User('id'));
                    $this->Sfm->saveField('assigned_date', date('Y-m-d H:i:s'));
                    $this->Session->setFlash(__('Report assigned successfully.'), 'alerts/flash_success');
                }
            }
            return $this->redirect(array('action' => 'index'));
        }

        public function reviewer_index()
        {
            $this->Prg->commonProcess('Sfm');
            $page_options = $this->page_options;

            $conditions = array(
                'Sfm.assigned_to' => $this->Auth->User('id'),
                'Sfm.deleted' => 0
            );
            $parsedConditions = $this->Sfm->parseCriteria($this->passedArgs);
            $conditions = array_merge($conditions, $parsedConditions);

            $limit = isset($this->passedArgs['limit']) ? $this->passedArgs['limit'] : 25;
            $this->paginate = array(
                'conditions' => $conditions,
                'limit' => $limit,
                'order' => array('Sfm.created' => 'desc'),
                'contain' => array('County', 'SubCounty')
            );

            $sfms = $this->paginate('Sfm');
            $this->set(compact('sfms', 'page_options'));

        }

        public function reviewer_view($id = null)
        {
            $this->manager_view($id);
        }
    }
