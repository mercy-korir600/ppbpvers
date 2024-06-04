<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('Router', 'Routing');
App::uses('Xml', 'Utility');


/**
 * Ce2bs Controller
 *
 * @property Ce2b $Ce2b
 */
class Ce2bsController extends AppController
{

    public $components = array('Search.Prg');
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');

    /**
     * index method
     */
    /*public function index() {
        $this->Aefi->recursive = 0;
        $this->set('aefis', $this->paginate());
    }*/

    // Short Term Goal 
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function vigiflow($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            $this->Session->setFlash(__('Could not verify the E2b report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        $ce2b = $this->Ce2b->find('first', array(
            'conditions' => array('Ce2b.id' => $id),
        ));
        $html = $ce2b['Ce2b']['e2b_content'];
        $HttpSocket = new HttpSocket();
        // string data
        $results = $HttpSocket->post(
            Configure::read('vigiflow_api'),
            (string)$html,
            array('header' => array('umc-client-key' => Configure::read('vigiflow_key')))
        );

        // debug($results->code);
        // debug($results->body);
        // exit();
        if ($results->isOk()) {
            $body = $results->body;
            $this->Ce2b->saveField('vigiflow_message', $body);
            $this->Ce2b->saveField('vigiflow_date', date('Y-m-d H:i:s'));
            $resp = json_decode($body, true);
            if (json_last_error() == JSON_ERROR_NONE) {
                $this->Ce2b->saveField('vigiflow_ref', $resp);
            }
            $this->Flash->success('Vigiflow integration success!!');
            $this->Flash->success($body);
            $this->redirect($this->referer());
        } else {
            $body = $results->body;
            $this->Ce2b->saveField('vigiflow_message', $body);
            $this->Flash->error('Error sending report to vigiflow:');
            $this->Flash->error($body);
            $this->redirect($this->referer());
        }
        $this->autoRender = false;
    }

