<?php
$this->assign('AEFI', 'active');
$this->Html->script('jquery/combobox', array('inline' => false));
// $this->Html->script('jquery/jquery.datetimepicker.full', array('inline' => false));
$this->Html->script('aefi', array('inline' => false));
// $this->Html->css('jquery.datetimepicker', false, array('inline' => false));
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
        // echo $this->Form->input('Saefi.report_type', array('type' => 'hidden'));
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
                <h3 style="background-color: #0B6DA2; color: white;">AEFI Investigation Form</h3>
            </div>
            <div class="span2">
                <?php
                echo $this->Html->image('vaccinate2.png', array('alt' => 'AEFI'));
                echo "<br>";
                echo $this->Html->image('confidence.png', array('alt' => 'AEFI'));
                ?>
            </div>
            <div class="span12" style="text-align: center;">
                <h5 style="color: red;">(Only for Serious Adverse Events Following Immunization  Death / Disability /
                    Hospitalization / Cluster)
                </h5>
            </div>

        </div>
        <hr class="darker">
        <div class="span12" style="text-align: center;">
            <h5>Basic details</h5>
        </div>
        <hr class="darker">
        <div class="row-fluid">
            <div class="span4">
                <?php
                        echo $this->Form->input('province_id', array(
                            'class' => 'input-small',
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
            <div class="span4" id="aefi_edit_form_id">
                <h5> <?php echo  'Case ID: ' ?></h5>
            </div>
        </div>
        <!--/row-->
        <hr class="darker">
        <hr class="darker">

        <div class="row-fluid">
            <div class="span12 editable">
                <?php
        echo $this->Form->input('place_of_vaccination', array(
            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'place_of_vaccination',
            'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Place of vaccination: </label> </div>
                                 <div class="controls">  <input type="hidden" value="" id="place_of_vaccination_" name="data[Aefi][place_of_vaccination]"> <label class="radio inline">',
            'after' => '</label>',
            'options' => array('Govt. health facility' => 'Govt. health facility'),
        ));
        echo $this->Form->input('place_of_vaccination', array(
            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'place_of_vaccination',
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
            'before' => '<label class="radio inline">',
            'after' => '</label>
                             <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                             onclick="$(\'.place_of_vaccination,.place_of_vaccination_yes\').removeAttr(\'checked disabled\')">
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
					echo $this->Form->input('vaccination', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
						'class' => 'vaccination',
						'before' => '<div class="control-group ">   <label class="control-label required">
							Vaccination in:</label>  <div class="controls">
								<input type="hidden" value="" id="AefiSerious_" name="data[Aefi][vaccination]"> <label class="radio inline">',
						'after' => '</label>',
						'options' => array('Campaign' => 'Campaign'),
					));
					echo $this->Form->input('vaccination', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
						'class' => 'vaccination',
						'before' => '<label class="radio inline">', 'after' => '</label>',
						'options' => array('Routine' => 'Routine')
					));
					echo $this->Form->input('vaccination', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccination',
						'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
						'before' => '<label class="radio inline">',
						'after' => '</label>
									<span class="help-inline" style="padding-top: 5px;"><a id="vaccination_clear" class="tooltipper" data-original-title="Clear selection"
									onclick="$(\'.vaccination\').removeAttr(\'checked disabled\')">
									<em class="accordion-toggle">clear!</em></a> </span>

									</div> </div>',
						'options' => array('Other' => 'Other(Specify)'),
					));

					echo $this->Form->input('serious_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
					?>
            </div>
        </div>
        <hr class="darker">
        <div class="row-fluid">
            <div class="span8">
                <?php
                echo $this->Form->input('address_of_institution', array(
                    'label' => array('class' => 'control-label required', 'text' => 'Address of vaccination site: '),
                    // 'after'=>'<p class="help-block" </p></div>',
                    'class' => 'span9',
                ));
                ?>
            </div>
        </div>
        <!--/row-->
        <hr class="darker">

        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('patient_name', array(
                    'label' => array('class' => 'control-label required', 'text' =>  'Name of Reporting Officer:'),
                ));
                echo $this->Form->input('designation', array('label' => array('class' => 'control-label required', 'text' => 'Designation/Position'),));
                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                echo $this->Form->input('date_of_investigation', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of Investigation'),));
                echo $this->Form->input('date_of_filling_form', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of filling this form'),));


                echo $this->Form->input('gender', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">This report is:</label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="AefiGender_" name="data[Aefi][gender]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('First' => 'First'),
                ));
                echo $this->Form->input('gender', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Interim' => 'Interim'),
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
                        echo $this->Form->input('email', array(
                            'class' => 'input-small',
                            'label' => array('class' => 'control-label required', 'text' => 'Email:'),
                        ));
                    ?>
                </div>
            </div>

            <!--/span-->
        </div>
        <!--/row-->
        <hr class="darker">

        <!---####---->

        <!--/row-->
        <hr class="darker">

        <hr>

        <?php
		//echo $this->element('saefi/list_of_vaccines'); ?>
        <div class="row-fluid">
            <div class="span12 editable">
                <?php
                echo $this->Form->input('type_of_site', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'type_of_site',
                    'before' => '<div class="control-group ">   <label class="control-label required">
                        Type of site:</label>  <div class="controls">
                            <input type="hidden" value="" id="AefiSerious_" name="data[Aefi][type_of_site]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Fixed' => 'Fixed'),
                ));
                echo $this->Form->input('type_of_site', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'type_of_site',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Mobile' => 'Mobile')
                ));
                echo $this->Form->input('type_of_site', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'type_of_site',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Outreach' => 'Outreach')
                ));
                echo $this->Form->input('type_of_site', array(
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

                echo $this->Form->input('type_of_site_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('date_of_first_symptom', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of first/key symptom (DD/MM/YYYY):'),));
                echo $this->Form->input('date_of_hospitilization', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of hospitalization (DD/MM/YYYY):'),));
                echo $this->Form->input('date_first_reported', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date first reported to the health authority (DD/MM/YYYY):'),));

                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                echo $this->Form->input('time_of_first_symptom', array(
                    'label' => array('class' => 'control-label required', 'type'=>'time', 'text' =>  'Time of first symptom (hh/mm):'),
                ));
                echo $this->Form->input('date_form_filled', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of filling this form'),));


                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'status_of_date_of_investigation',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Status on the date of investigation (✓):</label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="status_of_date_of_investigation" name="status_of_date_of_investigation"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Died' => 'Died'),
                ));
                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_of_date_of_investigation',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Disabled' => 'Disabled'),
                ));
                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_of_date_of_investigation',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Recovering' => 'Recovering'),
                ));
                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_of_date_of_investigation',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Recovered completely' => 'Recovered completely'),
                ));
                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_of_date_of_investigation',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label> <label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.status_of_date_of_investigation, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
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

        <!------#----->
        <div class="span12" style="text-align: center; text-decoration: underline;">
            <h5>If died, please provide date and time of death</h5>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php
                echo $this->Form->input('date_of_death', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date of death'),));
                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'status_of_date_of_investigation',
                    'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Autopsy done? (✓): </label> </div>
                                            <div class="controls">  <input type="hidden" value="" id="status_of_date_of_investigation" name="status_of_date_of_investigation"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Yes' => 'Yes'),
                ));
                echo $this->Form->input('date_autopsy_done', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => '(date)'),));
                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_of_date_of_investigation',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('No' => 'No'),
                ));
                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_of_date_of_investigation',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Planned on' => 'Planned on'),
                ));
                echo $this->Form->input('date_autopsy_planned', array('type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array('class' => 'control-label required', 'text' => 'Date'),));
                echo $this->Form->input('time_autopsy_planned', array(
                    'type' => 'time', 'timeFormat' => 24, 'interval' => 5, 'class' => 'span4', 'style' => 'display: inline;',
                    'label' => array('class' => 'control-label required', 'text' => 'TIME'),
                ));
                echo $this->Form->input('status_of_date_of_investigation', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_of_date_of_investigation',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio inline">',
                    'after' => '</label> <label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.status_of_date_of_investigation, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
                                        <em class="accordion-toggle">clear!</em></a> </label>
                                        </div> </div>',
                    'options' => array('Unknown' => 'Unknown'),
                ));
                //echo $this->element('saefi/attachment', ['model' => 'Aefi', 'group' => 'attachment']);
                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <?php
                echo $this->Form->input('time_of_death', array(
                    'type' => 'time', 'timeFormat' => 24, 'interval' => 5, 'class' => 'span4', 'style' => 'display: inline;',
                    'label' => array('class' => 'control-label required', 'text' => 'Time of death'),
                ));

                ?>
                <div class="span6">
                </div>
            </div>
            <!--/row-->

            <!--/span-->
        </div>
        <!--/row-->
        <hr class="darker">
        <div class="span11" style="text-align: center;">
            <h4 style="background-color: #0B6DA2; color: white; text-align: center;">Section B ----- Relevant patient
                information prior to immunization
            </h4>
        </div>
        <?php
		//echo $this->element('saefi/relevant_patient_info'); ?>
        <hr>

        <!-------####-------->
        <div class="row-fluid">
            <h5 style="color: #0B6DA2;">For Infants:</h5>
            <div class="span12 editable">
                <?php
            echo $this->Form->input('for_infants', array(
                'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'for_infants',
                'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">The birth was: </label> </div>
                                    <div class="controls">  <input type="hidden" value="" id="for_infants_" name="data[Aefi][for_infants]"> <label class="radio inline">',
                'after' => '</label>',
                'options' => array('full-term' => 'full-term'),
            ));
            echo $this->Form->input('for_infants', array(
                'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'for_infants',
                'before' => '<label class="radio inline">', 'after' => '</label>',
                'options' => array('pre-term' => 'pre-term'),
            ));
            echo $this->Form->input('for_infants', array(
                'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'for_infants',
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                'before' => '<label class="radio inline">',
                'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                                onclick="$(\'.for_infants,.for_infants_yes\').removeAttr(\'checked disabled\')">
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
                        Type of site:</label>  <div class="controls">
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

                echo $this->Form->input('delivery_procedure_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                ?>
                </div>
            </div>
        </div>
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
                    echo $this->Form->input('examination_by_investigator', array(
                        'type' => 'checkbox',   'before' => '<div class="control-group">',
                        'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                        'between' => '<input type="hidden" value="0" id="Aefiexamination_by_investigator_" name="data[Aefi][examination_by_investigator]">
                                                                    <label class="checkbox">',
                        'after' => 'Examination by the investigator </label>',
                    ));
                    echo $this->Form->input('documents', array(
                        'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                        'between' => '<input type="hidden" value="0" id="Aefidocuments_" name="data[Aefi][documents]">
                                                                    <label class="checkbox">',
                        'after' => 'Documents  </label>',
                    ));
                    echo $this->Form->input('verbal_autopsy', array(
                        'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                        'between' => '<input type="hidden" value="0" id="Aefiverbal_autopsy_" name="data[Aefi][verbal_autopsy]">
                                                                    <label class="checkbox">',
                        'after' => 'Verbal autopsy </label>',
                    ));
                    echo $this->Form->input('complaint_other', array(
                        'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                        'between' => '<input type="hidden" value="0" id="AefiComlaintOther_" name="data[Aefi][complaint_other]">
                                                                    <label class="checkbox">',
                        // 'onclick' => '$("#AefiComplaintOtherSpecify").removeAttr("disabled")',
                        'after' => 'Other   </label>',
                    ));
                    echo $this->Form->input('complaint', array('type' => 'hidden', 'value' => ''));
                    echo $this->Form->error('Aefi.complaint', array('wrap' => 'span', 'class' => 'control-group required error'));
                    echo $this->Form->input('complaint_other_specify', array(
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
                    echo $this->Form->input('source_of_autopsy', array(
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
        </div>
        <!-------##-------->
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
        <!--/row-->
        <hr>
        <hr class="darker">
        <div class="row-fluid">
            <div class="span12">
                <?php
                echo $this->Form->input('signs_of_chronological', array(
                    'class' => 'span9',  'rows' => '3',
                    'label' => array('class' => 'control-label required', 'text' => 'Signs and symptoms in chronological order from the time of vaccination:
                    '),
                    //'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
                ));
                ?>
            </div>
            <hr class="darker">
            <?php
			//echo $this->element('saefi/contact_info'); ?>
            <hr class="darker">
            <!--/span-->
        </div>
        <!--/row-->
        <div>
            <p> **Instructions – Attach copies of ALL available documents (including case sheet, discharge summary, case
                notes,
                laboratory reports and autopsy reports) and then complete additional information NOT AVAILABLE in
                existing
                documents, i.e.<br>
                • If patient has received medical care  attach copies of all available documents (including case sheet,
                discharge
                summary, laboratory reports and autopsy reports, if available) and write only the information that is
                not available in the
                attached documents below<br>
                • If patient has not received medical care – obtain history, examine the patient and write down your
                findings below (add
                additional sheets if necessary)</p>
        </div>
        <?php
		//echo $this->element('saefi/available_documents', ['model' => 'Aefi', 'group' => 'attachment']); ?>
        <hr class="darker">
        <div class="span11" style="text-align: center;">
            <h4 style="background-color: #0B6DA2; color: white; text-align: center;">Section D ----- Details of vaccines
                provided at the site linked to AEFI on the corresponding day
            </h4>
        </div>
        <?php
		//echo $this->element('saefi/details_of_vaccines'); ?>
        <?php
		//echo $this->element('saefi/more_info'); ?>
        <div class="span11" style="text-align: center;">
            <h5>
                It is compulsory for you to provide explanations for these answers separately
            </h5>
        </div>
        <hr class="darker">
        <div class="span11" style="background-color: #0B6DA2; text-align: center;">
            <h4 style="color: white; text-align: center;">Section E --- Immunization practices at the place(s) where
                concerned vaccine was used</h4>
            <p style="color: white; text-align: center;">(Complete this section by asking and/or observing practice)</p>
        </div>

        <!-------##-------->
        <div class="row-fluid">

            <div class="span12 editable">
                <hr class="darker">
                <h5>Syringes and needles used: </h5>
                <hr class="darker">
                <div class="span6">
                    <?php
                echo $this->Form->input('syringes', array(
                    'label' => array('class' => 'control-label required', 'text' =>  'Are AD syringes used for immunization?', 'placeholder'=>'yes/no/unknown'),
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
                    If no, specify the type of syringes used:</label>  <div class="controls">
                            <input type="hidden" value="" id="AefiSerious_" name="data[Aefi][delivery_procedure]"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('Glass' => 'Glass'),
                ));
                echo $this->Form->input('delivery_procedure', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'delivery_procedure',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Disposable' => 'Disposable')
                ));
                echo $this->Form->input('delivery_procedure', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                    'class' => 'delivery_procedure',
                    'before' => '<label class="radio inline">', 'after' => '</label>',
                    'options' => array('Recycled disposable' => 'Recycled disposable')
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
                    'options' => array('Other' => 'Other(Specify)'),
                ));

                echo $this->Form->input('delivery_procedure_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
                ?>
                </div>
            </div>
            <div class="span4">
                <div>
                    <?php
                    echo $this->Form->input('source_of_autopsy', array(
                        'rows' => '3',
                        'label' => array('class' => 'required', 'text' => 'Specific key findings/additional observations and comments:'),
                        'between' => false, 'div' => false,
                        'title' => 'source_of_autopsy', 'data-content' => 'source_of_autopsy',
                        'after' => '<p class="help-block">  </p>',
                        'class' => 'span8',

                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6">
                <h5 style="text-align: center;">Action Taken:</h5>
                <?php
                echo $this->Form->input('treatment_given', array(
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Treatment given'),
                    'after' => '<p class="help-block"> (specify) </p></div>'
                ));
                echo $this->Form->input('specimen_collected', array(
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Specimen collected'),
                    'after' => '<p class="help-block"> Specimen collected for investigation (specify type(s) of specimen) </p></div>'
                ));

                ?>
            </div>
            <!--/span-->
            <div class="span6">
                <div class="required"><label class="required"><strong>AEFI Outcome:</strong><span
                            style="color:red;">*</span></label></div> <br />
                <!-- <h5>OUTCOME:</h5>  <br> -->
                <?php
                //Recovered/Resolved, Recovering/Resolving, Not recovered/Not resolved/Ongoing, Recovered/Resolved with sequelae, Fatal, unknown
                echo $this->Form->input('outcome', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<div class="control-group editable"> <input type="hidden" value="" id="AefiOutcome_" name="data[Aefi][outcome]"> <label class="radio">',
                    'after' => '</label>',
                    'options' => array('Recovered/Resolved' => 'Recovered/Resolved'),
                ));
                echo $this->Form->input('outcome', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Recovering/Resolving' => 'Recovering/Resolving'),
                ));
                echo $this->Form->input('outcome', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Not recovered/Not resolved/Ongoing' => 'Not recovered/Not resolved/Ongoing'),
                ));
                echo $this->Form->input('outcome', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Recovered/Resolved with sequelae' => 'Recovered/Resolved with sequelae'),
                ));
                echo $this->Form->input('outcome', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Fatal' => 'Fatal'),
                ));
                echo $this->Form->input('outcome', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'outcome',
                    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                    'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                    'before' => '<label class="radio">',
                    'after' => '</label>
                                <a class="button"
                                        onclick="$(\'.outcome\').removeAttr(\'checked\');" >
                                        <em class="accordion-toggle">clear!</em></a>
                            </div>',
                    'options' => array('Unknown' => 'Unknown'),
                ));
                ?>
            </div>
            <!--/span-->
        </div>
        <!--/row-->

        <?php echo $this->element('multi/attachments', ['model' => 'Aefi', 'group' => 'attachment']); ?>

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
                    array('action' => 'view', 'ext' => 'pdf', $this->request->data['Aefi']['id']),
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