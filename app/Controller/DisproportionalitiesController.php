<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');
App::uses('Router', 'Routing');
/**
 * Disproportionalities Controller
 */
class DisproportionalitiesController extends AppController
{

    /**
     * Scaffold
     *  @property Disproportionality $Disproportionality
     *
     * @var mixed 
     */
    public $scaffold;

    public $components = array(
        'Search.Prg',
    );
    public $paginate = array();
    public $presetVars = true;
    public $page_options = array('25' => '25', '50' => '50', '100' => '100');

    public function get_total_approved_aefis()
    {
        $this->loadModel('Aefi'); 
        $criteria['Aefi.copied !='] = '1';
        $criteria['Aefi.submitted'] = array(2, 3);
        $criteria['Aefi.deleted'] = false;
        $criteria['Aefi.archived'] = false;

        $count = $this->Aefi->find(
            'count',
            array(
                'conditions' => $criteria
            )
        );
        return $count;
    }
    public function get_total_approved_sadrs()
    {
        $this->loadModel('Sadr'); 
        $criteria['Sadr.copied !='] = '1';
        $criteria['Sadr.submitted'] = array(2, 3);
        $criteria['Sadr.deleted'] = false;
        $criteria['Sadr.archived'] = false;

        $count = $this->Sadr->find(
            'count',
            array(
                'conditions' => $criteria
            )
        );
        return $count;
    }

    public function  get_total_approved_padrs()
    {
        $this->loadModel('Padr'); 
        $criteria['Padr.copied !='] = '1';
        $criteria['Padr.deleted'] = false;
        $criteria['Padr.archived'] = false;
        $criteria['Padr.report_sadr'] = 'Adverse Reaction';

        $count = $this->Padr->find(
            'count',
            array(
                'conditions' => $criteria
            )
        );
        return $count;
    }

    public function get_sadr_reports_with_reaction($reaction_name)
    {
        $criteria['Sadr.copied !='] = '1';
        $criteria['Sadr.submitted'] = array(2, 3);
        $criteria['Sadr.deleted'] = false;
        $criteria['Sadr.archived'] = false;
        $criteria['Sadr.reaction'] = $reaction_name;

        $this->loadModel('Sadr');
        $cond = $this->Sadr->find('list', array(
            'conditions' => $criteria,
            'fields' => array('id', 'id')
        ));

        // also checkout the reactions incase of multiples
        $condothers = $this->Sadr->SadrReaction->find('list', array(
            'conditions' => array(
                'SadrReaction.reaction' => $reaction_name
            ),
            'fields' => array('sadr_id', 'sadr_id')
        ));
        $mergedReports = array_unique(array_merge($cond, $condothers));

        return $mergedReports;
    }

    public function get_sadr_reports_with_drug($current_drug_name)
    {
        $criteria['Sadr.copied !='] = '1';
        $criteria['Sadr.submitted'] = array(2, 3);
        $criteria['Sadr.deleted'] = false;
        $criteria['Sadr.archived'] = false;

        $this->loadModel('Sadr');
        $this->loadModel('SadrListOfDrug');


        $sadrsIds = $this->Sadr->find('list', array(
            'fields' => array('Sadr.id'),
            'conditions' => $criteria
        ));
        $sadrsIds = array_keys($sadrsIds);

        $cond = array(); // Initialize $cond with an empty array

        $cond = $this->Sadr->SadrListOfDrug->find('list', array(
            'conditions' => array(
                'SadrListOfDrug.drug_name LIKE' => '%' . $current_drug_name . '%',
                'SadrListOfDrug.sadr_id IN' => $sadrsIds,
                'SadrListOfDrug.sadr_id IS NOT NULL'
            ),
            'keyField' => 'sadr_id',
            'valueField' => 'sadr_id'
        ));


        return $cond;
    }

    public function get_sadr_reports_with_drug_and_reaction($drug_name, $reaction_name)

    {
        $reports_with_reaction = $this->get_sadr_reports_with_reaction($reaction_name);

        $reports_with_drug = $this->get_sadr_reports_with_drug($drug_name);

        $commonReports = array_intersect($reports_with_reaction, $reports_with_drug);

        return $commonReports;
    }


    public function count_aefis_with_reaction($reaction_name)
    {
        $criteria['Aefi.copied !='] = '1';
        $criteria['Aefi.submitted'] = array(2, 3);
        $criteria['Aefi.deleted'] = false;
        $criteria['Aefi.archived'] = false;

        $reactionFields = [
            'Aefi.bcg',
            'Aefi.convulsion',
            'Aefi.urticaria',
            'Aefi.high_fever',
            'Aefi.abscess',
            'Aefi.local_reaction',
            'Aefi.anaphylaxis',
            'Aefi.meningitis',
            'Aefi.paralysis',
            'Aefi.toxic_shock',
            'Aefi.aefi_symptoms',
            'AefiDescription.description'
        ];

        $reactionConditions = [];
        foreach ($reactionFields as $field) {
            $reactionConditions['OR'][] = ["$field LIKE" => "%$reaction_name%"];
        }

        $criteria['OR'] = $reactionConditions;

        $this->loadModel('Aefi');
        $this->loadModel('AefiListOfVaccine');

        // Find count of reactions directly matching the name
        $count = $this->Aefi->find('count', [
            'conditions' => $criteria,
            'joins' => [
                [
                    'table' => 'aefi_descriptions',
                    'alias' => 'AefiDescription',
                    'type' => 'LEFT',
                    'conditions' => ['Aefi.id = AefiDescription.aefi_id']
                ]
            ]
        ]);

        return $count;
    }

