<?php
App::uses('AppModel', 'Model');
/**
 * Ce2bReaction Model
 *
 * @property Ce2b $Ce2b
 */
class Ce2bReaction extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'ce2b_reaction';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ce2b' => array(
			'className' => 'Ce2b',
			'foreignKey' => 'ce2b_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
