<?php
App::uses('AppModel', 'Model');
/**
 * AggregateListOfSignal Model
 *
 * @property Aggregate $Aggregate
 * @property AggregateFollowup $AggregateFollowup
 */
class AggregateListOfSignal extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Aggregate' => array(
			'className' => 'Aggregate',
			'foreignKey' => 'aggregate_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AggregateFollowup' => array(
			'className' => 'AggregateFollowup',
			'foreignKey' => 'aggregate_followup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
