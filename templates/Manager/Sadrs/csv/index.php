<?php

$header = array(
    'id' => '#',
    'reference_no' => 'Reference No.',
    'report_type' => 'Type',
    'report_title' => 'Report Title',
    'report_sadr' => 'Report on SADR',
    'report_therapeutic' => 'Therapeutic Ineffectiveness',
    'medicinal_product' => 'Medicinal product',
    'blood_products' => 'Blood products',
    'herbal_product' => 'Herbal product',
    'cosmeceuticals' => 'Cosmeceuticals',
    'product_other' => 'Others',
    'product_specify' => 'Specify product',
    'name_of_institution' => 'Institution',
    'institution_code' => 'Institution code',
    'counties' => 'County',
    'date_of_birth' => 'Date of birth',
    'gender' => 'Gender',
    'age_group' => 'Age Group',
    'pregnancy_status' => 'Pregnancy Status',
    'known_allergy' => 'Known allergy',
    'known_allergy_specify' => 'Allergy',
    'date_of_onset_of_reaction' => 'Date of onset',
    'drugs' => 'Generic names',
    'brands' => 'Brand names',
    'manufacturers' => 'Manufacturers',
    'indications' => 'Indications',
    'reaction_resolve' => 'Rechallenge',
    'reaction_reappear' => 'Reaction reappear',
    'severity' => 'Severity',
    'serious' => 'Reaction serious',
    'serious_reason' => 'Reason for seriousness',
    'action_taken' => 'Action taken',
    'outcome' => 'Outcome',
    'designations' => 'Reporter designation',
    'device' => 'Sending Device',
    'created' => 'Date Created',
    'reporter_date' => 'Report Date'
);
if ($this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') {
    $header['reporter_name'] = 'Reporter';
    $header['reporter_email'] = 'Reporter email';
    $header['reporter_phone'] = 'Reporter phone';
    $header['patient_name'] = 'Patient name';
}

//Additional free text columns
$header['diagnosis'] = 'Diagnosis';
$header['description_of_reaction'] = 'Brief description of reaction';
$header['medical_history'] = 'Medical history';
$header['lab_investigation'] = 'Lab investigations';
$header['any_other_comment'] = 'Any other comment';

echo implode(',', $header) . "\n";
foreach ($csadrs as $csadr):
    $content = '';


    $row = [];
    foreach ($header as $key => $val) {

        // Initialize value to an empty string
        $value = '';

        // Check if the property is set and accessible
        if (isset($csadr->$key)) {
            $value = $csadr->$key; // Access the property directly
        } elseif ($key == 'counties') {
            $value = $csadr['county']['county_name'];
        }
        elseif ($key == 'designations') {
            $value=$csadr['designation']['name'];
        }

        // Escape quotes for CSV and add to the row
        $row[$key] = '"' . str_replace('"', '""', $value) . '"';

        if ($key == 'drugs') {
            foreach ($csadr['sadr_list_of_drugs'] as $sadrListOfDrug) {
                (isset($row[$key])) ? $row[$key] .= '; '.$sadrListOfDrug['drug_name'] : $row[$key] = $sadrListOfDrug['drug_name'];
            }
        }


      
        // } elseif ($key == 'drugs') {
        // 	foreach ($csadr['sadr_list_of_drugs'] as $sadrListOfDrug) {
        // 		(isset($row[$key])) ? $row[$key] .= '; '.$sadrListOfDrug['drug_name'] : $row[$key] = $sadrListOfDrug['drug_name'];
        // 	}
        // 	(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
        // } elseif ($key == 'brands') {
        // 	foreach ($csadr['sadr_list_of_drugs'] as $sadrListOfDrug) {
        // 		(isset($row[$key])) ? $row[$key] .= '; '.$sadrListOfDrug['brand_name'] : $row[$key] = $sadrListOfDrug['brand_name'];
        // 	}
        // 	(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
        // } elseif ($key == 'manufacturers') {
        // 	foreach ($csadr['sadr_list_of_drugs'] as $sadrListOfDrug) {
        // 		(isset($row[$key])) ? $row[$key] .= '; '.$sadrListOfDrug['manufacturer'] : $row[$key] = $sadrListOfDrug['manufacturer'];
        // 	}
        // 	(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
        // } elseif ($key == 'indications') {
        // 	foreach ($csadr['sadr_list_of_drugs'] as $sadrListOfDrug) {
        // 		(isset($row[$key])) ? $row[$key] .= '; '.$sadrListOfDrug['indication'] : $row[$key] = $sadrListOfDrug['indication'];
        // 	}
        // 	(isset($row[$key])) ? $row[$key] = '"' . preg_replace('/"/','""',$row[$key]) . '"' : $row[$key] = '""';
        // } 
    }
    echo implode(',', $row) . "\n";
endforeach;
