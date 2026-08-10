<?php

$header = array(
	'id' => '#',
	'reference_no' => 'Reference No.',
	'company_name' => 'Company Name',
	'reporter_email' => 'Reporter Email',
	'reporter_name' => 'Reporter Name',
	'reporter_phone' => 'Reporter Phone',  
	'brand_name' => 'Brand Name',
	'inn_name' => 'INN Name',
	'mah' => 'MAH',
	'local_technical' => 'Local Technical',
	'therapeutic_group' => 'Therapeutic Group',
	'authorised_indications' => 'Authorised Indications',
	'form_strength' => 'Form Strength',
	'interval_code' => 'Interval Code',
	'submission_frequency' => 'Submission Frequency',
	'date_of_birth' => 'Date of Birth',
	'introduction' => 'Introduction',
	'worldwide_marketing' => 'Worldwide Marketing',
	'action_taken' => 'Action Taken',
	'reference_changes' => 'Reference Changes',
	'estimated_exposure' => 'Estimated Exposure',
	'clinical_findings' => 'Clinical Findings',
	'efficacy' => 'Efficacy', 
	'late_breaking' => 'Late Breaking',
	'safety_concerns' => 'Safety Concerns',
	'risks_evaluation' => 'Risks Evaluation',
	'risks_characterisation' => 'Risks Characterisation',
	'benefit_evaluation' => 'Benefit Evaluation',
	'risk_balance' => 'Risk Balance',
	'recommendation' => 'Recommendation',
	'conclusion' => 'Conclusion', 	'data_lock' => 'Data Lock',
	'next_data_lock' => 'Next Data Lock',
	'data_interval' => 'Data Interval',
	'created' => 'Date Created',
	'reporter_date' => 'Report Date',
	'submitted_date' => 'Date Submitted'
);

function html_to_plain_text($html) {
	if ($html === null || $html === '') {
		return '';
	}

	// Convert block-level tags to line breaks before stripping
	$html = preg_replace('/<\s*br\s*\/?>/i', ' ', $html);
	$html = preg_replace('/<\s*\/p\s*>/i', ' ', $html);
	$html = preg_replace('/<\s*p[^>]*>/i', '', $html);

	$text = strip_tags($html);
	$text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	$text = str_replace("\xC2\xA0", ' ', $text); // &nbsp; -> space

	$text = preg_replace('/\s+/', ' ', $text); // collapse all whitespace/newlines to single spaces
	$text = trim($text);

	return $text;
}

echo implode(',', $header) . "\n";
foreach ($data as $csadr) :
	$row = [];
	foreach ($header as $key => $val) {
		$value = array_key_exists($key, $csadr['Aggregate']) ? $csadr['Aggregate'][$key] : '';
		$value = html_to_plain_text($value);
		$row[$key] = '"' . str_replace('"', '""', $value) . '"';
	}
	echo implode(',', $row) . "\n";
endforeach;
