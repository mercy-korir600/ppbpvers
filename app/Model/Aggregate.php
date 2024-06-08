<?php
App::uses('AppModel', 'Model');
/**
 * Aggregate Model
 *
 * @property User $User
 * @property Ce2b $Ce2b
 * @property County $County
 * @property SubCounty $SubCounty
 * @property Designation $Designation
 */
class Aggregate extends AppModel
{


	public $actsAs = array('Containable', 'Search.Searchable');
    public $filterArgs = array(
        'protocol_no' => array('type' => 'like', 'encode' => true),
	);
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'brand_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide a brand_name'
			),
		),
		'inn_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide a inn_name'
			),
		),
		'mah' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide a Marketing Authorization Holder'
			),
		),
		'therapeutic_group' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide Therapeutic Group Code'
			),
		),
		'authorised_indications' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide authorised indications'
			),
		),
		'form_strength' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide pharmaceutical form(s)'
			),
		),
		// 'introduction' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide Brief Introduction'
		// 	),
		// ),
		// 'worldwide_marketing' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide worldwide marketing'
		// 	),
		// ),
		// 'action_taken' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide action_taken'
		// 	),
		// ),
		// 'reference_changes' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide reference_changes'
		// 	),
		// ),
		// 'estimated_exposure' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide estimated_exposure'
		// 	),
		// ),
		// 'clinical_findings' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide clinical findings'
		// 	),
		// ),
		// 'efficacy' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide efficacy'
		// 	),
		// ),
		// 'late_breaking' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide late breaking information'
		// 	),
		// ),
		// 'safety_concerns' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide safety concerns'
		// 	),
		// ),


		// // Handle other signals, atleast one of them should be provided here 


		// 'risks_evaluation' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide risks evaluation'
		// 	),
		// ),
		// 'risks_characterisation' => array(
		// 	'notBlank' => array(
		// 		'rule'     => 'notBlank',
		// 		'required' => true,
		// 		'message'  => 'Please provide risks characterisation'
		// 	),
		// ),

		// // ENSURE ATLEAST ONE ATTACHMENT PROVIDED
		// 'sample' => array(
		// 	'atleastOneAttachment' => array(
		// 		'rule'     => 'atleastOneAttachment',
		// 		'required' => false,
		// 		'message'  => 'Please upload a file'
		// 	),

		// ),
	);


	public function atleastOneAttachment($field = null)
	{
		return !empty($this->data['Attachment']);
	}
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
		'Ce2b' => array(
			'className' => 'Ce2b',
			'foreignKey' => 'ce2b_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'County' => array(
			'className' => 'County',
			'foreignKey' => 'county_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SubCounty' => array(
			'className' => 'SubCounty',
			'foreignKey' => 'sub_county_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Designation' => array(
			'className' => 'Designation',
			'foreignKey' => 'designation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'AggregateListOfSignal' => array(
			'className' => 'AggregateListOfSignal',
			'foreignKey' => 'aggregate_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Attachment' => array(
			'className' => 'Attachment',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('Attachment.model' => 'Aggregate', 'Attachment.group' => 'attachment'),
		),
		'ExternalComment' => array(
			'className' => 'Comment',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('ExternalComment.model' => 'Aggregate', 'ExternalComment.category' => 'external'),
		),
		'ReviewerComment' => array(
			'className' => 'Comment',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('ReviewerComment.model' => 'Aggregate', 'ReviewerComment.category' => 'review'),
		),
		'Recommendation' => array(
			'className' => 'Comment',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('Recommendation.model' => 'Aggregate', 'Recommendation.category' => 'recommendation'),
		),
	);
}
