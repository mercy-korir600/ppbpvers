<?php
$this->assign('PADR', 'active');
echo $this->Html->script('jquery/combobox', array('inline' => false));
echo $this->Html->script('padr', array('inline' => false));
echo $this->Html->css('padr', array('inline' => false));
?>

<!-- PADR
    ================================================== -->
<section id="padrsadd">

    <?php
    echo $this->Form->create($padr, array(
        'type' => 'file',
        // 'class' => 'form-vertical'
    ));
    ?>
    <div class="row-fluid">
        <div class="span10 pformback">

            <?php
            echo $this->Form->control('id', array());
            ?>

            <div class="row-fluid">
                <div class="span12" style="text-align: center;">
                    <?php
                    echo $this->Html->image('confidence.png', array('alt' => 'COA'));
                    ?>
                </div>
            </div>

            <div style="background-color: #aad7d4;">
                <h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE PERSON REPORTING</h5>
            </div>
            <div class="row-fluid report">
                <div class="span6">
                    <?php
                    echo $this->Form->control('reporter_name', array(
                        'class' => 'set-control',
                        // 'div' => array('class' => 'control-group required'),
                        'label' => array('class' => 'control-label required', 'text' => 'Name of Person Reporting <span style="color:red;">*</span>', 'escape' => false,),
                    ));

                    echo $this->Form->control('county_id', array(
                        'class' => 'set-control county',
                        'label' => array(
                            'class' => 'control-label required ',
                            'text' => 'County <span style="color:red;">*</span>',
                            'escape' => false,

                        ),
                        'empty' => true,
                        'between' => '<div class="controls ui-widget set-control">',
                    ));

                    ?>
                </div>
                <!--/span-->
                <div class="span6">
                    <?php
                    echo $this->Form->control('relation', array(
                        'type' => 'select',
                        'empty' => true,
                        // 'class' => 'set-control',
                        'label' => array('class' => 'control-label required', 'text' => 'Relation'),
                        'options' => array('Self' => 'Self', 'Parent' => 'Parent', 'Guardian' => 'Guardian', 'Other' => 'Other')
                    ));
                    echo $this->Form->control('sub_county_id', array(
                        'class' => 'set-control sub_county',
                        'label' => array(
                            'class' => 'control-label required ',
                            'text' => 'Sub County <span style="color:red;">*</span>',
                            'escape' => false,

                        ),
                        'empty' => true,
                        // 'between' => '<div class="controls ui-widget set-control">',
                    ));



                    ?>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <div style="background-color: #d3d3d352; padding-top: 7px;">
                <div class="row-fluid report">
                    <div class="span5">
                        <?php
                        echo $this->Form->control('reporter_email', array(
                            'class' => 'set-control',
                            'type' => 'email', 
                            'required' => false,
                            'label' => array('class' => 'control-label', 'text' => 'Email Address')
                        ));

                        ?>
                    </div>
                    <div class="span1"><label class="required text-warning tooltipper" style="padding-top: 5px; text-align: right;" data-original-title="Enter either email/phone or both"></label></div>
                    <div class="span6">
                        <?php
                        echo $this->Form->control('reporter_phone', array(
                            'label' => array('class' => 'control-label', 'text' => 'Mobile No.<span style="color:red;">*</span>', 'escape' => false,),
                            'placeholder' => '',
                            'title' => 'Mobile No.',
                            'data-content' => 'It is important for follow up by the Pharmacy and Poisons Board and to obtain additional information as well as providing you with the feedback',
                            'after' => '<p class="help-block phone"> Your phone number is important for follow up by the <br> Pharmacy and Poisons Board and to obtain <br> additional information as well as providing you with the feedback </p></div>',
                            'class' => 'set-control',
                        ));
                        ?>
                        <span></span>

                    </div>
                </div>
            </div>

            <div style="background-color: lightblue;">
                <h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE PATIENT</h5>
            </div>
            <div class="row-fluid report">
                <div class="span6">
                    <?php
                    echo $this->Form->control('patient_name', array(
                        'class' => 'span11',
                        'label' => array('class' => 'control-label required', 'text' =>  'Patient\'s Name <span style="color:red;">*</span>', 'escape' => false,),
                        'placeholder' => 'Name or Initials',
                        'class' => 'set-control',
                    ));
                    ?>
                </div>
                <!--/span-->
                <div class="span6">
                    <h5>Gender</h5>
                    <?php

                    echo $this->Form->control('gender', array(
                        'type' => 'radio',
                        'label' => false,
                        'legend' => false,
                        'div' => false,
                        'hiddenField' => false,
                        'error' => false,
                        'class' => 'gender',

                        'options' => array('Male' => 'Male'),
                    ));
                    echo $this->Form->control('gender', array(
                        'type' => 'radio',
                        'label' => false,
                        'legend' => false,
                        'div' => false,
                        'hiddenField' => false,
                        'class' => 'gender',
                        'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),

                        'options' => array('Female' => 'Female'),
                    ));

                    ?>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <div class="row-fluid report">
                <div class="span4">

                    <?php

                    echo $this->Form->control('date_of_birth', array(
                        'type' => 'text',                      
                        'label' => array('class' => 'control-label required', 'text' => 'Date of Birth'), 
                        'class' => 'tooltipper set-control date-pick-from',
                    ));

                    ?>
                </div>
                <div class="span2">
                    <div class="controls">
                        <h5 class="text-success" style="margin-top:30px;">--OR--</h5>
                    </div>
                </div>
                <div class="span5">
                    <?php
                    echo $this->Form->control('age_group', array(
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
                        'label' => array('class' => 'control-label required', 'text' => 'Age Group'),
                        'class' => 'set-control',
                    ));

                    ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <table class="table table-bordered table-condensed">
                        <tbody>
                            <tr class="success">
                                <td><label class="required" style="text-align: right;">Select type of report:</label> </td>
                                <td>
                                    <?php
                                    echo $this->Form->control('report_sadr', array(
                                        'type' => 'radio',
                                        'label' => false,
                                        'legend' => false,
                                        'div' => false,
                                        'hiddenField' => false,
                                        'error' => false,
                                        'class' => 'person-submit',

                                        'options' => array('Side Effects' => 'Side Effects'),
                                    ));
                                    echo $this->Form->control('report_sadr', array(
                                        'type' => 'radio',
                                        'label' => false,
                                        'legend' => false,
                                        'div' => false,
                                        'hiddenField' => false,
                                        'class' => 'person-submit',
                                        'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                                        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                        'options' => array('Poor Quality Medicine' => 'Poor Quality Medicine'),
                                    ));
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="sadr">
                <!-- yellow form -->

                <div style="background-color: #fffd77;">
                    <h5 style="text-align: center; text-decoration: underline;">SIDE EFFECT</h5>
                </div>
                <div style="padding: 10px;">
                    <div class="row-fluid">
                        <div class="span4">
                            <?php

                            echo "<h6>Select all side effects experienced</h6>";
                            echo $this->Form->control('sadr_vomiting', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Vomiting or diarrhoea '),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_vomiting_" name="data[Padr][sadr_vomiting]">
                                                                    <label class="checkbox">',
                                'after' => 'Vomiting or diarrhoea </label>',
                            ));
                            echo $this->Form->control('sadr_dizziness', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Dizziness or drowsiness  '),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_dizziness_" name="data[Padr][sadr_dizziness]">
                                                                    <label class="checkbox">',
                                'after' => 'Dizziness or drowsiness </label>',
                            ));
                            echo $this->Form->control('sadr_headache', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Headache'),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_headache_" name="data[Padr][sadr_headache]">
                                                                    <label class="checkbox">',
                                'after' => 'Headache </label>',
                            ));
                            echo $this->Form->control('sadr_joints', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Joints and muscle pain '),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_joints_" name="data[Padr][sadr_joints]">
                                                                    <label class="checkbox">',
                                'after' => 'Joints and muscle pain </label>',
                            ));
                            echo $this->Form->control('sadr_rash', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Rash, itching, swelling on skin'),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_rash_" name="data[Padr][sadr_rash]">
                                                                    <label class="checkbox">',
                                'after' => 'Rash, itching, swelling on skin </label>',
                            ));
                            echo $this->Form->control('sadr_mouth', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Pain or bleeding in the mouth '),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_mouth_" name="data[Padr][sadr_mouth]">
                                                                    <label class="checkbox">',
                                'after' => 'Pain or bleeding in the mouth </label>',
                            ));
                            echo $this->Form->control('sadr_stomach', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Pain in the stomach '),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_stomach_" name="data[Padr][sadr_stomach]">
                                                                    <label class="checkbox">',
                                'after' => 'Pain in the stomach </label>',
                            ));
                            echo $this->Form->control('sadr_urination', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Abnormal changes with urination'),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_urination_" name="data[Padr][sadr_urination]">
                                                                    <label class="checkbox">',
                                'after' => 'Abnormal changes with urination </label>',
                            ));
                            echo $this->Form->control('sadr_eyes', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Red, painful eyes '),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_eyes_" name="data[Padr][sadr_eyes]">
                                                                    <label class="checkbox">',
                                'after' => '</label>',
                            ));
                            echo $this->Form->control('sadr_died', array(
                                'type' => 'checkbox',
                                'label' => array('text' => 'Patient died '),
                                'div' => false,
                                'class' => false,
                                'hiddenField' => false,
                                'between' => '<control type="hidden" value="0" id="Medication_sadr_died_" name="data[Padr][sadr_died]">
                                                                    <label class="checkbox">',
                                'after' => ' </label>',
                            ));  ?>

                            <?php
                            echo $this->Form->control('description_of_reaction', array(
                                'class' => 'span11',
                                'rows' => '1',
                                'between' => false,
                                'div' => false,
                                'label' => array('class' => 'required', 'text' => 'Other side effects experienced'),
                                'after' => '<span class="help-block"></span>',
                            ));
                            ?>
                        </div>
                        <div class="span4">
                            <?php
                            echo $this->Form->control('date_of_onset_of_reaction', array(
                                'type' => 'text',
                                'between' => false,
                                'div' => false,
                                'after' => false,
                                'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
                                'label' => array('class' => 'required', 'text' => 'When did the reaction start? '),
                                'class' => 'span6 date-pick-from',
                            ));
                          
                            
                            echo $this->Form->control('reaction_on', array(
                                'type' => 'radio',
                                'label' => array('text' => 'Is the reaction still on?'),
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'error' => false,
                                'class' => 'reaction_on',
                                'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Is the reaction still on? </div>
                                            <div class="controls">  <control type="hidden" value="" id="PadrReactionOn_" name="data[Padr][reaction_on]"> <label class="radio inline">',
                                'after' => '</label>',
                                'options' => array('Yes' => 'Yes'),
                            ));
                            echo $this->Form->control('reaction_on', array(
                                'type' => 'radio',
                                'label' => false,
                                'legend' => false,
                                'div' => false,
                                'hiddenField' => false,
                                'class' => 'reaction_on',
                                'format' => array('before', 'label', 'between', 'control', 'error', 'after'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                'before' => '<label class="radio inline">',
                                'after' => '</label>
                                        <a class="tooltipper" data-original-title="Clears the checked value"
                                        onclick="$(\'.reaction_on\').removeAttr(\'checked disabled\')">
                                        <em class="accordion-toggle">clear!</em></a> 
                                        </div> </div>',
                                'options' => array('No' => 'No'),
                            ));


                            echo $this->Form->control('date_of_end_of_reaction', array(
                                'type' => 'text',
                                'between' => false,
                                'div' => false,
                                'after' => false,
                                'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
                                'label' => array('class' => 'required end', 'text' => 'When did the reaction end? '),
                                'class' => 'span6 date-pick-from end',
                            ));
                            ?>
                        </div>
                    </div>
                    <!--/row-->
                </div>
            </div>


            <div class="pqmp" style="padding: 10px;">
                <div style="background-color: lightpink;">
                    <h5 style="text-align: center; text-decoration: underline;">POOR QUALITY MEDICINE</h5>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <?php

                        echo "<h6>Select all issues with the medicine/device</h6>";
                        echo $this->Form->control('pqmp_label', array(
                            'type' => 'checkbox',
                            'label' => array('text' => 'The label looks wrong '),
                            'div' => false,
                            'class' => false,
                            'hiddenField' => false,
                        ));
                        echo $this->Form->control('pqmp_material', array(
                            'type' => 'checkbox',
                            'label' => array('text' => 'Has unusual material in it '),
                            'div' => false,
                            'class' => false,
                            'hiddenField' => false,
                        ));
                        echo $this->Form->control('pqmp_color', array(
                            'type' => 'checkbox',
                            'label' => array('text' => 'The color is changing'),
                            'div' => false,
                            'class' => false,
                            'hiddenField' => false,
                        ));
                        echo $this->Form->control('pqmp_smell', array(
                            'type' => 'checkbox',
                            'label' => array('text' => 'The smell is unusual'),
                            'div' => false,
                            'class' => false,
                            'hiddenField' => false,
                        ));
                        echo $this->Form->control('pqmp_working', array(
                            'type' => 'checkbox',
                            'label' => array('text' => 'The medicine/device is not working'),
                            'div' => false,
                            'class' => false,
                            'hiddenField' => false,
                        ));
                        echo $this->Form->control('pqmp_bottle', array(
                            'type' => 'checkbox',
                            'label' => array('text' => 'The packet or bottle does not seem to be usual or complete '),
                            'div' => false,
                            'class' => false,
                            'hiddenField' => false,
                        ));  ?>
                    </div>
                    <!--/span-->
                    <div class="span6">
                        <?php
                        echo $this->Form->control('any_other_comment', array(
                            'class' => 'span11',
                            'rows' => '2',
                            'between' => false,
                            'div' => false,
                            'label' => array('class' => 'required', 'text' => 'Other wrong things'),
                            'after' => '<span class="help-block">Additional wrong things?</span>',
                        ));
                        ?>
                    </div>
                </div>
                <!--/row-->
            </div>

            <?php
            echo $this->element('multi/padr_list_of_medicines');
            ?>

            <!-- Section to show the outcome -->
            <div style="background-color: lightblue;">
                <h5 style="text-align: center; text-decoration: underline;">OUTCOME DETAILS</h5>
            </div>
            <div class="row-fluid report">

                <p class="required">Outcome</p>
                <?php

                echo $this->Form->control('outcome', array(
                    'type' => 'radio',
                    'label' => false,
                    'legend' => false,
                    'div' => false,
                    'hiddenField' => false,
                    'error' => false,
                    'class' => 'outcome',
                    'before' => '<div class="control-group"> <label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('recovered/resolved' => 'Recovered/resolved'),
                ));

                echo $this->Form->control('outcome', array(
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
                ));
                echo $this->Form->control('outcome', array(
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
                ));
                echo $this->Form->control('outcome', array(
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
                ));
                echo $this->Form->control('outcome', array(
                    'type' => 'radio',
                    'label' => false,
                    'legend' => false,
                    'div' => false,
                    'hiddenField' => false,
                    'error' => false,
                    'class' => 'outcome',
                    'before' => '<label class="radio inline">',
                    'after' => '</label>',
                    'options' => array('death' => 'Death'),
                ));
                echo $this->Form->control('outcome', array(
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
                ));


                ?>
            </div>
            <!-- End of outcome section -->
            <?php
            echo $this->element('multi/attachments', ['model' => 'Padr', 'group' => 'attachment', 'examples' => '']);
            ?>
            <div class="row-fluid report">
                <?php
                echo $this->Form->control('consent', array(
                    'type' => 'select',
                    'empty' => true,
                    'options' => array(
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ),
                    'class' => 'set-control',
                    'label' => array('class' => 'control-label required', 'text' => 'If we need further information to help us understand the case do we have your permission to contact you?'),
                    'after' => '<a onclick="$(\'#PadrConsent\').removeAttr(\'disabled\'); $(\'#PadrConsent\').val(\'\');" >
                                <em class="accordion-toggle">clear!</em></a> </div>',
                ));

                ?>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <label class="required pull-right" style="color: purple; padding-top: 4px;">Please solve the riddle <i class="fa fa-smile-o" aria-hidden="true"></i></label>
                    <?php 
                    echo $this->Captcha->render([
                        'placeholder' => __('Please solve the riddle'), 
                    ]);
                    ?>
                </div>
                <div class="span8 pull-left">

                </div>
            </div>

        </div> <!-- /span -->
        <div class="span2">
            <div class="my-sidebar" data-spy="affix">
                <div class="awell">
                    <?php
                    echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit Report', array(
                        'name' => 'saveChanges',
                        'escapeTitle' => false,
                        'class' => 'btn btn-primary mapop',
                        'id' => 'PadrSaveChanges',
                        'onclick' => "return confirm('Are you sure you wish to submit the report?');",
                        'div' => false,
                    ));
                    ?>
                    <br>
                    <hr>
                    <?php

                    echo $this->Html->link(
                        '<i class="fa fa-times" aria-hidden="true"></i> Cancel',
                        array('controller' => 'pages', 'action' => 'home'),
                        array('escape' => false, 'class' => 'btn btn-block btn-danger')
                    );
                    ?>
                </div>
            </div>
        </div>
    </div> <!-- /row -->
    <?php echo $this->Form->end(); ?>
</section> <!-- /row -->