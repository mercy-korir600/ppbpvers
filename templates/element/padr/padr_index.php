<?php
$this->assign('PADR', 'active');
?>
<div class="row-fluid">
    <div class="span12">
        <?php
        if ($prefix == 'reporter') {
            echo $this->Html->link(
                '<i class="fa fa-file-o" aria-hidden="true"></i> New PADR',
                array('controller' => 'padrs', 'action' => 'add'),
                array('escape' => false, 'class' => 'btn btn-success')
            );
        }
        ?>
        <h3>Public ADRs:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small>

        </h3>
        <hr class="soften" style="margin: 7px 0px;">
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
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
                                'placeholder' => 'padr/2020',
                                'class' => 'span12',
                                'label' => array('class' => 'required', 'text' => 'Reference No.')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'drug_name',
                            array(
                                'div' => false,
                                'placeholder' => 'drug name',
                                'class' => 'span12 unauthorized_index',
                                'label' => array('class' => 'required', 'text' => 'Drug Name')
                            )
                        );
                        ?>
                    </td>
                    <td colspan="2">
                        <?php
                        echo $this->Form->control(
                            'start_date',
                            array(
                                'div' => false,
                                'type' => 'text',
                                'class' => 'control-small start_date unauthorized_index',
                                'after' => '-to-',
                                'label' => array('class' => 'required', 'text' => 'Report Dates'),
                                'placeHolder' => 'Start Date'
                            )
                        );
                        echo $this->Form->control(
                            'end_date',
                            array(
                                'div' => false,
                                'type' => 'text',
                                'class' => 'control-small end_date unauthorized_index',
                                'after' => '<a style="font-weight:normal" onclick="$(\'.unauthorized_index\').val(\'\');" >
                              <em class="accordion-toggle">clear!</em></a>',
                                'label' => false,
                                'placeHolder' => 'End Date'
                            )
                        );
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
                    <td>
                        <?php

                        ?>
                    </td>
                    <td>
                        <?php

                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->control(
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
                            'type' => 'radio'
                        ));
                        ?>
                    </td>
                    <td>
                        <h5>Is the reaction still on?</h5>
                        <?php
                        echo $this->Form->control('reaction_on', array(
                            'options' => array('Yes' => 'Yes', 'No' => 'No'),
                            'legend' => false,
                            'type' => 'radio'
                        ));
                        ?>
                    </td>
                    <td>
                        <?php

                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'reporter',
                            array('div' => false, 'class' => 'control-small unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Reporter'), 'placeholder' => 'Name/Email')
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
                        <!-- <h5>Gender</h5> -->
                        <?php
                        echo $this->Form->control('gender', array(
                            'options' => array('Male' => 'Male', 'Female' => 'Female', 'Unknown' => 'Unknown'),
                            'legend' => true,
                            'type' => 'radio'
                        ));
                        ?>
                    </td>
                </tr>
                <!-- Added -->
                <td>
                    <?php
                    echo $this->Form->control('submitted', array(
                        'type' => 'select',
                        'empty' => true,
                        'options' => array(
                            '0' => 'Submitted',
                            '1' => 'Unsubmitted'
                        ),
                        'label' => array('class' => 'required', 'text' => 'Report Status')
                    ));
                    ?>
                </td>
                <td>
                    <?php
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
                <td> <?php
                        echo $this->Form->control('device', array(
                            'type' => 'select',
                            'options' => [
                                '0' => 'Web',
                                '1' => 'Mobile',
                                '2' => 'USSD',
                                '3' => 'USSD 2',
                            ],
                            'empty' => true,
                            'label' => array('class' => 'control-label', 'text' => 'Sending Device'),
                            'class' => 'control-xlarge'
                        ));  ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <!-- End -->
                <tr>
                    <td><label for="PadrPages" class="required">Pages</label></td>
                    <td>
                        <?php
                        echo $this->Form->control('pages', array(
                            'type' => 'select',
                            'div' => false,
                            'class' => 'control-small',
                            //   'selected' => $this->request->params['paging']['limit'],
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
                            'escapeTitle'=>false,
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
        <p> <?php

            echo $this->Paginator->counter(
                __('Page <span class="badge">{{page}}</span> of <span class="badge">{{pages}}</span>, 
showing <span class="badge">{{current}}</span> PADRs out of 
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
                    <th><?php echo $this->Paginator->sort('report_title'); ?></th>
                    <th><?php echo $this->Paginator->sort('patient_name'); ?></th>
                    <?php if ($prefix == 'manager' || $prefix == 'reviewer') { ?><th><?php echo $this->Paginator->sort('vigiflow_ref'); ?></th> <?php } ?>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('submitted_date'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($padrs as $padr) : ?>
                    <tr class="">
                        <td><?php echo h($padr['id']); ?>&nbsp;</td>
                        <td>
                            <?php
                            echo $this->Html->link($padr['reference_no'], array('action' => 'view', $padr['id']), array('escape' => false));
                            ?>&nbsp;</td>
                        <td><?php
                            // echo $this->Text->truncate($padr['report_title'], 42);
                            if ($padr['report_type'] == 'Followup') {
                                echo "<br> Initial: ";
                                echo $this->Html->link(
                                    '<label class="label label-info">' . substr($padr['reference_no'], 0, strpos($padr['reference_no'], '_')) . '</label>',
                                    array('action' => 'view', $padr['padr_id']),
                                    array('escape' => false)
                                );
                            }
                            ?>&nbsp;
                        </td>
                        <td><?php echo h($padr['patient_name']); ?>&nbsp;</td>
                        <?php if ($prefix == 'manager' || $prefix == 'reviewer') { ?>
                            <td><?php echo h($padr['vigiflow_ref']);
                                echo "\n" . $padr['vigiflow_date']; ?></td>
                        <?php } ?>
                        <td><?php echo h($padr['created']); ?>&nbsp;</td>
                        <td><?php echo h($padr['submitted_date']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php
                            if ($padr['submitted'] >= 0) {
                                echo $this->Html->link(
                                    '<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                                    array('controller' => 'padrs', 'action' => 'view', $padr['token']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if ($prefix == 'reporter' and $this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> Followup </span>', array('controller' => 'padrs', 'action' => 'followup', $padr['id']), array('escape' => false), __('Add a followup report?'));
                                echo "&nbsp;";
                                if ($prefix == 'manager' || $prefix == 'reviewer') echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Download E2B file"> <i class="fa fa-etsy" aria-hidden="true"></i> 2 <i class="fa fa-bold" aria-hidden="true"></i> </span>', array('controller' => 'padrs', 'action' => 'download', $padr['id'], 'ext' => 'xml', 'manager' => false), array('escape' => false), __('Download E2B?'));
                                echo "&nbsp;";
                                if (($prefix == 'manager' || $prefix == 'reviewer') && empty($padr['vigiflow_ref']) && $padr['copied'] == 2) echo $this->Html->link(
                                    '<span class="label label-warning tooltipper" title="Send to vigiflow"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Vigiflow </span>',
                                    array('controller' => 'padrs', 'action' => 'vigiflow', $padr['id'], 'manager' => false),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";

                                if (($prefix == 'manager' || $prefix == 'reviewer') && $padr['copied'] == 2) echo $this->Html->link(
                                    '<span class="label label-success tooltipper" title="Copy & Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>',
                                    array('controller' => 'padrs', 'action' => 'edit', $padr['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if (($prefix == 'manager' || $prefix == 'reviewer') && $padr['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'padrs', 'action' => 'copy', $padr['id']), array('escape' => false), __('Create a clean copy to edit?'));
                                echo $this->Html->link(
                                    '<span class="label label-warning tooltipper" title="View"><i class="fa fa-refresh" aria-hidden="true"></i> Archive </span>',
                                    array('controller' => 'padrs', 'action' => 'archive', $padr['id']),
                                    array('escape' => false),
                                    __('Are you sure you want to archive the report?')
                                );
                            } else {
                                if ($prefix == 'reporter' and $this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') echo $this->Html->link(
                                    '<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>',
                                    array('controller' => 'padrs', 'action' => 'edit', $padr['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if ($prefix == 'manager' || $prefix == 'reviewer') {

                                    echo $this->Html->link(
                                        '<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                                        array('controller' => 'padrs', 'action' => 'view', $padr['token']),
                                        array('escape' => false)
                                    );
                                }
                            }
                            echo "&nbsp;";
                            echo $this->Html->link(
                                '<span class="label label-default tooltipper" title="View"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </span>',
                                array('controller' => 'padrs', 'action' => 'view', '_ext' => 'pdf', $padr['token']),
                                array('escape' => false)
                            );

                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Excel Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="assignModalHeader">Upload Reports</h4>
            </div>
            <?php echo $this->Form->create(
                null, array('url' => array('controller' => 'padrs', 'action' => 'upload'), 'type' => 'file', 'class' => 'form-horizontal')); ?>

            <div class="modal-body">

                <div class="form-group">
                    <?php

                    echo $this->Form->file('excel_file', ['label' => array('class' => 'form-control required', 'accept' => 'text/csv', 'text' => 'Report File'), 'type' => 'file']);

                    ?>
                </div>
                <p class="help-block">Choose a CSV file to upload.</p>
            </div>


        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="modal buttons">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                </div>
                <div class="btn-group" role="group">
                    <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary')); ?>
                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
</div>
<!-- End of Excell Modal -->


<script type="text/javascript">
    $(function() {
        var adates = $('.start_date, .end_date').datepicker({
            minDate: "-100Y",
            maxDate: "-0D",
            dateFormat: 'dd-mm-yy',
            format: 'dd-mm-yy',
            endDate: '-0d',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            showAnim: 'show',
            onSelect: function(selectedDate) {
                var option = this.class == "start_date" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(
                        instance.settings.dateFormat ||
                        $.datepicker._defaults.dateFormat,
                        selectedDate, instance.settings);
                adates.not(this).datepicker("option", option, date);
            }
        });

    });
</script>