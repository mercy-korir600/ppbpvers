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
class Aggregate extends AppModel {

	public $actsAs = array('Media.Transfer', 'Media.Coupler', 'Media.Meta', 'Search.Searchable','Containable');
	public $filterArgs = array(
		'reference_no' => array('type' => 'like', 'encode' => true),
		'start_date' => array('type' => 'query', 'method' => 'dummy'),
		'end_date' => array('type' => 'query', 'method' => 'dummy'),
	);



	public $hasMany = array(
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
            'conditions' => array('ExternalComment.model' => 'Aggregate', 'ExternalComment.category' => 'external' ),
        ),
		'ReviewComment' => array(
            'className' => 'Comment',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'conditions' => array('ReviewComment.model' => 'Aggregate', 'ReviewComment.category' => 'review' ),
        )

		
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'e2b_file_data' => array( 
			'resource'   => array(
				'rule' => 'checkResource',
				'allowEmpty' => false,
				'message' => 'Please attach a file!'
			),
			'access'     => array('rule' => 'checkAccess'),  
			'permission' => array('rule' => array('checkPermission', '*')),
			'size'       => array('rule' => array('checkSize', '5M')), 
		),
		'reporter_email' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the reporter_email'
			),
		),
	);

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
}
