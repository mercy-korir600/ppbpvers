<?php
App::uses('AppModel', 'Model');
/**
 * SadrReaction Model
 *
 * @property Sadr $Sadr
 */
class SadrReaction extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'sadr_reaction';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Sadr' => array(
			'className' => 'Sadr',
			'foreignKey' => 'sadr_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
