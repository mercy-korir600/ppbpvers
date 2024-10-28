<?php


echo $this->Html->script('sadrs_index', array('inline' => false));
$this->assign('PQHPT', 'active');
?>

<div class="row-fluid">
    <div class="span12">

        <?php

        if ($prefix == 'reporter') {
        ?>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                    if ($this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') echo $this->Html->link(
                        '<i class="fa fa-file-o" aria-hidden="true"></i> New PQHPT',
                        array('controller' => 'pqmps', 'action' => 'add'),
                        array('escape' => false, 'class' => 'btn btn-success')
                    );
                    ?>
                </div>
            </div>
            <hr>
        <?php } ?>

        <div class="marketing">
            <div class="row-fluid">
                <div class="span12">
                    <h3>PQHPT:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>
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
                                'placeholder' => 'pqmp/2020',
                                'class' => 'control',
                                'label' => array('class' => 'required', 'text' => 'Reference No.')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'brand_name',
                            array(
                                'div' => false,
                                'placeholder' => 'rash',
                                'class' => 'unauthorized_index span10',
                                'label' => array('class' => 'required', 'text' => 'Brand name')
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
                            'facility_name',
                            array(
                                'div' => false,
                                'placeholder' => 'facility',
                                'class' => 'control-small',
                                'label' => array('class' => 'required', 'text' => 'Faciliy')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'supplier_name',
                            array(
                                'div' => false,
                                'placeholder' => 'rash',
                                'class' => 'unauthorized_index span10',
                                'label' => array('class' => 'required', 'text' => 'Supplier name')
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
                </tr>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'generic_name',
                            array(
                                'div' => false,
                                'placeholder' => 'Generic name',
                                'class' => 'control',
                                'label' => array('class' => 'required', 'text' => 'Generic Name')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'name_of_manufacturer',
                            array('div' => false, 'placeholder' => 'Manufacturer', 'class' => 'control-small unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Manufacturer'))
                        );
                        ?>
                    </td>
                    <td colspan="2">
                        <h5>Product</h5>
                        <?php
                        echo $this->Form->control('medicinal_product', array('label' => 'Medicinal', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('blood_products', array('label' => 'Blood product', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('product_vaccine', array('label' => 'Vaccine', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                    </td>
                    <td>
                        <h5>Category</h5>
                        <?php
                        echo $this->Form->control('herbal_product', array('label' => 'Herbal product', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('medical_device', array('label' => 'Medical device', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('cosmeceuticals', array('label' => 'Cosmeceuticals', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('product_other', array('label' => 'Other', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('product_specify', array('label' => false, 'class' => 'control-small', 'placeholder' => '(specify)'));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control(
                            'country_id',
                            array(
                                'div' => false,
                                'empty' => true,
                                'class' => 'control-small',
                                'label' => array('class' => 'required', 'text' => 'Country')
                            )
                        );
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->control('product_formulation', array(
                            'type' => 'select',
                            'empty' => true,
                            'class' => 'control',
                            'options' => array(
                                'Oral tablets / capsules' => 'Oral tablets / capsules',
                                'Oral suspension / syrup' => 'Oral suspension / syrup',
                                'Injection' => 'Injection',
                                'Diluent' => 'Diluent',
                                'Powder for Reconstitution of Suspension' => 'Powder for Reconstitution of Suspension',
                                'Powder for Reconstitution of Injection' => 'Powder for Reconstitution of Injection',
                                'Eye drops' => 'Eye drops',
                                'Ear drops' => 'Ear drops',
                                'Nebuliser solution' => 'Nebuliser solution',
                                'Cream / Ointment / Liniment / Paste' => 'Cream / Ointment / Liniment / Paste',
                                'Other' => 'Other'
                            ),
                            'label' => array('class' => 'required', 'text' => 'Product formulation')
                        ));

                        // Radio buttons with label text
                        echo $this->Form->control('submitted', array(
                            'label' => array('class' => 'required', 'text' => 'Report Status'),
                            'empty' => true,
                            'hiddenField' => false,
                            'options' => array(
                                '0' => 'Submitted',
                                '1' => 'Unsubmitted'
                            )
                        ));

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
                        ));
                        ?>

                    </td>
                    <td>
                        <h5>Complaint</h5>
                        <?php
                        echo $this->Form->control('colour_change', array('label' => 'Colour change', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('separating', array('label' => 'Separating', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('powdering', array('label' => 'Powdering / crumbling', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('caking', array('label' => 'Caking', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('moulding', array('label' => 'Moulding', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                        <h5>Sending Device</h5>
                        <?php
                        echo $this->Form->control('sending_device', array(
                            'type' => 'select',
                            'options' => [
                                '1' => 'Web',
                                '2' => 'Mobile',
                            ],
                            'empty' => true,
                            'label' => array('class' => 'control-label', 'text' => ''),
                            'class' => 'control-xlarge'
                        ));  ?>
                    </td>

                    <td>
                        <?php
                        echo $this->Form->control('odour_change', array('label' => 'Change of odour', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('mislabeling', array('label' => 'Mislabeling', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('incomplete_pack', array('label' => 'Incomplete pack', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('therapeutic_ineffectiveness', array('label' => 'Therapeutic ineffectiveness', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('particulate_matter', array('label' => 'Particulate matter', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('complaint_other', array('label' => 'Other', 'hiddenField' => false, 'type' => 'checkbox'));
                        ?>
                    </td>
                    <td>
                        <h5>Medical Device</h5>
                        <?php
                        echo $this->Form->control('packaging', array('label' => 'Packaging', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('labelling', array('label' => 'Labelling', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('sampling', array('label' => 'Sampling', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('mechanism', array('label' => 'Mechanism', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('electrical', array('label' => 'Electrical', 'hiddenField' => false, 'type' => 'checkbox'));

                        echo $this->Form->control('mah', array(
                            'type' => 'select',
                            'options' => [
                                '0' => 'MAH',
                                '1' => 'Non MAH',
                            ],
                            'empty' => true,
                            'label' => array('class' => 'control-label', 'text' => 'Reporter Role'),
                            'class' => 'control-xlarge'
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->control('device_data', array('label' => 'Data', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('software', array('label' => 'Software', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('environmental', array('label' => 'Environmental', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('results', array('label' => 'Results', 'hiddenField' => false, 'type' => 'checkbox'));
                        echo $this->Form->control('readings', array('label' => 'Readings', 'hiddenField' => false, 'type' => 'checkbox'));
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
                </tr>
                <tr>
                    <td><label for="PqmpPages" class="required">Pages</label></td>
                    <td>
                        <?php
                        echo $this->Form->control('pages', array(
                            'type' => 'select',
                            'div' => false,
                            'class' => 'control-small',
                            //    'selected' => $this->request->params['paging']['limit'],
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
showing <span class="badge">{{current}}</span> PQHPTs out of <span class="badge badge-inverse">{{count}}</span> total, starting on record <span class="badge">{{start}}</span>, 
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
                    <th><?php echo $this->Paginator->sort('brand_name'); ?></th>
                    <th><?php echo $this->Paginator->sort('reporter_date', 'Date reported'); ?></th>
                    <th><?php echo $this->Paginator->sort('created', 'Date created'); ?></th>
                    <th><?php echo $this->Paginator->sort('submitted_date', 'Date Submitted'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pqmps as $pqmp) : ?>
                    <tr class="">
                        <td><?php echo h($pqmp['id']); ?>&nbsp;</td>
                        <td>
                            <?php
                            // echo h($pqmp['reference_no']); 
                            if ($pqmp['submitted'] > 1) {
                                // echo $this->Html->link($pqmp['reference_no'], array('action' => 'view', $pqmp['id']), array('escape'=>false));
                                echo $this->Html->link(
                                    $pqmp['reference_no'],
                                    array('controller' => 'pqmps', 'action' => 'view', $pqmp['id']),
                                    array('escape' => false, 'class' => 'text-' . ((in_array($pqmp['product_formulation'], ['Injection', 'Powder for Reconstitution of Injection', 'Eye drops', 'Nebuliser solution'])
                                        || $pqmp['therapeutic_ineffectiveness'] || $pqmp['particulate_matter']) ? 'error' : 'success'))
                                );
                            } else {
                                echo $this->Html->link($pqmp['reference_no'], array('action' => (($prefix == 'reporter') ? 'edit' : 'view'), $pqmp['id']), array('escape' => false));
                            }
                            ?>&nbsp;</td>
                        <td><?php echo h($pqmp['brand_name']);
                            ?>&nbsp;
                        </td>
                        <td><?php echo h($pqmp['reporter_date']); ?>&nbsp;</td>
                        <td><?php echo h($pqmp['created']); ?>&nbsp;</td>
                        <td><?php echo h($pqmp['submitted_date']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php
                            if ($pqmp['submitted'] > 1) {
                                echo $this->Html->link(
                                    '<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                                    array('controller' => 'pqmps', 'action' => 'view', $pqmp['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if (($prefix == 'manager' || $prefix == 'reviewer')  && $pqmp['copied'] == 2) echo $this->Html->link(
                                    '<span class="label label-success tooltipper" title="Copy & Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>',
                                    array('controller' => 'pqmps', 'action' => 'edit', $pqmp['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if (($prefix == 'manager' || $prefix == 'reviewer') && $pqmp['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'pqmps', 'action' => 'copy', $pqmp['id']), array('escape' => false), __('Create a clean copy to edit?'));
                                if (($prefix == 'manager' || $prefix == 'reviewer')) echo $this->Html->link(
                                    '<span class="label label-warning tooltipper" title="View"><i class="fa fa-refresh" aria-hidden="true"></i> Archive </span>',
                                    array('controller' => 'pqmps', 'action' => 'archive', $pqmp['id']),
                                    array('escape' => false),
                                    __('Are you sure you want to archive the report?')
                                );
                            } else {
                                if ($prefix == 'reporter' and $this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') {
                                    echo $this->Html->link(
                                        '<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>',
                                        array('controller' => 'pqmps', 'action' => 'edit', $pqmp['id']),
                                        array('escape' => false)
                                    );
                                    echo "&nbsp;";
                                }
                            }
                            echo "&nbsp;";
                            echo $this->Html->link(
                                '<span class="label label-default tooltipper" title="View"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </span>',
                                array('action' => 'view', 'ext' => 'pdf', $pqmp['id']),
                                array('escape' => false)
                            );
                            echo "&nbsp;";

                            // Check if the user is a reporter and the pqmp is not submitted
                            if (($prefix == 'reporter' || $prefix == 'manager') && $pqmp['submitted'] == 0 && $this->request->getSession()->read('Auth.User.user_type') != 'Public Health Program') {
                                echo $this->Form->postLink(
                                    '<span class="label label-warning tooltipper" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete </span>',
                                    array('action' => 'delete', $pqmp['id']),
                                    array('escape' => false),
                                    __('Are you sure you want to delete # %s?', $pqmp['id'] . '?
                  NOTE:This action cannot be undone.')
                                );
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
        var adates = $('#PqmpStartDate, #PqmpEndDate').datepicker({
            minDate: "-100Y",
            maxDate: "-0D",
            dateFormat: 'dd-mm-yy',
            format: 'dd-mm-yyyy',
            endDate: '-0d',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            showAnim: 'show',
            onSelect: function(selectedDate) {
                var option = this.id == "PqmpStartDate" ? "minDate" : "maxDate",
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