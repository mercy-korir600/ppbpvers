<?php
App::uses('AppModel', 'Model');
/**
 * Disproportionality Model
 *
 */
class Disproportionality extends AppModel {

	public $actsAs = array('Search.Searchable', 'Containable');
    // public $drug_dictionary = ClassRegistry::init('DrugDictionary');

    public $filterArgs = array(
        'drug_name' => array('type' => 'like', 'encode' => true),
	);

}