    public function count_aefis_with_drug($drug_name)
    {
        $criteria['Aefi.copied !='] = '1';
        $criteria['Aefi.submitted'] = array(2, 3);
        $criteria['Aefi.deleted'] = false;
        $criteria['Aefi.archived'] = false;

        $this->loadModel('Aefi');
        $this->loadModel('AefiListOfVaccine');


        $sadrsIds = $this->Aefi->find('list', array(
            'fields' => array('Aefi.id'),
            'conditions' => $criteria
        ));
        $sadrsIds = array_keys($sadrsIds);
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

    public function count_aefis_with_drug_and_reaction($drug_name, $reaction_name)
    {
    }

    public function manager_index()
    {
        $this->Prg->commonProcess();
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (!empty($this->request->query['pages'])) $this->paginate['limit'] = $this->request->query['pages'];
        else $this->paginate['limit'] = reset($this->page_options);

        $criteria = $this->Disproportionality->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Disproportionality.created' => 'desc');

        $aefi_total = $this->get_total_approved_aefis();
        $sadr_total = $this->get_total_approved_sadrs();
        $padr_total = $this->get_total_approved_padrs();

        $total_reports = $aefi_total + $sadr_total + $padr_total;

        $datas = Sanitize::clean($this->paginate(), array('encode' => false));

        $data = array();

        foreach ($datas as $dt) {
            $reaction_name = $dt['Disproportionality']['reaction_name'];
            $drug_name = $dt['Disproportionality']['drug_name'];
            $model = $dt['Disproportionality']['model'];
            // exit;
            if ($model == "Aefi") {
                $reactionCount = 0; //$this->count_aefis_with_reaction($reaction_name);
                $drugCount = 0; //count($this->count_aefis_with_drug($drug_name));
                $drugReactionCount = 0;
            }
            if ($model == "Padr") {
                $reactionCount = 0; //$this->count_aefis_with_reaction($reaction_name);
                $drugCount = 0; //count($this->count_aefis_with_drug($drug_name));
                $drugReactionCount = 0;
            } else if ($model == "Sadr") {
                $reactionCount = count($this->get_sadr_reports_with_reaction($reaction_name));
                $drugCount = count($this->get_sadr_reports_with_drug($drug_name));
                $drugReactionCount = count($this->get_sadr_reports_with_drug_and_reaction($drug_name, $reaction_name));
            }

            $expected_count_raw = ($drugCount * $reactionCount) / $total_reports;
            $expected_count = round($expected_count_raw, 5);

            $numerator = $drugReactionCount + 0.5;
            $denominator = $expected_count + 0.5;
            $calculated_data = $numerator / $denominator;

            // Observed vs. Expected -> IC (Information Component):

            $calculated_log_data_raw = log($calculated_data, 2);
            $calculated_log_data = round($calculated_log_data_raw, 5);

            $variance_of_ic_raw = 1 / ($numerator) + 1 / ($drugCount - $drugReactionCount + 0.5) + 1 / ($reactionCount - $drugReactionCount + 0.5) + 1 / ($total_reports - $drugCount - $reactionCount + $drugReactionCount + 0.5);

            $variance_of_ic = round($variance_of_ic_raw, 5);

            $standard_error = sqrt($variance_of_ic);
            $lower_bound = $calculated_log_data - 1.96 * $standard_error;

            $record = array(
                'Disproportionality' => array(
                    'drug_name' => $drug_name,
                    'reaction_name' => $reaction_name,
                    'model' => 'Sadr',
                    'B_reports_with_reaction' => $reactionCount,
                    'AB_reports_with_drug_and_reaction' => $drugReactionCount,
                    'E_(AB)_expected_count' => $expected_count,
                    'IC_raw_calculated_data' => $calculated_data,
                    'IC_raw_calculated_log_data' => $calculated_log_data,
                    'Var(IC)_Variance_of_IC' => $variance_of_ic,
                    'Standard_Error_(SE)_of_IC' => $standard_error,
                    '95%_Confidence_Interval' => $lower_bound
                )
            );
            $data[] = $record;
        }


        $this->set('page_options', $this->page_options);
        $this->set('data', $data);
        $this->set(compact('total_reports'));
    }
}
