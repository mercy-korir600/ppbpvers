<?php
App::uses('AppController', 'Controller');
/**
 * Reviews Controller
 */
class ReviewsController extends AppController
{

	/**
	 * Scaffold
	 *
	 * @var mixed
	 */
	public $scaffold;

	# code...
	public function add()
	{
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Review->create();
			$data=$this->request->data;
			// debug($data);
			// exit;

			if ($this->Review->saveAssociated($this->request->data, array('deep' => true))) {

				//******************       Send Email and Notifications to Reporter and Managers          *****************************
				// $this->loadModel('Message');
				// $html = new HtmlHelper(new ThemeView());
				// $message = $this->Message->find('first', array('conditions' => array('name' => 'report_feedback')));
				// // $this->loadModel($Model);
				// // $entity = $this->Sadr->find('first', array(
				// $entity = ClassRegistry::init($model)->find('first', array(
				// 	'contain' => array(),
				// 	'conditions' => array($model . '.id' => $this->request->data['Comment']['foreign_key'])
				// ));

				// $users = ClassRegistry::init($model)->User->find('all', array(
				// 	'contain' => array(),
				// 	'conditions' => array('OR' => array('User.id' => $entity[$model]['user_id'], 'User.group_id' => 2))
				// ));
				// foreach ($users as $user) {
				// 	$actioner = ($user['User']['group_id'] == 2) ? 'manager' : 'reporter';
				// 	$variables = array(
				// 		'name' => $user['User']['name'], 'reference_no' => $entity[$model]['reference_no'],
				// 		'comment_subject' => $this->request->data['Comment']['subject'],
				// 		'comment_content' => $this->request->data['Comment']['content'],
				// 		'reference_link' => $html->link(
				// 			$entity[$model]['reference_no'],
				// 			array('controller' => 'sadrs', 'action' => 'view', $entity[$model]['id'], $actioner => true, 'full_base' => true),
				// 			array('escape' => false)
				// 		),
				// 	);
				// 	$datum = array(
				// 		'email' => $user['User']['email'],
				// 		'id' => $this->request->data['Comment']['foreign_key'], 'user_id' => $user['User']['id'], 'type' => 'report_feedback', 'model' => $model,
				// 		'subject' => CakeText::insert($message['Message']['subject'], $variables),
				// 		'message' => CakeText::insert($message['Message']['content'], $variables)
				// 	);
				// 	$this->loadModel('Queue.QueuedTask');
				// 	$this->QueuedTask->createJob('GenericEmail', $datum);
				// 	$this->QueuedTask->createJob('GenericNotification', $datum);
				// }
				//**********************************    END   *********************************

				$this->Session->setFlash(__('The review has been  saved and sent to the user'), 'alerts/flash_success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'), 'alerts/flash_error');
				$this->redirect($this->referer());
			}
		} else {
			throw new MethodNotAllowedException();
		}
	}
	public function manager_add() {
        $this->add();
    }
}
