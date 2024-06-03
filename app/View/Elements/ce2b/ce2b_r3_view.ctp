<?php
$this->assign('E2B', 'active');
$ichecked = "&#x2611;";
$nchecked = "&#x2610;";
?>

<!-- Ce2b
    ================================================== -->

<div class="row-fluid" id="abonokode">
    <div class="span12">

        <div id="printAreade">
            <div class="formbackc">

                <p><b>(FOM001/HPT/VMS/SOP/001)</b></p>
                <div class="row-fluid">
                    <div class="span12">
                        <?php
                        echo $this->Html->image('confidence.png', array('alt' => 'in confidence', 'class' => 'pull-right'));
                        echo $this->Html->image('coa.png', array('alt' => 'COA', 'style' => 'margin-left: 45%;'));
                        ?>
                        <div class="babayao" style="text-align: center;">
                            <h4>MINISTRY OF HEALTH</h4>
                            <h5>PHARMACY AND POISONS BOARD</h5>
                            <h5>P.O. Box 27663-00506 NAIROBI</h5>
                            <h5>Tel: +254795743049</h5>
                            <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
                            <h5 style="color: red;">E2B</h5>
                        </div>
                    </div>
                </div>

                <!-- Updated UI -->
                <div class="row-fluid">
                    <div class="span12" style="padding-left: 20px; padding-right: 20px;">

                        <h5 style="background: #18C4D1; padding:20px;">Identification of the Case Safety Report </h5>
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Sender's Safety Report Unique Identifier</td>
                            </tr>
                            <tr>
                                <td>111</td>
                            </tr>
                            <tr>
                                <td>Type of Report</td>
                            </tr>
                            <tr>
                                <td>111</td>
                            </tr>
                            <tr>
                                <td>Date of Creation</td>
                                <td>Date First Received from source</td>
                            </tr>
                            <tr>
                                <td><?php
                                    $dateString = implode(" | ", array_merge(Hash::extract($e2b, 'MCCI_IN200100UV01.creationTime'), Hash::extract($e2b, 'MCCI_IN200100UV01.{n}.creationTime')));
                                    // Create a DateTime object from the string
                                    $timestamp = strtotime($dateString);
                                    $formattedDate = date("F j, Y, g:i:s A T", $timestamp);
                                    // Output the formatted date
                                    echo $formattedDate;
                                    ?></td>
                                <td><?php
                                    $dateString = implode(" | ", array_merge(Hash::extract($e2b, 'MCCI_IN200100UV01.creationTime'), Hash::extract($e2b, 'MCCI_IN200100UV01.{n}.creationTime')));
                                    // Create a DateTime object from the string
                                    $timestamp = strtotime($dateString);
                                    $formattedDate = date("F j, Y, g:i:s A T", $timestamp);
                                    // Output the formatted date
                                    echo $formattedDate;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Additional available documents held by sender</td>
                                <td>Documents held by the sender</td>
                            </tr>
                            <tr>
                                <td>Yes</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Does this case fulfill the local criteria for an experdited report?</td>

                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Worldwide unique case Identification</td>

                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>First Sender of this case</td>

                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Other case Identifiers Report</td>

                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Other case Identifiers in previous transmissions</td>

                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Sources if the case Identifiers</td>
                                <td>Case Identifiers</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Identification number if the report which is linked to this report</td>

                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Report Nullification / Amendment</td>
                                <td>Reasons for Nullification / Amendment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Primary Sources</h5>

                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Reporter's Name</td>
                                <td>Reporter's Email Address</td>
                                <td>Reporter's Telephone</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Reporter's Department</td>
                                <td>Reporter's Physicall Address </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Reporter's Qualification</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Information on Sender of Case Safety Report</h5>
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Sender's Name</td>
                                <td>Sender's Email Address</td>
                                <td>Sender's Telephone</td>
                                <td>Sender's Organization</td>
                            </tr>
                            <tr>
                                <td><?php
                            echo   implode(" | ", array_merge(Hash::extract($e2b, 'MCCI_IN200100UV01.PORR_IN049016UV.sender.device.id'), Hash::extract($e2b, 'MCCI_IN200100UV01.PORR_IN049016UV.sender.device.{n}.id')));

                            ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Sender's Department</td>
                                <td>Sender's Physicall Address </td>
                                <td>Sender's Fax</td>
                                <td>Sender's Qualification</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Literature Reference(s)</h5>

                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Literature Reference</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Included documents</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Study Indetification</h5>

                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Study registration number</td>
                                <td>Study registration country</td>
                                <td>Study name</td>
                                <td>Sponsor study number</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Study type where reaction(s) / event (s) were observed</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Patient Characteristics</h5>

                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Patient's Name or Initials</td>
                                <td>Patient's medical reocrd number</td>
                                <td>Patient's Age</td>
                                <td>Patient's Date of Birth</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Age at the time of onset of reaction/ event (number)</td>
                                <td>Age at time of onset of reaction/ event (unit)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Gestation period when reaction/ event was observed in the foetus (number)</td>
                                <td>Gestation period when reaction/ event was observed in the foetus (unit)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Body weight (kg)</td>
                                <td>Height (cm)</td>
                                <td>Sex</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Last menstrual period date</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Text for relevant medical history and concurrent conditions (not including reaction/event)</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Concomitant therapies</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <h5>Structured information on relevant medical history</h5>
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>MedDRA Version for medical History</td>
                                <td>Medical History (MedDRA code)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>Continuing</td>
                                <td>End Date</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Comments</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Family History</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <h5>Relevant past Drug History</h5>
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Name of drug as reported</td>
                                <td>MPID version date/number</td>
                                <td>Medicinal Product Identifier (MPID)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>PhPID version date/number</td>
                                <td>Pharmaceutical Product Identifier (PhPID)</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>End Date</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>MedDRA version for indication</td>
                                <td>Indication (MedDRA Code)</td>
                                <td>MedDRA version for reaction</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Date of Death</td>
                                <td>Reported cause(s) of death</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>MedDRA version for reported causes(s) of death</td>
                                <td>Reported cause(s) of death (MedDRA code)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Reported cause(s) of death (free text)</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Was the autopsy done?</td>

                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <h5>Autopsy-Determined cause(s) of Death</h5>
                        <!-- Repeat if possible -->
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>MedDRA version for autopsy-determined cause of death</td>
                                <td>Autopsy-determined cause(s) of death (MedDRA code)</td>
                                <td>Autopsy-determined cause(s) of death (free text)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <br>
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Parent Identification</td>
                                <td>Date of Birth of parent</td>
                                <td>Parent's Age</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Body weight (kg) of parent</td>
                                <td>Height (cm) of parent</td>
                                <td>Sex of parent</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Text for relevant medical history and concurent conditions of parent</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <h5> Relevant Medical history and concurrent conditions of Parent</h5>


                        <!-- Repeat as Required -->
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>MedDRa version for medical history</td>
                                <td>Medical history (disease /surgical procedure /etc) (MedDRA code)</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>Continuing</td>
                                <td>End Date</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Comments</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                        <br>
                        <h5>Relevant Past drug history of parent</h5>
                        <!-- Repeat if possible -->
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Name of drug as reported</td>
                                <td>MPID version date/number</td>
                                <td>MEdical Product Identifier (MPID)</td>
                                <td>PhPID version date/number</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pharmaceutical Product Identifier (PhPID)</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>End Date</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>MedDRA version for indication</td>
                                <td>Indication (MedDRA code)</td>
                                <td>MedDRA version for reaction</td>
                                <td>Reactions (MedDRA code)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Reaction(s)/Event(s)</h5>

                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Reaction / event as reported by the primary source in native language</td>

                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Reaction / event as reported by the primary source language</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Reaction / event as reported by the primary source for translation</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>MedDRA version for reaction/event</td>
                                <td>Reaction/event (MedDRA code)</td>
                                <td>Term highlighted by the reporter</td>
                                <td>Seriousness criteria at event level</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Results in death</td>
                                <td>Life threatening</td>
                                <td>Caused / prolonged hospitalization </td>
                                <td>Disabling / Incapacitating</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Congenital anomaly / birth defect</td>
                                <td>Other medically important condition</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Date of start of reaction / event</td>
                                <td>Date of end of reaction / event</td>
                                <td>Duration of reaction / event (number)</td>
                                <td>Duration of reaction / event (unit)</td>
                            </tr>
                            <tr>
                                <td>Outcome of Reaction / Event at the time of Last Observation</td>
                                <td>Medical confirmation by healthcare professional </td>
                                <td>Country where the reaction / event occured</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Results of Tests and Procedures Relevant to the Investigation of the Patient</h5>
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Test date</td>
                                <td>Test name</td>
                                <td>Test name (free text)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>MedDRA version for test name</td>
                                <td>Test name (MedDRA code)</td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Test results</td>
                                <td>Test results (code)</td>
                                <td>Test results (value /qualifier)</td>
                                <td>Test results (unit)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Results unstructured data (free text)</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Normal low value</td>
                                <td>Normal high value</td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Comments (free text)</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>More information available</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Drugs Information</h5>
                       
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Characterization of Drug Role</td>
                                <td>MPID version date/number</td>
                                <td>Medicinal Product Identifier (MPID)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>PhPID version date / number</td>
                                <td>Pharmaceutical Product Identifier (PhPID)</td>
                                <td>Medicinal Product Name</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Country where the drug was obtained</td>
                                <td>Investigation product blinded</td>
                                <td>Holder and Authorisation Number of Drug</td>
                                <td>Authorisation /Application Number</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Country of Authorisation / Application</td>
                                <td>Name of Holder / Applicant</td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Substance / specified substance name</td>
                                <td>Substance TermID version  date/number</td>
                                <td>Substance /Specified Substance TermID</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Strength (number)</td>
                                <td>Strength (unit)</td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>MedDRA version for indication</td>
                                <td>Indication (MedDRA code)</td>
                                <td>MedDRA version for reaction</td>
                                <td>Reactions (MedDRA code)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Dosage and relevant information</td>
                                <td>Dose (number)</td>
                                <td>Dose (unit)</td>
                                <td>Dosage Text</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Date and Time of Start of Drug</td>
                                <td>Date and Time of Last Administration</td>
                                <td>Route of Administration (free text)</td>
                                <td>Number of units in the interval</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Definition of the time interval init</td>
                                <td>Date and time of start of drug</td>
                                <td>Date and time of last Administration</td>
                                <td>Duration of drug Administration (number)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Duration of drug Administration (unit)</td>
                                <td>Batch /Lot Number</td>
                                <td>Dosage Text</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pharmaceutical dose form (free text)</td>
                                <td>Pharmaceutical dose form TermID Version date/Number</td>
                                <td>Pharmaceutical dose form TermID</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Route of Administration (free text)</td>
                                <td>Route of Administration termID version</td>
                                <td>Route of Administration termID</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Cummulative dose to first reaction (number)</td>
                                <td>Cummulative dose to first reaction (unit)</td>
                                 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Gestation period at the time of exposure (number)</td>
                                <td>Gestation period at the time of exposure (unit)</td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Indication for use in Case</td>
                                <td>Indication reported by the primary source</td>
                                <td>MedDRA version for Indication</td>
                                <td>Indication (MedDRA code)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Actions taken with the drug</td>
                                <td>Drug reaction(s)/event(s)</td>
                                <td>Reactions /Events Assessed</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Assessment of relatedness of drug</td>
                                <td>Source of Assessment</td>
                                <td>Method of Assessment</td>
                                <td>Results of Assessment</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>TI between beginning of drug Administration and start of reaction /event (number)</td>
                                <td>TI between beginning of drug Administration and start of reaction /event (unit)</td>
                               
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Time interval between last dose and start of reaction /event (number)</td>
                                <td>Time interval between last dose and start of reaction /event (unit)</td>
                               
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Did reaction recur on re-administration?</td>
                                
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Additional information on drug</td>
                                <td>Additional information on drug (free text)</td>
                            </tr>
                        </table>
                        <h5 style="background: #18C4D1; padding:20px;">Narrative case summary and further information</h5>
                   
                        <table class="table" style="width: 100%;">
                            <tr width="100%">
                                <td>Case narrative including clinical source, therapeutic measures, outcome and additional relevant information</td>
                               
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Reporter's Comments</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Sender's diagnosis</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>MedDRA version for sender's diagnosis/syndrome and / or reclassification of reaction /event</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Sender's diagnosis/syndrome and / or reclassification of reaction / Event (MedDRA code)</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Sender's Comments</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Case summary and reporter's comments in native language</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Case summary and reporter's comments text</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                            <tr>
                                <td>Case summary and reporter's comments language</td> 
                            </tr>
                            <tr>
                                <td></td> 
                            </tr>
                        </table>
                   
                    </div>
                </div>


                <!-- End of Updated UI -->



            </div> <!-- /art-sheet -->
        </div> <!-- /art-sheet -->
    </div>
</div>