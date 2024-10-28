<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Http\Exception\NotFoundException;
use Cake\I18n\FrozenTime;
use Cake\Routing\Router;
use Cake\Utility\Hash;
use Cake\Utility\Security;
use Cake\Utility\Text;
use Cake\View\Helper\HtmlHelper;

/**
 * Padrs Controller
 *
 * @property \App\Model\Table\PadrsTable $Padrs
 * @method \App\Model\Entity\Padr[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadrsController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->Auth->allow('add');
    }
    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'add',
            'view',
            'edit',
            'followup'
        ]);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Counties', 'SubCounties', 'Designations'],
        ];
        $padrs = $this->paginate($this->Padrs);

        $this->set(compact('padrs'));
    }

    /** 
     * View method
     *
     * @param string|null $id Padr id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    { 
        $padr = $this->Padrs->find('all', [
            'contain' => ['Users', 'Counties', 'SubCounties', 'Designations', 'Padrs', 'PadrListOfMedicines'],
            'conditions' => ['Padrs.token' => $id] // Replace 'other_column' with the actual column name
        ])->firstOrFail();
        // 
         
        $this->set(compact('padr'));
    }

    public function followup($token = null)
    {
        $padr = $this->Padrs->find('all', [
            'contain' => ['Users', 'Counties', 'SubCounties', 'Designations', 'Padrs', 'PadrListOfMedicines'],
            'conditions' => ['Padrs.token' => $token] // Replace 'other_column' with the actual column name
        ])->first();
        if (!$padr) {
            $this->Flash->error(__('We could not identify the report. Please refer to the acknowledgement email sent by PPB.'));
            return   $this->redirect($this->referer());
        }


        // Convert the entity to an array
        $padrArray = $padr->toArray(); // Convert entity to array

        // Remove 'Padr.id' and 'PadrListOfMedicines.id' fields using Hash::remove
        $padrArray = Hash::remove($padrArray, 'id'); // Remove 'Padr.id' field
        $dataSave = Hash::remove($padrArray, 'padr_list_of_medicines.{n}.id'); // Remove 'PadrListOfMedicines.id' fields
 
        $dataSave['padr_id'] = $padr->id; // Add 'padr_id' field

        // Generate reference number
        $count = $this->Padrs->find('all', [
            'conditions' => [
                'Padrs.reference_no LIKE' => $padr['reference_no'] . '%'
            ]
        ])->count();
        $count = ($count < 10) ? "0$count" : $count;
        $dataSave['reference_no'] = $padr['reference_no'] . '_F' . $count;

        // Set additional fields
        $dataSave['report_type'] = 'Followup';
        $dataSave['submitted'] = 0;

        $padr = $this->Padrs->newEmptyEntity();
        $padr = $this->Padrs->patchEntity($padr, $dataSave, [
            'associated' => ['PadrListOfMedicines', 'Attachments']
        ]);
        // Create a new entity and save it


        if ($this->Padrs->save($padr)) {
            // Success, handle accordingly
            $token = Security::hash(strval($padr['id']));
            $dataTable = $this->getTableLocator()->get('padrs');
            // Update the field using the query builder
            $result = $dataTable->query()
                ->update()
                ->set([
                    'token' => $token,
                ])
                ->where(['id' => $padr['id']])
                ->execute();
            $this->Flash->success(__('The follow-up report has been saved.'));
            $this->redirect(array('action' => 'edit', $token));
        } else {
            // Error, handle accordingly
            $this->Flash->error(__('Unable to save the follow-up report. Please try again.'));
            $this->redirect($this->referer());
        }
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {


        $this->Padrs->addBehavior('Captcha.Captcha');
        $padr = $this->Padrs->newEmptyEntity();
        if ($this->request->is('post')) {


            $padr = $this->Padrs->patchEntity($padr, $this->request->getData(), [
                'validate'=>true,
                'associated' => ['PadrListOfMedicines', 'Attachments']
            ]);

            // debug($padr);
            // exit;
            if ($this->Padrs->save($padr,['validate'=>true])) {


                $startDate = new FrozenTime(date("Y-01-01 00:00:00"));
                $endDate = new FrozenTime(date("Y-m-d H:i:s"));

                $count = $this->Padrs->find()
                    ->where([
                        'Padrs.submitted_date BETWEEN :start AND :end'
                    ])
                    ->bind(':start', $startDate->format('Y-m-d H:i:s'), 'datetime')
                    ->bind(':end', $endDate->format('Y-m-d H:i:s'), 'datetime')
                    ->count();

                $count++;
                $count = ($count < 10) ? "0$count" : $count;

                $token = Security::hash(strval($padr['id']));
                $dataTable = $this->getTableLocator()->get('padrs');
                // Update the field using the query builder
                $result = $dataTable->query()
                    ->update()
                    ->set([
                        'token' => $token,
                        'submitted_date' => date("Y-m-d H:i:s"),
                        'reference_no' => 'PADR/' . date('Y') . '/' . $count
                    ])
                    ->where(['id' => $padr['id']])
                    ->execute();


                //******************       Send Emails to Reporter and Managers          *****************************


                $html = new HtmlHelper(new \Cake\View\View());

                $message = $this->Messages->find()
                    ->where(['name' => 'reporter_padr_submit'])
                    ->first();
                $padr = $this->Padrs->get($padr['id'], [
                    'contain' => [],
                ]);
                // debug($padr);
                // exit;
                $referenceLink = Router::url([
                    'controller' => 'padrs',
                    'action' => 'view',
                    $padr['token']
                ], true);
                $variables = array(
                    'name' => $padr['reporter_name'],
                    'reference_no' => $padr['reference_no'],
                    'reference_link' => $html->link(
                        $padr['reference_no'],
                        $referenceLink,
                        // array('controller' => 'padrs', 'action' => 'view', $padr['token'], 'full_base' => true),
                        array('escape' => false)
                    ),
                    'modified' => $padr['modified']
                );
                $datum = array(
                    'email' => $padr['reporter_email'],
                    'id' => $padr->id,
                    'type' => 'reporter_padr_submit',
                    'model' => 'Padr',
                    'subject' => Text::insert($message['subject'], $variables),
                    'message' => Text::insert($message['content'], $variables)
                );

                $this->QueuedJobs->createJob('GenericEmail', $datum);
                //Notify managers
                $users = $this->Padrs->Users->find('all', [
                    'contain' => [],
                    'conditions' => [
                        'Users.role_id' => 2,
                        'Users.is_active' => '1'
                    ]
                ]);

                $referenceLink = Router::url([
                    'controller' => 'padrs',
                    'action' => 'view',
                    $padr['token'],
                    // 'prefix' => 'manager'
                ], true);
                foreach ($users as $user) {

                    $variables = array(
                        'name' => $user['name'],
                        'reference_no' => $padr['reference_no'],
                        'reference_link' => $html->link(
                            $padr['reference_no'],
                            $referenceLink,
                            array('escape' => false)
                        ),
                        'modified' => $padr['modified']
                    );
                    $datum = array(
                        'email' => $user['email'],
                        'id' => $padr->id,
                        'user_id' => $user['id'],
                        'type' => 'reporter_padr_submit',
                        'model' => 'Padr',
                        'subject' => Text::insert($message['subject'], $variables),
                        'message' => Text::insert($message['content'], $variables)
                    );

                    $this->QueuedJobs->createJob('GenericEmail', $datum);
                    $this->QueuedJobs->createJob('GenericNotification', $datum);
                }
                //**********************************    END   *********************************


                $this->Flash->success(__('Your report has been successfully submitted to PPB. Please check your email for the acknowldgement.'));

                return $this->redirect(['action' => 'view', $token]);
            }
            $this->Flash->error(__('The padr could not be saved. Please, try again.'));
        }
        $users = $this->Padrs->Users->find('list', ['limit' => 200])->all();
        $counties = $this->Padrs->Counties->find('list', ['limit' => 200])->all();
        $designations = $this->Padrs->Designations->find('list', ['limit' => 200])->all();
        $this->set(compact('padr', 'users', 'counties', 'designations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Padr id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $padr = $this->Padrs->find('all', [
            'contain' => ['Users', 'Counties', 'SubCounties', 'Designations', 'Padrs', 'PadrListOfMedicines'],
            'conditions' => ['Padrs.token' => $id] // Replace 'other_column' with the actual column name
        ])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $padr = $this->Padrs->patchEntity($padr, $this->request->getData());
            if ($this->Padrs->save($padr)) {



                //******************       Send Emails to Reporter and Managers          *****************************


                $html = new HtmlHelper(new \Cake\View\View());

                $message = $this->Messages->find()
                    ->where(['name' => 'reporter_padr_submit'])
                    ->first();
                $padr = $this->Padrs->get($padr['id'], [
                    'contain' => [],
                ]);
                // debug($padr);
                // exit;
                $referenceLink = Router::url([
                    'controller' => 'padrs',
                    'action' => 'view',
                    $padr['token']
                ], true);
                $variables = array(
                    'name' => $padr['reporter_name'],
                    'reference_no' => $padr['reference_no'],
                    'reference_link' => $html->link(
                        $padr['reference_no'],
                        $referenceLink,
                        // array('controller' => 'padrs', 'action' => 'view', $padr['token'], 'full_base' => true),
                        array('escape' => false)
                    ),
                    'modified' => $padr['modified']
                );
                $datum = array(
                    'email' => $padr['reporter_email'],
                    'id' => $padr->id,
                    'type' => 'reporter_padr_submit',
                    'model' => 'Padr',
                    'subject' => Text::insert($message['subject'], $variables),
                    'message' => Text::insert($message['content'], $variables)
                );

                $this->QueuedJobs->createJob('GenericEmail', $datum);
                //Notify managers
                $users = $this->Padrs->Users->find('all', [
                    'contain' => [],
                    'conditions' => [
                        'Users.role_id' => 2,
                        'Users.is_active' => '1'
                    ]
                ]);

                $referenceLink = Router::url([
                    'controller' => 'padrs',
                    'action' => 'view',
                    $padr['token'],
                    // 'prefix' => 'manager'
                ], true);
                foreach ($users as $user) {

                    $variables = array(
                        'name' => $user['name'],
                        'reference_no' => $padr['reference_no'],
                        'reference_link' => $html->link(
                            $padr['reference_no'],
                            $referenceLink,
                            array('escape' => false)
                        ),
                        'modified' => $padr['modified']
                    );
                    $datum = array(
                        'email' => $user['email'],
                        'id' => $padr->id,
                        'user_id' => $user['id'],
                        'type' => 'reporter_padr_submit',
                        'model' => 'Padr',
                        'subject' => Text::insert($message['subject'], $variables),
                        'message' => Text::insert($message['content'], $variables)
                    );

                    $this->QueuedJobs->createJob('GenericEmail', $datum);
                    $this->QueuedJobs->createJob('GenericNotification', $datum);
                }
                //**********************************    END   *********************************


                $this->Flash->success(__('Your follow up report has been successfully submitted to PPB. Please check your email for the acknowldgement'));

            return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The padr could not be saved. Please, try again.'));
        }
        $users = $this->Padrs->Users->find('list', ['limit' => 200])->all();
        $counties = $this->Padrs->Counties->find('list', ['limit' => 200])->all();
        $subCounties = $this->Padrs->SubCounties->find('list', ['limit' => 200])->all();
        $designations = $this->Padrs->Designations->find('list', ['limit' => 200])->all();
        $this->set(compact('padr', 'users', 'counties', 'subCounties', 'designations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Padr id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $padr = $this->Padrs->get($id);
        if ($this->Padrs->delete($padr)) {
            $this->Flash->success(__('The padr has been deleted.'));
        } else {
            $this->Flash->error(__('The padr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
