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
                <?= $this->Form->input('province_id', ['options' => $county, 'empty' => true]); ?>
            </div>
            <div class="span4">
                <?= $this->Form->input('district', array(
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'District'),
                    'after' => '<p class="help-block"> </p></div>'
                )); ?>
            </div>
            <div class="span4">
                <?= $this->Form->input('name_of_vaccination_site', array(
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Address of vaccination site'),
                    'after' => '<p class="help-block"> </p></div>'
                )); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span3">
                <?php
                echo $this->Form->input('reporter_name', [
                    'label' => 'Name of Investigating Health Worker',
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Name of Investigating Health Worker'),
                    'after' => '<p class="help-block"> </p></div>'
                ]);
                ?>
            </div>
            <div class="span3">
                <?php
                echo $this->Form->input('designation_id', [
                    'label' => 'Designation ',  'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Designation'),
                    'after' => '<p class="help-block"> </p></div>', 'options' => $designations, 'empty' => true, 'escape' => false
                ]);
                ?>
            </div>
            <div class="span3">
                <?php
                echo $this->Form->input('telephone', [
                    'label' => 'Telephone # Landline (with code)', 'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Telephone # Landline (with code)'),
                    'after' => '<p class="help-block"> </p></div>',
                ]);
                ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span3">

                <?php
                echo $this->Form->input('mobile', [
                    'label' => 'Mobile', 'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Mobile'),
                    'after' => '<p class="help-block"> </p></div>',
                ]);
                ?>
            </div>
            <div class="span3">
                <?php
                echo $this->Form->input('reporter_email', [
                    'label' => 'Reporter email', 'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Reporter email'),
                    'after' => '<p class="help-block"> </p></div>',
                ]);
                ?>
            </div>

        </div>
        <div class="row-fluid">
            <div class="span3">
                <?php

                ?>
            </div>
            <div class="span3">
                <p> <b>Place of vaccination<b></p>
                <?php


                echo $this->Form->input('site_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Govt. health facilit' => 'Govt. health facilit'),
                ));
                echo $this->Form->input('site_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Private health facility' => 'Private health facility'),
                ));
              
                echo $this->Form->input('site_type', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Other' => 'Other'),
                ));
                echo $this->Form->input('site_type_other', [
                    'label' => 'Other, (specify)',
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Other, (specify)'),
                    'after' => '<p class="help-block"> </p></div>',
                ]);
                ?>
            </div>

            <div class="span3">
            <p> <b>Vaccination in <b></p>
                <?php
                echo $this->Form->input('vaccination_in', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Campaign' => 'Campaign'),
                ));
                echo $this->Form->input('vaccination_in', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Routine' => 'Routine'),
                ));
                echo $this->Form->input('vaccination_in', array(
                    'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
                    'before' => '<label class="radio">',    'after' => '</label>',
                    'options' => array('Other' => 'Other'),
                ));
                echo $this->Form->input('place_vaccination_other', [
                    'label' => 'Other, (specify)',
                    'div' => array('class' => 'control-group required'),
                    'label' => array('class' => 'control-label required', 'text' => 'Other, (specify)'),
                    'after' => '<p class="help-block"> </p></div>',
                ]);

                ?>
            </div>

            <div class="span3">
                <?php

                ?>
            </div>
        </div>

        <!-- Start of Row -->
        <div class="row-fluid">
            <div class="span3">
                <?php

                ?>
            </div>
            <div class="span3">
                <?php

                ?>
            </div>
            <div class="span3">
                <?php

                ?>
            </div>
        </div>
         <!-- End of Row -->

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