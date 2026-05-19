<?php echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "\n";

function cleanForICSR($text) {
    if (empty($text)) return '';
    
    // Step 1: Decode any HTML entities to actual characters
    $text = html_entity_decode($text, ENT_QUOTES | ENT_XML1 | ENT_HTML5, 'UTF-8');
    
    // Step 2: Replace problematic symbols with text
    $text = str_replace('°', ' degrees ', $text);
    $text = str_replace('×', ' x ', $text);
    $text = str_replace('÷', ' divided by ', $text);
    $text = str_replace('™', ' (TM) ', $text);
    $text = str_replace('®', ' (R) ', $text);
    $text = str_replace('©', ' (C) ', $text);
    $text = str_replace('€', ' Euros ', $text);
    $text = str_replace('£', ' Pounds ', $text);
    $text = str_replace('•', '-', $text);
    $text = str_replace('…', '...', $text);
    $text = str_replace('—', '-', $text);
    $text = str_replace('–', '-', $text);
    
    // Step 3: Handle ampersands FIRST (critical for XML)
    // But preserve already escaped entities temporarily
    $text = preg_replace('/&(?!amp;|lt;|gt;|quot;|apos;|#[0-9]+;|#x[0-9A-Fa-f]+;)/', '&amp;', $text);
    
    // Step 4: Escape remaining XML special characters
    $text = str_replace('<', '&lt;', $text);
    $text = str_replace('>', '&gt;', $text);
    $text = str_replace('"', '&quot;', $text);
    $text = str_replace("'", '&apos;', $text);
    
    // Step 5: Remove any remaining HTML entities (safety net)
    $text = preg_replace('/&[a-zA-Z]+;[^\s]/', ' ', $text);
    
    // Step 6: Remove any non-ASCII characters (keep only printable ASCII)
    $text = preg_replace('/[^\x20-\x7E\t]/', ' ', $text);
    
    // Step 7: Clean up whitespace
    $text = preg_replace('/\s+/', ' ', $text);
    
    // Step 8: Trim and ensure we don't start/end with spaces
    return trim($text);
}