    public function reporter_index()
    {
        # code...
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);
        //Health program fiasco
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
            $this->passedArgs['health_program'] = $this->Session->read('Auth.User.health_program');
        }

        $criteria = $this->Ce2b->parseCriteria($this->passedArgs);
        if ($this->Session->read('Auth.User.user_type') != 'Public Health Program') $criteria['Ce2b.user_id'] = $this->Auth->User('id');
        if ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
            $criteria['Ce2b.submitted'] = array(2);
        } else {
            if (isset($this->request->query['submitted'])) {
                if ($this->request->query['submitted'] == 1) {
                    $criteria['Ce2b.submitted'] = array(0, 1);
                } else {
                    $criteria['Ce2b.submitted'] = array(2, 3);
                }
            } else {
                $criteria['Ce2b.submitted'] = array(0, 1, 2, 3);
            }
        }
        // add deleted condition to criteria
        $criteria['Ce2b.deleted'] = false;
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Ce2b.created' => 'desc');
        $this->set('ce2bs', Sanitize::clean($this->paginate(), array('encode' => false)));
        $this->set('page_options', $this->page_options);
    }


    public function manager_index()
    {
        # code...
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = reset($this->page_options);


        $criteria = $this->Ce2b->parseCriteria($this->passedArgs);
        $criteria['Ce2b.copied !='] = '1';
        if (isset($this->request->query['submitted']) && $this->request->query['submitted'] == 1) {
            $criteria['Ce2b.submitted'] = array(0, 1);
        } else {
            $criteria['Ce2b.submitted'] = array(2, 3);
        }
        $criteria['Ce2b.deleted'] = false;
        $criteria['Ce2b.archived'] = false;
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Ce2b.created' => 'desc');
        $this->set('ce2bs', Sanitize::clean($this->paginate(), array('encode' => false)));
        $this->set('page_options', $this->page_options);
    }
    public function download($id = null)
    {
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            $this->Session->setFlash(__('Could not verify the E2b report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        $ce2b = $this->Ce2b->find('first', array(
            'conditions' => array('Ce2b.id' => $id),
        ));
        $e2b_content = $ce2b['Ce2b']['e2b_content'];
        $filename = 'E2B.xml'; //$ce2b['Ce2b']['id'] . ".xml";
        // Set the HTTP headers for file download
        header('Content-Type: application/xml');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Output the XML content
        echo $e2b_content;
    }
    public function manager_copy($id = null)
    {
        if ($this->request->is('post')) {
            $this->Ce2b->id = $id;
            if (!$this->Ce2b->exists()) {
                throw new NotFoundException(__('Invalid E2b'));
            }
            $this->generate_copy($id);
        }
    }

    public function reviewer_copy($id = null)
    {
        if ($this->request->is('post')) {
            $this->Ce2b->id = $id;
            if (!$this->Ce2b->exists()) {
                throw new NotFoundException(__('Invalid E2b'));
            }
            $this->generate_copy($id);
        }
    }

    public function generate_copy($id)
    {
        # code...
        $ce2b = Hash::remove($this->Ce2b->find(
            'first',
            array(
                'conditions' => array('Ce2b.id' => $id)
            )
        ), 'Ce2b.id');

        if ($ce2b['Ce2b']['copied']) {
            $this->Session->setFlash(__('A clean copy already exists. Click on edit to update changes.'), 'alerts/flash_error');
            return $this->redirect(array('action' => 'index'));
        }
        $data_save = $ce2b['Ce2b'];
        $data_save['ce2b_id'] = $id;
        $data_save['user_id'] = $this->Auth->User('id');;
        $this->Ce2b->saveField('copied', 1);
        $data_save['copied'] = 2;
        $data_save['submitted'] = 1;

        if ($this->Ce2b->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
            $this->Session->setFlash(__('Clean copy of ' . $data_save['reference_no'] . ' has been created'), 'alerts/flash_info');
            $this->redirect(array('action' => 'edit', $this->Ce2b->id));
        } else {
            $this->Session->setFlash(__('The clean copy could not be created. Please, try again.'), 'alerts/flash_error');
            $this->redirect($this->referer());
        }
    }
    public function manager_edit($id = null)
    {
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            throw new NotFoundException(__('Invalid E2b'));
        }
        $this->general_editor($id);
    }
    public function reviewer_edit($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            throw new NotFoundException(__('Invalid E2b'));
        }
        $this->general_editor($id);
    }

    private function parseE2BReport($xmlFilePath)
    {
        try {
            if (!file_exists($xmlFilePath)) {
                throw new NotFoundException(__('Invalid file path'));
            }

            $xml = simplexml_load_file($xmlFilePath);
            if ($xml === false) {
                throw new Exception(__('Failed to load XML file'));
            }

            $namespaces = $xml->getNamespaces(true);
            $xml->registerXPathNamespace('hl7', $namespaces['']);

            $data = [];

            // Batch Number
            $data['batch_number'] = (string) $xml->id['extension'];

            // Date of Batch Transmission
            $data['batch_transmission_date'] = (string) $xml->creationTime['value'];

            // Type of Messages in Batch
            $data['message_type'] = (string) $xml->name['code'];

            // ICSR Message Header
            $icsr = $xml->xpath('//hl7:PORR_IN049016UV')[0];

            // Message Identifier
            $data['message_identifier'] = (string) $icsr->id['extension'];

            // Date of Message Creation
            $data['message_creation_date'] = (string) $icsr->creationTime['value'];

            // Message Receiver Identifier
            $data['message_receiver'] = (string) $icsr->receiver->device->id['extension'];

            // Message Sender Identifier
            $data['message_sender'] = (string) $icsr->sender->device->id['extension'];

            // Case Safety Report
            $caseReport = $icsr->controlActProcess->subject->investigationEvent;

            // Sender's Case Safety Report Unique Identifier
            $data['case_report_identifier'] = (string) $caseReport->id[0]['extension'];

            // Worldwide Unique Case Identification Number
            $data['unique_case_identifier'] = (string) $caseReport->id[1]['extension'];

            // Case Narrative
            $data['case_narrative'] = (string) $caseReport->text;

            // Date Report Was First Received from Source
            $data['report_received_date'] = (string) $caseReport->effectiveTime->low['value'];

            // Date of Receipt of the Most Recent Information for This Report
            $data['most_recent_info_date'] = (string) $caseReport->availabilityTime['value'];

            // Extract Batch Receiver Identifier
            $data['batch_receiver_identifier'] = (string) $xml->receiver->device->id['extension'];

            // Extract Batch Sender Identifier
            $data['batch_sender_identifier'] = (string) $xml->sender->device->id['extension'];
            //     <!--D: Patient Characteristics-->
            $primaryRole = $caseReport->component->adverseEventAssessment->subject1->primaryRole;
            // return $component;
            $data['patient_name'] = (string)  $primaryRole->player1->name;
            $data['patient_gender'] = (string) $primaryRole->player1->administrativeGenderCode['code'];

            $subjectOf2 = $primaryRole->subjectOf2;
            // <!--D.7.1.r: Relevant Medical History and Concurrent Conditions (not including reaction / event)

            $components = $subjectOf2->organizer->component;

            $MedicalData = [];

            foreach ($components as $component) {
                $observation = $component->observation;
                $obsData = [];
                // Extract code
                $obsData['code'] = (string) $observation->code['code'];
                // Extract codeSystemVersion
                $obsData['codeSystemVersion'] = (string) $observation->code['codeSystemVersion'];
                // Extract codeSystem
                $obsData['codeSystem'] = (string) $observation->code['codeSystem'];
                // Extract effectiveTime
                $obsData['effectiveTime'] = (string) $observation->effectiveTime->low['value'];
                // Add the extracted observation data to the main data array
                $MedicalData[] = $obsData;
            }
            $data['medical_history'] = $MedicalData;
            //  <!--E.i: REACTION(S)/EVENT(S) - (1)-->
            $subjectOf2s = [];
            foreach ($primaryRole->subjectOf2 as $sample) {
                $subjectOf2s[] = $sample;
            }
            $firstItem = null;
            $lastItem = null;
            if (!empty($subjectOf2s)) {
                // Get the first item
                // $firstItem = $subjectOf2s[0];
                // Get the last item
                // $lastItem = $subjectOf2s[count($subjectOf2s) - 1];

                // Remove the first item
                $firstItem = array_shift($subjectOf2s);

                // Remove the last item
                $lastItem = array_pop($subjectOf2s);
            }
            $reactions = [];

            foreach ($subjectOf2s as $reaction) {
                $single = $reaction->observation;
                $reactionDetails = array(
                    'id' => (string) $single->id['root'],
                    'code' => (string) $single->code['code'],
                    'effectiveTime' => (string) $single->effectiveTime->low['value'],
                    'medra_code' => (string) $single->value['code'],
                    'country_origin' => (string) $single->location->locatedEntity->locatedPlace->code['code'],
                    'medra_translation' => (string) $single->outboundRelationship2->observation->value

                );
                $reactions[] = $reactionDetails;
            }

            // return $subjectOf2s;
            //    return $data['reactions']=$reactions;

            return $data;
        } catch (Exception $e) {
            return null;
        }
    }
    public function general_editor($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            throw new NotFoundException(__('Invalid E2b'));
        }
        $ce2b = $this->Ce2b->read(null, $id);
        if ($ce2b['Ce2b']['submitted'] > 1) {
            $this->Session->setFlash(__('The E2b has been submitted'), 'alerts/flash_info');
            $this->redirect(array('action' => 'view', $this->Ce2b->id));
        }
        if ($ce2b['Ce2b']['user_id'] !== $this->Auth->user('id')) {
            $this->Session->setFlash(__('You don\'t have permission to edit this E2b!!'), 'alerts/flash_error');
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            // debug($this->request->data['Ce2b']['e2b_type']);
            // exit;
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';
            }
            if ($this->Ce2b->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    if ($this->request->data['Ce2b']['e2b_type'] == "R2") {
                        try {
                            $file = $this->request->data['Ce2b']['e2b_file_data'];
                            $xmlString = file_get_contents($file['tmp_name']);
                            $xml = Xml::build($xmlString);
                            // Find all the messagereceiveridentifier elements
                            $elements = $xml->xpath('//messagereceiveridentifier');

                            // Loop through the elements and extract their values
                            $valid = false;
                            foreach ($elements as $element) {
                                $value = (string) $element;
                                if ($value == 'KE') {
                                    $valid = true;
                                }
                            }
                            if (!$valid) {
                                $this->Session->setFlash(__('The E2b file is not valid. Please try again later'), 'alerts/flash_error');
                                $this->redirect(array('action' => 'edit', $this->Ce2b->id));
                            }
                            try {
                                $xmlString = $xml->asXML();
                                $this->Ce2b->saveField('e2b_content', $xmlString);
                            } catch (Exception $e) {
                                $this->Session->setFlash(__('Whoops! experienced problems uploading file. Please try again later'), 'alerts/flash_error');
                                $this->redirect(array('action' => 'edit', $this->Ce2b->id));
                            }
                        } catch (XmlException $e) {
                            $this->Session->setFlash(__('Whoops! experienced problems uploading file. Please try again later'), 'alerts/flash_error');
                            $this->redirect(array('action' => 'edit', $this->Ce2b->id));
                        }
                    } else {

                        /**Dealing with R3 */

                        $file = $this->request->data['Ce2b']['e2b_file_data'];

                        // Check if file was uploaded successfully
                        if ($file['error'] === UPLOAD_ERR_OK) {
                            $xmlFilePath = $file['tmp_name']; // Temporary file path
                            $data = $this->parseE2BReport($xmlFilePath);

                            if (is_null($data)) {
                                $this->Session->setFlash(__('Whoops! experienced problems uploading file. Please try again later'), 'alerts/flash_error');
                                $this->redirect(array('action' => 'edit', $this->Ce2b->id));
                            } else {
                                try {
                                    $xmlString = file_get_contents($file['tmp_name']);
                                    $xml = Xml::build($xmlString);
                                    $xmlString = $xml->asXML();

                                    $filePath = WWW_ROOT . 'files' . DS . $file['name'];
                                    move_uploaded_file($file['tmp_name'], $filePath);

                                    $xmlArray = Xml::toArray(Xml::build($filePath));
                                    $flattenedData = $this->flattenXml($xmlArray);


                                    $newReportData = $this->extractReportData($flattenedData);

                                    // $dataSample= $flattenedData["MCCI_IN200100UV01.creationTime"];
                                    // debug($dataSample);                                    //
                                    // $this->Ce2b->save($newReportData);

                                    foreach($newReportData as $key=>$value){
                                        $this->Ce2b->saveField($key, $value, false);
                                    }
                                    debug($flattenedData);
                                    exit;
                                    $this->Ce2b->saveField('e2b_content', $xmlString, false);
                                } catch (Exception $e) {
                                    $this->Session->setFlash(__('Whoops! experienced problems uploading file. Please try again later'), 'alerts/flash_error');
                                    $this->redirect(array('action' => 'edit', $this->Ce2b->id));
                                }
                            }
                        } else {
                            // $this->Session->setFlash(__('File upload failed'), 'default', array('class' => 'error'));
                            $this->Session->setFlash(__('Whoops! experienced problems uploading file. Please try again later'), 'alerts/flash_error');
                            $this->redirect(array('action' => 'edit', $this->Ce2b->id));
                        }
                    }

                    //lucian
                    // if(empty($ce2b->reference_no)) {
                    if (!empty($ce2b['Ce2b']['reference_no']) && $ce2b['Ce2b']['reference_no'] == 'new') {
                        $reference = $this->generateReferenceNumber();
                        $this->Ce2b->saveField('reference_no', $reference);
                        $this->Ce2b->saveField('submitted', 2);
                        $this->Ce2b->saveField('submitted_date', date("Y-m-d H:i:s"));
                    }

                    $ce2b = $this->Ce2b->read(null, $id);

                    //******************       Send Email and Notifications to Reporter and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_ce2b_submit')));
                    $variables = array(
                        'name' => $this->Auth->User('name'), 'reference_no' => $ce2b['Ce2b']['reference_no'],
                        'reference_link' => $html->link(
                            $ce2b['Ce2b']['reference_no'],
                            array('controller' => 'ce2bs', 'action' => 'view', $ce2b['Ce2b']['id'], 'reporter' => true, 'full_base' => true),
                            array('escape' => false)
                        ),
                        'modified' => $ce2b['Ce2b']['modified']
                    );
                    $datum = array(
                        'email' => $ce2b['Ce2b']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_ce2b_submit', 'model' => 'Ce2b',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                    );

                    $this->loadModel('Queue.QueuedTask');
                    $this->QueuedTask->createJob('GenericEmail', $datum);
                    $this->QueuedTask->createJob('GenericNotification', $datum);


                    //Send SMS
                    if (!empty($ce2b['Ce2b']['reporter_phone']) && strlen(substr($ce2b['Ce2b']['reporter_phone'], -9)) == 9 && is_numeric(substr($ce2b['Ce2b']['reporter_phone'], -9))) {
                        $datum['phone'] = '254' . substr($ce2b['Ce2b']['reporter_phone'], -9);
                        $variables['reference_url'] = Router::url(['controller' => 'ce2bs', 'action' => 'view', $ce2b['Ce2b']['id'], 'reporter' => true, 'full_base' => true]);
                        $datum['sms'] = CakeText::insert($message['Message']['sms'], $variables);
                        $this->QueuedTask->createJob('GenericSms', $datum);
                    }

                    //Notify managers
                    $users = $this->Ce2b->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array(
                            'User.group_id' => 2,
                            'User.is_active' => '1'
                        )
                    ));
                    foreach ($users as $user) {
                        $variables = array(
                            'name' => $user['User']['name'], 'reference_no' => $ce2b['Ce2b']['reference_no'],
                            'reference_link' => $html->link(
                                $ce2b['Ce2b']['reference_no'],
                                array('controller' => 'Ce2bs', 'action' => 'view', $ce2b['Ce2b']['id'], 'manager' => true, 'full_base' => true),
                                array('escape' => false)
                            ),
                            'modified' => $ce2b['Ce2b']['modified']
                        );
                        $datum = array(
                            'email' => $user['User']['email'],
                            'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_ce2b_submit', 'model' => 'Ce2b',
                            'subject' => CakeText::insert($message['Message']['subject'], $variables),
                            'message' => CakeText::insert($message['Message']['content'], $variables)
                        );

                        $this->QueuedTask->createJob('GenericEmail', $datum);
                        $this->QueuedTask->createJob('GenericNotification', $datum);
                    }
                    // **********************************    END   *********************************

                    $this->Session->setFlash(__('The E2b has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Ce2b->id));
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The E2b has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The E2b could not be saved. Please review the error(s) and resubmit and try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Ce2b->read(null, $id);
        }

        //$Ce2b = $this->request->data;

        $counties = $this->Ce2b->County->find('list', array('order' => array('County.county_name' => 'ASC')));
        $this->set(compact('counties'));
        $sub_counties = $this->Ce2b->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
        $this->set(compact('sub_counties'));
        $designations = $this->Ce2b->Designation->find('list', array('order' => array('Designation.name' => 'ASC')));
        $this->set(compact('designations'));
    }

    public function extractReportData($flattenedData)

    {
        $save_data = array(
            'creation_time' => $flattenedData["MCCI_IN200100UV01.creationTime"],
            'sender_reference'=>$flattenedData['MCCI_IN200100UV01.PORR_IN049016UV.id.@extension'],
            'receiver_id'=>$flattenedData["MCCI_IN200100UV01.PORR_IN049016UV.receiver.device.id.@extension"]
        );

        return $save_data;
    }

    private function flattenXml($xmlArray)
    {
        $data = [];
        $this->recursiveFlatten($xmlArray, $data);
        return $data;
    }

    private function recursiveFlatten($element, &$data, $parentKey = '')
    {
        foreach ($element as $key => $value) {
            $newKey = $parentKey ? $parentKey . '.' . $key : $key;
            if (is_array($value)) {
                if (isset($value['@attributes'])) {
                    foreach ($value['@attributes'] as $attrKey => $attrValue) {
                        $data[$newKey . '.' . $attrKey] = $attrValue;
                    }
                }
                if (isset($value['@value'])) {
                    $data[$newKey] = $value['@value'];
                } else {
                    $this->recursiveFlatten($value, $data, $newKey);
                }
            } else {
                $data[$newKey] = $value;
            }
        }
    }
    public function reporter_add()
    {
        # code...
        $user = $this->Auth->User();
        // debug($user);
        // exit;
        $this->Ce2b->create();
        $this->Ce2b->save(['Ce2b' => [
            'user_id' => $this->Auth->User('id'),
            'reference_no' => 'new',
            'reporter_email' => $this->Auth->User('email'),
            'designation_id' => $this->Auth->User('designation_id'),
            'reporter_designation' => $this->Auth->User('designation_id'),
            'county_id' => $this->Auth->User('county_id'),
            'reporter_name' => $this->Auth->User('name'),
            'reporter_email' => $this->Auth->User('email'),
            'reporter_phone' => $this->Auth->User('phone_no'),
            'company_name' => $user['name_of_institution'],
            'company_code' => $this->Auth->User('institution_code'),

            // 
        ]], false);
        $this->Session->setFlash(__('The E2b has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Ce2b->id));
    }
    public function generateReferenceNumber()
    {
        $count = $this->Ce2b->find('count',  array(
            'fields' => 'Ce2b.reference_no',
            'conditions' => array(
                'Ce2b.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")), 'Ce2b.reference_no !=' => 'new'
            )
        ));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;
        $reference = 'E2B/' . date('Y') . '/' . $count;
        //ensure that the reference number is unique
        $exists = $this->Ce2b->find('count',  array(
            'fields' => 'Ce2b.reference_no',
            'conditions' => array('Ce2b.reference_no' => $reference)
        ));
        if ($exists > 0) {
            $reference = $this->generateReferenceNumber();
        }

        return $reference;
    }

    public function reporter_edit($id = null)
    {
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            throw new NotFoundException(__('Invalid Ce2b'));
        }
        $this->general_editor($id);
    }

    public function manager_view($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            $this->Session->setFlash(__('Could not verify the E2b report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }
        $this->general_view($id);
    }

    public function reviewer_view($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            $this->Session->setFlash(__('Could not verify the E2b report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }
        $this->general_view($id);
    }

    public function general_view($id = null)
    {
        # code...

        $ce2b = $this->Ce2b->find('first', array(
            'conditions' => array('Ce2b.id' => $id),
            'contain' => array('Designation', 'Attachment', 'ExternalComment', 'ExternalComment.Attachment', 'ReviewComment', 'ReviewComment.Attachment')
        ));

        // debug($ce2b['Ce2b']['e2b_type']);
        // exit;

        if ($ce2b['Ce2b']['e2b_type'] === "R2") {

            $data = [];
            try {
                $xml = $ce2b['Ce2b']['e2b_content'];
                $xml = Xml::build($xml);
                $elements = $xml->xpath('//*');

                foreach ($elements as $element) {
                    $key = $element->getName();
                    $value = (string) $element;
                    if ($key == 'ichicsr' || $key == 'ichicsrmessageheader') {
                        continue;
                    } else {
                        $data[] = [
                            'key' => $key,
                            'value' => $value
                        ];
                    }
                }
            } catch (Exception $e) {
            }

            // $this->set(['ce2b' => $ce2b, 'data' => $data]);

            $e2b = Xml::toArray(Xml::build($ce2b['Ce2b']['e2b_content']));
            $this->set(['ce2b' => $ce2b]);
            $this->set(['e2b' => $e2b]);
        } else {

            $e2b = Xml::toArray(Xml::build($ce2b['Ce2b']['e2b_content']));
            $this->set(['ce2b' => $ce2b]);
            $this->set(['e2b' => $e2b]);
            $this->render('ce2b_r3');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'E2b' . $id . '.pdf',  'orientation' => 'portrait');
            $this->response->download('Ce2b_' . $ce2b['Ce2b']['id'] . '.pdf');
        }
    }
    public function reporter_view($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            $this->Session->setFlash(__('Could not verify the E2b report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }
        $this->general_view($id);
    }

    public function reporter_delete($id = null)
    {
        # code...
        $this->common_delete($id);
    }

    public function common_delete($id = null)
    {
        # code...
        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            throw new NotFoundException(__('Invalid Ce2b'));
        }
        $ce2b = $this->Ce2b->read(null, $id);
        if ($ce2b['Ce2b']['submitted'] == 2) {
            $this->Session->setFlash(__('You cannot delete a submitted E2b Report'), 'alerts/flash_error');
            $this->redirect($this->referer());
        }
        //update the field deleted to true and deleted_date to current date without validation 
        $ce2b['Ce2b']['deleted'] = true;
        $ce2b['Ce2b']['deleted_date'] = date("Y-m-d H:i:s");
        if ($this->Ce2b->save($ce2b, array('validate' => false))) {
            //displat message with reference number 
            $this->Session->setFlash(__('Ce2b Report ' . $ce2b['Ce2b']['reference_no'] . ' has been deleted'), 'alerts/flash_info');
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('E2b was not deleted'), 'alerts/flash_error');
        $this->redirect($this->referer());
    }
    public function manager_archive($id = null)
    {

        $this->Ce2b->id = $id;
        if (!$this->Ce2b->exists()) {
            throw new NotFoundException(__('Invalid E2B'));
        }
        $report = $this->Ce2b->read(null, $id);
        $report['Ce2b']['archived'] = true;
        $report['Ce2b']['archived_date'] = date("Y-m-d H:i:s");
        if ($this->Ce2b->save($report, array('validate' => false))) {
            $this->Session->setFlash(__('E2B Archived successfully'), 'alerts/flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('E2B was not archied'), 'alerts/flash_error');
        $this->redirect($this->referer());
    }
}
