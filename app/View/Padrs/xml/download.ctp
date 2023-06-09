<?php echo '<?xml version="1.0" encoding="ISO-8859-1"?>'; echo "\n"; ?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <ichicsrmessageheader lang="en">
        <messagetype>ichicsr</messagetype>
        <messageformatversion>2.1</messageformatversion>
        <messageformatrelease>2.0</messageformatrelease>
        <messagenumb>KE-PPB-<?php
            echo date('Y').'-'.$padr['Padr']['id'];
        ?></messagenumb>
        <messagesenderidentifier>PPB</messagesenderidentifier>
        <messagereceiveridentifier>KE</messagereceiveridentifier>
        <messagedateformat>204</messagedateformat>
        <messagedate><?php echo date('YmdHis');?></messagedate>
    </ichicsrmessageheader>
    <safetyreport lang="en">
        <safetyreportversion>1</safetyreportversion>
        <safetyreportid>KE-PPB-<?php
            echo $padr['Padr']['reference_no'];
        ?></safetyreportid>
        <primarysourcecountry>KE</primarysourcecountry>
        <occurcountry>KE</occurcountry>
        <transmissiondateformat/>
        <transmissiondate/>
        <reporttype>1</reporttype>
        <serious><?php echo 2;?></serious>
        <seriousnessdeath><?php echo 2; ?></seriousnessdeath>
        <seriousnesslifethreatening><?php echo 2; ?></seriousnesslifethreatening>
        <seriousnesshospitalization><?php echo 2; ?></seriousnesshospitalization>
        <seriousnessdisabling><?php echo 2; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali><?php echo 2; ?></seriousnesscongenitalanomali>
        <seriousnessother><?php echo 2; ?></seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo date('Ymd', strtotime($padr['Padr']['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo date('Ymd', strtotime($padr['Padr']['created'])); ?></receiptdate>
        <additionaldocument><?php
			if (isset($padr['Attachment']) && count($padr['Attachment']) > 0) {
				echo 1;
			} else {
				echo 2;
			}
		?></additionaldocument>
        <documentlist><?php
        if (isset($padr['Attachment']) && count($padr['Attachment']) > 0) {
			foreach ($padr['Attachment'] as $attachment):
				echo $attachment['description'].', ';
			endforeach;
        }
		?></documentlist>
        <fulfillexpeditecriteria><?php echo 2;?></fulfillexpeditecriteria>
        <authoritynumb>KE-PPB-<?php
            echo $padr['Padr']['reference_no'];
        ?></authoritynumb>
        <companynumb/>
        <duplicate>0</duplicate>
        <casenullification>0</casenullification>
        <nullificationreason/>
        <medicallyconfirm><?php echo 2;?></medicallyconfirm>
		<?php $arr = preg_split("/[\s]+/", $padr['Padr']['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1].' '; if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization/>
            <reporterdepartment/>
            <reporterstreet><?php echo $padr['Padr']['reporter_phone']; ?></reporterstreet>
            <reportercity/>
            <reporterstate/>
            <reporterpostcode/>
            <reportercountry>KE</reportercountry>
            <qualification/>
            <literaturereference/>
            <studyname/>
            <sponsorstudynumb/>
            <observestudytype/>
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
            <senderstate/>
            <senderpostcode>00506</senderpostcode>
            <sendercountrycode>KE</sendercountrycode>
            <sendertel>720608811</sendertel>
            <sendertelextension/>
            <sendertelcountrycode>254</sendertelcountrycode>
            <senderfax>2713409</senderfax>
            <senderfaxextension>20</senderfaxextension>
            <senderfaxcountrycode>254</senderfaxcountrycode>
            <senderemailaddress>pv@pharmacyboardkenya.org</senderemailaddress>
        </sender>
        <receiver>
            <receivertype/>
            <receiverorganization/>
            <receiverdepartment/>
            <receivertitle/>
            <receivergivename/>
            <receivermiddlename/>
            <receiverfamilyname/>
            <receiverstreetaddress/>
            <receivercity/>
            <receiverstate/>
            <receiverpostcode/>
            <receivercountrycode/>
            <receivertel/>
            <receivertelextension/>
            <receivertelcountrycode/>
            <receiverfax/>
            <receiverfaxextension/>
            <receiverfaxcountrycode/>
            <receiveremailaddress/>
        </receiver>
        <patient>
            <patientinitial><?php echo $padr['Padr']['patient_name']; ?></patientinitial>
            <patientgpmedicalrecordnumb/>
            <patientspecialistrecordnumb/>
            <patienthospitalrecordnumb/>
            <patientinvestigationnumb/>
            <?php
				if (!empty($padr['Padr']['date_of_birth']) && $padr['Padr']['date_of_birth'] != '--') {
					$birthdatef = 102;
					if (empty($padr['Padr']['date_of_birth']['day']) && empty($padr['Padr']['date_of_birth']['month'])) {
						$birthdatef = 602;
					} else if (empty($padr['Padr']['date_of_birth']['day']) && !empty($padr['Padr']['date_of_birth']['month'])) {
						$birthdatef = 610;
					} else if (!empty($padr['Padr']['date_of_birth']['day']) && empty($padr['Padr']['date_of_birth']['month'])) {
						$birthdatef = 602;
					}
					echo '<patientbirthdateformat>'.$birthdatef.'</patientbirthdateformat>';
					echo "\n";
				} else {
					echo '<patientbirthdateformat/>';
					echo "\n";
				}

				if(isset($birthdatef)) {
					echo '<patientbirthdate>';
					if($birthdatef == 102) echo date('Ymd', strtotime(implode('-', $padr['Padr']['date_of_birth'])));
					if($birthdatef == 602) echo $padr['Padr']['date_of_birth']['year'];
					if($birthdatef == 610) echo $padr['Padr']['date_of_birth']['year'].$padr['Padr']['date_of_birth']['month'];
					echo '</patientbirthdate>';
					echo "\n";
				} else {
					echo '<patientbirthdate/>';
					echo "\n";
				}
				?>
			<patientonsetage/>
            <patientonsetageunit/>
            <gestationperiod/>
            <gestationperiodunit/>
            <?php
				$ages = array(
								'neonate'=>1,
								'infant' => 2,
								'child' => 3,
								'adolescent' => 4,
								'adult' => 5,
								'elderly' => 6,
							);
				if (!empty($padr['Padr']['age_group']) && array_key_exists($padr['Padr']['age_group'], $ages)) echo '<patientagegroup>'.$ages[$padr['Padr']['age_group']].'</patientagegroup>';
				echo "\n";
			?>
            <patientweight/>
            <patientheight/>
            <patientsex><?php
				if($padr['Padr']['gender'] == 'Male') echo 1 ;
				elseif($padr['Padr']['gender'] == 'Female') echo 2 ;
			?></patientsex>
            <lastmenstrualdateformat/>
            <patientlastmenstrualdate/>
            <patientmedicalhistorytext/>
            <resultstestsprocedures/>
            <patientdeath>
                <patientdeathdateformat/>
                <patientdeathdate/>
                <patientautopsyyesno/>
            </patientdeath>
            <reaction>
                <primarysourcereaction/>
                <reactionmeddraversionllt>23.0</reactionmeddraversionllt>
                <reactionmeddrallt/>
                <reactionmeddraversionpt></reactionmeddraversionpt>
                <reactionmeddrapt></reactionmeddrapt>
                <termhighlighted/>
                <reactionstartdateformat/>
                <reactionstartdate/>
                <reactionenddateformat/>
                <reactionenddate/>
                <reactionduration/>
                <reactiondurationunit/>
                <reactionfirsttime/>
                <reactionfirsttimeunit/>
                <reactionlasttime/>
                <reactionlasttimeunit/>
                <reactionoutcome><?php
				$outcomes = array(
								'recovered/resolved'=>1,
								'recovering/resolving' => 2,
								'recovered/resolved with sequelae' => 3,
								'not recovered/not resolved' => 4, 
								'fatal' => 5,
								'unknown' => 6,
							);
				if (!empty($padr['Padr']['outcome'])) echo $outcomes[strtolower($padr['Padr']['outcome'])];
				?></reactionoutcome>
            </reaction>
			<?php foreach ($padr['PadrListOfMedicine'] as $sadrListOfDrug): ?>
            <drug>
                <drugcharacterization><?php echo 2;?></drugcharacterization>
                <medicinalproduct><?php echo $sadrListOfDrug['product_name']; ?></medicinalproduct>
                <obtaindrugcountry/>
                <drugbatchnumb/>
                <drugauthorizationnumb/>
                <drugauthorizationcountry/>
                <drugauthorizationholder/>
                <drugstructuredosagenumb/>
                <drugstructuredosageunit/>
                <drugseparatedosagenumb/>
                <drugintervaldosageunitnumb/>
                <drugintervaldosagedefinition/>
                <drugcumulativedosagenumb/>
                <drugcumulativedosageunit/>
                <drugdosagetext/>
                <drugdosageform/>
                <drugadministrationroute/>
                <drugparadministration/>
                <reactiongestationperiod/>
                <reactiongestationperiodunit/>
                <drugindicationmeddraversion/>
                <drugindication/>
                <drugstartdateformat><?php if (!empty($sadrListOfDrug['start_date'])) echo 102; ?></drugstartdateformat>
                <drugstartdate><?php if (!empty($sadrListOfDrug['start_date'])) echo date('Ymd', strtotime($sadrListOfDrug['start_date']))?></drugstartdate>
                <drugstartperiod/>
                <drugstartperiodunit/>
                <druglastperiod/>
                <druglastperiodunit/>
                <drugenddateformat>102</drugenddateformat>
                <drugenddate><?php
					if (!empty($sadrListOfDrug['stop_date'])) {
						echo date('Ymd', strtotime($sadrListOfDrug['stop_date']));
					}
				?></drugenddate>
                <drugtreatmentduration/>
                <drugtreatmentdurationunit/>
                <actiondrug/>
                <drugrecurreadministration/>
                <drugadditional/>
				<activesubstance>
					<activesubstancename><?php echo $sadrListOfDrug['product_name']; ?></activesubstancename>
				</activesubstance>
                <drugreactionrelatedness>
                    <drugreactionassesmeddraversion />
                    <drugreactionasses />
                    <drugassessmentsource/>
                    <drugassessmentmethod />
                    <drugresult />
                </drugreactionrelatedness>
            </drug>
			<?php  endforeach; ?>
            <summary>
                <narrativeincludeclinical/>
                <reportercomment/>
                <senderdiagnosismeddraversion />
                <senderdiagnosis />
                <sendercomment/>
            </summary>
        </patient>
    </safetyreport>
</ichicsr>
