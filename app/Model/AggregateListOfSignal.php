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

	public $validate = array(
		// 'signal_term' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide signal term'
		// 	),
		// ),
	);


	public function beforeSave($options = array())
	{
		if (!empty($this->data['AggregateListOfSignal']['date_detected'])) {
			$this->data['AggregateListOfSignal']['date_detected'] = $this->dateFormatBeforeSave($this->data['AggregateListOfSignal']['date_detected']);
		}
		if (!empty($this->data['AggregateListOfSignal']['date_closed'])) {
			$this->data['AggregateListOfSignal']['date_closed'] = $this->dateFormatBeforeSave($this->data['AggregateListOfSignal']['date_closed']);
		}
		return true;
	}

	public function afterFind($results, $primary = false)
	{
		foreach ($results as $key => $val) {
			if (isset($val['AggregateListOfSignal']['date_detected'])) {
				$results[$key]['AggregateListOfSignal']['date_detected'] = $this->dateFormatAfterFind($val['AggregateListOfSignal']['date_detected']);
			}
			if (isset($val['AggregateListOfSignal']['date_closed'])) {
				$results[$key]['AggregateListOfSignal']['date_closed'] = $this->dateFormatAfterFind($val['AggregateListOfSignal']['date_closed']);
			}
		}
		return $results;
	}
}
