<?php
App::uses('AppModel', 'Model');
App::uses('Time', 'Utility');

/**
 * Saefi Model
 *
 * @property User $User
 * @property Saefi $Saefi
 * @property County $County 
 * @property Designation $Designation
 * @property Saefi $Saefi
 */
class Saefi extends AppModel
{

	public $recursive = 1;
	public $actsAs = array('Search.Searchable', 'Containable');

	public $filterArgs = array(
		'reference_no' => array('type' => 'like', 'encode' => true),
		// 'report_title' => array('type' => 'like', 'encode' => true),
		// 'name_of_institution' => array('type' => 'like', 'encode' => true),
		// 'serious' => array('type' => 'like', 'encode' => true),
		// 'range' => array('type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'CAST(Aefi.reporter_date as DATE) BETWEEN ? AND ?'),
		'start_date' => array('type' => 'query', 'method' => 'dummy'),
		'end_date' => array('type' => 'query', 'method' => 'dummy'),
		'county_id' => array('type' => 'value'),
		// 'vaccine_name' => array('type' => 'query', 'method' => 'findByVaccineName', 'encode' => true),
		// 'health_program' => array('type' => 'query', 'method' => 'findByHealthProgram', 'encode' => true),
		// 'bcg' => array('type' => 'value'),
		// 'convulsion' => array('type' => 'value'),
		// 'urticaria' => array('type' => 'value'),
		// 'high_fever' => array('type' => 'value'),
		// 'abscess' => array('type' => 'value'),
		// 'local_reaction' => array('type' => 'value'),
		// 'anaphylaxis' => array('type' => 'value'),
		// 'paralysis' => array('type' => 'value'),
		// 'toxic_shock' => array('type' => 'value'),
		// 'complaint_other' => array('type' => 'value'),
		// 'complaint_other_specify' => array('type' => 'like', 'encode' => true),
		// 'patient_name' => array('type' => 'like', 'encode' => true),
		// 'report_type' => array('type' => 'value'),
		// 'serious_yes' => array('type' => 'value'),
		// 'outcome' => array('type' => 'value'),
		// 'reporter' => array('type' => 'query', 'method' => 'reporterFilter', 'encode' => true),
		'designation_id' => array('type' => 'value'),
		// 'gender' => array('type' => 'value'),
		'submitted' => array('type' => 'value'),
		// 'submit' => array('type' => 'query', 'method' => 'orConditions', 'encode' => true),
	);
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(

		'date_of_birth' => array(
			'ageOrDate' => array(
				'rule'     => 'ageOrDate',
				// 'required' => false,
				'allowEmpty' => true,
				'message'  => 'Please specify the patient\'s date / Year of birth or age in months'
			),
		),
		'province_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a province',
			),
		),
		'designation_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please specify your designation',
			),
		),
		'gender' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please specify the patient\'s gender'
			),
		),
		'list' => array(
			'atLeastOneVaccine' => array(
				'rule'     => 'atLeastOneVaccine',
				// 'required' => true,
				'message'  => 'Please add at least one vaccine below'
			),
		),
		'reporter_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide the name of the reporter'
			),
		),
		'reporter_email' => array(
			'notBlank' => array(
				'rule'     => 'email',
				'required' => true,
				'message'  => 'Please provide a valid email address'
			),
		),
		'report_date' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide report date'
			),
		),
		'start_date' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide start date'
			),
		),
		

		'past_history_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'past_history', 'past_history_remarks'],
				'message' => 'Please provide past history remarks'
			)
		),
		'adverse_event_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'adverse_event', 'adverse_event_remarks'],
				'message' => 'Please provide past adverse event remarks'
			)
		),
		'allergy_history_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'allergy_history', 'allergy_history_remarks'],
				'message' => 'Please provide allergy history remarks'
			)
		),
		'comorbidity_disorder_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'comorbidity_disorder', 'comorbidity_disorder_remarks'],
				'message' => 'Please provide comorbidity disorder remarks'
			)
		),
		'existing_illness_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'existing_illness', 'existing_illness_remarks'],
				'message' => 'Please provide existing illness remarks'
			)
		),
		'covid_positive_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'covid_positive', 'covid_positive_remarks'],
				'message' => 'Please provide past covid positive remarks'
			)
		),
		'hospitalization_history_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'hospitalization_history', 'hospitalization_history_remarks'],
				'message' => 'Please provide hospitalization_history remarks'
			)
		),
		'medication_vaccination_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'medication_vaccination', 'medication_vaccination_remarks'],
				'message' => 'Please provide medication vaccination remarks'
			)
		),
		'faith_healers_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'faith_healers', 'faith_healers_remarks'],
				'message' => 'Please provide faith healers remarks'
			)
		),
		'family_history_remarks' => array(
			'seriousYes' => array(
				'rule' => ['checkFieldNotEmpty', 'family_history', 'family_history_remarks'],
				'message' => 'Please provide family history remarks'
			)
		),
		'examiner_name' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide the name of the investigator'
			),
		),
		'person_date' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide the date'
			),
		),

		'person_designation' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide the designation'
			),
		),
		'final_diagnosis' => array(
			'notBlank' => array(
				'rule'     => 'notBlank',
				'required' => true,
				'message'  => 'Please provide the Final Diagnosis'
			),
		),
		


	);

	public function checkFieldNotEmpty($mainField = null, $subField = null)
	{
		if ($this->data['Saefi'][$mainField] == 'Yes') {
			return !empty($this->data['Saefi'][$subField]);
		} else {
			return true;
		}
	}


	public function atLeastOneVaccine($field = null)
	{
		if (!empty($this->data['AefiListOfVaccine'])) {
			return count($this->data['AefiListOfVaccine']) > 0;
		}
		return false;
	}

	public function ageOrDate($field = null)
	{
		return !empty($this->data['Saefi']['date_of_birth']) || !empty($this->data['Saefi']['age_at_onset_years']) || !empty($this->data['Saefi']['age_group']);
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
		'County' => array(
			'className' => 'County',
			'foreignKey' => 'province_id',
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

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Saefi' => array(
			'className' => 'Saefi',
			'foreignKey' => 'saefi_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'AefiListOfVaccine' => array(
			'className' => 'AefiListOfVaccine',
			'foreignKey' => 'saefi_id',
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
			'conditions' => array('Attachment.model' => 'Saefi', 'Attachment.group' => 'attachment'),
		),
		'ExternalComment' => array(
			'className' => 'Comment',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('ExternalComment.model' => 'Saefi', 'ExternalComment.category' => 'external'),
		),
		'Review' => array(
			'className' => 'Review',
			'foreignKey' => 'saefi_id',
			'dependent' => true,
		),
	);

	public function beforeSave($options = array())
	{
		if (!empty($this->data[$this->alias]['report_date'])) {
			$this->data[$this->alias]['report_date'] = date('Y-m-d', strtotime($this->data[$this->alias]['report_date']));
		}
		if (!empty($this->data[$this->alias]['start_date'])) {
			$this->data[$this->alias]['start_date'] = date('Y-m-d', strtotime($this->data[$this->alias]['start_date']));
		}
		if (!empty($this->data[$this->alias]['symptom_date'])) {
			$this->data[$this->alias]['symptom_date'] = date('Y-m-d', strtotime($this->data[$this->alias]['symptom_date']));
		}
		if (!empty($this->data[$this->alias]['hospitalization_date'])) {
			$this->data[$this->alias]['hospitalization_date'] = date('Y-m-d', strtotime($this->data[$this->alias]['hospitalization_date']));
		}
		if (!empty($this->data[$this->alias]['died_date'])) {
			$this->data[$this->alias]['died_date'] = date('Y-m-d', strtotime($this->data[$this->alias]['died_date']));
		}
		if (!empty($this->data[$this->alias]['autopsy_done_date'])) {
			$this->data[$this->alias]['autopsy_done_date'] = date('Y-m-d', strtotime($this->data[$this->alias]['autopsy_done_date']));
		}

		if (!empty($this->data[$this->alias]['reporter_date'])) {
			$this->data[$this->alias]['reporter_date'] = date('Y-m-d', strtotime($this->data[$this->alias]['reporter_date']));
		}

		if (!empty($this->data[$this->alias]['complete_date'])) {
			$this->data[$this->alias]['complete_date'] = date('Y-m-d', strtotime($this->data[$this->alias]['complete_date']));
		}



		// if (!empty($this->data[$this->alias]['time_of_first_symptom'])) {
		// 	$this->data[$this->alias]['time_of_first_symptom'] = date('H:i:s', strtotime($this->data[$this->alias]['time_of_first_symptom']));
		// }

		// if (!empty($this->data['Saefi']['time_of_first_symptom'])) {
		//     $time = strtotime($this->data['Saefi']['time_of_first_symptom']);
		//     $this->data['Saefi']['time_of_first_symptom'] = date('H:i:s', $time);
		// }
		// if (!empty($this->data['Saefi']['hour']) && !empty($this->data['Saefi']['minute'])) {
		//     $time = new Time($this->data['Saefi']['hour'] . ':' . $this->data['Saefi']['minute']);
		//     $this->data['Saefi']['time_of_first_symptom'] = $time->format('H:i:s');
		// }
		// if (!empty($this->data['Saefi']['time_of_first_symptom'])) {
		//     $this->data['Saefi']['time_of_first_symptom'] = implode('-', $this->data['Saefi']['time_of_first_symptom']);
		// } else {
		//     $this->data['Saefi']['time_of_first_symptom'] = '';
		// }

		return true;
	}
}
