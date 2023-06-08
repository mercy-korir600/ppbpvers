<?php
App::uses('AppModel', 'Model');
/**
 * Drug Model
 *
 */
class Drug extends AppModel {
    public $actsAs = array('Search.Searchable', 'Containable');
	public $filterArgs = array(
        'brand_name' => array('type' => 'like', 'encode' => true),
        'inn_name' => array('type' => 'like', 'encode' => true),
        'batch_number' => array('type' => 'like', 'encode' => true), 
        'manufacturer' => array('type' => 'value'), 
    );

    public function dummy($data = array()) {
    	return array( '1' => '1');
    }
}
