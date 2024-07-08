<?php
App::uses('AppController', 'Controller');
/**
 * Pockets Controller
 * 
 * @property Pocket $Pocket
 */
class PocketsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
	public function beforeFilter() {
        parent::beforeFilter();
        // $this->Auth->allow('*');
        $this->Auth->allow('checklist', 'lchecklist');
    }
	public function checklist($type = null) {
        $formdata = $this->Pocket->find('list', array(
            'fields' => array('Pocket.name', 'Pocket.content'),
            'conditions' => array('Pocket.type' => $type),
            'order' => array('Pocket.item_number' => 'ASC'),
            'recursive' => 0
        ));
        if ($this->request->is('requested')) {
            return $formdata;
        }
    }
    public function lchecklist($type = null) {
        $formdata = $this->Pocket->find('list', array(
            'fields' => array('Pocket.name', 'Pocket.required'),
            'conditions' => array('Pocket.type' => $type),
            'recursive' => 0
        ));
        if ($this->request->is('requested')) {
            return $formdata;
        }
    }



}
