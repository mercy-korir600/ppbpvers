<?php
App::uses('AppModel', 'Model');
/**
 * Disproportionality Model
 * @property Disproportionality $Disproportionality
 */
class Disproportionality extends AppModel {
	public $actsAs = array('Search.Searchable', 'Containable');
	public $filterArgs = array(
        'drug_name' => array('type' => 'like', 'encode' => true),
		'reaction_name' => array('type' => 'like', 'encode' => true),
	);

}
