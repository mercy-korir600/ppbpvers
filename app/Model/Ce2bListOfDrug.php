<?php
App::uses('AppModel', 'Model');
/**
 * Ce2bListOfDrug Model
 *
 * @property Ce2b $Ce2b
 * @property Ce2bFollowup $Ce2bFollowup
 * @property Dose $Dose
 * @property Route $Route
 * @property Frequency $Frequency
 */
class Ce2bListOfDrug extends AppModel {


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
		),
		'Ce2bFollowup' => array(
			'className' => 'Ce2bFollowup',
			'foreignKey' => 'ce2b_followup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Dose' => array(
			'className' => 'Dose',
			'foreignKey' => 'dose_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Route' => array(
			'className' => 'Route',
			'foreignKey' => 'route_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Frequency' => array(
			'className' => 'Frequency',
			'foreignKey' => 'frequency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