?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <ichicsrmessageheader lang="en">
        <messagetype>ichicsr</messagetype>
        <messageformatversion>2.1</messageformatversion>
        <messageformatrelease>2.0</messageformatrelease>
        <messagenumb>KE-PPB-<?php
                            echo date('Y') . '-' . $aefi['Aefi']['id'];
                            ?></messagenumb>
        <messagesenderidentifier>PPB</messagesenderidentifier>
        <messagereceiveridentifier>KE</messagereceiveridentifier>
        <messagedateformat>204</messagedateformat>
        <messagedate><?php echo date('YmdHis'); ?></messagedate>
    </ichicsrmessageheader>
    <safetyreport lang="en">
        <safetyreportversion>1</safetyreportversion>
        <safetyreportid>KE-PPB-<?php
                                echo $aefi['Aefi']['reference_no'];
                                ?></safetyreportid>
        <primarysourcecountry>KE</primarysourcecountry>
        <occurcountry>KE</occurcountry>
        <transmissiondateformat>204</transmissiondateformat>
        <transmissiondate><?php echo date('YmdHis'); ?></transmissiondate>
        <reporttype>1</reporttype>
        <serious><?php
                    if ($aefi['Aefi']['serious'] == 'Yes') {
                        echo 1;
                    } else {
                        echo 2;
                    }
                    ?></serious>
        <seriousnessdeath><?php echo ($aefi['Aefi']['serious_yes'] == 'Death') ? 1 : 2; ?></seriousnessdeath>
        <seriousnesslifethreatening><?php echo ($aefi['Aefi']['serious_yes'] == 'Life threatening') ? 1 : 2; ?></seriousnesslifethreatening>
        <seriousnesshospitalization><?php echo ($aefi['Aefi']['serious_yes'] == 'Missing cost or prolonged hospitalization') ? 1 : 2; ?></seriousnesshospitalization>
        <seriousnessdisabling><?php echo ($aefi['Aefi']['serious_yes'] == 'Persistent or significant disability') ? 1 : 2; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali><?php echo ($aefi['Aefi']['serious_yes'] == 'Congenital anomaly') ? 1 : 2; ?></seriousnesscongenitalanomali>
        <seriousnessother><?php echo ($aefi['Aefi']['serious_yes'] == 'Other important medical event') ? 1 : 2; ?></seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo date('Ymd', strtotime($aefi['Aefi']['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo date('Ymd', strtotime($aefi['Aefi']['created'])); ?></receiptdate>
        <additionaldocument><?php
                            if (isset($aefi['Aefi']['attachments']) && count($aefi['Aefi']['attachments']) > 0) {
                                echo 1;
                            } else {
                                echo 2;
                            }
                            ?></additionaldocument>
        <documentlist><?php
                        if (isset($aefi['Aefi']['attachments'])) {
                            foreach ($aefi['Aefi']['attachments'] as $attachment) :
                                echo $attachment['description'] . ', ';
                            endforeach;
                        }
                        ?></documentlist>
        <fulfillexpeditecriteria><?php
                                    if ($aefi['Aefi']['serious_yes'] == 'Death') {
                                        echo 1;
                                    } else {
                                        echo 2;
                                    }
                                    ?></fulfillexpeditecriteria>
        <authoritynumb>KE-PPB-<?php
                                echo $aefi['Aefi']['reference_no'];
                                ?></authoritynumb>
        <companynumb />
        <duplicate />
        <casenullification />
        <nullificationreason />
        <medicallyconfirm><?php
                            if (!in_array($aefi['Aefi']['designation_id'], [26, 27])) {
                                echo 1;
                            } else {
                                echo 2;
                            }
                            ?></medicallyconfirm>
        <?php $arr = preg_split("/[\s]+/", $aefi['Aefi']['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1] . ' ';
                                if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization><?php echo $aefi['Aefi']['name_of_institution']; ?></reporterorganization>
            <reporterdepartment />
            <reporterstreet />
            <reportercity />
            <reporterstate />
            <reporterpostcode />
            <reportercountry>KE</reportercountry>
            <qualification><?php echo $aefi['Designation']['category']; ?></qualification>
            <literaturereference />
            <studyname />
            <sponsorstudynumb />
            <observestudytype />
        </primarysource>
        <sender>
            <sendertype>3</sendertype>
            <senderorganization>Pharmacy and Poisons Board</senderorganization>
            <senderdepartment>Department of Pharmacovigilance</senderdepartment>
            <sendertitle>Dr.</sendertitle>
            <sendergivename>Christabel</sendergivename>
            <sendermiddlename>N.</sendermiddlename>
            <senderfamilyname>Khaemba</senderfamilyname>
            <senderstreetaddress>P.O. Box:27663-00506</senderstreetaddress>
            <sendercity>Nairobi</sendercity>
            <senderstate />
            <senderpostcode>00506</senderpostcode>
            <sendercountrycode>KE</sendercountrycode>
            <sendertel>720608811</sendertel>
            <sendertelextension />
            <sendertelcountrycode>254</sendertelcountrycode>
            <senderfax>2713409</senderfax>
            <senderfaxextension>20</senderfaxextension>
            <senderfaxcountrycode>254</senderfaxcountrycode>
            <senderemailaddress>pv@ppb.go.ke</senderemailaddress>
        </sender>
        <receiver>
            <receivertype />
            <receiverorganization />
            <receiverdepartment />
            <receivertitle />
            <receivergivename />
            <receivermiddlename />
            <receiverfamilyname />
            <receiverstreetaddress />
            <receivercity />
            <receiverstate />
            <receiverpostcode />
            <receivercountrycode />
            <receivertel />
            <receivertelextension />
            <receivertelcountrycode />
            <receiverfax />
            <receiverfaxextension />
            <receiverfaxcountrycode />
            <receiveremailaddress />
        </receiver>
        <patient>
            <patientinitial><?php echo $aefi['Aefi']['patient_name']; ?></patientinitial>
            <patientgpmedicalrecordnumb><?php echo $aefi['Aefi']['ip_no']; ?></patientgpmedicalrecordnumb>
            <patientspecialistrecordnumb><?php echo $aefi['Aefi']['ip_no']; ?></patientspecialistrecordnumb>
            <patienthospitalrecordnumb><?php echo $aefi['Aefi']['ip_no']; ?></patienthospitalrecordnumb>
            <patientinvestigationnumb /><?php
            if (!empty($aefi['Aefi']['date_of_birth'])) { 
                $birthdatef = 102;
                if (empty($aefi['Aefi']['date_of_birth']['day']) && empty($aefi['Aefi']['date_of_birth']['month'])) {
                    $birthdatef = 602;
                } else if (empty($aefi['Aefi']['date_of_birth']['day']) && !empty($aefi['Aefi']['date_of_birth']['month'])) {
                    $birthdatef = 610;
                } else if (!empty($aefi['Aefi']['date_of_birth']['day']) && empty($aefi['Aefi']['date_of_birth']['month'])) {
                    $birthdatef = 602;
                }
                echo '<patientbirthdateformat>' . $birthdatef . '</patientbirthdateformat>';
                echo "\n";
            } else {
                echo '<patientbirthdateformat></patientbirthdateformat>';
                echo "\n";
            }
            if (isset($birthdatef)) {
                echo '<patientbirthdate>';
                if ($birthdatef == 102) echo date('Ymd', strtotime(implode('-', $aefi['Aefi']['date_of_birth'])));
                if ($birthdatef == 602) echo $aefi['Aefi']['date_of_birth']['year'];
                if ($birthdatef == 610) echo $aefi['Aefi']['date_of_birth']['year'] . $aefi['Aefi']['date_of_birth']['month'];
                echo '</patientbirthdate>';
                echo "\n";
            } else {
                echo '<patientbirthdate/>';
                echo "\n";
            }
            ?>
            <?php
            if (!empty($aefi['Aefi']['age_months'])) {
                echo "<patientonsetage>" . $aefi['Aefi']['age_months'] . "</patientonsetage>";
                echo "<patientonsetageunit>802</patientonsetageunit>";
                echo "\n";
            } else {
                echo "<patientonsetage/>";
                echo "<patientonsetageunit/>";
                echo "\n";
            }
            ?><gestationperiod />
            <gestationperiodunit />
            <patientagegroup />
            <patientweight />
            <patientheight />
            <patientsex><?php
                        if ($aefi['Aefi']['gender'] == 'Male') echo 1;
                        elseif ($aefi['Aefi']['gender'] == 'Female') echo 2;
                        ?></patientsex>
            <lastmenstrualdateformat />
            <patientlastmenstrualdate />
            <patientmedicalhistorytext><?php echo cleanForICSR($aefi['Aefi']['medical_history']); ?></patientmedicalhistorytext>
            <resultstestsprocedures />
            <patientdeath>
                <patientdeathdateformat />
                <patientdeathdate />
                <patientautopsyyesno />
            </patientdeath>
            <reaction>
                <primarysourcereaction><?php
                    if ($aefi['Aefi']['local_reaction']) echo 'Severe, ';
                    if ($aefi['Aefi']['convulsion']) echo 'Seizures, ';
                    if ($aefi['Aefi']['abscess']) echo 'Abscess, ';
                    if ($aefi['Aefi']['bcg']) echo 'BCG Lymphadenitis, ';
                    if ($aefi['Aefi']['meningitis']) echo 'Encephalopathy, ';
                    if ($aefi['Aefi']['toxic_shock']) echo 'Toxic, ';
                    if ($aefi['Aefi']['anaphylaxis']) echo 'Anaphylaxis, ';
                    if ($aefi['Aefi']['high_fever']) echo 'Fever, ';
                    if ($aefi['Aefi']['paralysis']) echo 'Paralysis, ';
                    if ($aefi['Aefi']['urticaria']) echo 'Generalized urticaria, ';
                    ?></primarysourcereaction>
                <reactionmeddraversionllt>23.0</reactionmeddraversionllt>
                <reactionmeddrallt><?php echo $aefi['Aefi']['aefi_symptoms']; ?></reactionmeddrallt>
                <reactionmeddraversionpt />
                <reactionmeddrapt />
                <termhighlighted />
                <?php

                if (!empty($aefi['Aefi']['date_aefi_started'])) {
                    echo "<reactionstartdateformat>102</reactionstartdateformat>";
                    echo "<reactionstartdate>" . date('Ymd', strtotime($aefi['Aefi']['date_aefi_started'])) . "</reactionstartdate>";
                } else {
                    echo "<reactionstartdateformat/>
                              <reactionstartdate/>";
                }

                ?>

                <reactionenddateformat />
                <reactionenddate />
                <reactionduration />
                <reactiondurationunit />
                <reactionfirsttime />
                <reactionfirsttimeunit />
                <reactionlasttime />
                <reactionlasttimeunit />
                <reactionoutcome><?php
                                    $outcomes =  [
                                        'Recovered/Resolved' => 1,
                                        'Recovering/Resolving' => 2,
                                        'Recovered/Resolved with sequelae' => 3,
                                        'Not recovered/Not resolved/Ongoing' => 4,
                                        'Fatal' => 5,
                                        'Unknown' => 6
                                    ];
                                    if (!empty($aefi['Aefi']['outcome']) && isset($outcomes[$aefi['Aefi']['outcome']])) echo $outcomes[$aefi['Aefi']['outcome']];
                                    ?></reactionoutcome>
            </reaction>
            <?php foreach ($aefi['AefiListOfVaccine'] as $num => $listOfVaccine) : ?>

                <drug>
                    <drugcharacterization><?php
                                            if ($num == 0) echo 1;
                                            else echo 2;
                                            ?></drugcharacterization>
                    <medicinalproduct><?php echo (!empty($listOfVaccine['Vaccine']['vaccine_name'])) ? $listOfVaccine['Vaccine']['vaccine_name'] : ''; ?></medicinalproduct>
                    <obtaindrugcountry />
                    <drugbatchnumb><?php echo $listOfVaccine['batch_number']; ?></drugbatchnumb>
                    <drugauthorizationnumb />
                    <drugauthorizationcountry />
                    <drugauthorizationholder />
                    <drugstructuredosagenumb><?php echo $listOfVaccine['dosage']; ?></drugstructuredosagenumb>
                    <drugstructuredosageunit><?php
                                                // echo $listOfVaccine['Vaccine']['icsr_code'];
                                                ?></drugstructuredosageunit>
                    <drugseparatedosagenumb />
                    <drugintervaldosageunitnumb />
                    <drugintervaldosagedefinition />
                    <drugcumulativedosagenumb />
                    <drugcumulativedosageunit />
                    <drugdosagetext><?php echo $listOfVaccine['dosage']; ?></drugdosagetext>
                    <drugdosageform />
                    <drugadministrationroute />
                    <drugparadministration />
                    <reactiongestationperiod />
                    <reactiongestationperiodunit />
                    <drugindicationmeddraversion />
                    <drugindication />
                    <drugstartdateformat><?php if (!empty($listOfVaccine['vaccination_date'])) echo 102; ?></drugstartdateformat>
                    <drugstartdate><?php if (!empty($listOfVaccine['vaccination_date'])) echo date('Ymd', strtotime($listOfVaccine['vaccination_date'])) ?></drugstartdate>
                    <drugstartperiod />
                    <drugstartperiodunit />
                    <druglastperiod />
                    <druglastperiodunit />
                    <drugenddateformat />
                    <drugenddate />
                    <drugtreatmentduration />
                    <drugtreatmentdurationunit />
                    <actiondrug />
                    <drugrecurreadministration />
                    <drugadditional><?php echo $listOfVaccine['diluent_batch_number']; ?></drugadditional>
                    <activesubstance>
                        <activesubstancename><?php echo $listOfVaccine['vaccine_name']; ?></activesubstancename>
                    </activesubstance>
                    <drugreactionrelatedness>
                        <drugreactionassesmeddraversion>23.0</drugreactionassesmeddraversion>
                        <drugreactionasses><?php echo $aefi['Aefi']['aefi_symptoms']; ?></drugreactionasses>
                        <drugassessmentsource />
                        <drugassessmentmethod />
                        <drugresult />
                    </drugreactionrelatedness>
                </drug>
            <?php endforeach; ?><summary>
                <narrativeincludeclinical><?php echo cleanForICSR($aefi['Aefi']['description_of_reaction']);?></narrativeincludeclinical>
                <reportercomment />
                <senderdiagnosismeddraversion>23.0</senderdiagnosismeddraversion>
                <senderdiagnosis><?php echo cleanForICSR($aefi['Aefi']['medical_history']); ?></senderdiagnosis>
                <sendercomment />
            </summary>
        </patient>
    </safetyreport>
</ichicsr>