<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
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
			$model="Saefi";

			if ($this->Review->saveAssociated($this->request->data, array('deep' => true))) {

				//******************       Send Email and Notifications to Reporter and Managers          *****************************
				$this->loadModel('Message');
				$html = new HtmlHelper(new ThemeView());
				$message = $this->Message->find('first', array('conditions' => array('name' => 'report_review')));
				// $this->loadModel($Model);
				// $entity = $this->Sadr->find('first', array(
				$entity = ClassRegistry::init($model)->find('first', array(
					'contain' => array(),
					'conditions' => array($model . '.id' => $this->request->data['Review']['saefi_id'])
				));

				$users = ClassRegistry::init($model)->User->find('all', array(
					'contain' => array(),
					'conditions' => array('OR' => array('User.id' => $entity[$model]['user_id'], 'User.group_id' => 2))
				));
				foreach ($users as $user) {
					$actioner = ($user['User']['group_id'] == 2) ? 'manager' : 'reporter';
					$variables = array(
						'name' => $user['User']['name'], 'reference_no' => $entity[$model]['reference_no'],
						'comment_subject' => "Committee Review",
						'comment_content' => $this->request->data['Review']['comment'],
						'reference_link' => $html->link(
							$entity[$model]['reference_no'],
							array('controller' => 'saefis', 'action' => 'view', $entity[$model]['id'], $actioner => true, 'full_base' => true),
							array('escape' => false)
						),
					);
					$datum = array(
						'email' => $user['User']['email'],
						'id' => $this->request->data['Review']['saefi_id'], 'user_id' => $user['User']['id'], 'type' => 'report_review', 'model' => $model,
						'subject' => CakeText::insert($message['Message']['subject'], $variables),
						'message' => CakeText::insert($message['Message']['content'], $variables)
					);
					$this->loadModel('Queue.QueuedTask');
					$this->QueuedTask->createJob('GenericEmail', $datum);
					$this->QueuedTask->createJob('GenericNotification', $datum);
				}
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
	public function reporter_add() {
        $this->add();
    }
}

