<?php
App::uses('AppModel', 'Model');
/**
 * Review Model
 *
 * @property User $User
 * @property Saefi $Saefi
 */
class Review extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Saefi' => array(
			'className' => 'Saefi',
			'foreignKey' => 'saefi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
	);
	public $hasMany = array(
		'Attachment' => array(
			'className' => 'Attachment',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('Attachment.model' => 'Review'),
		),
	);
}
