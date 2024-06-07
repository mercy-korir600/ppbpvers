<?php
$this->assign('AGGREGATE', 'active');
$this->Html->script('jquery/combobox', array('inline' => false));
$this->Html->script('ce2b', array('inline' => false));
$this->Html->script('multi/checklist?v=2', array('inline' => false));
?>

<!-- SADR
    ================================================== -->
<section id="sadrsadd">

    <?php
    echo $this->Session->flash();
    echo $this->Form->create('Aggregate', array(
        'type' => 'file',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'div' => array('class' => 'control-group'),
            'label' => array('class' => 'control-label'),
            'between' => '<div class="controls">',
            'after' => '</div>',
            'class' => '',
            'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
            'error' => array('attributes' => array('class' => 'controls help-block')),
        ),
    ));
    ?>
    <div class="row-fluid">
        <div class="span10 formbackd">

            <?php
            echo $this->Form->input('Aggregate.id', array());
            echo $this->Form->input('Aggregate.reference_no', array('type' => 'hidden'));
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
                        <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
                        <h5 style="color: red;">Aggregate Report FORM</h5>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row-fluid">
                <div class="span12">

                    <!-- Data Manipulation Starts Here -->

                    <?php
                    $add_checklist = '<p><button class="btn btn-mini tiptip add-checklist" data-original-title="Add a file"
                                style="margin-left:10px;" type="button">&nbsp;<i class="icon-plus-sign"></i>&nbsp; </button>';
                    $num = 0;
                    ?> 
                    <hr>
                    <?php
                    $medals = $this->requestAction('/pockets/checklist/aggregate');
                    $reqs = $this->requestAction('/pockets/lchecklist/aggregate');
                    foreach ($medals as $lad => $medal) {
                        $num++;
                        ($reqs[$lad]) ? $req = '<span class="sterix">*</span>' : $req = ''; 
                        
                        echo $this->Form->input($lad, array(
                            'type' => 'checkbox',
                            'label' => array('class' => 'checkbox', 'text' => $num . '.'),
                            'error' => array('attributes' => array('class' => 'checkcontrols help-block')),
                            'class' => false, 'hiddenField' => false,
                            'between' => '<div class="checkcontrols"><input type="hidden" value="0" id="ApplicationApplicantProtocol_" name="data[Application][' . $lad . ']">
                                            <label class="checkbox required pull-left">',
                            'after' => $medal . ' ' . $req . ' </label>' . $add_checklist,
                        ));
                    ?>
                        <div id="Checklist" class="checkcontrols" title="<?php echo $lad ?>">
                            <?php
                            if (isset($this->request->data['Checklist'])) {
                                foreach ($this->request->data['Checklist'] as $bKey => $protocol) {
                                    if ($protocol['group'] === $lad) {
                                        echo '<div style="margin-top: 5px; margin-bottom: 5px;">';
                                        echo $this->Form->input('Checklist.' . $bKey . '.id');
                                        echo $this->Form->input('Checklist.' . $bKey . '.basename', array('type' => 'hidden'));
                                        echo $this->Form->input('Checklist.' . $bKey . '.model', array('type' => 'hidden')); 
                                        echo $this->Form->input('Checklist.' . $bKey . '.file_date', array('type' => 'hidden'));
                                        echo $this->Form->input('Checklist.' . $bKey . '.version_no', array('type' => 'hidden'));
                                        if (!empty($protocol['id']) && !empty($protocol['basename'])) {
                                            echo $this->Html->link(
                                                __($protocol['basename']),
                                                array('controller' => 'attachments',   'action' => 'download', $protocol['id']),
                                                array('class' => 'btn btn-info')
                                            );
                                            // echo "&nbsp;<span>version: " . $protocol['version_no'] . "</span>";
                                            // echo "&nbsp;<span>date: " . $protocol['file_date'] . "</span>";

                                            echo '<button value="' . $protocol['id'] . '" type="button" class="btn btn-mini btn-danger delete_file_link">
                        &nbsp;<i class="icon-trash"></i>&nbsp;</button>';
                                        } else {
                                            echo $this->Form->input('Checklist.' . $bKey . '.model', array('type' => 'hidden', 'value' => 'Checklist'));
                                            echo $this->Form->input('Checklist.' . $bKey . '.group', array('type' => 'hidden', 'value' => $lad));
                                            echo $this->Form->input('Checklist.' . $bKey . '.description', array('type' => 'hidden', 'value' => $medal));
                                            echo $this->Form->input('Checklist.' . $bKey . '.pocket_name', array('type' => 'hidden', 'value' => $lad));
                                            echo $this->Form->input('Checklist.' . $bKey . '.dirname', array('type' => 'hidden'));
                                            echo $this->Form->input('Checklist.' . $bKey . '.checksum', array('type' => 'hidden'));
                                            echo $this->Form->input('Checklist.' . $bKey . '.file', array(
                                                'type' => 'file', 'label' => false, 'div' => false,
                                                'error' => array('attributes' => array('class' => 'error help-block')),
                                                'between' => false,
                                                'after' => '<span id="ProtocolHelp' . $bKey . '" class="help-inline"> Upload! </span>'
                                            ));
                                        }
                                        echo "</div>";
                                    }
                                }
                            }
                            ?>
                        </div>
                </div>
            <?php
                    }
            ?>

            <!-- End of Data Manipulation -->
            </div>
        </div>
    </div>

    <div class="span2">
        <div class="my-sidebar" data-spy="affix">
            <div class="awell">
                <?php
                echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(
                    'name' => 'saveChanges',
                    'class' => 'btn btn-success mapop',
                    'formnovalidate' => 'formnovalidate',
                    'id' => 'SadrSaveChanges', 'title' => 'Save & continue editing',
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
                    '<i class="fa fa-times" aria-hidden="true"></i> Cancel',
                    array('controller' => 'users', 'action' => 'dashboard'),
                    array('escape' => false, 'class' => 'btn btn-danger btn-block')
                );
                ?>
            </div>
        </div>
    </div>
    </div>
</section>