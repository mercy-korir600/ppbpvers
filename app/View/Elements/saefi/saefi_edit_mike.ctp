<?php
$this->assign('AEFI', 'active');
$this->Html->script('jquery/combobox', array('inline' => false));
$this->Html->script('jquery/jquery.datetimepicker.full', array('inline' => false));
$this->Html->script('saefi', array('inline' => false));
$this->Html->css('jquery.datetimepicker', false, array('inline' => false));
$this->Html->script('jquery/jquery.datetimepicker.full', array('inline' => false));
?>

<?php
echo $this->Session->flash();
echo $this->Form->create('Saefi', array(
    'type' => 'file',
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label required'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'class' => '',
        'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
        'error' => array('attributes' => array('class' => 'controls help-block')),
    ),
));
?>
<div class="row-fluid">
    <div class="span10 formbacka">

        <?php
        echo $this->Form->input('id', array());
        // echo $this->Form->input('Aefi.report_type', array('type' => 'hidden'));
        echo $this->Form->input('Saefi.reference_no', array('type' => 'hidden'));
        ?>

        <div class="row-fluid">
            <div class="span2">
                <?php
                echo $this->Html->image('header-object.png', array('alt' => 'AEFI'));
                ?>
            </div>
            <div class="span8" style="text-align: center;">
                <h2>MINISTRY OF HEALTH</h2>
                <p class="lead">National Vaccines and Immunization Program</p>
                <h3>AEFI Investigation Form</h3>
                <p style="color: red;">(Only for Serious Adverse Events Following Immunization  Death / Disability /
                    Hospitalization / Cluster)</p>
            </div>
            <div class="span2">
                <?php
                echo $this->Html->image('vaccinate2.png', array('alt' => 'AEFI'));
                echo "<br>";
                echo $this->Html->image('confidence.png', array('alt' => 'AEFI'));
                ?>
            </div>
        </div><br>
        <div class="row-fluid">
            <div class="span8">
                <p class="controls" id="aefi_edit_tip"> <span class="label label-important">Tip:</span> Fields marked
                    with <span style="color:red;">*</span> are mandatory</p>
                <?php

                ?>
            </div>
            <div class="span4" id="aefi_edit_form_id">
                <h5> <?php echo  'Form ID: ' . $this->data['Saefi']['reference_no']; ?></h5>
                <h6><span class="label label-important">Important</span> Unique Form ID</h6>
            </div>
        </div>
        <!--/row-->
        <div class="row-fluid">
            <div class="span4">
                <?php
                echo $this->Form->input('province_id', array(
                    'class' => 'input-small',
                    'options' => $county,
                    'empty' => true,
                    'label' => array('class' => 'control-label required', 'text' => 'Province/State'),
                ));
                ?>
            </div>
            <div class="span4">
                <?php
                echo $this->Form->input('district', array(
                    'class' => 'input-small',
                    'label' => array('class' => 'control-label required', 'text' => 'District'),
                ));
                ?>
            </div>
        </div>
        <!--/row-->
        <hr class="darker">

        <div class="row-fluid">
            <div class="span12 editable">
                <?php
                echo $this->Form->input('place_vaccination', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'place_vaccination',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Place of vaccination: </label> </div>
											<div class="controls">  <input type="hidden" value="" id="place_vaccination_" name="data[Aefi][place_vaccination]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Govt. health facility' => 'Govt. health facility'),
                ));
                echo $this->Form->input('place_vaccination', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'place_vaccination',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label>
										<span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
										onclick="$(\'.place_vaccination,.place_vaccination_yes\').removeAttr(\'checked disabled\')">
										<em class="accordion-toggle">clear!</em></a> </span>
										</div> </div>',
                    'options' => array('Private health facility' => 'Private health facility'),
                ));
                ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 editable">
                <?php
                echo $this->Form->input('vaccination_in', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'vaccination_in',
                    'before' => '<div class="control-group ">   <label class="control-label required">
							Vaccination in:</label>  <div class="controls">
								<input type="hidden" value="" id="AefiSerious_" name="data[Aefi][vaccination_in]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Campaign' => 'Campaign'),
                ));
                echo $this->Form->input('vaccination_in', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'vaccination_in',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Routine' => 'Routine')
                ));
                echo $this->Form->input('vaccination_in', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccination_in',
                    'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label>
									<span class="help-inline" style="padding-top: 5px;"><a id="vaccination_clear" class="tooltipper" data-original-title="Clear selection"
									onclick="$(\'.vaccination_in\').removeAttr(\'checked disabled\')">
									<em class="accordion-toggle">clear!</em></a> </span>

									</div> </div>',
                    'options' => array('Other' => 'Other(Specify)'),
                ));

                echo $this->Form->input('vaccination_in_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                ?>
            </div>
        </div>
        <hr class="darker"> 
        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('reporter_name', array(
                    'label' => array('class' => 'control-label required', 'text' =>  'Name of Reporting Officer:'),
                ));
                echo $this->Form->input('designation_id', array(
                    'class' => 'input-small',
                    'options' => $designations,
                    'empty' => true,
                    'label' => array('class' => 'control-label required', 'text' => 'Designation/Position'),
                ));
                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                echo $this->Form->input('report_date', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of Investigation'),));
                echo $this->Form->input('start_date', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of filling this form'),));


                echo $this->Form->input('report_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'report_type',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">This report is:</label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="Aefireport_type_" name="data[Aefi][report_type]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('First' => 'First'),
                ));
                echo $this->Form->input('report_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'report_type',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Interim' => 'Interim'),
                ));
                echo $this->Form->input('report_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'report_type',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label> <label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.report_type, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
                                        <em class="accordion-toggle">clear!</em></a> </label>
                                        </div> </div>',
                    'options' => array('Final' => 'Final'),
                ));
                ?>
            </div>
            <!--/row-->
            <div class="row-fluid">
                <div class="span4">
                    <?php
                    echo $this->Form->input('telephone', array(
                        'class' => 'input-small',
                        'label' => array('class' => 'control-label required', 'text' => 'Telephone #landline(with code)'),
                    ));
                    ?>
                </div>
                <div class="span4">
                    <?php
                    echo $this->Form->input('mobile', array(
                        'class' => 'input-small',
                        'label' => array('class' => 'control-label required', 'text' => 'Mobile:'),
                    ));
                    ?>
                </div>
                <div class="span4">
                    <?php
                    echo $this->Form->input('reporter_email', array(
                        'class' => 'input-small',
                        'label' => array('class' => 'control-label required', 'text' => 'Email:'),
                    ));
                    ?>
                </div>
            </div>

            <!--/span-->
        </div>
        <hr class="darker">
        <h4 style="text-align: center;">PATIENT DETAILS</h4>
        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('patient_name', array(
                    'label' => array('class' => 'control-label required', 'text' =>  'Patient\'s Name <span style="color:red;">*</span>'),
                ));
                ?>
                <div class="well-mine" style="background-color: #e6e6dfcc;">
                    <?php
                    echo $this->Form->input('date_of_birth', array(
                        'type' => 'date',
                        'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(choose day)', 'month' => '(choose month)', 'year' => '(choose year)'),
                        'label' => array('class' => 'control-label required', 'text' => 'Date of Birth <span style="color:red;">*</span>'),
                        //'title'=> 'Year is mandatory. Pick first day of the month if unsure.',
                        'after' => ' <a style="font-weight:normal" onclick="$(\'.birthdate\').removeAttr(\'disabled\'); $(\'.birthdate\').val(\'\');
                                $(\'#AefiAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#AefiAgeGroup\').val(\'\');" >
                                <em class="accordion-toggle">clear!</em></a>
                                <p class="help-block">  If selected, year is mandatory. </p></div>',
                        'class' => 'tooltipper birthdate autosave-ignore ',
                    ));

                    ?>
                    <h5 class="controls">--OR Age at onset--</h5>
                    <?php
                    echo $this->Form->input('age_at_onset_years', array('label' => array('class' => 'control-label required', 'text' => 'Age in years'),));
                    echo $this->Form->input('age_at_onset_months', array('label' => array('class' => 'control-label required', 'text' => 'Age in months'),));
                    echo $this->Form->input('age_at_onset_days', array('label' => array('class' => 'control-label required', 'text' => 'Age in days'),));

                    ?>
                    <h5 class="controls">--OR Age group--</h5>
                    <?php
                    echo $this->Form->input('age_group', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'age_group',
                        'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Age Group</label> </div>
												<div class="controls">  <input type="hidden" value="" id="Aefiage_group_" name="data[Aefi][age_group]"> <label class="radio inline">',
                        'after' => '</label>',
                        'options' => array('< 1 year' => '< 1 year'),
                    ));
                    echo $this->Form->input('age_group', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'age_group',
                        'before' => '<label class="radio inline">', 'after' => '</label>',
                        'options' => array('1 - 5 years' => '1 - 5 years'),
                    ));
                    echo $this->Form->input('age_group', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'age_group',
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                        'before' => '<label class="radio inline">',
                        'after' => '</label> <label>
											<a class="tooltipper" data-original-title="Clears the checked value"
											onclick="$(\'.age_group, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
											<em class="accordion-toggle">clear!</em></a> </label>
											</div> </div>',
                        'options' => array('> 5 years' => '> 5 years'),
                    ));
                    ?>
                </div>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                echo $this->Form->input('gender', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Gender <span style="color:red;">*</span></label> </div>
												<div class="controls">  <input type="hidden" value="" id="AefiGender_" name="data[Aefi][gender]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Male' => 'Male'),
                ));
                echo $this->Form->input('gender', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Female' => 'Female'),
                ));
                echo $this->Form->input('gender', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label> <label>
											<a class="tooltipper" data-original-title="Clears the checked value"
											onclick="$(\'.gender, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
											<em class="accordion-toggle">clear!</em></a> </label>
											</div> </div>',
                    'options' => array('Unknown' => 'Unknown'),
                ));

                echo $this->Form->input('patient_address', array(
                    'label' => array('class' => 'control-label required', 'text' => 'Address '),
                ));

                echo $this->Form->input('patient_phone', array(
                    'label' => array('class' => 'control-label required', 'text' => 'Phone Number '),
                    'after' => '<p class="help-block">    (self or nearest contact) </p></div>'
                ));

                echo $this->Form->input('patient_street_name', array(
                    'label' => array('class' => 'control-label required', 'text' => 'Street name'),
                ));

                echo $this->Form->input('patient_house_number', array('label' => array('class' => 'control-label required', 'text' => 'House Number'),));
                ?>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <hr class="darker">
        <hr>
        <!--/row-->
        <?php echo $this->element('multi/saefi_list_of_vaccines'); ?>
        <!--/row-->
        <div class="row-fluid">
            <div class="span12 editable">
                <?php
                echo $this->Form->input('site_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'site_type',
                    'before' => '<div class="control-group ">   <label class="control-label required">
                        Type of site:</label>  <div class="controls">
                            <input type="hidden" value="" id="AefiSerious_" name="data[Aefi][site_type]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Fixed' => 'Fixed'),
                ));
                echo $this->Form->input('site_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'site_type',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Mobile' => 'Mobile')
                ));
                echo $this->Form->input('site_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'site_type',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Outreach' => 'Outreach')
                ));
                echo $this->Form->input('site_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious_yes',
                    'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a id="serious_yes_clear" class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.serious_yes\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                    'options' => array('Other' => 'Other(Specify)'),
                ));

                echo $this->Form->input('site_type_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('symptom_date', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of first/key symptom (DD/MM/YYYY):'),));
                echo $this->Form->input('hospitalization_date', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of hospitalization (DD/MM/YYYY):'),));
                echo $this->Form->input('date_first_reported', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date first reported to the health authority (DD/MM/YYYY):'),));

                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                // echo $this->Form->input('time_of_first_symptom', array(
                //     'label' => array('class' => 'control-label required', 'type' => 'time', 'text' =>  'Time of first symptom (hh/mm):'),
                // ));
                echo $this->Form->input('time_of_first_symptom', array(
                    'type' => 'time', 'timeFormat' => 24, 'interval' => 5, 'class' => 'span4', 'style' => 'display: inline;',
                    'label' => array('class' => 'control-label required', 'text' => 'Time of first symptom (hh/mm):'),
                ));
                echo $this->Form->input('date_form_filled', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of filling this form'),));


                echo $this->Form->input('status_on_date', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'status_on_date',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Status on the date of investigation (✓):</label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="status_on_date" name="status_on_date"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Died' => 'Died'),
                ));
                echo $this->Form->input('status_on_date', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_on_date',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Disabled' => 'Disabled'),
                ));
                echo $this->Form->input('status_on_date', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_on_date',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Recovering' => 'Recovering'),
                ));
                echo $this->Form->input('status_on_date', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_on_date',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Recovered completely' => 'Recovered completely'),
                ));
                echo $this->Form->input('status_on_date', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_on_date',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label> <label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.status_on_date, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
                                        <em class="accordion-toggle">clear!</em></a> </label>
                                        </div> </div>',
                    'options' => array('Unknown' => 'Unknown'),
                ));

                ?>
                <div class="span6">
                </div>
            </div>
            <!--/row-->

            <!--/span-->
        </div>
        <div class="span12" style="text-align: center; text-decoration: underline;">
            <h5>If died, please provide date and time of death</h5>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('died_date', array('type' => 'text', 'class' => 'span11 date-pick-field status_on', 'label' => array('class' => 'control-label required', 'text' => 'Date of death'),));
                echo $this->Form->input('autopsy_done', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'autopsy_done status_on',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Autopsy done? (✓): </label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="autopsy_done" name="autopsy_done"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Yes' => 'Yes'),
                ));
                echo $this->Form->input('autopsy_done_date', array('type' => 'text', 'class' => 'span11 date-pick-field status_on', 'label' => array('class' => 'control-label required', 'text' => '(date)'),));

                echo $this->Form->input('autopsy_done', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'autopsy_done status_on',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('No' => 'No'),
                ));
                echo $this->Form->input('autopsy_done', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'autopsy_done status_on',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Planned on' => 'Planned on'),
                ));
                echo $this->Form->input('autopsy_planned_date', array('type' => 'text', 'class' => 'span11 date-pick-field status_on', 'label' => array('class' => 'control-label required', 'text' => 'Date'),));

                echo $this->Form->input('autopsy_planned_date', array(
                    'type' => 'time', 'timeFormat' => 24, 'interval' => 5, 'class' => 'span4 status_on', 'style' => 'display: inline;',
                    'label' => array('class' => 'control-label required', 'text' => 'TIME'),
                ));
                echo $this->Form->input('autopsy_done', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'autopsy_done status_on',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label> <label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.autopsy_done, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
                                        <em class="accordion-toggle">clear!</em></a> </label>
                                        </div> </div>',
                    'options' => array('Unknown' => 'Unknown'),
                ));
                // echo $this->element('saefi/attachment', ['model' => 'Aefi', 'group' => 'attachment']);
                echo $this->element('multi/attachments', ['model' => 'Saefi', 'group' => 'attachment']);
                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                echo $this->Form->input('time_of_death', array(
                    'type' => 'time', 'timeFormat' => 24, 'interval' => 5, 'class' => 'span4 status_on', 'style' => 'display: inline;',
                    'label' => array('class' => 'control-label required', 'text' => 'Time of death'),
                ));

                ?>
                <div class="span6">
                </div>
            </div>
            <!--/span-->
        </div>

        <!--/row-->
        <hr class="darker">
        <div class="span11" style="text-align: center;">
            <h4 style="background-color: #0B6DA2; color: white; text-align: center;">Section B ----- Relevant patient information prior to immunization
            </h4>
        </div>
        <?php echo $this->element('saefi/relevant_patient_info'); ?>
        <div class="row-fluid">
            <h5 style="color: #0B6DA2;">For Infants:</h5>
            <div class="span12 editable">
                <?php
                echo $this->Form->input('infant', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'infant',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">The birth was: </label> </div>
                                    <div class="controls">  <input type="hidden" value="" id="infant_" name="data[Aefi][infant]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('full-term' => 'full-term'),
                ));
                echo $this->Form->input('infant', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'infant',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('pre-term' => 'pre-term'),
                ));
                echo $this->Form->input('infant', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'infant',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                                onclick="$(\'.infant,.infant_yes\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>
                                </div> </div>',
                    'options' => array('post-term' => 'post-term'),
                ));
                ?>
                <div class="span6">
                    <?php
                    echo $this->Form->input('birth_weight', array(
                        'label' => array('class' => 'control-label required', 'text' =>  'Birth Weight:'),
                    ));

                    ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 editable">
                    <?php
                    echo $this->Form->input('delivery_procedure', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                        'class' => 'delivery_procedure',
                        'before' => '<div class="control-group ">   <label class="control-label required">
					Delivery procedure was:</label>  <div class="controls">
                            <input type="hidden" value="" id="AefiSerious_" name="data[Aefi][delivery_procedure]"> <label class="radio inline">',
                        'after' => '</label>',
                        'options' => array('Normal' => 'Normal'),
                    ));
                    echo $this->Form->input('delivery_procedure', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                        'class' => 'delivery_procedure',
                        'before' => '<label class="radio inline">', 'after' => '</label>',
                        'options' => array('Caesarean' => 'Caesarean')
                    ));
                    echo $this->Form->input('delivery_procedure', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                        'class' => 'delivery_procedure',
                        'before' => '<label class="radio inline">', 'after' => '</label>',
                        'options' => array('Assisted(forceps, vaccum etc.)' => 'Assisted(forceps, vaccum etc.)')
                    ));
                    echo $this->Form->input('delivery_procedure', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious_yes',
                        'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                        'before' => '<label class="radio inline">',
                        'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a id="serious_yes_clear" class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.serious_yes\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                        'options' => array('with complications' => 'with complications(Specify)'),
                    ));

                    echo $this->Form->input('delivery_procedure_specify', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                    ?>
                </div>
            </div>
        </div>
        <!--/row-->
        <hr class="darker">
        <div class="span11" style="text-align: center;">
            <h4 style="background-color: #0B6DA2; color: white; text-align: center;">Section C ----- Details of first
                examination** of serious AEFI case
            </h4>
        </div>
        <div class="row-fluid">

            <div class="span4">
                <div style="padding-left: 30px;">
                    <div>
                        <h5>Source of information (✓ all that apply):
                        </h5>
                    </div>
                    <!-- <p class="help-block"> (please tick) </p> -->
                    <?php
                    echo $this->Form->input('source_examination', array(
                        'type' => 'checkbox',   'before' => '<div class="control-group">',
                        'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                        'between' => '<input type="hidden" value="0" id="Aefiexamination_by_investigator_" name="data[Aefi][examination_by_investigator]">
                                                                    <label class="checkbox">',
                        'after' => 'Examination by the investigator </label>',
                    ));
                    echo $this->Form->input('source_documents', array(
                        'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                        'between' => '<input type="hidden" value="0" id="Aefidocuments_" name="data[Aefi][documents]">
                                                                    <label class="checkbox">',
                        'after' => 'Documents  </label>',
                    ));
                    echo $this->Form->input('source_verbal', array(
                        'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                        'between' => '<input type="hidden" value="0" id="Aefiverbal_autopsy_" name="data[Aefi][verbal_autopsy]">
                                                                    <label class="checkbox">',
                        'after' => 'Verbal autopsy </label>',
                    ));
                    echo $this->Form->input('source_other', array(
                        'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                        'between' => '<input type="hidden" value="0" id="AefiComlaintOther_" name="data[Aefi][complaint_other]">
                                                                    <label class="checkbox">',
                        // 'onclick' => '$("#AefiComplaintOtherSpecify").removeAttr("disabled")',
                        'after' => 'Other   </label>',
                    ));
                    echo $this->Form->input('source', array('type' => 'hidden', 'value' => ''));
                    echo $this->Form->error('Saefi.source', array('wrap' => 'span', 'class' => 'control-group required error'));
                    echo $this->Form->input('source_other_specify', array(
                        'class' => 'span6',  'rows' => '3', 'label' => false, 'between' => false,
                        'after' => '<p class="help-block">  </p></div>',
                        'disabled' => true, 'placeholder' => 'If other, specify',
                    ));

                    ?>
                </div>
                <!--/padding-->
            </div>
            <!--/span-->
            <div class="span4">
                <div style="padding-left: 10px;">
                    <?php
                    echo $this->Form->input('verbal_source', array(
                        'rows' => '3',
                        'label' => array('class' => 'required', 'text' => 'If from verbal autopsy, please mention source'),
                        'between' => false, 'div' => false,
                        'title' => 'source_of_autopsy', 'data-content' => 'source_of_autopsy',
                        'after' => '<p class="help-block">  </p>',
                        'class' => 'span8',

                    ));
                    ?>
                </div>
            </div>
            <hr class="darker">
            <div class="row-fluid">
                <div class="span9">
                    <?php
                    echo $this->Form->input('name_of_person_first_treated', array(
                        'label' => array('class' => 'control-label required', 'text' =>  'Name of the person who first examined/treated the patient:'),
                    ));
                    echo $this->Form->input('name_of_the_person_treating', array('label' => array('class' => 'control-label required', 'text' => 'Name of other persons treating the patient:'),));
                    echo $this->Form->input('other_source_of_info', array('label' => array('class' => 'control-label required', 'text' => 'Other sources who provided information (specify):'),));
                    ?>
                </div>
            </div>
            <hr class="darker">
            <div class="row-fluid">
                <div class="span12">
                    <?php
                    echo $this->Form->input('signs_symptoms', array(
                        'class' => 'span9',  'rows' => '3',
                        'label' => array('class' => 'control-label required', 'text' => 'Signs and symptoms in chronological order from the time of vaccination:
                    '),
                        //'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
                    ));
                    ?>
                </div>
                <hr class="darker">
                <?php echo $this->element('saefi/contact_info'); ?>
                <hr class="darker">
            </div>
        </div>

        <!--/row-->
        <div class="row-fluid">
            <div>
                <p> **Instructions – Attach copies of ALL available documents (including case sheet, discharge summary,
                    case
                    notes,
                    laboratory reports and autopsy reports) and then complete additional information NOT AVAILABLE in
                    existing
                    documents, i.e.<br>
                    • If patient has received medical care  attach copies of all available documents (including case
                    sheet,
                    discharge
                    summary, laboratory reports and autopsy reports, if available) and write only the information that
                    is
                    not available in the
                    attached documents below<br>
                    • If patient has not received medical care – obtain history, examine the patient and write down your
                    findings below (add
                    additional sheets if necessary)</p>
            </div>
            <?php
            // echo $this->element('saefi/available_documents', ['model' => 'Aefi', 'group' => 'attachment']); 
            echo $this->element('multi/attachments', ['model' => 'Saefi', 'group' => 'attachment']);
            ?>
            <hr class="darker">
            <div class="span11" style="text-align: center;">
                <h4 style="background-color: #0B6DA2; color: white; text-align: center;">Section D ----- Details of
                    vaccines
                    provided at the site linked to AEFI on the corresponding day
                </h4>
            </div>
            <?php echo $this->element('saefi/details_of_vaccines'); ?>
            <?php echo $this->element('saefi/more_info'); ?>
            <div class="span11" style="text-align: center;">
                <h5>
                    It is compulsory for you to provide explanations for these answers separately
                </h5>
            </div>
            <hr class="darker">

            <div class="span11" style="background-color: #0B6DA2; text-align: center;">
                <h4 style="color: white;">Section E --- Immunization practices at the place(s) where
                    concerned vaccine was used</h4>
                <p style="color: white;">(Complete this section by asking and/or observing practice)</p>
            </div>
        </div>
        <!--/row-->
        <div class="row-fluid">

            <div class="span12 editable">
                <hr class="darker">
                <h5>Syringes and needles used: </h5>
                <hr class="darker">
                <div class="span6">
                    <?php
                    echo $this->Form->input('syringes_used', array(
                        'label' => array('class' => 'control-label required', 'text' =>  'Are AD syringes used for immunization?', 'placeholder' => 'yes/no/unknown'),
                    ));
                    ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 editable">
                    <?php
                    echo $this->Form->input('syringes_used_specify', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                        'class' => 'syringes_used_specify',
                        'before' => '<div class="control-group ">   <label class="control-label required">
							If no, specify the type of syringes used:</label>  <div class="controls">
									<input type="hidden" value="" id="AefiSerious_" name="data[Aefi][syringes_used_specify]"> <label class="radio inline">',
                        'after' => '</label>',
                        'options' => array('Glass' => 'Glass'),
                    ));
                    echo $this->Form->input('syringes_used_specify', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                        'class' => 'syringes_used_specify',
                        'before' => '<label class="radio inline">', 'after' => '</label>',
                        'options' => array('Disposable' => 'Disposable')
                    ));
                    echo $this->Form->input('syringes_used_specify', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                        'class' => 'syringes_used_specify',
                        'before' => '<label class="radio inline">', 'after' => '</label>',
                        'options' => array('Recycled disposable' => 'Recycled disposable')
                    ));
                    echo $this->Form->input('syringes_used_other', array(
                        'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious_yes',
                        'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                        'before' => '<label class="radio inline">',
                        'after' => '</label>
										<span class="help-inline" style="padding-top: 5px;"><a id="serious_yes_clear" class="tooltipper" data-original-title="Clear selection"
										onclick="$(\'.serious_yes\').removeAttr(\'checked disabled\')">
										<em class="accordion-toggle">clear!</em></a> </span>

										</div> </div>',
                        'options' => array('Other' => 'Other(Specify)'),
                    ));

                    echo $this->Form->input('syringes_used_other_specify', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                    ?>
                </div>
            </div>
            <div class="span4">
                <div>
                    <?php
                    echo $this->Form->input('syringes_used_findings', array(
                        'rows' => '3',
                        'label' => array('class' => 'required', 'text' => 'Specific key findings/additional observations and comments:'),
                        'between' => false, 'div' => false,
                        'title' => 'syringes_used_findings', 'data-content' => 'syringes_used_findings',
                        'after' => '<p class="help-block">  </p>',
                        'class' => 'span8',

                    ));
                    ?>
                </div>
            </div>
            <div class="span11 editable">
                <hr class="darker">
                <h5>Reconstitution: (complete only if applicable, ✓ NA if not applicable) </h5>
                <hr class="darker">
                <?php echo $this->element('saefi/syringe_reconstitution'); ?>
                <div class="span12">
                    <?php
                    echo $this->Form->input('reconstitution_observations', array(
                        'class' => 'span9',  'rows' => '3',
                        'label' => array('class' => 'control-label required', 'text' => 'Specific key findings/additional observations and comments:
                    '),
                        //'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
                    ));
                    ?>
                </div>
                <hr class="darker">
                <h5>Injection technique in vaccinator(s): (Observe another session in the same locality – same or different place)
                </h5>
                <hr class="darker">
                <?php echo $this->element('saefi/injection_technique'); ?>
                <div class="span12">
                    <?php
                    echo $this->Form->input('injection_observations', array(
                        'class' => 'span9',  'rows' => '3',
                        'label' => array('class' => 'control-label required', 'text' => 'Specific key findings/additional observations and comments:
                    '),
                        //'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
                    ));
                    ?>
                </div>
                <hr class="darker">

                <div class="span11" style="background-color: #0B6DA2; text-align: center;">
                    <h4 style="color: white;">Section F --- Cold chain and transport</h4>
                    <p style="color: white;">(Complete this section by asking and/or observing practice)</p>
                </div>
                <?php echo $this->element('saefi/cold_chain_transport'); ?>
                <div class="span12">
                    <?php
                    echo $this->Form->input('additional_observations', array(
                        'class' => 'span9',  'rows' => '3',
                        'label' => array('class' => 'control-label required', 'text' => 'Specific key findings/additional observations and comments:
                    '),
                        //'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
                    ));
                    ?>
                </div>
                <?php echo $this->element('saefi/vaccine_transportation'); ?>
                <div class="span12">
                    <?php
                    echo $this->Form->input('transport_findings', array(
                        'class' => 'span9',  'rows' => '3',
                        'label' => array('class' => 'control-label required', 'text' => 'Specific key findings/additional observations and comments:
                    '),
                        //'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
                    ));
                    ?>
                </div>
            </div>
            <div class="span11" style="background-color: #0B6DA2; text-align: center;">
                <h4 style="color: white;">Section G --- Community investigation (Please visit locality and interview parents/others)</h4>
            </div>
        </div>
        <!--/row-->
        <div class="row-fluid">
            <p style="text-indent: 5em;">Were any similar events reported within a time period similar to when the adverse event occurred and in the same locality? </p>
            <div style="margin-left: 5rem;">
                <?php
                echo $this->Form->input('similar_events', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'similar_events',
                    'before' => ' <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Yes' => 'Yes'),
                ));
                echo $this->Form->input('similar_events', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'similar_events',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('No' => 'No'),
                ));
                echo $this->Form->input('similar_events', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'similar_events',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Unknown' => 'Unknown'),
                ));
                ?>
            </div>
            <div class="span6">
                <?php
                echo $this->Form->input('similar_events_describe', array(
                    'label' => array('class' => 'control-label required', 'rows' => 2, 'text' =>  'If yes, describe:'),
                ));
                ?>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                    echo $this->Form->input('similar_events_episodes', array(
                        'label' => array('class' => 'control-label required', 'text' =>  'If yes, how many events/episodes?'),
                    ));
                    ?>
                </div>
            </div>
            <hr class="darker">

        </div>
        <!--/row-->
        <div class="row-fluid">
            <p style="text-indent: 5em;">Of those effected, how many are: </p>
            <div class="span6">
                <?php
                echo $this->Form->input('affected_vaccinated', array(
                    'label' => array('class' => 'control-label required', 'text' =>  '• Vaccinated:'),
                ));
                ?>
            </div>
            <div class="span6">
                <?php
                echo $this->Form->input('affected_not_vaccinated', array(
                    'label' => array('class' => 'control-label required', 'text' =>  '• Not vaccinated:'),
                ));
                ?>
            </div>
            <div class="span6">
                <?php
                echo $this->Form->input('affected_unknown', array(
                    'label' => array('class' => 'control-label required', 'text' =>  '• Unknown:'),
                ));
                ?>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                    echo $this->Form->input('community_comments', array(
                        'class' => 'span9',  'rows' => '3',
                        'label' => array('class' => 'control-label required', 'text' => 'Other comments:
                    '),
                        //'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
                    ));
                    ?>
                </div>
            </div>
            <hr class="darker">
            <div class="span11" style="background-color: #0B6DA2; text-align: center;">
                <h4 style="color: white;">Section H --- Other findings/observations/comments</h4>
            </div>
        </div>
        <hr class="darker">
        <!--/row-->
        <div class="row-fluid">
            <div class="span12">
                <?php
                echo $this->Form->input('relevant_findings', array(
                    'class' => 'span9',  'rows' => '3',
                    'label' => array(
                        'class' => 'control-label required', 'text' => ' '
                    ),
                    //'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
                ));
                ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('reporter_name', array(
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Name of Person Reporting <span style="color:red;">*</span>'),
                ));
                echo $this->Form->input('reporter_email', array(
                    'type' => 'email',
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>')
                ));

                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                echo $this->Form->input(
                    'designation_id',
                    array('label' => array('class' => 'control-label required', 'text' => 'DESIGNATION' . ' <span style="color:red;">*</span>'), 'empty' => true)
                );
                echo $this->Form->input('reporter_phone', array(
                    'div' => array('class' => 'control-group'),
                    'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.' . ' <span style="color:red;">*</span>')
                ));


                echo $this->Form->input('reporter_date', array(
                    'type' => 'text', 'class' => 'date-pick-field',
                    'label' => array('class' => 'control-label required', 'text' => 'Date <span style="color:red;">*</span>'),
                ));
                ?>
            </div>
            <!--/span-->
        </div>
        <!--/row-->

        <table class="table table-bordered  table-condensed table-pvborderless">
            <tbody>
                <tr>
                    <td width="45%">
                        <h5 class="pull-right text-success">Is the person submitting different from reporter?&nbsp;</h5>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('person_submitting', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'person-submit',
                            'before' => '<div class="form-inline">
                                                <input type="hidden" value="" id="AefiPersonSubmitting_" name="data[Aefi][person_submitting]">
                                                <label class="radio">',
                            'after' => '</label>&nbsp;&nbsp;',
                            'options' => array('Yes' => 'Yes'),
                        ));
                        echo $this->Form->input('person_submitting', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'person-submit',
                            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                            'before' => '<label class="radio">', 'after' => '</label> </div>',
                            'options' => array('No' => 'No'),
                        ));
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('reporter_name_diff', array(
                    'div' => array('class' => 'control-group required'), 'class' => 'diff',
                    'label' => array('class' => 'control-label required', 'text' => 'Name <span style="color:red;">*</span>'),
                ));
                echo $this->Form->input('reporter_email_diff', array(
                    'type' => 'email',
                    'div' => array('class' => 'control-group required'), 'class' => 'diff',
                    'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>')
                ));
                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                echo $this->Form->input('reporter_designation_diff', array(
                    'type' => 'select', 'options' => $designations, 'empty' => true, 'class' => 'diff',
                    'label' => array('class' => 'control-label required', 'text' => 'Designation' . ' <span style="color:red;">*</span>'), 'empty' => true
                ));
                echo $this->Form->input('reporter_phone_diff', array(
                    'div' => array('class' => 'control-group'), 'class' => 'diff',
                    'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
                ));
                echo $this->Form->input('reporter_date_diff', array(
                    'type' => 'text', 'class' => 'date-pick-field diff',
                    'label' => array('class' => 'control-label required', 'text' => 'Date'),
                ));
                ?>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <!--/row-->

    </div>
    <div class="span2">
        <div class="my-sidebar" data-spy="affix">
            <div class="awell">
                <?php
                echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(
                    'name' => 'saveChanges',
                    'class' => 'btn btn-success mapop',
                    'formnovalidate' => 'formnovalidate',
                    'id' => 'AefiSaveChanges', 'title' => 'Save & continue editing',
                    'data-content' => 'Save changes to form without submitting it.
                                                      The form will still be available for further editing.',
                    'div' => false,
                ));
                ?>
                <br>
                <hr>
                <?php
                echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit', array(
                    'name' => 'submitReport',
                    'onclick' => "return confirm('Are you sure you wish to submit the report?');",
                    'class' => 'btn btn-primary btn-block mapop',
                    'id' => 'SiteInspectionSubmitReport', 'title' => 'Save and Submit Report',
                    'data-content' => 'Submit report for peer review and approval.',
                    'div' => false,
                ));

                ?>
                <br>
                <hr>
                <?php
                echo $this->Html->link(
                    '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF',
                    array('action' => 'view', 'ext' => 'pdf', $this->request->data['Saefi']['id']),
                    array(
                        'escape' => false, 'class' => 'btn btn-info btn-block mapop', 'title' => 'Download PDF',
                        'data-content' => 'Download the pdf version of the report',
                    )
                );
                ?>
                <br>
                <hr>
                <?php
                echo $this->Html->link(
                    '<i class="fa fa-times" aria-hidden="true"></i> Cancel',
                    array('controller' => 'users', 'action' => 'dashboard'),
                    array('escape' => false, 'class' => 'btn btn-danger btn-block')
                );

                ?>
            </div>
        </div>
    </div>
</div>
<?php
echo $this->Form->end();
?>