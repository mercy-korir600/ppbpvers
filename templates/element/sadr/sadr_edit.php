<?php
$this->assign('SADR', 'active');
echo $this->Html->script('jquery/combobox', array('inline' => false));
echo $this->Html->script('sadrs', array('inline' => false));
echo $this->Html->css('sadr', array('inline' => false));

?>

<!-- SADR
	================================================== -->
<section id="sadrsadd">

    <?php




    echo $this->Form->create($sadr, [
        'type' => 'file',
        // 'class' => 'form-horizontal',
    ]);
    ?>
    <div class="row-fluid">
        <div class="span10 formback" style="padding: 10px;">

            <?php
            echo $this->Form->control('id', array('type' => 'hidden'));
            echo $this->Form->control('report_type', array('type' => 'hidden'));
            echo $this->Form->control('reference_no', array('type' => 'hidden'));
            ?>

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
                        <h5><b>Email:</b> pv@ppb.go.ke</h5>
                        <h5 style="color: red;">SUSPECTED ADVERSE DRUG REACTION REPORTING FORM</h5>
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-container">
                <div class="row-fluid">
                    <div class="span8">
                        <p class="controls" id="sadr_edit_tip"> <span class="label label-important">Tip:</span> Fields
                            marked with <span style="color:red;">*</span> are mandatory</p>
                        <?php
                        echo $this->Form->control(
                            'report_title',
                        );
                        ?>
                    </div>
                    <div class="span4" id="sadr_edit_form_id">
                        <h4>
                            <?php echo 'Form ID: ' . $sadr['reference_no']; ?>
                        </h4>
                        <h5>
                            <?php echo 'Form Type: ' . $sadr['report_type']; ?>
                        </h5>
                    </div>
                </div>
                <!--/row-->
                <hr>
                <div class="row-fluid">
                    <div class="span6">
                        <?php
                        echo "<h4>The report is on  <span style='color:red;'>*</span>:</h4>";

                        echo $this->Form->control('report_sadr', array(
                            'type' => 'checkbox',
                            'label' => array('class' => 'control-label', 'text' => 'Suspected adverse drug reaction'),
                        ));

                        echo $this->Form->control('report_therapeutic', array(
                            'type' => 'checkbox',
                            'label' => array('class' => 'control-label', 'text' => 'Suspected Therapeutic ineffectiveness'),
                        ));

                        echo $this->Form->control('report_misuse', array(
                            'type' => 'checkbox',
                            'label' => array('class' => 'control-label', 'text' => 'Suspected misuse, abuse and / or dependence on medicines'),
                        ));

                        echo $this->Form->control('report_off_label', array(
                            'type' => 'checkbox',
                            'label' => array('class' => 'control-label', 'text' => 'Off-label Use'),
                        ));
                        ?>
                    </div>
                    <div class="span6">
                        <?php
                        echo "<h4>Product category (Tick appropriate box) <span style='color:red;'>*</span></h4>";

                        // Using a wrapper div to align radio buttons horizontally
                        echo '<div class="product-category-group">';

                        echo $this->Form->control(
                            'product_category',
                            [
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'product_category',
                                'before' => '<div class="form-check form-check-inline">',
                                'after' => '</div>',
                                'options' => ['Medicinal product' => 'Medicinal product'],
                                'onclick' => '$("#SadrProductSpecify").attr("disabled","disabled")',
                            ]
                        );

                        echo $this->Form->control(
                            'product_category',
                            [
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'product_category',
                                'before' => '<div class="form-check form-check-inline">',
                                'after' => '</div>',
                                'options' => ['Herbal product' => 'Herbal product'],
                                'onclick' => '$(".product_specify").attr("disabled","disabled")',
                            ]
                        );

                        echo $this->Form->control(
                            'product_category',
                            [
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'product_category',
                                'before' => '<div class="form-check form-check-inline">',
                                'after' => '</div>',
                                'options' => ['Cosmeceuticals' => 'Cosmeceuticals'],
                                'onclick' => '$(".product_specify").attr("disabled","disabled")',
                            ]
                        );

                        echo $this->Form->control(
                            'product_category',
                            [
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'product_category',
                                'before' => '<div class="form-check form-check-inline">',
                                'after' => '</div>',
                                'options' => ['Others' => 'Others'],
                                'onclick' => '$(".product_specify").removeAttr("disabled")',
                            ]
                        );

                        echo '</div>'; // Closing the wrapper div

                        ?>
                        <br>
                        <?php
                        echo $this->Form->control(
                            'product_specify',
                            array(
                                'label' => false,
                                'placeholder' => '(If others, specify)',
                                'div' => false,
                                'between' => false,
                                'after' => false,
                                'class' => 'product_specify',
                                'disabled' => true,
                            )
                        );

                        ?>
                    </div>
                </div>
                <hr>
                <div class="row-fluid">
                    <div class="span6">
                        <?php
                        echo $this->Form->control(
                            'name_of_institution',
                            array(
                                'label' => array('class' => 'control-label', 'text' => 'NAME OF INSTITUTION'),
                                'placeholder' => '',
                                'title' => '',
                                'data-content' => '',
                                'after' => '<p class="help-block">	 </p></div>',
                            )
                        );

                        echo $this->Form->control(
                            'address',
                            array(
                                'label' => array('class' => 'control-label', 'text' => 'ADDRESS <span style="color:red;">*</span>', 'escape' => false),
                            )
                        );
                        echo $this->Form->control(
                            'institution_code',
                            array(
                                'label' => array(
                                    'class' => 'control-label',
                                    'text' => 'INSTITUTION CODE'
                                ),
                            )
                        );

                        ?>
                    </div>
                    <!--/span-->
                    <div class="span6">
                        <?php

                        echo $this->Form->control(
                            'county_id',
                            array(
                                'label' => array(
                                    'class' => 'control-label required',
                                    'text' => 'COUNTY <span style="color:red;">*</span>',
                                    'escape' => false
                                ),
                                'class' => 'county',
                                'empty' => true,
                                'between' => '<div class="controls ui-widget">',
                            )
                        );
                        echo $this->Form->control(
                            'sub_county_id',
                            array(
                                'label' => array('class' => 'control-label'),
                                'empty' => true,
                                'between' => '<div class="controls ui-widget">',
                                'class' => 'sub_county'
                            )
                        );
                        echo $this->Form->control('contact', array('label' => array('class' => 'control-label', 'text' => 'INSTITUTION CONTACT'),));
                        $defaultSubCountyId = $sadr['sub_county_id'];

                        echo '<p id="defaultSubCountyId" style="display:none">' . h($defaultSubCountyId) . '</p>';
                        ?>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <hr>
                <h5 style="text-align: center; color: #884805;">PATIENT INFORMATION</h5>
                <div class="row-fluid">
                    <div class="span6">
                        <?php
                        echo $this->Form->control(
                            'patient_name',
                            array(
                                'label' => array('class' => 'control-label required', 'text' => 'PATIENT\'S INITIALS <span style="color:red;">*</span>', 'escape' => false),
                                'after' => '<p class="help-block"> e.g E.O.O </p></div>',
                                'class' => 'tooltipper',
                            )
                        );
                        echo $this->Form->control('ip_no', array('label' => array('class' => 'control-label', 'text' => 'IP/OP. NO.'),));
                        ?>
                        <div class="well-mine">
                            <?php


                            echo $this->Form->control('date_of_birth', [
                                'type' => 'text',
                                'label' => array('class' => 'control-label', 'text' => 'DATE OF BIRTH <span style="color:red;">*</span>', 'escape' => false),

                            ]);

                            if (!empty($sadr->getErrors()['has_age_or_dob'])) {
                                $error = $sadr->getErrors()['has_age_or_dob']['valid'];
                                echo '<div class="text-danger" style="color: red;">' . $error . '</div>';
                                // echo '<div class="text-danger">' . implode(', ', $sadr->getErrors('has_age_or_dob')) . '</div>';
                            }
                            ?>
                            <h5 class="controls">--OR--</h5>
                            <?php
                            echo $this->Form->control('age_group', [
                                'type' => 'select',
                                'empty' => true,
                                'options' => array(
                                    'neonate' => 'neonate [0-1 month]',
                                    'infant' => 'infant [1 month-1 year]',
                                    'child' => 'child [1 year - 11 years]',
                                    'adolescent' => 'adolescent [12-17 years]',
                                    'adult' => 'adult [18-64 years]',
                                    'elderly' => 'elderly [>65 years]',
                                ),
                                'label' => array('class' => 'control-label', 'text' => 'AGE GROUP'),

                            ]);

                            echo $this->Form->control('has_age_or_dob', array('type' => 'hidden'));

                            ?>
                        </div>
                        <?php

                        echo $this->Form->control(
                            'known_allergy',
                            array(
                                'type' => 'radio',
                                'label' => array('class' => 'control-label required', 'text' => 'ANY KNOWN ALLERGY'),
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'known_allergy',
                                'before' => '<div class="control-group">  <div>  <label class="control-label required">ANY KNOWN ALLERGY</label> </div>
											<div class="controls"> <control type="hidden" value="" id="SadrKnownAllergy_" name="data[Sadr][known_allergy]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('yes' => 'yes'),
                                'onclick' => '$(".known").removeAttr("disabled")',
                            )
                        );
                        echo $this->Form->control(
                            'known_allergy',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'known_allergy',
                                'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label> <label><a class="button"
										onclick="$(\'.known_allergy\').removeAttr(\'checked\'); $(\'.known\').attr(\'disabled\',\'disabled\');" >
										<em class="accordion-toggle">clear!</em></a></label> </div> </div>',
                                'options' => array('No' => 'No'),
                                'onclick' => '$(".known").attr("disabled","disabled")',
                            )
                        );

                        echo $this->Form->control(
                            'known_allergy_specify',
                            array(
                                'class' => 'known',
                                'label' => false,
                                'disabled' => true,
                                'placeholder' => 'If yes, specify',
                                'after' => '<p class="help-block"> (specify) </p></div>'
                            )
                        );
                        ?>
                    </div>
                    <!--/span-->
                    <div class="span6">
                        <?php
                        echo $this->Form->control(
                            'ward',
                            array(
                                'label' => array('class' => 'control-label required', 'text' => 'WARD / CLINIC'),
                                'after' => '<p class="help-block">	(Name/ Number) </p></div>'
                            )
                        );
                        echo $this->Form->control(
                            'patient_address',
                            array(
                                'label' => array('class' => 'control-label required', 'text' => 'PATIENT\'S ADDRESS'),
                                'title' => 'Where does the patient reside',
                                'data-content' => 'Where does the patient reside',
                                'class' => 'tooltipper',
                            )
                        );
                        ?><h4>Gender</h4>
                        <?php
                        echo $this->Form->control(
                            'gender',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'class' => 'gender',
                                'hiddenField' => false,
                                'error' => false,
                                'options' => array('Male' => 'Male'),
                            )
                        );
                        echo $this->Form->control(
                            'gender',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'class' => 'gender',
                                'hiddenField' => false,
                                'options' => array('Female' => 'Female'),
                            )
                        );
                        echo $this->Form->control(
                            'gender',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'gender',
                                'options' => array('Unknown' => 'Unknown'),
                            )
                        ); ?>
                        <h4>Pregnancy Status</h4>
                        <?php

                        echo $this->Form->control(
                            'pregnancy_status',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'pregnancy_status',
                                'options' => array('Not Applicable' => 'Not Applicable'),
                            )
                        );
                        echo $this->Form->control(
                            'pregnancy_status',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'pregnancy_status',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Not pregnant' => 'Not pregnant'),
                            )
                        );
                        echo $this->Form->control(
                            'pregnancy_status',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'pregnancy_status',
                                'options' => array('1st Trimester' => '1st Trimester'),
                            )
                        );
                        echo $this->Form->control(
                            'pregnancy_status',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'pregnancy_status',
                                'options' => array('2nd Trimester' => '2nd Trimester'),
                            )
                        );
                        echo $this->Form->control(
                            'pregnancy_status',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'pregnancy_status',
                                'options' => array('3rd Trimester' => '3rd Trimester'),
                            )
                        );

                        echo $this->Form->control(
                            'weight',
                            array(
                                'label' => array('class' => 'control-label required', 'text' => 'WEIGHT (kg)'),
                                'between' => '<div class="controls"><div class="control-append">',
                                'after' => '<span class="add-on">Kg</span></div></div>'
                            )
                        );
                        echo $this->Form->control(
                            'height',
                            array(
                                'label' => array('class' => 'control-label required', 'text' => 'HEIGHT (cm)'),
                                'between' => '<div class="controls"><div class="control-append">',
                                'after' => '<span class="add-on">cm</span></div></div>'
                            )
                        );

                        ?>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <?php
                        echo $this->Form->control(
                            'diagnosis',
                            array(
                                'class' => 'span8',
                                'rows' => '2',
                                'label' => array('class' => 'control-label required', 'text' => 'DIAGNOSIS'),
                                'after' => '<p class="help-block"> (What was the patient being treated for before getting the reaction) </p></div>',
                            )
                        );
                        echo $this->Form->control(
                            'reaction',
                            array(
                                'label' => array('class' => 'control-label required', 'text' => 'REACTION <span style="color:red;">*</span>', 'escape' => false),
                                'placeholder' => 'type here...',
                                'title' => 'Reaction',
                                'data-content' => 'e.g Nevirapine related Rash',
                                'after' => '</div>',
                                'class' => 'span5 mapop',
                            )
                        );

                        echo $this->element('multi/sadr_reactions');

                        echo $this->Form->control(
                            'date_of_onset_of_reaction',
                            array(
                                'type' => 'text',
                                'empty' => true,
                                'label' => array('class' => 'control-label required', 'text' => 'DATE OF ONSET OF REACTION <span style="color:red;">*</span>', 'escape' => false),
                                'after' => '<p class="help-block"> When did the reaction start </p></div>',
                            )
                        );

                        echo $this->Form->control(
                            'description_of_reaction',
                            array(
                                'class' => 'span8',
                                'rows' => '2',
                                'label' => array('class' => 'control-label required', 'text' => 'BRIEF DESCRIPTION OF REACTION <span style="color:red;">*</span>', 'escape' => false),
                                'after' => '<p class="help-block">	Please describe the reaction in terms of symptoms </p></div>',
                            )
                        );

                        echo $this->element('multi/sadr_descriptions');

                        echo $this->Form->control(
                            'medical_history',
                            array(
                                'class' => 'span8',
                                'rows' => '2',
                                'label' => array('class' => 'control-label required', 'text' => 'MEDICAL HISTORY'),
                                'after' => '<p class="help-block">(Other relevant history including pre-existing medical conditions e.g. allergies, smoking, alcohol use, hepatic/ renal dysfunction etc)  </p></div>',
                            )
                        );
                        ?>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <hr>
                <?php
                echo $this->element('multi/list_of_drugs');

                if (!empty($sadr->getErrors()['sadr_list_of_drugs'])) {
                    $error = $sadr->getErrors()['sadr_list_of_drugs']['atLeastOneSuspectedDrug'];
                    echo '<div class="text-danger" style="color: red;">' . $error . '</div>';
                    // echo '<div class="text-danger">' . implode(', ', $sadr->getErrors('has_age_or_dob')) . '</div>';
                }
                ?>

                <?php
                echo $this->element('multi/list_of_medicines');
                ?>
                <div class="row-fluid">
                    <div class="span6 editable">
                        <h5 style="color: #884805;">Dechallenge/Rechallenge</h5>
                        <?php
                        echo "<p>Did the reaction resolve after the drug was stopped or when the dose was reduced?</p>";

                        echo $this->Form->control(
                            'reaction_resolve',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'reaction_resolve',
                                'before' => '<div class="control-group radio-spacing">  <div>
					        <control type="hidden" value="" id="TransfusionReactionResolve_" name="data[Sadr][reaction_resolve]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Yes' => 'Yes'),
                            )
                        );
                        echo $this->Form->control(
                            'reaction_resolve',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'reaction_resolve',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('No' => 'No')
                            )
                        );
                        echo $this->Form->control(
                            'reaction_resolve',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'reaction_resolve',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Unknown' => 'Unknown')
                            )
                        );
                        echo $this->Form->control(
                            'reaction_resolve',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'reaction_resolve',
                                'format' => array('before', 'label', 'between', 'control', 'after', 'error'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label>
					            <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
					            onclick="$(\'.reaction_resolve\').removeAttr(\'checked disabled\')">
					            <em class="accordion-toggle">clear!</em></a> </span>

					            </div> </div>',
                                'options' => array('N/A' => 'N/A'),
                            )
                        );
                        ?>
                        <?php

                        echo "<p>Did the reaction reappear after the drug was reintroduced?</p>";
                        echo $this->Form->control(
                            'reaction_reappear',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'reaction_reappear',
                                'before' => '<div class="control-group ">
						<div>
							<control type="hidden" value="" id="TransfusionReactionResolve_" name="data[Sadr][reaction_reappear]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Yes' => 'Yes'),
                            )
                        );
                        echo $this->Form->control(
                            'reaction_reappear',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'reaction_reappear',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('No' => 'No')
                            )
                        );
                        echo $this->Form->control(
                            'reaction_reappear',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'reaction_reappear',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Unknown' => 'Unknown')
                            )
                        );
                        echo $this->Form->control(
                            'reaction_reappear',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'reaction_reappear',
                                'format' => array('before', 'label', 'between', 'control', 'after', 'error'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label>
							<span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection" onclick="$(\'.reaction_reappear\').removeAttr(\'checked disabled\')">
									<em class="accordion-toggle">clear!</em></a> </span>

						</div>
					</div>',
                                'options' => array('N/A' => 'N/A'),
                            )
                        );
                        ?>
                        <div class="editable">
                            <?php
                            echo $this->Form->control(
                                'lab_investigation',
                                array(
                                    'rows' => 2,
                                    'label' => array('class' => 'control-label required ', 'text' => 'Any lab investigations and results'),
                                )
                            );


                            ?>
                        </div>
                        <p class="required">Outcome <span style="color:red;">*</span></p>
                        <?php
                        echo $this->Form->control(
                            'outcome',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'outcome',
                                'before' => '<div class="control-group editable"> <control type="hidden" value="" id="SadrOutcome_" name="data[Sadr][outcome]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('recovered/resolved' => 'Recovered/resolved'),
                            )
                        );
                        echo $this->Form->control(
                            'outcome',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'outcome',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('recovering/resolving' => 'Recovering/resolving'),
                            )
                        );
                        echo $this->Form->control(
                            'outcome',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'outcome',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('recovered/resolved with sequelae' => 'Recovered/resolved with sequelae'),
                            )
                        );
                        echo $this->Form->control(
                            'outcome',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'outcome',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('not recovered/not resolved' => 'Not recovered/not resolved'),
                            )
                        );
                        echo $this->Form->control(
                            'outcome',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'outcome',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('fatal' => 'Fatal'),
                            )
                        );
                        echo $this->Form->control(
                            'outcome',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'outcome',
                                'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label>
								<a class="button"
										onclick="$(\'.outcome\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
                                'options' => array('Unknown' => 'Unknown'),
                            )
                        );
                        ?>
                    </div>
                    <div class="span6 editable">
                        <h5 style="color: #884805;">Grading of the reaction /event</h5>
                        <p class="required">Severity of reaction</p>
                        <?php
                        echo $this->Html->link(
                            'Click to view Severity scale below',
                            '#assessment1',
                            array(
                                'class' => 'tooltipper',
                                'onclick' => '$("#assessment1").click()',
                                'id' => 'SadrSeverityT',
                                'title' => 'Click here to expand content below'
                            )
                        );

                        echo $this->Form->control(
                            'severity',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'severity',
                                'before' => '<div class="control-group"> <control type="hidden" value="" id="SadrSeverity_" name="data[Sadr][severity]">
										 <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Mild' => 'Mild'),
                            )
                        );
                        echo $this->Form->control(
                            'severity',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'severity',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Moderate' => 'Moderate'),
                            )
                        );
                        echo $this->Form->control(
                            'severity',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'severity',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Severe' => 'Severe'),
                            )
                        );
                        echo $this->Form->control(
                            'severity',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'severity',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Fatal' => 'Fatal'),
                            )
                        );
                        echo $this->Form->control(
                            'severity',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'severity',
                                'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label>
								<a class="button"
										onclick="$(\'.severity\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
                                'options' => array('Unknown' => 'Unknown'),
                            )
                        );


                        echo $this->Form->control(
                            'serious',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'serious',
                                'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Is the reaction serious <span style="color:red;">*</span></label> </div>
                                         <div class="controls">  <control type="hidden" value="" id="Serious_" name="data[Sadr][serious]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Yes' => 'Yes'),
                            )
                        );
                        echo $this->Form->control(
                            'serious',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'serious',
                                'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label> 
                <span class="help-inline" style="padding-top: 5px;">
                    <a class="tooltipper" data-original-title="Clears the checked value"
                        onclick="$(\'.serious,.serious_reason\').removeAttr(\'checked disabled\')"
                        id="clearButton">
                        <em class="accordion-toggle">clear!</em>
                    </a>
                </span>
            </div>
        </div>',
                                'options' => array('No' => 'No'),
                            )
                        );
                        ?>
                        <p class="required">Criteria/reason for seriousness</p>
                        <?php
                        echo $this->Form->control(
                            'serious_reason',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'serious_reason',
                                'before' => '<div>  <div>
                            <control type="hidden" value="" id="SadrSerious_" name="data[Sadr][serious_reason]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Hospitalization/ Prolonged Hospitalization' => 'Hospitalization/ Prolonged Hospitalization'),
                            )
                        );
                        echo $this->Form->control(
                            'serious_reason',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'serious_reason',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Disability' => 'Disability')
                            )
                        );
                        echo $this->Form->control(
                            'serious_reason',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'serious_reason',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Congenital anomality' => 'Congenital anomality')
                            )
                        );
                        echo $this->Form->control(
                            'serious_reason',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'serious_reason',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Life threatening' => 'Life threatening')
                            )
                        );

                        echo $this->Form->control(
                            'serious_reason',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'serious_reason',
                                'format' => array('before', 'label', 'between', 'control', 'after', 'error'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" id="serious_reason_clear" data-original-title="Clear selection"
                                onclick="$(\'.serious_reason\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                                'options' => array('Death' => 'Death'),
                            )
                        );
                        ?>

                        <p class="required">Action taken <span style="color:red;">*</span></p>
                        <?php
                        echo $this->Form->control(
                            'action_taken',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'action_taken',
                                'before' => '<div class="control-group"> <control type="hidden" value="" id="SadrActionTaken_" name="data[Sadr][action_taken]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Drug withdrawn' => 'Drug withdrawn'),
                            )
                        );
                        echo $this->Form->control(
                            'action_taken',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'action_taken',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Dose increased' => 'Dose increased'),
                            )
                        );
                        echo $this->Form->control(
                            'action_taken',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'action_taken',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Dose reduced' => 'Dose reduced'),
                            )
                        );
                        echo $this->Form->control(
                            'action_taken',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'action_taken',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Dose not changed' => 'Dose not changed'),
                            )
                        );
                        echo $this->Form->control(
                            'action_taken',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'action_taken',
                                'before' => '<label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Not applicable' => 'Not applicable'),
                            )
                        );
                        echo $this->Form->control(
                            'action_taken',
                            array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'action_taken',
                                'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label>
								<a class="button"
										onclick="$(\'.action_taken\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
                                'options' => array('Unknown' => 'Unknown'),
                            )
                        );
                        ?>


                    </div>
                </div>

                <?php
                echo $this->element('help/assessment');
                ?>

                <div class="row-fluid">
                    <div class="span12 editable">
                        <?php
                        echo $this->Form->control(
                            'any_other_comment',
                            array(
                                'class' => 'span8 ',
                                'rows' => '2',
                                'label' => array(
                                    'class' => 'control-label ',
                                    'text' => 'ANY OTHER COMMENT'
                                )
                            )
                        );
                        ?>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <hr>

                <?php
                echo $this->element('multi/attachments', ['model' => 'Sadr', 'group' => 'attachment', 'examples' => '']);
                ?>
                <div class="row-fluid">
                    <div class="span6">
                        <?php
                        echo $this->Form->control(
                            'reporter_name',
                            array(
                                'div' => array('class' => 'control-group required'),
                                'label' => array(
                                    'class' => 'control-label required',
                                    'text' => 'Name of Person Reporting <span style="color:red;">*</span>',
                                    'escape' => false
                                ),
                            )
                        );
                        echo $this->Form->control(
                            'reporter_email',
                            array(
                                'type' => 'email',
                                'div' => array('class' => 'control-group required'),
                                'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>', 'escape' => false)
                            )
                        );

                        ?>
                    </div>
                    <!--/span-->
                    <div class="span6">
                        <?php
                        echo $this->Form->control(
                            'designation_id',
                            array('label' => array('class' => 'control-label required', 'text' => 'DESIGNATION' . ' <span style="color:red;">*</span>', 'escape' => false), 'empty' => true)
                        );
                        echo $this->Form->control(
                            'reporter_phone',
                            array(
                                'div' => array('class' => 'control-group'),
                                'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.' . ' <span style="color:red;">*</span>', 'escape' => false)
                            )
                        );

                        echo $this->Form->control(
                            'reporter_date',
                            array(
                                'type' => 'text',
                                'class' => 'date-pick-field',
                                'label' => array('class' => 'control-label required', 'text' => 'Date <span style="color:red;">*</span>', 'escape' => false),
                            )
                        );
                        ?>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <table class="table table-bordered  table-condensed table-pvborderless">
                    <tbody>
                        <tr>
                            <td width="45%">
                                <h5 class="pull-right text-success">Is the person submitting different from
                                    reporter?&nbsp;</h5>
                            </td>
                            <td>
                                <?php
                                echo $this->Form->control(
                                    'person_submitting',
                                    array(
                                        'type' => 'radio',
                                        'label' => false,
                                        'legend' => false,
                                        'div' => false,
                                        'hiddenField' => false,
                                        'error' => false,
                                        'class' => 'person-submit',
                                        'before' => '<div class="form-inline">
												<control type="hidden" value="" id="SadrPersonSubmitting_" name="data[Sadr][person_submitting]">
												<label class="radio">',
                                        'after' => '</label>&nbsp;&nbsp;',
                                        'options' => array('Yes' => 'Yes'),
                                    )
                                );
                                echo $this->Form->control(
                                    'person_submitting',
                                    array(
                                        'type' => 'radio',
                                        'label' => false,
                                        'legend' => false,
                                        'div' => false,
                                        'hiddenField' => false, 
                                        'class' => 'person-submit PersonSubmittingNo',
                                        'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                                        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                        'before' => '<label class="radio">',
                                        'after' => '</label> </div>',
                                        'options' => array('No' => 'No'),
                                    )
                                );
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row-fluid">
                    <div class="span6">
                        <?php
                        echo $this->Form->control(
                            'reporter_name_diff',
                            array(
                                'div' => array('class' => 'control-group required'),
                                'class' => 'diff',
                                'label' => array('class' => 'control-label required', 'text' => 'Name <span style="color:red;">*</span>', 'escape' => false),
                            )
                        );
                        echo $this->Form->control(
                            'reporter_email_diff',
                            array(
                                'type' => 'email',
                                'div' => array('class' => 'control-group required'),
                                'class' => 'diff',
                                'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>', 'escape' => false)
                            )
                        );
                        ?>
                    </div>
                    <!--/span-->
                    <div class="span6">
                        <?php
                        echo $this->Form->control(
                            'reporter_designation_diff',
                            array(
                                'type' => 'select',
                                'options' => $designations,
                                'empty' => true,
                                'class' => 'diff',
                                'label' => array('class' => 'control-label required', 'text' => 'Designation' . ' <span style="color:red;">*</span>', 'escape' => false),
                                'empty' => true
                            )
                        );
                        echo $this->Form->control(
                            'reporter_phone_diff',
                            array(
                                'div' => array('class' => 'control-group'),
                                'class' => 'diff',
                                'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.' . ' <span style="color:red;">*</span>', 'escape' => false)
                            )
                        );
                        echo $this->Form->control(
                            'reporter_date_diff',
                            array(
                                'type' => 'text',
                                'class' => 'date-pick-field diff',
                                'label' => array('class' => 'control-label required', 'text' => 'Date'),
                            )
                        );
                        ?>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->

                <?php
                echo $this->element('help/explanatory');
                ?>
            </div>


        </div> <!-- /span -->
        <div class="span2">
            <div class="my-sidebar" data-spy="affix">
                <div class="awell">
                    <?php
                    echo $this->Form->button(
                        '<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes',
                        array(
                            'name' => 'saveChanges',
                            'escapeTitle' => false,
                            'class' => 'btn btn-success mapop',
                            'formnovalidate' => 'formnovalidate',
                            'id' => 'SadrSaveChanges',
                            'title' => 'Save & continue editing',
                            'data-content' => 'Save changes to form without submitting it.
	                                              The form will still be available for further editing.',
                            'div' => false,
                        )
                    );
                    ?>
                    <br>
                    <hr>
                    <?php
                    echo $this->Form->button(
                        '<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit    ',
                        array(
                            'name' => 'submitReport',
                            'escapeTitle' => false,
                            'onclick' => "return confirm('Are you sure you wish to submit the report?');",
                            'class' => 'btn btn-primary btn-block mapop',
                            'id' => 'SiteInspectionSubmitReport',
                            'value' => 'submit',
                            'title' => 'Save and Submit Report',
                            'data-content' => 'Submit report for peer review and approval.',
                            'div' => false,
                        )
                    );

                    ?>
                    <br>
                    <hr>
                    <?php
                    echo $this->Html->link(
                        '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF',
                        array('action' => 'view', 'ext' => 'pdf', $this->request->getData('id')),
                        array(
                            'escape' => false,
                            'class' => 'btn btn-info btn-block mapop',
                            'title' => 'Download PDF',
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
                        array('escapeTitle' => false, 'class' => 'btn btn-danger btn-block')
                    );
                    ?>
                </div>
            </div>
        </div>
    </div> <!-- /row -->
    <?php echo $this->Form->end(); ?>
</section> <!-- /row -->