<?php

use JetBrains\PhpStorm\Deprecated;

App::uses('AppController', 'Controller');
/**
 * PreviousDates Controller
 *
 * @property PreviousDate $PreviousDate
 */
class ReportsController extends AppController
{
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
        $this->Auth->allow(
            'generate_reports_per_reaction',
            'generate_reports_per_vaccines',
            'index',
            'summary',
            'aefi_summary',
            'pqmps_summary',
            'devices_summary',
            'medications_summary',
            'transfusions_summary',
            'sadrs_by_age',
            'sadrs_by_medicine',
            'sadrs_by_gender',
            'sadrs_by_county',
            'sadrs_by_month',
            'sadrs_by_year',
            'aefis_by_age',
            'aefis_by_vaccine',
            'aefis_by_gender',
            'aefis_by_county',
            'aefis_by_month',
            'aefis_by_year',
            'pqmps_by_brand',
            'pqmps_by_generic',
            'pqmps_by_county',
            'pqmps_by_country',
            'pqmps_by_month',
            'pqmps_by_year',
            'devices_by_age',
            'devices_by_brand',
            'devices_by_gender',
            'devices_by_county',
            'devices_by_month',
            'devices_by_year',
            'medications_by_age',
            'medications_by_gender',
            'medications_by_producti',
            'medications_by_productii',
            'medications_by_generici',
            'medications_by_genericii',
            'medications_by_county',
            'medications_by_month',
            'medications_by_year',
            'transfusions_by_age',
            'transfusions_by_gender',
            'transfusions_by_county',
            'transfusions_by_month',
            'transfusions_by_year',
            'saes_by_age',
            'saes_by_month',
            'saes_by_year',
            'saes_by_gender',
            'saes_by_medicine',
            'saes_by_concomittant',
            'landing',
            'e2b_summary',
            's_summary'
        );
        if ($this->RequestHandler->isMobile()) {
            // $this->layout = 'Emails/html/default';
            $this->is_mobile = true;
        }
        $this->set('is_mobile', $this->is_mobile);
    }
    public function serious_sadr_summary($criteria = array())
    {
        $criteria['Sadr.serious'] = 'Yes';
        $count = $this->Sadr->find('count',  array(
            'fields' => 'Sadr.serious',
            'conditions' => $criteria
        ));
        return $count;
    }
    public function reviewed_comments($criteria = array())
    {
        $criteria['Comment.category'] = 'review';
        $criteria['Comment.model'] = 'Aefi';
        $count = $this->Comment->find('count',  array(
            'fields' => array('DISTINCT Comment.model_id'),
            'conditions' => $criteria,
            'group' => 'Comment.model_id'
        ));
        return $count;
    }
    public function s_summary()
    {
        // Sadr
        $criteria_sadr['Sadr.submitted'] = array(1, 2);
        $criteria_sadr['Sadr.copied !='] = '1';

        //Aefi
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';

        // Comments
        $criteria_comments_aefi['Comment.category'] = 'review';
        $criteria_comments_aefi['Comment.model'] = 'Aefi';

        $criteria_comments_sadr['Comment.category'] = 'review';
        $criteria_comments_sadr['Comment.model'] = 'Sadr';


        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date'])) {
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));

            //SADR
            $criteria_sadr['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));

            // Comments
            $criteria_comments_aefi['Comment.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
            $criteria_comments_sadr['Comment.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        }
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
            $criteria_sadr['Sadr.county_id'] = $this->Auth->User('county_id');
        }
        $criteria['Aefi.serious'] = 'Yes';

        $serious = $this->Aefi->find('count',  array(
            'fields' => 'Aefi.serious',
            'conditions' => $criteria
        ));
        $criteriab['Saefi.submitted'] = array(1, 2);
        $criteriab['Saefi.copied !='] = '1';
        $investigation = $this->Saefi->find('count',  array(
            'fields' => array('DISTINCT Saefi.initial_id'),
            'conditions' => $criteriab,
            'group' => 'Saefi.initial_id'
        ));
        $reviewed_aefi = $this->Comment->find('count',  array(
            'fields' => array('DISTINCT Comment.model_id'),
            'conditions' => $criteria_comments_aefi,
            'group' => 'Comment.model_id'
        ));

        $aefis = [
            ['aefis' => 'Serious received', 'cnt' => $serious],
            ['aefis' => 'Investigation conducted', 'cnt' => $investigation],
            ['aefis' => 'Number assessed', 'cnt' => $reviewed_aefi]
        ];

        $reviewed_sadr = $this->Comment->find('count',  array(
            'fields' => array('DISTINCT Comment.model_id'),
            'conditions' => $criteria_comments_sadr,
            'group' => 'Comment.model_id'
        ));
        $sadr = [
            ['sadr' => 'Serious received', 'cnt' => $this->serious_sadr_summary($criteria_sadr)],
            ['sadr' => 'Number assessed', 'cnt' => $reviewed_sadr]
        ];

        $this->set(compact('sadr'));
        $this->set(compact('aefis'));
        $this->render('upgrade/s_summary');
    }

    public function e2b_summary()
    {
        $criteria['Ce2b.submitted'] = array(1, 2);
        $criteria['Ce2b.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Ce2b.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));

        if (!empty($this->request->data['Report']['company_name'])) {
            $criteria['Ce2b.company_name'] = $this->request->data['Report']['company_name'];
        }

        $facility_data = $this->Ce2b->find('all', array(
            'fields' => array('company_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('company_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $year = $this->Ce2b->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $months = $this->Ce2b->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y")', 'salit'), // Include 'salit' in the GROUP BY clause
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $this->set(compact('facility_data', 'year', 'months'));
        $this->set('_serialize', 'facility_data', 'year', 'months');
        $this->render('upgrade/e2b_summary');
    }

    /**
     * site inspections per month method
     *
     * @return void
     */

    public function landing()
    {
        $vaccine = $this->request->data['Report']['vaccine_name'];
        $this->loadModel('SadrListOfDrug');
        $this->loadModel('Sadr');
        $sadr_ids = $this->SadrListOfDrug->find('list', array(
            'conditions' => array('SadrListOfDrug.drug_name LIKE' => '%' . $vaccine . '%'),
            'fields' => array('SadrListOfDrug.sadr_id')
        ));
        // return unique sadr ids alongside the vaccine name
        $sadr_ids = array_unique($sadr_ids);
        // create an array of reaction and count
        // debug($sadr_ids);
        $data = null;
        $count = 0;
        foreach ($sadr_ids as $key => $value) {
            $count++;
            // get the reaction for each sadr id
            $reaction = $this->Sadr->find('first', array(
                'conditions' => array('Sadr.id' => $value),
                'fields' => array('Sadr.reaction')
            ));
            // get the count of each reaction
            if ($reaction) {
                $data[$reaction['Sadr']['reaction']] = $this->Sadr->find('count', array(
                    'conditions' => array('Sadr.reaction' => $reaction['Sadr']['reaction'])
                ));
            }
        }
        // $criteria['Sadr.submitted'] = array(2, 3);
        $criteria['Sadr.id'] = $sadr_ids;
        $county = $this->Sadr->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        //    Age Group
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

        // SEX
        $sex = $this->Sadr->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // YEAR
        $year = $this->Sadr->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set('_serialize', 'data');
        $this->Session->write('results', true);
        $this->set(compact('data', 'vaccine', 'count', 'county', 'age', 'sex', 'year'));
        $this->set('_serialize', 'data');
    }
    public function index()
    {
        # code...
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));

        // if ($this->Auth->User('group_id') == '2') {
        $this->redirect(array('action' => 'summary'));
        // }
        $this->set(compact('counties'));
    }
    public function index_latest()
    {
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));

        //check if user is logged in
        if ($this->Auth->loggedIn()) {
            $this->set('user', $this->Auth->user());
        } else {
            // check if user has checked the agreement checkbox
            if ($this->request->is('post')) {

                if ($this->request->data['agree'] == 1) {
                    $this->Session->write('agree', true);
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('You must agree to the terms and conditions to access the search function'), 'flash_error');
                }
            }
            // get the agree session variable
            $agree = $this->Session->read('agree');
            if ($agree == true) {
                $this->Session->write('results', false);
                $this->render('landing');
            } else {

                $this->render('public');
            }

            //clear the session variable
            $this->Session->delete('agree');
        }
    }

    /**
     * SADR reports methods
     * 
     */
    public function sadrs_by_reporter()
    {
        // $this->Prg->commonProcess();
        // $criteria = $this->Sadr->parseCriteria($this->passedArgs);
        $criteria['Sadr.submitted'] = array(2, 3);
        $criteria['Sadr.copied !='] = '1';
        $sadrs = $this->Sadr->find(
            'all',
            array('conditions' => $criteria, 'limit' => 1000)
        );

        $this->set('sadrs', $sadrs);
    }

    public function sadrs_by_designation()
    {
        // $criteria['Sadr.start_date'] = $this->request->data['Report']['start_date'];
        // $criteria['Sadr.end_date'] = $this->request->data['Report']['end_date'];
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));


        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('sadrs_by_designation');
    }

    public function generate_reports_per_vaccines_old($drug_name = null)
    {
        # code...   
        $cond = array(); // Initialize $cond with an empty array

        $subquery = $this->Aefi->AefiListOfVaccine->Vaccine->find('list', array(
            'conditions' => array(
                'Vaccine.vaccine_name LIKE' => '%' . $drug_name . '%',
            ),
            'fields' => array('id'),
            'recursive' => -1 // To avoid unnecessary recursive queries
        ));

        if ($subquery) {
            $cond = $this->Aefi->AefiListOfVaccine->find('list', array(
                'conditions' => array(
                    'AefiListOfVaccine.vaccine_id IN' => $subquery,
                    'AefiListOfVaccine.aefi_id IS NOT NULL' // Exclude null values
                ),
                'keyField' => 'aefi_id',
                'valueField' => 'aefi_id'
            ));
        }


        return $cond;
    }
    public function generate_reports_per_vaccines($drug_name = null)
    {
        # code...   
        $cond = $this->Aefi->AefiListOfVaccine->find('list', array(
            'conditions' => array(
                'AefiListOfVaccine.vaccine_id' => $drug_name,
                'AefiListOfVaccine.aefi_id IS NOT NULL'
            ),
            'fields' => array('aefi_id', 'aefi_id')
        ));
        return $cond;
        // $cond = array(); // Initialize $cond with an empty array

        // $subquery = $this->Aefi->AefiListOfVaccine->Vaccine->find('list', array(
        //     'conditions' => array(
        //         'Vaccine.vaccine_name LIKE' => '%' . $drug_name . '%',
        //     ),
        //     'fields' => array('id'),
        //     'recursive' => -1 // To avoid unnecessary recursive queries
        // ));

        // if ($subquery) {
        //     $cond = $this->Aefi->AefiListOfVaccine->find('list', array(
        //         'conditions' => array(
        //             'AefiListOfVaccine.vaccine_id IN' => $subquery,
        //             'AefiListOfVaccine.aefi_id IS NOT NULL' // Exclude null values
        //         ),
        //         'keyField' => 'aefi_id',
        //         'valueField' => 'aefi_id'
        //     ));
        // }


        // return $cond;
    }
    public function generate_reports_per_reaction($drug_name = null)
    {
        # code...
        $cond = $this->Sadr->SadrListOfDrug->find('list', array(
            'conditions' => array(
                'OR' => array(
                    'SadrListOfDrug.drug_name LIKE' => '%' . $drug_name . '%',
                    'SadrListOfDrug.brand_name LIKE' => '%' . $drug_name . '%',
                )
            ),
            'fields' => array('sadr_id', 'sadr_id')
        ));
        return $cond;
    }
    public function summary()
    {

        // Load Data for Counties
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
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
        if (!empty($this->request->data['Report']['suspected_drug'])) {
            $id_arrays = array();
            $ids = $this->generate_reports_per_reaction($this->request->data['Report']['suspected_drug']);
            if (!empty($ids)) {
                foreach ($ids as $key => $value) {
                    $id_arrays[] = $key;
                }
            }
            $criteria['Sadr.id'] = $id_arrays;
        }
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


        // Get All SADRs by Report Title 
        $report_title = $this->Sadr->find('all', array(
            'fields' => array('report_title', 'COUNT(*) as rep'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('report_title'),
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

        // Get All SADRs by Reaction
        $reaction = $this->Sadr->find('all', array(
            'fields' => array('reaction', 'COUNT(*) as rea'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('reaction'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Reporter Qualification
        $qualification = $this->Sadr->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Seriousness

        $seriousness = $this->Sadr->find('all', array(
            'fields' => array('IF(Sadr.serious IS NULL or Sadr.serious = "", "No", Sadr.serious) as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('IF(Sadr.serious IS NULL or Sadr.serious = "", "No", Sadr.serious)'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Outcome
        $outcome_data = $this->Sadr->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // Facility
        $facility_data = $this->Sadr->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // Reason for Seriousness
        $criteria['Sadr.serious_reason !='] = '';
        $seriousness_reason = $this->Sadr->find('all', array(
            'fields' => array('serious_reason', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('serious_reason'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Suspected Drug
        $criterias['SadrListOfDrug.created >'] = '2020-04-01 08:08:08';
        $criterias['SadrListOfDrug.drug_name >'] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criterias['SadrListOfDrug.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criterias['SadrListOfDrug.sadr_id'] = $this->Sadr->find('list', array('conditions' => array('Sadr.submitted' => '2', 'Sadr.copied !=' => '1', 'Sadr.report_type !=' => 'Followup', 'Sadr.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['Sadr.submitted'] = '2';
            $criteria['Sadr.report_type !='] = 'Followup';
            $criterias['SadrListOfDrug.sadr_id'] = $this->Sadr->find('list', array(
                'conditions' => $criteria,
                'fields' => array('id', 'id')
            ));
        }

        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'SadrListOfDrug.drug_name IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criterias[] = $subQueryExpression;
        }
        $suspected = $this->Sadr->SadrListOfDrug->find('all', array(
            'fields' => array('SadrListOfDrug.drug_name as drug_name', 'COUNT(distinct SadrListOfDrug.sadr_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criterias,
            'group' => array('SadrListOfDrug.drug_name'),
            'having' => array('COUNT(distinct SadrListOfDrug.sadr_id) >' => 0),
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
        if ($this->Session->read('Auth.User.group_id') == 2) {
            $this->render('upgrade/manager_sadr_summary');
        } else {
            $this->render('upgrade/sadr_summary');
        }
    }
    public function aefi_summary()
    {

        // Load Data for Counties 
        $id_arrays = array(0);
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
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

        // Start from Here::::
        if (!empty($this->request->data['Report']['vaccine'])) {
            $cond = array(); // Initialize $cond with an empty array
            $ids = $this->generate_reports_per_vaccines($this->request->data['Report']['vaccine']);
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

        $qualification = $this->Aefi->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $serious = $this->Aefi->find('all', array(
            'fields' => array('IF(Aefi.serious IS NULL or Aefi.serious = "", "No", Aefi.serious) as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('IF(Aefi.serious IS NULL or Aefi.serious = "", "No", Aefi.serious)'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $outcome = $this->Aefi->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $facilities = $this->Aefi->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));


        $months = $this->Aefi->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y")', 'salit'), // Include 'salit' in the GROUP BY clause
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $conditions = array_merge($criteria, array('serious_yes IS NOT NULL'));
        $reason = $this->Aefi->find('all', array(
            'fields' => array('serious_yes', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $conditions,
            'group' => array('serious_yes'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $vaccines = $this->Aefi->AefiListOfVaccine->Vaccine->find('list');

        // if ($this->Auth->User('user_type') == 'County Pharmacist') {
        //     $criteria['AefiListOfVaccine.aefi_id'] = $this->Aefi->find('list', array('conditions' => array('Aefi.submitted' => '2', 'Aefi.copied !=' => '1', 'Aefi.report_type !=' => 'Followup', 'Aefi.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        // } else {
        //     $criteria['AefiListOfVaccine.aefi_id'] = $this->Aefi->find(
        //         'list',
        //         array(
        //             'conditions' => array(
        //                 'Aefi.submitted' => '2',
        //                 'Aefi.copied !=' => '1',
        //                 'Aefi.report_type !=' => 'Followup'
        //             ),
        //             'fields' => array('id', 'id')
        //         )
        //     );
        // }

        // $criteriav = array(0);
        // $criteriav['Vaccine.id >'] = 0;

        // if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
        //     $criteriav['AefiListOfVaccine.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        // else
        //     $criteriav['AefiListOfVaccine.created >'] = '2020-04-01 08:00:00';

        // if ($this->Auth->User('user_type') == 'County Pharmacist') {
        //     $criteriav['AefiListOfVaccine.aefi_id'] = $this->Aefi->find(
        //         'list',
        //         array(
        //             'conditions' => array(
        //                 'Aefi.submitted' => '2',
        //                 'Aefi.copied !=' => '1',
        //                 'Aefi.report_type !=' => 'Followup',
        //                 'Aefi.county_id' => $this->Auth->User('county_id')
        //             ),
        //             'fields' => array('id', 'id')
        //         )
        //     );
        // } else {
        //     $criteriav['AefiListOfVaccine.aefi_id'] = $this->Aefi->find('list', array(
        //         'conditions' => $conditions,
        //         'fields' => array('id', 'id')
        //     ));
        // }


        // get me an array of all the aefi ids based on the criteria with model class  $this->Aefi
        $aefiIds = $this->Aefi->find('list', array(
            'fields' => array('Aefi.id'),
            'conditions' => $criteria
        ));
        $aefiIds = array_keys($aefiIds);
        // debug($aefiIds);
        // exit;

        // debug(count($aefiIds));
        // exit;
        

        $vaccine = $this->Aefi->AefiListOfVaccine->find('all', array(
            'fields' => array('Vaccine.vaccine_name as vaccine_name', 'COUNT(distinct AefiListOfVaccine.aefi_id) as cnt'),
            'contain' => array('Vaccine'),
            'recursive' => -1,
            // 'conditions' => $criteriav,
            'conditions' => array(
                'AefiListOfVaccine.aefi_id' => $aefiIds, 
            ),
            'group' => array('Vaccine.vaccine_name', 'Vaccine.id'),
            'having' => array('COUNT(distinct AefiListOfVaccine.aefi_id) >' => 0),
        ));

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

        if ($this->Session->read('Auth.User.group_id') == 2) {
            $this->render('upgrade/manager_aefi_summary');
        } else {
            $this->render('upgrade/aefi_summary');
        }
    }
    public function pqmps_summary()
    {

        // Load Data for Counties
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        if (!empty($this->request->data['Report']['county_id'])) {
            $criteria['Pqmp.county_id'] = $this->request->data['Report']['county_id'];
        }
        if (!empty($this->request->data['Report']['country_id'])) {
            $criteria['Pqmp.country_id'] = $this->request->data['Report']['country_id'];
        }
        if (!empty($this->request->data['Report']['age_group'])) {
            $age_group = $this->request->data['Report']['age_group'];

            $criteria['Pqmp.age_months'] = $age_group;
        }

        // Start from Here::::
        if (!empty($this->request->data['Report']['vaccine'])) {
        }

        //    PQHPTs per County
        $geo = $this->Pqmp->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        // PQHPTs per Year
        $year = $this->Pqmp->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        // PQHPTS per Designation
        $designation = $this->Pqmp->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // PQHPTs per  Facility

        $facility = $this->Pqmp->find('all', array(
            'fields' => array('facility_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('facility_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // PQHPTs per Product Formalation

        $formulation = $this->Pqmp->find('all', array(
            'fields' => array('product_formulation', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('product_formulation'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // PQHPTs per Product Category

        $case = "((case 
        when medicinal_product = 1 then 'Medicinal Product'
        when blood_products = 1 then 'Blood and blood products'
        when herbal_product = 1 then 'Herbal product'
        when medical_device = 1 then 'Medical device'
        when product_vaccine = 1 then 'Vaccine'
        when cosmeceuticals = 1 then 'Cosmeceuticals'
        else 'Others'
       end))";

        $category = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as category', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // PQHPTs per Complaint

        $case = "((case 
        when colour_change = 1 then 'Colour change'
        when separating = 1 then 'Separating'
        when powdering = 1 then 'Powdering'
        when caking = 1 then 'Caking'
        when moulding = 1 then 'Moulding'
        when odour_change = 1 then 'Odour change'
        when mislabeling = 1 then 'Mislabeling'
        when incomplete_pack = 1 then 'Incomplete pack'
        when therapeutic_ineffectiveness = 1 then 'Therapeutic ineffectiveness'
        when particulate_matter = 1 then 'Particulate matter'
        else 'Others'
       end))";

        $complaint = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as complaint', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // PQHPTs per Medical Device


        $case = "((case 
        when packaging = 1 then 'Packaging'
        when labelling = 1 then 'Labelling'
        when sampling = 1 then 'Sampling'
        when mechanism = 1 then 'Mechanism'
        when electrical = 1 then 'Electrical'
        when device_data = 1 then 'Data'
        when software = 1 then 'Software'
        when environmental = 1 then 'Environmental'
        when failure_to_calibrate = 1 then 'Failure to calibrate'
        when results = 1 then 'Results'
        when readings = 1 then 'Readings'
        else 'N/A'
       end))";

        $medical = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as device', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Per Brand Name

        $brands = $this->Pqmp->find('all', array(
            'fields' => array('brand_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('brand_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Per Manufacturer

        $manufacturer = $this->Pqmp->find('all', array(
            'fields' => array('name_of_manufacturer', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_manufacturer'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Per Supplier

        $supplier = $this->Pqmp->find('all', array(
            'fields' => array('supplier_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('supplier_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Per Generic Name


        $generic_name = $this->Pqmp->find('all', array(
            'fields' => array('generic_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('generic_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // Per Country

        $country = $this->Pqmp->find('all', array(
            'fields' => array('Country.name', 'COUNT(*) as cnt'),
            'contain' => array('Country'),
            'conditions' => $criteria,
            'group' => array('Country.name', 'Country.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Per Month


        $monthly = $this->Pqmp->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y")', 'salit'), // Include 'salit' in the GROUP BY clause
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));


        //get all the counties in the system without any relation
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $countries = $this->Pqmp->Country->find('list');
        $this->set('countries', $countries);
        $this->set(compact('counties'));
        $this->set(compact('geo'));
        $this->set(compact('year'));
        $this->set(compact('designation'));
        $this->set(compact('facility'));
        $this->set(compact('formulation'));
        $this->set(compact('category'));
        $this->set(compact('complaint'));
        $this->set(compact('medical'));
        $this->set(compact('brands'));
        $this->set(compact('manufacturer'));
        $this->set(compact('supplier'));
        $this->set(compact('generic_name'));
        $this->set(compact('country'));
        $this->set(compact('monthly'));

        $this->set('_serialize', 'geo', 'counties', 'year', 'designation', 'facility', 'formulation', 'category', 'complaint', 'medical', 'brands', 'manufacturer', 'supplier', 'generic_name', 'country', 'monthly');

        if ($this->Session->read('Auth.User.group_id') == 2) {
            $this->render('upgrade/manager_pqmps_summary');
        } else {
            $this->render('upgrade/pqmps_summary');
        }
    }

    public function devices_summary()
    {

        // Load Data for Counties
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');

        if (!empty($this->request->data['Report']['county_id'])) {
            $criteria['Device.county_id'] = $this->request->data['Report']['county_id'];
        }
        if (!empty($this->request->data['Report']['gender'])) {
            $gender = $this->request->data['Report']['gender'];

            $criteria['Device.gender'] = $gender; // ucfirst();
        }
        if (!empty($this->request->data['Report']['outcome'])) {
            $criteria['Device.outcome'] = $this->request->data['Report']['outcome'];
        }
        if (!empty($this->request->data['Report']['serious'])) {
            $criteria['Device.serious'] = $this->request->data['Report']['serious'];
        }
        $geo = $this->Device->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        //get all the counties in the system without any relation
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));


        // Get All Devices by Gender 
        $sex = $this->Device->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // GET SUMMARY BY AGE GROUP
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when trim(age_years) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_years
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $age = $this->Device->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Devices per Year
        $year = $this->Device->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $serious = $this->Device->find('all', array(
            'fields' => array('Device.serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('Device.serious'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $reason = $this->Device->find('all', array(
            'fields' => array('serious_yes', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('submitted' => array(1, 2)),
            'group' => array('serious_yes'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $brands = $this->Device->ListOfDevice->find('all', array(
            'fields' => array('ListOfDevice.brand_name as brand_name', 'COUNT(distinct ListOfDevice.device_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('ListOfDevice.created >' => '2020-04-01 08:08:08'),
            'group' => array('ListOfDevice.brand_name'),
            'having' => array('COUNT(distinct ListOfDevice.device_id) >' => 0),
        ));
        $outcome = $this->Device->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $facilities = $this->Device->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $months = $this->Device->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y")', 'salit'), // Include 'salit' in the GROUP BY clause
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Amos

        $this->set(compact('counties'));
        $this->set(compact('geo'));
        $this->set(compact('sex'));
        $this->set(compact('age'));
        $this->set(compact('year'));
        $this->set(compact('serious'));
        $this->set(compact('reason'));
        $this->set(compact('brands'));
        $this->set(compact('outcome'));
        $this->set(compact('facilities'));
        $this->set(compact('months'));

        $this->set('_serialize', 'geo', 'counties', 'sex', 'age', 'year', 'serious', 'reason', 'brands', 'outcome', 'facilities', 'months');

        if ($this->Session->read('Auth.User.group_id') == 2) {
            $this->render('upgrade/manager_devices_summary');
        } else {
            $this->render('upgrade/devices_summary');
        }
    }
    public function transfusions_summary()
    {

        // Load Data for Counties
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');

        if (!empty($this->request->data['Report']['county_id'])) {
            $criteria['Transfusion.county_id'] = $this->request->data['Report']['county_id'];
        }
        if (!empty($this->request->data['Report']['gender'])) {
            $gender = $this->request->data['Report']['gender'];

            $criteria['Transfusion.gender'] = $gender; // ucfirst();
        }
        if (!empty($this->request->data['Report']['age_group'])) {
            $criteria['Transfusion.age_years'] = $this->request->data['Report']['age_group'];
        }
        $geo = $this->Transfusion->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $qualification = $this->Transfusion->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        //get all the counties in the system without any relation
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));


        // Get All SADRs by Gender  
        $sex = $this->Transfusion->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // GET SUMMARY BY AGE GROUP 
        $case = "((case 
               when trim(age_years) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_years
               when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
               when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
               when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
               when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
               when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
               else 'unknown'
              end))";

        $age = $this->Transfusion->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Transfusions per Year
        $year = $this->Transfusion->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $case = "((case 
        when reaction_fever is not null then 'Fever'
        when reaction_chills is not null then 'Chills/Rigors'
        when reaction_flushing is not null then 'Flushing'
        when reaction_vomiting is not null then 'Nausea/Vomiting'
        when reaction_dermatological is not null then reaction_dermatological
        when reaction_chest is not null then 'Chest pain'
        when reaction_dyspnoea is not null then 'Dyspnoea'
        when reaction_hypotension is not null then 'Hypotension'
        when reaction_tachycardia is not null then 'Tachycardia'
        when reaction_dark is not null then 'Haemoglobinuria- Dark urine'
        when reaction_oliguria is not null then 'Oliguria'
        when reaction_anuria is not null then 'Anuria'
        when reaction_haematological is not null then 'Unexplained bleeding'
        when reaction_other is not null then 'Others'
        else 'N/A'
       end))";

        $outcome = $this->Transfusion->find('all', array(
            'fields' => array($case . ' as rtype', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $previous_reactions = $this->Transfusion->find('all', array(
            'fields' => array('previous_reactions', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2), 'Transfusion.previous_reactions !=' => ''),
            'group' => array('previous_reactions'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $previous_transfusion = $this->Transfusion->find('all', array(
            'fields' => array('previous_transfusion', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2), 'Transfusion.previous_transfusion !=' => ''),
            'group' => array('previous_transfusion'),
            'having' => array('COUNT(*) >' => 0),
        ));
        // $months = $this->Transfusion->find('all', array(
        //     'fields' => array(
        //         'DATE_FORMAT(created, "%b %Y") AS month',
        //         'month(ifnull(created, created)) AS salit',
        //         'COUNT(*) AS cnt'
        //     ),
        //     'contain' => array(),
        //     'recursive' => -1,
        //     'conditions' => $criteria,
        //     'group' => array('Transfusion.created'),
        //     'order' => array('salit'),
        //     'having' => array('COUNT(*) >' => 0),
        // ));
        $months = $this->Transfusion->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y")', 'salit'), // Include 'salit' in the GROUP BY clause
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));


        $this->set(compact('counties'));
        $this->set(compact('geo'));
        $this->set(compact('sex'));
        $this->set(compact('age'));
        $this->set(compact('year'));
        $this->set(compact('qualification'));
        $this->set(compact('outcome'));
        $this->set(compact('previous_reactions'));
        $this->set(compact('previous_transfusion'));
        $this->set(compact('months'));

        $this->set('_serialize', 'geo', 'counties', 'sex', 'age', 'year');
        $this->set('_serialize', 'qualification', 'outcome', 'previous_reactions', 'previous_transfusion', 'months');

        if ($this->Session->read('Auth.User.group_id') == 2) {
            $this->render('upgrade/manager_transfusions_summary');
        } else {
            $this->render('upgrade/transfusions_summary');
        }
    }
    public function saes_summary()
    {

        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sae.county_id'] = $this->Auth->User('county_id');
        $geo = [];
        $counties = [];

        // Get All SADRs by Gender 
        $sex = $this->Sae->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // GET SUMMARY BY AGE GROUP
        $case = "((case 
                when trim(age_years) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_years
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $age = $this->Sae->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $months = $this->Sae->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") ', 'Sae.id'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        // SADRs per Year
        $year = $this->Sae->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $outcome = [];
        $causality = [];
        $this->set(compact('counties'));
        $this->set(compact('geo'));
        $this->set(compact('sex'));
        $this->set(compact('age'));
        $this->set(compact('year'));
        $this->set(compact('months'));
        $this->set(compact('outcome'));
        $this->set(compact('causality'));

        $this->set('_serialize', 'geo', 'counties', 'sex', 'age', 'year', 'months', 'outcome', 'causality');
        $this->render('upgrade/saes_summary');
    }


    public function medications_summary()
    {

        // Load Data for Counties
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');

        if (!empty($this->request->data['Report']['county_id'])) {
            $criteria['Medication.county_id'] = $this->request->data['Report']['county_id'];
        }
        if (!empty($this->request->data['Report']['gender'])) {
            $gender = $this->request->data['Report']['gender'];

            $criteria['Medication.gender'] = $gender; // ucfirst();
        }
        if (!empty($this->request->data['Report']['age_group'])) {
            $criteria['Medication.age_years'] = $this->request->data['Report']['age_group'];
        }
        $geo = $this->Medication->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        //get all the counties in the system without any relation
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));


        // Get All SADRs by Gender  
        $sex = $this->Medication->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));


        // GET SUMMARY BY AGE GROUP 
        $case = "((case 
                when trim(age_years) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_years
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $age = $this->Medication->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        // Medications per Year
        $year = $this->Medication->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $months = $this->Medication->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y")', 'salit'), // Include 'salit' in the GROUP BY clause
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $facilities = $this->Medication->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        // Japhee
        $process = $this->Medication->find('all', array(
            'fields' => array('process_occur', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('process_occur'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $case = "((case 
        when outcome in ('Potential error, circumstances/events have potential to cause incident') then 'NO ERROR'
        when outcome in ('Treatment /intervention required-caused temporary harm', 'Initial/prolonged hospitalization-caused temporary harm', 'Caused permanent harm', 'Near death event') then 'ERROR, HARM'
        when outcome in ('Actual error-did not reach patient', 'Actual error-caused no harm', 'Additional monitoring required-caused no harm') then 'ERROR, NO HARM'
        when outcome in ('Death') then 'ERROR, DEATH'
        else 'N/A'
       end))";

        $error = $this->Medication->find('all', array(
            'fields' => array($case . ' as error', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $designation = $this->Medication->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $case = "((case 
        when error_cause_inexperience = 1 or error_cause_knowledge = 1 or error_cause_distraction = 1 then 'Staff factors'
        when error_cause_medication = 1 or error_cause_packaging = 1 or error_cause_sound = 1 then 'Medication related'
        when error_cause_workload = 1 or error_cause_peak = 1 or error_cause_stock = 1 then 'Work and environment'
        when error_cause_procedure = 1 or error_cause_abbreviations = 1 or error_cause_illegible = 1 or error_cause_inaccurate = 1 or error_cause_labelling = 1 or error_cause_computer = 1 or error_cause_other = 1  then 'Task and technology'
        else 'N/A'
       end))";

        $factor = $this->Medication->find('all', array(
            'fields' => array($case . ' as factor', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));

        $pic = array();
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $pic['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $pic['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $pi = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.product_name_i as product_name_i', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $pic,
            'group' => array('MedicationProduct.product_name_i'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));

        $pec = array();
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $pec['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $pec['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }

        $pe = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.product_name_ii as product_name_ii', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $pec,
            'group' => array('MedicationProduct.product_name_ii'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));

        // Generic Error

        $gec['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $gec['MedicationProduct.generic_name_i >'] = '';
        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'MedicationProduct.generic_name_i IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $gec[] = $subQueryExpression;
        }

        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $gec['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $gec['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $gi = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.generic_name_i as generic_name_i', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $gec,
            'group' => array('MedicationProduct.generic_name_i'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));

        // Generic Error
        $git['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $git['MedicationProduct.generic_name_ii >'] = '';
        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'MedicationProduct.generic_name_ii IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $git[] = $subQueryExpression;
        }

        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $git['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $git['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $ge = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.generic_name_ii as generic_name_ii', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $git,
            'group' => array('MedicationProduct.generic_name_ii'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));
        $this->set(compact('counties'));
        $this->set(compact('geo'));
        $this->set(compact('sex'));
        $this->set(compact('age'));
        $this->set(compact('year'));
        $this->set(compact('facilities'));
        $this->set(compact('months'));
        $this->set(compact('process'));
        $this->set(compact('error'));
        $this->set(compact('designation'));
        $this->set(compact('factor'));
        $this->set(compact('pi'));
        $this->set(compact('pe'));
        $this->set(compact('gi'));
        $this->set(compact('ge'));

        $this->set('_serialize', 'geo', 'counties', 'sex', 'age', 'year', 'months', 'facilities', 'process', 'error', 'designation', 'factor', 'pi', 'pe', 'gi', 'ge');


        if ($this->Session->read('Auth.User.group_id') == 2) {
            $this->render('upgrade/manager_medications_summary');
        } else {
            $this->render('upgrade/medications_summary');
        }
    }
    public function sadrs_by_age()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when trim(age_group) in ('neonate', 'infant', 'child', 'adolescent', 'adult', 'elderly') then age_group
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Sadr->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('sadrs_by_age');
    }

    public function sadrs_by_seriousness()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('IF(Sadr.serious IS NULL or Sadr.serious = "", "No", Sadr.serious) as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('IF(Sadr.serious IS NULL or Sadr.serious = "", "No", Sadr.serious)'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_reason()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        $criteria['Sadr.serious_reason !='] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('serious_reason', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('serious_reason'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_medicine()
    {
        $criteria['SadrListOfDrug.created >'] = '2020-04-01 08:08:08';
        $criteria['SadrListOfDrug.drug_name >'] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['SadrListOfDrug.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['SadrListOfDrug.sadr_id'] = $this->Sadr->find('list', array('conditions' => array('Sadr.submitted' => '2', 'Sadr.copied !=' => '1', 'Sadr.report_type !=' => 'Followup', 'Sadr.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['SadrListOfDrug.sadr_id'] = $this->Sadr->find('list', array('conditions' => array('Sadr.submitted' => '2', 'Sadr.copied !=' => '1', 'Sadr.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }

        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'SadrListOfDrug.drug_name IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criteria[] = $subQueryExpression;
            // $conditions[] = $subQueryExpression;
            // $this->User->find('all', compact('conditions'));
        }
        $data = $this->Sadr->SadrListOfDrug->find('all', array(
            'fields' => array('SadrListOfDrug.drug_name as drug_name', 'COUNT(distinct SadrListOfDrug.sadr_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('SadrListOfDrug.drug_name'),
            'having' => array('COUNT(distinct SadrListOfDrug.sadr_id) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_gender()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_outcome()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_facility()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_county()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_month()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") ', 'Sadr.id'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function sadrs_by_year()
    {
        $criteria['Sadr.submitted'] = array(1, 2);
        $criteria['Sadr.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sadr.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Sadr.county_id'] = $this->Auth->User('county_id');
        $data = $this->Sadr->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sadr->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * Adverse Event Following Immunization reports methods
     * 
     */
    public function aefis_by_designation()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('aefis_by_designation');
    }

    public function aefis_by_age()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
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

        $data = $this->Aefi->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Aefi->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('aefis_by_age');
    }

    public function aefis_by_seriousness()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('IF(Aefi.serious IS NULL or Aefi.serious = "", "No", Aefi.serious) as serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('IF(Aefi.serious IS NULL or Aefi.serious = "", "No", Aefi.serious)'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_reason()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        $criteria['Aefi.serious_yes !='] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('serious_yes', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('serious_yes'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_vaccine()
    {
        $criteria['Vaccine.id >'] = 0;
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['AefiListOfVaccine.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        else
            $criteria['AefiListOfVaccine.created >'] = '2020-04-01 08:00:00';

        // if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['AefiListOfVaccine.aefi_id'] = $this->Aefi->find('list', array('conditions' => array('Aefi.submitted' => '2', 'Aefi.copied !=' => '1', 'Aefi.report_type !=' => 'Followup', 'Aefi.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['AefiListOfVaccine.aefi_id'] = $this->Aefi->find('list', array('conditions' => array('Aefi.submitted' => '2', 'Aefi.copied !=' => '1', 'Aefi.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Aefi->AefiListOfVaccine->find('all', array(
            'fields' => array('Vaccine.vaccine_name as vaccine_name', 'COUNT(distinct AefiListOfVaccine.aefi_id) as cnt'),
            'contain' => array('Vaccine'), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('Vaccine.vaccine_name', 'Vaccine.id'),
            'having' => array('COUNT(distinct AefiListOfVaccine.aefi_id) >' => 0),
        ));
        $counties = $this->Aefi->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_gender()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Aefi->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_outcome()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_facility()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));

        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_county()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Aefi->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_month()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y") as month', 'month(created) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(created)', 'Aefi.id'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Aefi->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function aefis_by_year()
    {
        $criteria['Aefi.submitted'] = array(1, 2);
        $criteria['Aefi.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Aefi.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Aefi.county_id'] = $this->Auth->User('county_id');
        $data = $this->Aefi->find('all', array(
            'fields' => array('year(created) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(created)'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Aefi->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * Poor-Quality Health Products and Technologies reports methods
     * 
     */
    public function pqmps_by_designation()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('pqmps_by_designation');
    }


    public function pqmps_by_facility()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('facility_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('facility_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function pqmps_by_formulation()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('product_formulation', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('product_formulation'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_brand()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('brand_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('brand_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_generic()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'Pqmp.generic_name IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criteria[] = $subQueryExpression;
            // $conditions[] = $subQueryExpression;
            // $this->User->find('all', compact('conditions'));
        }
        $data = $this->Pqmp->find('all', array(
            'fields' => array('generic_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('generic_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_manufacturer()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('name_of_manufacturer', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_manufacturer'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function pqmps_by_supplier()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('supplier_name', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('supplier_name'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_county()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_country()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('Country.name', 'COUNT(*) as cnt'),
            'contain' => array('Country'),
            'conditions' => $criteria,
            'group' => array('Country.name', 'Country.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_month()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") ', 'Pqmp.id'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_year()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $data = $this->Pqmp->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_category()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when medicinal_product = 1 then 'Medicinal Product'
                when blood_products = 1 then 'Blood and blood products'
                when herbal_product = 1 then 'Herbal product'
                when medical_device = 1 then 'Medical device'
                when product_vaccine = 1 then 'Vaccine'
                when cosmeceuticals = 1 then 'Cosmeceuticals'
                else 'Others'
               end))";

        $data = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as category', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_complaint()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when colour_change = 1 then 'Colour change'
                when separating = 1 then 'Separating'
                when powdering = 1 then 'Powdering'
                when caking = 1 then 'Caking'
                when moulding = 1 then 'Moulding'
                when odour_change = 1 then 'Odour change'
                when mislabeling = 1 then 'Mislabeling'
                when incomplete_pack = 1 then 'Incomplete pack'
                when therapeutic_ineffectiveness = 1 then 'Therapeutic ineffectiveness'
                when particulate_matter = 1 then 'Particulate matter'
                else 'Others'
               end))";

        $data = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as complaint', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function pqmps_by_device()
    {
        $criteria['Pqmp.submitted'] = array(1, 2);
        $criteria['Pqmp.copied !='] = '1';
        $criteria['(Pqmp.packaging + Pqmp.labelling + Pqmp.sampling + Pqmp.mechanism + Pqmp.electrical + Pqmp.device_data + Pqmp.software + Pqmp.environmental + Pqmp.failure_to_calibrate + Pqmp.results + Pqmp.readings) > '] = 0;
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Pqmp.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Pqmp.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when packaging = 1 then 'Packaging'
                when labelling = 1 then 'Labelling'
                when sampling = 1 then 'Sampling'
                when mechanism = 1 then 'Mechanism'
                when electrical = 1 then 'Electrical'
                when device_data = 1 then 'Data'
                when software = 1 then 'Software'
                when environmental = 1 then 'Environmental'
                when failure_to_calibrate = 1 then 'Failure to calibrate'
                when results = 1 then 'Results'
                when readings = 1 then 'Readings'
                else 'N/A'
               end))";

        $data = $this->Pqmp->find('all', array(
            'fields' => array($case . ' as device', 'COUNT(*) as cnt'),
            'contain' => array(),
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Pqmp->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * MEDICAL DEVICES reports methods
     * 
     */
    public function devices_by_designation()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('devices_by_designation');
    }

    public function devices_by_age()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when age_years > 0 and age_years < 1 then 'infant'
                when age_years > 1 then 'child'
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Device->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('devices_by_age');
    }

    public function devices_by_seriousness()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('Device.serious', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('Device.serious'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_reason()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('serious_yes', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('submitted' => array(1, 2)),
            'group' => array('serious_yes'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_brand()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->ListOfDevice->find('all', array(
            'fields' => array('ListOfDevice.brand_name as brand_name', 'COUNT(distinct ListOfDevice.device_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('ListOfDevice.created >' => '2020-04-01 08:08:08'),
            'group' => array('ListOfDevice.brand_name'),
            'having' => array('COUNT(distinct ListOfDevice.device_id) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_gender()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_outcome()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('outcome'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_facility()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_county()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_month()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") '),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function devices_by_year()
    {
        $criteria['Device.submitted'] = array(1, 2);
        $criteria['Device.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Device.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Device.county_id'] = $this->Auth->User('county_id');
        $data = $this->Device->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Device->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * MEDICATION ERROR reports methods
     * 
     */
    public function medications_by_designation()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('medications_by_designation');
    }

    public function medications_by_age()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when age_years > 0 and age_years < 1 then 'infant'
                when age_years > 1 then 'child'
                when year(now()) - year(date_of_birth) between 0 and 1 then 'infant'
                when year(now()) - year(date_of_birth) between 1 and 10 then 'child'
                when year(now()) - year(date_of_birth) between 18 and 65 then 'adult'
                when year(now()) - year(date_of_birth) between 10 and 18 then 'adolescent'
                when year(now()) - year(date_of_birth) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Medication->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('medications_by_age');
    }


    public function medications_by_gender()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_facility()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('name_of_institution', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('name_of_institution'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_process()
    {
        //TODO: add process_occur_specify
        // $criteria['Medication.submitted'] = array(1, 2);
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('process_occur', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('process_occur'),
            'order' => array('COUNT(*) DESC'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_producti()
    {

        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['MedicationProduct.product_name_i >'] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        // if($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.product_name_i as product_name_i', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('MedicationProduct.product_name_i'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_productii()
    {
        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['MedicationProduct.product_name_ii >'] = '';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));

        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.product_name_ii as product_name_ii', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('MedicationProduct.product_name_ii'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_generici()
    {
        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['MedicationProduct.generic_name_i >'] = '';
        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'MedicationProduct.generic_name_i IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criteria[] = $subQueryExpression;
        }

        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.generic_name_i as generic_name_i', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('MedicationProduct.generic_name_i'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_genericii()
    {
        $criteria['MedicationProduct.created >'] = '2020-04-01 08:08:08';
        $criteria['MedicationProduct.generic_name_ii >'] = '';
        if ($this->Auth->User('user_type') == 'Public Health Program') {
            $conditionsSubQuery['DrugDictionary.health_program'] = $this->Auth->User('health_program');

            $db = $this->DrugDictionary->getDataSource();
            $subQuery = $db->buildStatement(
                array(
                    'fields'     => array('DrugDictionary.drug_name'),
                    'table'      => $db->fullTableName($this->DrugDictionary),
                    'alias'      => 'DrugDictionary',
                    'limit'      => null,
                    'offset'     => null,
                    'joins'      => array(),
                    'conditions' => $conditionsSubQuery,
                    'order'      => null,
                    'group'      => null
                ),
                $this->DrugDictionary
            );
            $subQuery = 'MedicationProduct.generic_name_ii IN (' . $subQuery . ') ';
            $subQueryExpression = $db->expression($subQuery);

            $criteria[] = $subQueryExpression;
        }

        if ($this->Auth->User('user_type') == 'County Pharmacist') {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup', 'Medication.county_id' => $this->Auth->User('county_id')), 'fields' => array('id', 'id')));
        } else {
            $criteria['MedicationProduct.medication_id'] = $this->Medication->find('list', array('conditions' => array('Medication.submitted' => '2', 'Medication.copied !=' => '1', 'Medication.report_type !=' => 'Followup'), 'fields' => array('id', 'id')));
        }
        $data = $this->Medication->MedicationProduct->find('all', array(
            'fields' => array('MedicationProduct.generic_name_ii as generic_name_ii', 'COUNT(distinct MedicationProduct.medication_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('MedicationProduct.generic_name_ii'),
            'having' => array('COUNT(distinct MedicationProduct.medication_id) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_county()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_month()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") '),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_year()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $data = $this->Medication->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_error()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when outcome in ('Potential error, circumstances/events have potential to cause incident') then 'NO ERROR'
                when outcome in ('Treatment /intervention required-caused temporary harm', 'Initial/prolonged hospitalization-caused temporary harm', 'Caused permanent harm', 'Near death event') then 'ERROR, HARM'
                when outcome in ('Actual error-did not reach patient', 'Actual error-caused no harm', 'Additional monitoring required-caused no harm') then 'ERROR, NO HARM'
                when outcome in ('Death') then 'ERROR, DEATH'
                else 'N/A'
               end))";

        $data = $this->Medication->find('all', array(
            'fields' => array($case . ' as error', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function medications_by_factors()
    {
        $criteria['Medication.submitted'] = array(1, 2);
        $criteria['Medication.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Medication.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Medication.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when error_cause_inexperience = 1 or error_cause_knowledge = 1 or error_cause_distraction = 1 then 'Staff factors'
                when error_cause_medication = 1 or error_cause_packaging = 1 or error_cause_sound = 1 then 'Medication related'
                when error_cause_workload = 1 or error_cause_peak = 1 or error_cause_stock = 1 then 'Work and environment'
                when error_cause_procedure = 1 or error_cause_abbreviations = 1 or error_cause_illegible = 1 or error_cause_inaccurate = 1 or error_cause_labelling = 1 or error_cause_computer = 1 or error_cause_other = 1  then 'Task and technology'
                else 'N/A'
               end))";

        $data = $this->Medication->find('all', array(
            'fields' => array($case . ' as factor', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Medication->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    /**
     * BLOOD TRANSFUSION reports methods
     * 
     */
    public function transfusions_by_designation()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('Designation.name', 'COUNT(*) as cnt'),
            'contain' => array('Designation'),
            'conditions' => $criteria,
            'group' => array('Designation.name', 'Designation.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('transfusions_by_designation');
    }

    public function transfusions_by_age()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when age_years > 0 and age_years < 1 then 'infant'
                when age_years > 1 then 'child'
                when year(now()) - right(date_of_birth, 4) between 0 and 1 then 'infant'
                when year(now()) - right(date_of_birth, 4) between 1 and 10 then 'child'
                when year(now()) - right(date_of_birth, 4) between 18 and 65 then 'adult'
                when year(now()) - right(date_of_birth, 4) between 10 and 18 then 'adolescent'
                when year(now()) - right(date_of_birth, 4) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Transfusion->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('transfusions_by_age');
    }


    public function transfusions_by_gender()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_reaction()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('adverse_reaction', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('adverse_reaction'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_county()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('County.county_name', 'COUNT(*) as cnt'),
            'contain' => array('County'),
            'conditions' => $criteria,
            'group' => array('County.county_name', 'County.id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_month()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('DATE_FORMAT(created, "%b %Y")  as month', 'month(ifnull(created, created)) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('DATE_FORMAT(created, "%b %Y") '),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function transfusions_by_year()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('year(ifnull(created, created)) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(ifnull(created, created))'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function transfusions_by_rtype()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $case = "((case 
                when reaction_fever is not null then 'Fever'
                when reaction_chills is not null then 'Chills/Rigors'
                when reaction_flushing is not null then 'Flushing'
                when reaction_vomiting is not null then 'Nausea/Vomiting'
                when reaction_dermatological is not null then reaction_dermatological
                when reaction_chest is not null then 'Chest pain'
                when reaction_dyspnoea is not null then 'Dyspnoea'
                when reaction_hypotension is not null then 'Hypotension'
                when reaction_tachycardia is not null then 'Tachycardia'
                when reaction_dark is not null then 'Haemoglobinuria- Dark urine'
                when reaction_oliguria is not null then 'Oliguria'
                when reaction_anuria is not null then 'Anuria'
                when reaction_haematological is not null then 'Unexplained bleeding'
                when reaction_other is not null then 'Others'
                else 'N/A'
               end))";

        $data = $this->Transfusion->find('all', array(
            'fields' => array($case . ' as rtype', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function transfusions_by_ptransfusion()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('previous_transfusion', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2), 'Transfusion.previous_transfusion !=' => ''),
            'group' => array('previous_transfusion'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }


    public function transfusions_by_preaction()
    {
        $criteria['Transfusion.submitted'] = array(1, 2);
        $criteria['Transfusion.copied !='] = '1';
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Transfusion.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        if ($this->Auth->User('user_type') == 'County Pharmacist') $criteria['Transfusion.county_id'] = $this->Auth->User('county_id');
        $data = $this->Transfusion->find('all', array(
            'fields' => array('previous_reactions', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => array('Transfusion.submitted' => array(1, 2), 'Transfusion.previous_reactions !=' => ''),
            'group' => array('previous_reactions'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Transfusion->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    /**
     * SAEs reports methods
     * 
     */
    public function saes_by_age()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $case = "((case 
                when age_years > 0 and age_years < 1 then 'infant'
                when age_years > 1 then 'child'
                when year(now()) - year(date_of_birth) between 0 and 1 then 'infant'
                when year(now()) - year(date_of_birth) between 1 and 10 then 'child'
                when year(now()) - year(date_of_birth) between 18 and 65 then 'adult'
                when year(now()) - year(date_of_birth) between 10 and 18 then 'adolescent'
                when year(now()) - year(date_of_birth) between 65 and 155 then 'elderly'
                else 'unknown'
               end))";

        $data = $this->Sae->find('all', array(
            'fields' => array($case . ' as ager', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
        $this->render('saes_by_age');
    }

    public function saes_by_month()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('monthname(created) as month', 'month(created) as salit', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('monthname(created)'),
            'order' => array('salit'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_year()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('year(created) as year', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array('year(created)'),
            'order' => array('year'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_outcome()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $case = "((case 
                when patient_died = 1 then 'Patient died'
                when prolonged_hospitalization = 1 then 'Prolonged hospitalization'
                when incapacity = 1 then 'Significant disability'
                when life_threatening = 1 then 'Life threatening'
                else 'Other'
               end))";

        $data = $this->Sae->find('all', array(
            'fields' => array($case . ' as outcome', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'conditions' => $criteria,
            'group' => array($case),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_causality()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('causality', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'group' => array('causality'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_gender()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('gender', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'group' => array('gender'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_manufacturer()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('manufacturer_name as manufacturer', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'group' => array('manufacturer_name'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_application()
    {
        $criteria = array();
        if (!empty($this->request->data['Report']['start_date']) && !empty($this->request->data['Report']['end_date']))
            $criteria['Sae.created between ? and ?'] = array(date('Y-m-d', strtotime($this->request->data['Report']['start_date'])), date('Y-m-d', strtotime($this->request->data['Report']['end_date'])));
        $data = $this->Sae->find('all', array(
            'fields' => array('application_id as application', 'COUNT(*) as cnt'),
            'contain' => array(), 'recursive' => -1,
            'group' => array('application_id'),
            'having' => array('COUNT(*) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_medicine()
    {
        $data = $this->Sae->SuspectedDrug->find('all', array(
            'fields' => array('SuspectedDrug.generic_name as generic_name', 'COUNT(distinct SuspectedDrug.sae_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            // 'conditions' => array('SuspectedDrug.created >' => '2020-04-01 08:08:08'),
            'group' => array('SuspectedDrug.generic_name'),
            'having' => array('COUNT(distinct SuspectedDrug.sae_id) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function saes_by_concomittant()
    {
        $data = $this->Sae->ConcomittantDrug->find('all', array(
            'fields' => array('ConcomittantDrug.generic_name as generic_name', 'COUNT(distinct ConcomittantDrug.sae_id) as cnt'),
            'contain' => array(), 'recursive' => -1,
            // 'conditions' => array('ConcomittantDrug.created >' => '2020-04-01 08:08:08'),
            'group' => array('ConcomittantDrug.generic_name'),
            'having' => array('COUNT(distinct ConcomittantDrug.sae_id) >' => 0),
        ));
        $counties = $this->Sae->County->find('list', array('order' => 'County.county_name ASC'));
        $this->set(compact('counties'));
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function agreenment()
    {


        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
}
