<?php
App::uses('AppController', 'Controller');
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');
/**
 * Khis Controller
 */
class KhisController extends AppController
{

	/**
	 * Scaffold
	 *
	 * @var mixed
	 */
	public $scaffold;

	public $uses = array('Sadr', 'Aefi', 'Saefi', 'Comment', 'Pqmp', 'Device', 'Medication', 'Transfusion', 'Sae', 'DrugDictionary', 'Ce2b');
    public $components = array(
        // 'Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 
        'Search.Prg',
        // 'RequestHandler'
    );
    public $paginate = array();
    public $presetVars = true;
    public $is_mobile = false;

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->sync_indicators();

        if ($this->RequestHandler->isMobile()) {
            // $this->layout = 'Emails/html/default';
            $this->is_mobile = true;
        }
        $this->set('is_mobile', $this->is_mobile);
	}
	public function sync_indicators()
	{

		$this->loadModel('Khis');
		$apiUrl = Configure::read('khis_data_elements_url');
		$username = Configure::read('khis_usename');
		$password =  Configure::read('khis_password');

		//load indicators
		$ch1 = curl_init($apiUrl);

		// Set cURL options
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch1, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch1, CURLOPT_USERPWD, "$username:$password");
		// Execute cURL session and get the response
		$response1 = curl_exec($ch1);
		$statusCode1 = curl_getinfo($ch1, CURLINFO_HTTP_CODE);

		// Check for cURL errors
		if (curl_errno($ch1)) {
			echo 'Curl error: ' . curl_error($ch1);
		}

		// Close cURL session
		curl_close($ch1);

		if ($statusCode1 >= 200 && $statusCode1 < 300) {
			$data = json_decode($response1, true);

			// Check if dataSetElements is set and is an array
			if (isset($data['dataSetElements']) && is_array($data['dataSetElements'])) {
				// Loop through each dataSetElement
				$this->Khis->query('TRUNCATE TABLE khis');
				foreach ($data['dataSetElements'] as $element) {
					// Check if dataElement is set and is an array
					if (isset($element['dataElement']) && is_array($element['dataElement'])) {
						// Access the name and id of dataElement
						$elementName = $element['dataElement']['name'];
						$elementId = $element['dataElement']['id'];

						$this->Khis->create();
						$this->Khis->save(array(
							'elementId' => $elementId,
							'elementName' => $elementName
						));
					}
				}
			}
		}
	}
	public function manager_index()
	{
		$sadrsSummary = $this->sadrs_summary();
		$aefiSummary = $this->aefi_summary();

		$this->set('sadrsSummary', $sadrsSummary);
		$this->set('aefiSummary', $aefiSummary);


        if ($this->Session->read('Auth.User.group_id') == 2) {
            $this->render('khis_summary');
        } 
	}

	public function generate_reports_per_vaccines($drug_name = null, $aefiIds = array())
    {
        # code...   add a check to return where AefiListOfVaccine.aefi_id  is in the list of array
        $cond = $this->Aefi->AefiListOfVaccine->find('list', array(
            'conditions' => array(
                'AefiListOfVaccine.vaccine_id' => $drug_name,
                'AefiListOfVaccine.aefi_id IS NOT NULL',
                'AefiListOfVaccine.aefi_id IN' => $aefiIds
            ),
            'fields' => array('aefi_id', 'aefi_id')
        ));
        return $cond;
    }

	public function sadrs_summary()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        $criteria['Sadr.deleted'] = false;
        $criteria['Sadr.archived'] = false;
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        if (!empty($this->request->data['Report']['county_id'])) {
            $criteria['Sadr.county_id'] = $this->request->data['Report']['county_id'];
        }
        if (!empty($this->request->data['Report']['gender'])) {
            $criteria['Sadr.gender'] = $this->request->data['Report']['gender'];
        }
        if (!empty($this->request->data['Report']['age_group'])) {
            $criteria['Sadr.age_group'] = $this->request->data['Report']['age_group'];
        }
        if (!empty($this->request->data['Report']['report_title'])) {
            $criteria['Sadr.report_title'] = $this->request->data['Report']['report_title'];
        }

        $sadrsIds = $this->Sadr->find('list', array(
            'fields' => array('Sadr.id'),
            'conditions' => $criteria
        ));
        $sadrsIds = array_keys($sadrsIds);
        $id_arrays = array();
         

        $geo = $this->Sadr->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));


        $monthly = $this->Sadr->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y")', 'salit'), // Include 'salit' in the GROUP BY clause
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        //get all the counties in the system without any relation
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));


        // Get All SADRs by Gender 
        $sex = $this->Sadr->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // GET SUMMARY BY AGE GROUP
        $case = "((case 
                when trim(age_group) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_group
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $age = $this->Sadr->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // SADRs per Year
        $year = $this->Sadr->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('counties'));
        $this->set(compact('geo'));
        $this->set(compact('sex'));
        $this->set(compact('age'));
        $this->set(compact('monthly'));
        $this->set(compact('year'));
        $this->set(compact('reaction'));
        $this->set(compact('report_title'));
        $this->set(compact('qualification'));
        $this->set(compact('seriousness'));
        $this->set(compact('seriousness_reason'));
        $this->set(compact('outcome_data'));
        $this->set(compact('facility_data'));
        $this->set(compact('suspected'));
        $this->set('_serialize', 'geo', 'counties', 'sex', 'age', 'monthly', 'year', 'reaction', 'report_title', 'qualification', 'seriousness', 'seriousness_reason', 'outcome_data', 'facility_data', 'suspected');
    }


	public function aefi_summary() {

		// Load Data for Counties 
        $id_arrays = array(0);
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        $criteria['Aefi.deleted'] = false;
        $criteria['Aefi.archived'] = false;
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.reporter_date between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');

        // Filters
        if (!empty($this->request->data['Report']['county_id'])) {
            $criteria['Aefi.county_id'] = $this->request->data['Report']['county_id'];
        }
        if (!empty($this->request->data['Report']['gender'])) {
            $criteria['Aefi.gender'] = $this->request->data['Report']['gender'];
        }
        if (!empty($this->request->data['Report']['age_group'])) {
            $age_group = $this->request->data['Report']['age_group'];
            $criteria['Aefi.age_months'] = "((CASE 
        WHEN trim(age_months) IN ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') THEN age_months
        WHEN age_months > 0 AND age_months < 1 THEN 'neonate'
        WHEN age_months < 13 THEN 'infant'
        WHEN age_months > 13 THEN 'child'
        WHEN year(now()) - right(date_of_birth, 4) BETWEEN 0 AND 1 THEN 'infant'
        WHEN year(now()) - right(date_of_birth, 4) BETWEEN 1 AND 10 THEN 'child'
        WHEN year(now()) - right(date_of_birth, 4) BETWEEN 18 AND 65 THEN 'adult'
        WHEN year(now()) - right(date_of_birth, 4) BETWEEN 10 AND 18 THEN 'adolescent'
        WHEN year(now()) - right(date_of_birth, 4) BETWEEN 65 AND 155 THEN 'elderly'
        ELSE 'unknown'
    END)) = '$age_group'";
        }

        $aefiIds = $this->Aefi->find('list', array(
            'fields' => array('Aefi.id'),
            'conditions' => $criteria
        ));
        $aefiIds = array_keys($aefiIds);
        // Start from Here::::
        if (!empty($this->request->data['Report']['vaccine'])) {
            $cond = array(); // Initialize $cond with an empty array
            $ids = $this->generate_reports_per_vaccines($this->request->data['Report']['vaccine'], $aefiIds);
            if (!empty($ids)) {
                foreach ($ids as $key => $value) {
                    $id_arrays[] = $key;
                }
            }
            $criteria['Aefi.id'] = $id_arrays;
        }

        //get all the counties in the system without any relation
        $counties = $this->Aefi->County->find('list', array('order' => 'County.county_name ASC'));
        $geo = $this->Aefi->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Get All AEFIs by Gender
        $sex = $this->Aefi->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // GET SUMMARY BY AGE GROUP 


        $case = "((case 
        when trim(age_months) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_months
        when age_months > 0 and age_months < 1 then 'neonate'
        when age_months < 13 then 'infant'
        when age_months > 13 then 'child'
        when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
        when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
        when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
        when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
        when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
        else 'unknown'
       end))";
        //    debug($case);
        //    exit;

        $age = $this->Aefi->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // SADRs per Year
        $year = $this->Aefi->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $months = $this->Aefi->find('all', array(
            'fields' => array('DATE_FORMAT(reporter_date, "%b %Y")  as month', 'month(ifnull(reporter_date, reporter_date)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(reporter_date, "%b %Y")', 'salit'), // Include 'salit' in the GROUP BY clause
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $conditions = array_merge($criteria, array('serious_yes IS NOT NULL'));

        $vaccines = $this->Aefi->AefiListOfVaccine->Vaccine->find('list');

        $vaccine = $this->Aefi->AefiListOfVaccine->find('all', array(
			'fields' => array(
				'Vaccine.vaccine_name as vaccine_name',
				'COUNT(distinct AefiListOfVaccine.aefi_id) as cnt'
			),
			'joins' => array(
				array(
					'table' => 'vaccines', // Your Vaccine table name
					'alias' => 'Vaccine1',
					'type' => 'LEFT',
					'conditions' => array(
						'AefiListOfVaccine.vaccine_id = Vaccine.id'
					)
				)
			),
			'conditions' => array(
				'AefiListOfVaccine.aefi_id' => $aefiIds,
			),
			'group' => array('Vaccine.vaccine_name'),
			'having' => array('COUNT(distinct AefiListOfVaccine.aefi_id) >' => 0),
		));
        $vaccinealt = $this->Aefi->AefiListOfVaccine->find('all', array(
            'fields' => array(
                'AefiListOfVaccine.vaccine_name as vaccine_name',
                'COUNT(distinct AefiListOfVaccine.aefi_id) as cnt'
            ), // Include the Vaccine model to access vaccine_name
            'conditions' => array(
                'AefiListOfVaccine.aefi_id IN' => $aefiIds,
                'AefiListOfVaccine.vaccine_name IS NOT NULL',
                'AefiListOfVaccine.vaccine_id IS NULL'
            ),
            'group' => array('AefiListOfVaccine.vaccine_name'),
            'having' => array('COUNT(distinct AefiListOfVaccine.aefi_id) >' => 0),
        ));
        // Create a combined result array
        $combinedResults = [];
        // debug($vaccine);
        // exit;

        // Merge the results from both queries into the combined result array
        foreach ($vaccine as $result) {
            $vaccineName = $result['Vaccine']['vaccine_name'];
            $count = $result['0']['cnt'];

            if (!isset($combinedResults[$vaccineName])) {
                $combinedResults[$vaccineName] = 0;
            }

            $combinedResults[$vaccineName] += $count;
        }
        foreach ($vaccinealt as $result) {
            $vaccineName = $result['AefiListOfVaccine']['vaccine_name'];
            $count = $result['0']['cnt'];

            if (!isset($combinedResults[$vaccineName])) {
                $combinedResults[$vaccineName] = 0;
            }

            $combinedResults[$vaccineName] += $count;
        }
        $vaccine = [];
        foreach ($combinedResults as $key => $value) {
            $name['Vaccine']['vaccine_name'] = $key;
            $name['0']['cnt'] = $value;
            $vaccine[] = $name;
        }
        $this->set(compact('vaccines'));
        $this->set(compact('counties'));
        $this->set(compact('geo'));
        $this->set(compact('sex'));
        $this->set(compact('age'));
        $this->set(compact('year'));
        $this->set(compact('vaccine'));
        $this->set(compact('qualification'));
        $this->set(compact('serious'));
        $this->set(compact('reason'));
        $this->set(compact('outcome'));
        $this->set(compact('facilities'));
        $this->set(compact('months'));

        $this->set('_serialize', 'geo', 'vaccines', 'vaccine', 'counties', 'sex', 'age', 'year', 'qualification', 'serious', 'reason', 'outcome', 'facilities', 'months');
	}
}
