<?php
$this->assign('AEFI', 'active');
?>

<div class="row-fluid">
    <div class="span12">

        <?php
        if ($prefix == 'reporter') {
        ?>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                    if ($this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program')  echo $this->Html->link(
                        '<i class="fa fa-file-o" aria-hidden="true"></i>  New AEFI',
                        array('controller' => 'aefis', 'action' => 'add'),
                        array('escape' => false, 'class' => 'btn btn-success')
                    );
                    ?>
                </div>
            </div>
        <?php } ?>

        <div class="marketing">
            <div class="row-fluid">
                <div class="span12">
                    <h3>AEFI:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small>
                        <?php if ($prefix == 'manager') {
                        } ?></h3>
                    <hr class="soften" style="margin: 7px 0px;">

                </div>
            </div>
        </div>

        <?php
        echo $this->Form->create();
        ?>
        <table class="table table-condensed" style="margin-bottom: 2px;">
            <tbody>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'reference_no',
                            array(
                                'div' => false,
                                'placeholder' => 'aefi/2020',
                                'class' => 'span12',
                                'label' => array('class' => 'required', 'text' => 'Reference No.')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'vaccine_name',
                            array(
                                'div' => false,
                                'placeholder' => 'bcg',
                                'class' => 'unauthorized_index span10',
                                'label' => array('class' => 'required', 'text' => 'Name of Vaccine')
                            )
                        );
                        ?>
                    </td>
                    <td colspan="2">
                        <h5>Report Dates</h5>
                        <div style="display: flex; align-items: center;">
                            <?php
                            echo $this->Form->control(
                                'start_date',
                                array(
                                    'div' => false,
                                    'type' => 'text',
                                    'class' => 'control-small unauthorized_index',
                                    'label' => false,
                                    'placeHolder' => 'Start Date'
                                )
                            );
                            ?>
                            <span style="margin: 0 10px;">-to-</span>
                            <?php
                            echo $this->Form->control(
                                'end_date',
                                array(
                                    'div' => false,
                                    'type' => 'text',
                                    'class' => 'control-small unauthorized_index',
                                    'after' => '<a style="font-weight:normal" onclick="$(\'.unauthorized_index\').val(\'\');" >
                              <em class="accordion-toggle">clear!</em></a>',
                                    'label' => false,
                                    'placeHolder' => 'End Date'
                                )
                            );
                            ?>
                        </div>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'name_of_institution',
                            array(
                                'div' => false,
                                'placeholder' => 'institution',
                                'class' => 'span12',
                                'label' => array('class' => 'required', 'text' => 'Institution')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <h5>Serious?</h5>
                        <?php
                        echo $this->Form->control('serious', array(
                            'options' => array('Yes' => 'Yes', 'No' => 'No'),
                            'legend' => false,
                            'label'=>false,
                            'type' => 'radio'
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'county_id',
                            array(
                                'div' => false,
                                'empty' => true,
                                'class' => 'control-small',
                                'label' => array('class' => 'required', 'text' => 'County')
                            )
                        );
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->control('bcg', array('label' => 'BCG Lymphadenitis', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('convulsion', array('label' => 'Convulsion', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('urticaria', array('label' => 'Generalized urticaria', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                    </td>
                    <td> 
                        <!-- 782327 -->
                        <?php
                        echo $this->Form->control('high_fever', array('label' => 'High Fever', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('abscess', array('label' => 'Injection site abscess', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                    </td>
                    <td colspan="2">
                        <?php
                        echo $this->Form->control('local_reaction', array('label' => 'Severe Local Reaction', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('anaphylaxis', array('label' => 'Anaphylaxis', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('meningitis', array('label' => 'Encephalopathy', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('paralysis', array('label' => 'Paralysis', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('toxic_shock', array('label' => 'Toxic shock', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('complaint_other', array('label' => 'Other', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('complaint_other_specify', array('type' => 'text', 'label' => false, 'class' => 'control-small', 'placeholder' => '(specify)'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if ($this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program')  echo $this->Form->control(
                            'patient_name',
                            array(
                                'div' => false,
                                'placeholder' => 'Patient name',
                                'class' => 'span12 unauthorized_index',
                                'label' => array('class' => 'required', 'text' => 'Patient Name')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <h5>Report Type?</h5>
                        <?php
                        echo $this->Form->control('report_type', array(
                            'options' => array('Initial' => 'Initial', 'Followup' => 'Followup'),
                            'legend' => false,
                            'label'=>false,
                            'type' => 'radio'
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('serious_yes', array(
                            'type' => 'select',
                            'empty' => true,
                            'class' => 'control',
                            'options' => array(
                                'Death' => 'Death',
                                'Life threatening' => 'Life threatening',
                                'Persistent or significant disability' => 'Persistent or significant disability',
                                'Missing cost or prolonged hospitalization' => 'Missing cost or prolonged hospitalization',
                                'Congenital anomaly' => 'Congenital anomaly',
                                'Other important medical event' => 'Other important medical event'
                            ),
                            'label' => array('class' => 'required', 'text' => 'Seriousness Criteria')
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('outcome', array(
                            'type' => 'select',
                            'empty' => true,
                            'class' => 'control-small',
                            'options' => array(
                                'Recovered/Resolved' => 'Recovered/Resolved',
                                'Recovering/Resolving' => 'Recovering/Resolving',
                                'Not recovered/Not resolved/Ongoing' => 'Not recovered/Not resolved/Ongoing',
                                'Recovered/Resolved with sequelae' => 'Recovered/Resolved with sequelae',
                                'Fatal' => 'Fatal',
                                'Unknown' => 'Unknown'
                            ),
                            'label' => array('class' => 'required', 'text' => 'Outcome')
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'reporter',
                            array('div' => false, 'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Reporter'), 'placeholder' => 'Name/Email')
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'designation_id',
                            array(
                                'div' => false,
                                'empty' => true,
                                'class' => 'control-small',
                                'label' => array('class' => 'required', 'text' => 'Designation')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <h5>Gender</h5>
                        <?php
                        echo $this->Form->control('gender', array(
                            'options' => array('Male' => 'Male', 'Female' => 'Female', 'Unknown' => 'Unknown'),
                            'legend' => false,
                            'label'=>false,
                            'type' => 'radio'
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Report Status</h5>
                        <?php
                        echo $this->Form->control('submitted', array(
                            'options' => array('1' => 'UnSubmitted', '2' => 'Submitted'),
                            'legend' => false,
                            'label'=>false,
                            'type' => 'radio'
                        ));
                        ?>
                    </td>
                    <td> <?php
                            echo $this->Form->control('health_program', array(
                                'type' => 'select',
                                'options' => [
                                    'Malaria program' => 'Malaria program',
                                    'National Vaccines and immunisation program' => 'National Vaccines and immunisation program',
                                    'Neglected tropical diseases program' => 'Neglected tropical diseases program',
                                    'MNCAH Priority Medicines' => 'MNCAH Priority Medicines',
                                    'TB program' => 'TB program',
                                    'NASCOP program' => 'NASCOP program',
                                    'Cancer/Oncology program' => 'Cancer/Oncology program'
                                ],
                                'empty' => true,
                                'label' => array('class' => 'control-label', 'text' => 'Public Health Program'),
                                'class' => 'control-xlarge'
                            ));  ?>
                    </td>
                    <td><?php
                        echo $this->Form->control('device', array(
                            'type' => 'select',
                            'options' => [
                                '0' => 'Web',
                                '1' => 'Mobile',
                            ],
                            'empty' => true,
                            'label' => array('class' => 'control-label', 'text' => 'Sending Device'),
                            'class' => 'control-xlarge'
                        ));  ?></td>
                    <td><?php
                        echo $this->Form->control('mah', array(
                            'type' => 'select',
                            'options' => [
                                '0' => 'MAH',
                                '1' => 'Non MAH',
                            ],
                            'empty' => true,
                            'label' => array('class' => 'control-label', 'text' => 'Reporter Role'),
                            'class' => 'control-xlarge'
                        ));  ?></td>
                    <td>
                        <h5>Vigiflow status:</h5>
                        <?php
                        echo $this->Form->control('vigiflow', array(
                            'type' => 'select',
                            'options' => [
                                '0' => 'Uploaded',
                                '1' => 'Pending',
                            ],
                            'empty' => true,
                            'label' => array('class' => 'control-label', 'text' => ''),
                            'class' => 'control-xlarge'
                        ));
                        ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="AefiPages" class="required">Pages</label></td>
                    <td>
                        <?php
                        echo $this->Form->control('pages', array(
                            'type' => 'select',
                            'div' => false,
                            'class' => 'control-small',
                            // 'selected' => $this->request->params['paging']['limit'],
                            'empty' => true,
                            'options' => $page_options,
                            'label' => false,
                        ));
                        ?>
                    </td>
                    <td>

                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                            'class' => 'btn btn-primary',
                            'escapeTitle' => false,
                            'div' => 'control-group',
                            'div' => false,
                            'formnovalidate' => 'formnovalidate',
                            'style' => array('margin-bottom: 5px')
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => 'index'), array('class' => 'btn', 'escape' => false, 'style' => array('margin-bottom: 5px')));
                        ?>
                    </td>
                    <td>
                        <?php
                        // echo $this->Html->link('<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel', array('action' => 'index', 'ext' => 'csv', '?' => $this->request->query), array('class' => 'btn btn-success', 'escape' => false));
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>
            <?php

            echo $this->Paginator->counter(
                __('Page <span class="badge">{{page}}</span> of <span class="badge">{{pages}}</span>, 
            showing <span class="badge">{{current}}</span> AEFIs out of 
            <span class="badge badge-inverse">{{count}}</span> total, starting on record <span class="badge">{{start}}</span>, 
            ending on <span class="badge">{{end}}</span>')
            );
            ?>

        </p>
        <?php echo $this->Form->end(); ?>
        <div class="pagination">
            <ul>
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?> 
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
        </div>


        <table class="table  table-bordered table-striped">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('reference_no'); ?></th>
                    <th><?php echo $this->Paginator->sort('report_type'); ?></th>
                    <th><?php echo ($this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') ? $this->Paginator->sort('patient_name') : $this->Paginator->sort('gender'); ?></th>
                    <?php if ($prefix == 'manager' || $prefix == 'reviewer') { ?>

                        <th><?php echo $this->Paginator->sort('vigiflow_ref'); ?></th>
                        <th><?php echo $this->Paginator->sort('webradr_ref'); ?></th>

                    <?php } ?>
                    <th><?php echo $this->Paginator->sort('reporter_date', 'Date reported'); ?></th>
                    <th><?php echo $this->Paginator->sort('created', 'Date created'); ?></th>
                    <th><?php echo $this->Paginator->sort('submitted_date', 'Date Submitted'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($aefis as $aefi) : ?>
                    <tr class="">
                        <td><?php echo h($aefi['id']); ?>&nbsp;</td>
                        <td>
                            <?php
                            if ($aefi['submitted'] > 1) {
                                echo $this->Html->link($aefi['reference_no'], array('action' => 'view', $aefi['id']), array('escape' => false, 'class' => 'text-' . ((isset($aefi['serious']) && $aefi['serious'] == 'Yes') ? 'error' : 'success')));
                            } else {
                                echo $this->Html->link($aefi['reference_no'], array('action' => (($prefix == 'reporter') ? 'edit' : 'view'), $aefi['id']), array('escape' => false, 'class' => 'text-' . ((isset($aefi['serious']) && $aefi['serious'] == 'Yes') ? 'error' : 'success')));
                            }
                            ?>&nbsp;</td>
                        <td><?php echo h($aefi['report_type']);
                            if ($aefi['report_type'] == 'Followup') {
                                echo "<br> Initial: ";
                                echo $this->Html->link(
                                    '<label class="label label-info">' . $aefi['reference_no'] . '</label>',
                                    array('action' => 'view', $aefi['aefi_id']),
                                    array('escape' => false)
                                );
                            }
                            ?>&nbsp;
                        </td>
                        <td><?php echo ($this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') ? h($aefi['patient_name']) : $aefi['gender']; ?>&nbsp;</td>
                        <?php if ($prefix == 'manager' || $prefix == 'reviewer') { ?>
                            <td><?php echo h($aefi['vigiflow_ref']);
                                echo "\n" . $aefi['vigiflow_date']; ?></td>
                            <td><?php echo h($aefi['webradr_ref']); ?></td>
                        <?php } ?>
                        <td><?php echo h($aefi['reporter_date']); ?>&nbsp;</td>
                        <td><?php echo h($aefi['created']); ?>&nbsp;</td>
                        <td><?php echo h($aefi['submitted_date']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php
                            if ($aefi['submitted'] > 1) {
                                echo $this->Html->link(
                                    '<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                                    array('controller' => 'aefis', 'action' => 'view', $aefi['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if (($prefix == 'manager' || $prefix == 'reviewer')) {
                                    echo "&nbsp;";

                                    echo $this->Html->link('<span class="label label-inverse tooltipper" data-toggle="modal" data-target="#confirmModal" title="Download E2B file"> <i class="fa fa-etsy" aria-hidden="true"></i> 2 <i class="fa fa-bold" aria-hidden="true"></i> </span>', '#', ['escape' => false]);

                            ?>

                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmModalLabel">Select File Type</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Please select the E2B file format to download
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <?php
                                                    echo $this->Form->postLink(
                                                        'R2',
                                                        ['controller' => 'aefis', 'action' => 'download', $aefi['id'], '2', 'ext' => 'xml', 'manager' => false],
                                                        ['class' => 'btn btn-primary', 'escape' => false, 'onclick' => '$("#myModal").modal("hide");']
                                                    );
                                                    echo "&nbsp;";
                                                    echo $this->Form->postLink(
                                                        'R3',
                                                        ['controller' => 'aefis', 'action' => 'download', $aefi['id'], '3', 'ext' => 'xml', 'manager' => false],
                                                        ['class' => 'btn btn-success', 'escape' => false, 'onclick' => '$("#myModal").modal("hide");']
                                                    );
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            <?php  }



                                if (($prefix == 'manager' || $prefix == 'reviewer') && empty($aefi['vigiflow_ref']) && $aefi['copied'] == 2) echo $this->Html->link(
                                    '<span class="label label-warning tooltipper" title="Send to vigiflow"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Vigiflow </span>',
                                    array('controller' => 'aefis', 'action' => 'vigiflow', $aefi['id'], 'manager' => false),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if (
                                    $prefix == 'manager' && empty($aefi['webradr_ref'])
                                    && $aefi['copied'] == 2
                                ) echo $this->Html->link(
                                    '<span class="label label-info tooltipper" title="Send to yello card"><i class="fa fa-upload" aria-hidden="true"></i> Yellow Card </span>',
                                    array('controller' => 'aefis', 'action' => 'yellowcard', $aefi['id'], 'manager' => false),
                                    array('escape' => false)
                                );

                                echo "&nbsp;";
                                if ($prefix == 'reporter' and $this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') {
                                    if ($this->request->getSession()->read('Auth.User.user_type') == 'County Pharmacist') {
                                        echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add Investigation up report"> <i class="fa fa-eye" aria-hidden="true"></i> Investigation</span>', array('controller' => 'aefis', 'action' => 'investigation', $aefi['id']), array('escape' => false), __('Add a Investigation report?'));
                                    } else {
                                        echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> Followup</span>', array('controller' => 'aefis', 'action' => 'followup', $aefi['id']), array('escape' => false), __('Add a followup report?'));
                                    }
                                }
                                echo "&nbsp;";

                                if (($prefix == 'manager' || $prefix == 'reviewer') && $aefi['copied'] == 2) echo $this->Html->link(
                                    '<span class="label label-success tooltipper" title="Copy & Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>',
                                    array('controller' => 'aefis', 'action' => 'edit', $aefi['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if (($prefix == 'manager' || $prefix == 'reviewer') && $aefi['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'aefis', 'action' => 'copy', $aefi['id']), array('escape' => false), __('Create a clean copy to edit?'));
                                if (($prefix == 'manager' || $prefix == 'reviewer'))  echo $this->Html->link(
                                    '<span class="label label-warning tooltipper" title="View"><i class="fa fa-refresh" aria-hidden="true"></i> Archive </span>',
                                    array('controller' => 'aefis', 'action' => 'archive', $aefi['id']),
                                    array('escape' => false),
                                    __('Are you sure you want to archive the report?')
                                );
                            } else {
                                if ($prefix == 'reporter' and $this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') echo $this->Html->link(
                                    '<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>',
                                    array('controller' => 'aefis', 'action' => 'edit', $aefi['id']),
                                    array('escape' => false)
                                );
                            }


                            echo "&nbsp;";
                            echo $this->Html->link(
                                '<span class="label label-default tooltipper" title="View"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </span>',
                                array('action' => 'view', 'ext' => 'pdf', $aefi['id']),
                                array('escape' => false)
                            );
                            // Check if the user is a reporter and the report is not submitted
                            if (($prefix == 'reporter' || $prefix == 'manager') && $aefi['submitted'] == 0 && $this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') {
                                echo "&nbsp;";
                                echo $this->Form->postLink('<span class="label label-warning tooltipper" data-toggle="tooltip" title="Delete"> <i class="fa fa-trash" aria-hidden="true"></i> Delete </span>', array('controller' => 'aefis', 'action' => 'delete', $aefi['id']), array('escape' => false), __('Are you sure you want to delete this report? 
                Note: This action cannot be undone.'));
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#start-date').datepicker({
            minDate: "-100Y",
            maxDate: "-0D",
            dateFormat: 'dd-mm-yy',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            showAnim: 'show',
            onSelect: function(selectedDate) {
                // Set the minDate of the end date picker based on the selected start date
                $('#end-date').datepicker("option", "minDate", selectedDate);
            }
        });

        // Initialize end date picker
        $('#end-date').datepicker({
            minDate: "-100Y", // This will be dynamically updated
            maxDate: "-0D",
            dateFormat: 'dd-mm-yy',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            showAnim: 'show'
        });


    });
</script>