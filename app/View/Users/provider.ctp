<?php
$this->assign('Home', 'active');
$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
$this->Html->script('home', array('inline' => false));
$this->Html->script('holder/holder', array('inline' => false));
$this->Html->css('landing', false, array('inline' => false));
$this->Html->css('upgrade', false, array('inline' => false));
?>

<style type="text/css">
	body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .hero{
        background-color: #F0F9F2;
        padding-top: 2%;
        text-align: left; 
	}
    .row-fluid {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .span8{
        padding-top: 20%;
    }
    .buttons{
        background-color: #B5CDB9;
        text-align: center;     
    }
    .left{
        
    }
</style>

<div class="hero">
    <div class="row-fluid left">
        <div class="span8">
            <h2>Who can report?</h2><br>
            <p><b>Any healthcare provider and pharmaceuticals company can report on safety issues on medicines, products or vaccines. </b></p>
            </p><br><br>
        </div>
        
    </div>

    <div class="row-fluid left">
        <div class="span4">
            <p>The reporting tools available include:</p><br>
            <p style="text-align: left;">2. Adverse Events Following Immunization</p>
            <p style="text-align: left;">3. Poor Quality health products and technologies</p>
            <p style="text-align: left;">4. Medication Errors</p>
            <p style="text-align: left;">5. Reactions caused by Transfusion</p>
            <p style="text-align: left;">6. Medical Devices Incidences</p>
        </div>
        <div class="span4">
        <p>All the information is received in confidence and will only be accessed by designated PPB staff. The Board will investigate the cases and where possible, provide feedback on the status/outcome of the review. The details of the reporter will always remain anonymous. The information collected will be used to improve patient safety.
                NOTE: Patient’s identity is held in strict confidence and the designated PPB staff shall not disclose the reporter’s identity in response to any public request. Information submitted by you will contribute to the improvement of drug safety and therapy in Kenya.</p>
            <p>
            <p>All health care workers are required to register first before they can submit reports. The registration details will be used for communication and follow up.</p>
        </div>
    </div>
</div>

<div class="buttons"> 
        <a class="btn btn-success btn-lg " href="/users/login">
            <span style="line-height: 40px;">Login Now</span>
        </a>
        <a class="btn btn-primary btn-lg" href="/users/register">
            <span style="line-height: 40px;">Register</span>
        </a>
</div>

<div class="container marketing">
    <br> <br> <br>
  
    <br><br>
    <div class="row-fluid">

        <div class="container">
            <div class="header_">
                <h2>Guidelines</h2>
                <br>
            </div>
            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                        <a class="card-title">
                            Guide to reporting poor quality health products and technologies
                        </a>
                    </div>
                    <div id="collapseOne" class="card-body collapse" data-parent="#accordion">
                        <br>
                        <p style="text-align: left;">i. Once on the PvERS page, click on “PQHPT”</p>
                        <p style="text-align: left;">ii. Clink on “new PQHPT” and fill the details on the pink form</p>
                        <p style="text-align: left;">iii. Select the product category i.e., medicine, herbal product, vaccine, medical device, others (specify)</p>
                        <p style="text-align: left;">iv. Indicate facility details i.e., name of facility, name of county and sub-county, contact of facility (email and telephone)</p>
                        <p style="text-align: left;">v. Indicate product details i.e., the brand name, batch number or lot number, date of manufacture and date of expiry, INN name, name of manufacturer, name of supplier</p>
                        <p style="text-align: left;">vi. Describe product formulation e.g., oral tablets/capsules, oral suspension/syrup, eye drops, cream, ointment injection, others (specify)</p>
                        <p style="text-align: left;">vii. Select the quality defect from the drop down i.e., color change, powdering, crumbling, caking, molding, change of odor, mislabeling, others (specify)</p>
                        <p style="text-align: left;">viii. Describe the complaint in detail</p>
                        <p style="text-align: left;">ix. Describe storage conditions of the medical product e.g., stored under cold chain, stored in room temperature, others (specify)</p>
                        <p style="text-align: left;">x. State whether the medical product was dispensed and returned by the patient / client (where applicable)</p>
                        <p style="text-align: left;">xi. If you have any photos or documents you can attach</p>
                        <p style="text-align: left;">xii. Write your name, contact (email address and telephone number) and the date for reporting</p>

                    </div>
                </div>
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <a class="card-title">
                            Guide to reporting suspected medicine side effects
                        </a>
                    </div>
                    <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                        <br>
                        <p style="text-align: left;">An Adverse Drug Reaction (ADR) is defined as a reaction that is noxious and unintended, and occurs at doses normally used in man for prophylaxis, diagnosis or treatment of a disease, or for modification of physiological function.

                            Report on the following:</p>

                        <p style="text-align: left;">1. All expected and unexpected suspected medicine side effectss due to medicines, herbal products and cosmeceuticals (cosmetics with medical claims)</p>
                        <p style="text-align: left;">2. Any suspected therapeutic ineffectiveness.</p>
                        <p style="text-align: left;">3. All suspected ADRs and/or AEs that may be associated with suspected or confirmed quality defects including adulteration or contamination, or falsified medicine</p>
                        <p style="text-align: left;">4. Case reports of acute and chronic poisoning (toxicity)</p>
                        <p style="text-align: left;">5. Abuse, overdose and misuse of medicines</p>
                        <p style="text-align: left;">6. Adverse interactions of medicines with chemicals, other medicines and food</p>
                        <p style="text-align: left;">7. Any ADRs or AEs observed in pregnancy or during breastfeeding</p>
                    </div>
                </div>
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <a class="card-title">
                            Guide to reporting adverse event following immunization
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <br>
                            <p style="text-align: left;"> An adverse event following immunization (AEFI) is defined as any unfavorable medical occurrence which follows immunization and which may or may not be caused by the usage of the vaccine. The adverse event may be any unfavorable or unintended sign, abnormal laboratory finding, symptom or disease.</p>
                            <br>
                            <p style="text-align: left;">Report any Adverse Event Following Immunization that is of concern, both minor and serious cases. They include:</p>
                            <p style="text-align: left;">a. Serious AEFIs i.e. adverse events or reactions that result in death, hospitalization (or prolongation of existing hospital stay), persistent or significant disability or incapacity (e.g. paralysis), or are potentially life threatening</p>
                            <p style="text-align: left;">b. Signals and events associated with a newly introduced vaccine</p>
                            <p style="text-align: left;">c. AEFIs that may have been caused by immunization error (e.g. Injection site abscesses, severe local reaction, high fever or sepsis, BCG toxic shock syndrome, clusters of AEFIs)</p>
                            <p style="text-align: left;">d. Allergic reaction- anaphylaxis, hives, bronchospasm, oedema</p>
                            <p style="text-align: left;">e. Clusters of events (> 2 cases of same event in same month) apart from fever</p>
                            <p style="text-align: left;">f. Seizures</p>
                            <p style="text-align: left;">g. Any events causing significant parental/caregiver or community concern</p>
                            <p style="text-align: left;">h. Swelling, redness, soreness at the site of injection IF it lasts more than 3 days or swelling extends beyond the nearest joint, inability to move the limb.</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <a class="card-title">
                            Guide to reporting medical devices incident
                        </a>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <br>
                            <p style="text-align: left;"> Medical devices include catheters, diagnostic tests, syringes, personal protective equipment-surgical masks, respirators, gowns, gloves, face shields Report all events/incidents that occur if for example:</p>
                            <p style="text-align: left;">1. Someone’s injured (or almost injured) by a medical device, either because its labelling or instructions aren’t clear, it’s broken or has been misused</p>
                            <p style="text-align: left;">2. Patient’s treatment is interrupted because of a faulty device</p>
                            <p style="text-align: left;">3. Someone receives the wrong diagnosis because of a medical device</p>
                            <p style="text-align: left;">4. Result in serious events/outcomes (death, hospitalization, congenital anomalies, permanent damage/impairment of a body function, life threatening)</p>
                            <p style="text-align: left;">Report events that do not also have serious outcomes.</p>
                            <p style="text-align: left;">The Pharmacy and Poisons Board investigates all incidents reported to us in order to identify any faults with medical devices and to prevent similar incidents happening again. The Board may contact the manufacturer of this medical device to request they carry out an investigation.</p>
                        </div>
                    </div>
                </div>
                <!-- Medical Errors -->
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        <a class="card-title">
                            Guide to reporting medical errors
                        </a>
                    </div>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <br>
                            <p style="text-align: left;"> Submission of a report does not constitute an admission that medical personnel or manufacturer or the product caused or contributed to the event. Patient’s identity is held in strict confidence and program staff is not is not expected to and will not disclose reporter’s identity in response to any public request.</p> 
                        </div>
                    </div>
                </div>
                <!-- Blood Transfusion -->
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                        <a class="card-title">
                            Guide to reporting blood transfusions
                        </a>
                    </div>
                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <br>
                            <p style="text-align: left;"> Report all transfusion reactions, incidents, near misses, errors, deviations from standard operating procedures and accidents associated with blood donation and transfusion. Fill this form immediately the reaction occurs.</p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="blank_public"></div>
    </div>
</div>