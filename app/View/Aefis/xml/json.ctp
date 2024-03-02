<?php echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "\n"; ?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <safetyreportid>KE-PPB-<?php echo $aefi['Aefi']['reference_no']; ?></safetyreportid>
    <primarysourcecountry>KE</primarysourcecountry>
    <occurcountry>KE</occurcountry>
    <transmissiondateformat />
    <transmissiondate />
    <reporttype>1</reporttype>
    <seriousnessdeath><?php echo ($aefi['Aefi']['serious_yes'] == 'Death') ? "1" : "2"; ?></seriousnessdeath>
    <seriousnesslifethreatening><?php echo ($aefi['Aefi']['serious_yes'] == 'Life threatening') ? "1" : "2"; ?></seriousnesslifethreatening>
    <seriousnesshospitalization><?php echo ($aefi['Aefi']['serious_yes'] == 'Missing cost or prolonged hospitalization') ? "1" : "2"; ?></seriousnesshospitalization>
    <seriousnessdisabling><?php echo ($aefi['Aefi']['serious_yes'] == 'Persistent or significant disability') ? "1" : "2"; ?></seriousnessdisabling>
    <seriousnesscongenitalanomali><?php echo ($aefi['Aefi']['serious_yes'] == 'Congenital anomaly') ? "1" : "2"; ?></seriousnesscongenitalanomali>
    <seriousnessother><?php echo ($aefi['Aefi']['serious_yes'] == 'Other important medical event') ? "1" : "2"; ?></seriousnessother>
    <receivedateformat>102</receivedateformat>
    <receivedate><?php echo date('Ymd', strtotime($aefi['Aefi']['created'])); ?></receivedate>
    <receiptdateformat>102</receiptdateformat>
    <receiptdate><?php echo date('Ymd', strtotime($aefi['Aefi']['created'])); ?></receiptdate>
    <fulfillexpeditecriteria><?php if ($aefi['Aefi']['serious_yes'] == 'Death') {
                                    echo 1;
                                } else {
                                    echo 2;
                                }
                                ?></fulfillexpeditecriteria>
    <authoritynumb>KE-PPB-<?php echo $aefi['Aefi']['reference_no']; ?></authoritynumb>
    <companynumb></companynumb>
    <duplicate />
    <casenullification />
    <nullificationreason />
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
        <senderemailaddress>pv@pharmacyboardkenya.org</senderemailaddress>
    </sender>
    <receiver>
        <receivertype>2</receivertype>
        <receiverorganization>MHRA</receiverorganization>
        <receiverdepartment>VRMM</receiverdepartment>
        <receivertitle>Mr</receivertitle>
        <receivergivename>Mick</receivergivename>
        <receivermiddlename />
        <receiverfamilyname>Foy</receiverfamilyname>
        <receiverstreetaddress>3-O PhV Group. MHRA. 151 Buckingham Palace Road</receiverstreetaddress>
        <receivercity>London</receivercity>
        <receiverstate />
        <receiverpostcode>SW1W 9SZ</receiverpostcode>
        <receivercountrycode>GB</receivercountrycode>
        <receivertel>2</receivertel>
        <receivertelextension>6039</receivertelextension>
        <receivertelcountrycode>+44</receivertelcountrycode>
        <receiverfax>208754</receiverfax>
        <receiverfaxextension>3960</receiverfaxextension>
        <receiverfaxcountrycode>+44</receiverfaxcountrycode>
        <receiveremailaddress>Mick.Foy@mhra.gsi.gov.uk</receiveremailaddress>
    </receiver>
    <medicallyconfirm><?php if (!in_array($aefi['Aefi']['designation_id'], [26, 27])) {
                            echo 1;
                        } else {
                            echo 2;
                        }
                        ?></medicallyconfirm>
    <patientinitial><?php if (!empty($aefi['Aefi']['patient_name'])) {
                        echo substr($aefi['Aefi']['patient_name'], 0, 2);
                    } else echo "N/A"; ?></patientinitial>
    <patientgpmedicalrecordnumb><?php echo $aefi['Aefi']['ip_no']; ?></patientgpmedicalrecordnumb>
    <?php
    if (!empty($aefi['Aefi']['date_of_birth'])) {
        $string = $aefi['Aefi']['date_of_birth'];
        if (strlen($string) > 7) {
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
            echo '<patientbirthdateformat/>';
            echo "\n";
        }
    } else {
        echo '<patientbirthdateformat/>';
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
    } else {
        // if (!empty($aefi['Aefi']['date_of_birth'])) {
        //     echo '<patientonsetage>'; 
        //     echo $aefi['Aefi']['date_of_birth']['year']; 
        //     echo '</patientonsetage>'; 
        //     echo "<patientonsetageunit>602</patientonsetageunit>";
        // } else {
        echo "<patientonsetage/>";
        echo "<patientonsetageunit/>";
        // }
    }
    ?>
    <gestationperiod />
    <gestationperiodunit />
    <patientagegroup />
    <patientweight />
    <patientheight />
    <patientsex><?php if ($aefi['Aefi']['gender'] == 'Male') echo 1;
                elseif ($aefi['Aefi']['gender'] == 'Female') echo 2; ?></patientsex>
    <lastmenstrualdateformat />
    <patientlastmenstrualdate />
    <patientmedicalhistorytext><?php echo $aefi['Aefi']['medical_history']; ?></patientmedicalhistorytext>
    <resultstestsprocedures><?php echo $aefi['Aefi']['specimen_collected']; ?></resultstestsprocedures>
    <?php
    if (!empty($aefi['Aefi']['guardian_name'])) {

        echo "<parentidentification>" . $aefi['Aefi']['guardian_name'] . "</parentidentification>";
    } else {
        echo "<parentidentification/>";
    }
    ?>
    <parentage />
    <parentageunit />
    <parentlastmenstrualdateformat />
    <parentlastmenstrualdate />
    <parentweight />
    <parentheight />
    <parentsex />
    <parentmedicalrelevanttext />
    <narrativeincludeclinical><?php echo $aefi['Aefi']['description_of_reaction']; ?></narrativeincludeclinical>
    <reportercomment />
    <sendercomment />
    <patientdeathdateformat />
    <patientdeathdate />
    <patientautopsyyesno />
    <messagetype>ichicsr</messagetype>
    <messagenumb>KE-PPB-<?php echo date('Y') . '-' . $aefi['Aefi']['id']; ?></messagenumb>

    <?php
    $i = 0;
    foreach ($reactions as $n => $re) : ?>
        <reaction>
            <id><?php echo $i++; ?></id>
            <primarysourcereaction><?php echo $re ?></primarysourcereaction>
            <reactionmeddraversionllt>23.0</reactionmeddraversionllt>
            <reactionmeddrallt><?php echo $re ?></reactionmeddrallt>
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
            <reactionoutcome><?php $outcomes =  ['Recovered/Resolved' => 1, 'Recovering/Resolving' => 2, 'Not recovered/Not resolved/Ongoing' => 3, 'Recovered/Resolved with sequelae' => 4, 'Fatal' => 5, 'Unknown' => 6];
                                if (!empty($aefi['Aefi']['outcome']) && isset($outcomes[$aefi['Aefi']['outcome']])) echo $outcomes[$aefi['Aefi']['outcome']]; ?></reactionoutcome>
        </reaction>


    <?php endforeach; ?>
    <primarysource></primarysource>
    <?php
    $reporter = array(array('only' => 'reporter'));
    $a = 0;
    foreach ($reporter as $m => $re) : ?>

        <primarysource>
            <id><?php echo $a++; ?></id>
            <reportertitle></reportertitle>
            <?php $arr = preg_split("/[\s]+/", $aefi['Aefi']['reporter_name']); ?>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) {
                                    if (!empty($arr[1])) echo $arr[1];
                                    else echo "N/A";
                                } else echo $arr[0]; ?></reporterfamilyname>
            <reporterorganization><?php echo $aefi['Aefi']['name_of_institution']; ?></reporterorganization>
            <reporterstreet></reporterstreet>
            <reportercity></reportercity>
            <reporterstate></reporterstate>
            <reporterpostcode></reporterpostcode>
            <reportercountry>KE</reportercountry>
            <qualification><?php echo $aefi['Designation']['category']; ?></qualification>
            <literaturereference></literaturereference>
            <studyname></studyname>
            <sponsorstudynumb></sponsorstudynumb>
            <observestudytype></observestudytype>
        </primarysource>

    <?php endforeach; ?>
    <drug></drug>

    <?php
    $i = 0;
    foreach ($aefi['AefiListOfVaccine'] as $num => $listOfVaccine) : ?>
        <drug>

            <id><?php echo $i++; ?></id>
            <drugcharacterization><?php if ($num == 0) echo 1;
                                    else echo 2; ?></drugcharacterization>
            <medicinalproduct><?php if (!empty($listOfVaccine['vaccine_name'])) echo $listOfVaccine['vaccine_name'];
                                else echo $listOfVaccine['Vaccine']['vaccine_name']; ?></medicinalproduct>
            <obtaindrugcountry></obtaindrugcountry>
            <drugbatchnumb><?php echo $listOfVaccine['batch_number']; ?></drugbatchnumb>
            <drugauthorizationnumb></drugauthorizationnumb>
            <drugauthorizationcountry></drugauthorizationcountry>
            <drugauthorizationholder></drugauthorizationholder>
            <drugstructuredosagenumb><?php echo $listOfVaccine['dosage']; ?></drugstructuredosagenumb>
            <drugstructuredosageunit>012</drugstructuredosageunit>
            <drugseparatedosagenumb></drugseparatedosagenumb>
            <drugintervaldosageunitnumb></drugintervaldosageunitnumb>
            <drugintervaldosagedefinition></drugintervaldosagedefinition>
            <drugcumulativedosagenumb></drugcumulativedosagenumb>
            <drugcumulativedosageunit></drugcumulativedosageunit>
            <drugdosagetext><?php echo $listOfVaccine['dosage']; ?></drugdosagetext>
            <drugdosageform><?php $listOfVaccine['vaccination_route'];?></drugdosageform>
            <drugadministrationroute><?php echo 058?></drugadministrationroute>
            <drugparadministration></drugparadministration>
            <reactiongestationperiod></reactiongestationperiod>
            <reactiongestationperiodunit></reactiongestationperiodunit>
            <drugindicationmeddraversion></drugindicationmeddraversion>
            <drugindication></drugindication>
            <drugstartdateformat><?php if (!empty($listOfVaccine['vaccination_date'])) echo 102; ?></drugstartdateformat>
            <drugstartdate><?php if (!empty($listOfVaccine['vaccination_date'])) echo date('Ymd', strtotime($listOfVaccine['vaccination_date'])) ?></drugstartdate>
            <drugstartperiod></drugstartperiod>
            <drugstartperiodunit></drugstartperiodunit>
            <druglastperiod></druglastperiod>
            <druglastperiodunit></druglastperiodunit>
            <drugenddateformat></drugenddateformat>
            <drugenddate></drugenddate>
            <drugtreatmentduration></drugtreatmentduration>
            <drugtreatmentdurationunit></drugtreatmentdurationunit>
            <actiondrug></actiondrug>
            <drugrecurreadministration></drugrecurreadministration>
            <drugadditional><?php echo $listOfVaccine['diluent_batch_number']; ?></drugadditional>
            <activesubstance><?php if (!empty($listOfVaccine['vaccine_name'])) echo $listOfVaccine['vaccine_name'];
                                else echo $listOfVaccine['Vaccine']['vaccine_name']; ?></activesubstance>
            <drugrecuraction></drugrecuraction>

        </drug>
    <?php endforeach; ?>

</ichicsr>