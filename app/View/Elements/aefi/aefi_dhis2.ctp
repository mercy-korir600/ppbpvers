<?php
$this->assign('Adverse Event Following Immunization', 'active');
?>

<div class="row-fluid">
    <div class="span12">

        <?php
        echo $this->Session->flash();
        if ($redir == 'reporter') {
        ?>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                    if ($this->Session->read('Auth.User.user_type') != 'Public Health Program')  echo $this->Html->link(
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
                    <h3>Adverse Event Following Immunization:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small></h3>
                    <hr class="soften" style="margin: 7px 0px;">

                </div>
            </div>
        </div>

        <?php
        echo $this->Form->create('Aefi', array(
            'url' => array_merge(array('action' => 'dhis2'), $this->params['pass']),
            'class' => 'ctr-groups', 'style' => array('padding:9px;', 'background-color: #F5F5F5'),
        ));
        ?>
        <table class="table table-condensed" style="margin-bottom: 2px;">
            <tbody>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->input('category', array(
                            'type' => 'select', 'options' => [
                                'country' => 'Country',
                                'county' => 'County',
                                'ward' => 'Ward',
                                'facility' => 'Facility',
                            ], 
                            'label' => array(
                                'class' => 'control-label',
                                'text' => 'Category'
                            ),
                            'class' => 'input-xlarge category'

                        ));
                        ?>
                    </td>
                    <td> <?php
                            echo $this->Form->input('month', array(
                                'type' => 'select',
                                'options' => $months, 
                                // 'empty' =>'All',
                                'label' => array('class' => 'control-label', 'text' => 'Month'),
                                'class' => 'input-xlarge'
                            ));  ?>
                    </td>
                    <td><?php
                        echo $this->Form->input('year', array(
                            'type' => 'select',
                            'options' => $years,
                            // 'empty' => 'All',
                            'label' => array(
                                'class' => 'control-label',
                                'text' => 'Year'
                            ),
                            'class' => 'input-xlarge'
                        ));  ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->input('county', array(
                            'type' => 'select', 
                            'options' =>$counties,
                            'empty'=>true,
                            'label' => array(
                                'class' => 'control-label',
                                'text' => 'County'
                            ),
                            'class' => 'input-xlarge diff',
                            'disabled' => true
                        ));
                        ?>
                    </td>
                    <td> <?php
                            echo $this->Form->input('sub_county', array(
                                'type' => 'select', 
                                'options'=>$sub_counties,
                                'empty' => true,
                                'label' => array('class' => 'control-label', 'text' => 'Sub County'),
                                'class' => 'input-xlarge sub',  'disabled' => true
                            ));  ?>
                    </td>
                    <td><?php
                        echo $this->Form->input('ward', array(
                            'type' => 'select', 
                            'empty' => true,
                            'label' => array(
                                'class' => 'control-label',
                                'text' => 'Ward'
                            ),
                            'class' => 'input-xlarge ward',  'disabled' => true
                        ));  ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>

                    <td>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                            'name' => 'submitReport',
                            'class' => 'btn btn-primary', 'div' => 'control-group', 'div' => false,
                            'formnovalidate' => 'formnovalidate',
                            'style' => array('margin-bottom: 5px')
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => 'dhis2'), array('class' => 'btn', 'escape' => false, 'style' => array('margin-bottom: 5px')));
                        ?>
                    </td>
                    <td>

                    </td>
                </tr>
            </tbody>
        </table>

        <?php echo $this->Form->end(); ?>



        <table class="table  table-bordered table-striped">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('Category'); ?></th>
                    <th><?php echo $this->Paginator->sort('BCG Lymphadenitis'); ?></th>
                    <th><?php echo $this->Paginator->sort('Convulsion'); ?></th>
                    <th><?php echo $this->Paginator->sort('Generalized urticaria'); ?></th>
                    <th><?php echo $this->Paginator->sort('High Fever'); ?></th>
                    <th><?php echo $this->Paginator->sort('Injection site abscess'); ?></th>
                    <th><?php echo $this->Paginator->sort('Severe Local Reaction'); ?></th>
                    <th><?php echo $this->Paginator->sort('Anaphylaxis'); ?></th>
                    <th><?php echo $this->Paginator->sort('Encephalopathy'); ?></th>
                    <th><?php echo $this->Paginator->sort('Paralysis'); ?></th>
                    <th><?php echo $this->Paginator->sort('Toxic shock'); ?></th>
                    <th><?php echo $this->Paginator->sort('Total'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $c = 0;
                foreach ($data as $dt) : ?>
                    <?php $c++; ?>
                    <tr class="">
                        <td><?php echo h($c); ?>&nbsp;</td>
                        <td><?php echo h($dt['county']); ?>&nbsp;</td>
                        <td><?php echo h($dt['bcg']); ?>&nbsp;</td>
                        <td><?php echo h($dt['convulsion']); ?>&nbsp;</td>
                        <td><?php echo h($dt['urticaria']); ?>&nbsp;</td>
                        <td><?php echo h($dt['fever']); ?>&nbsp;</td>
                        <td><?php echo h($dt['abscess']); ?>&nbsp;</td>
                        <td><?php echo h($dt['reaction']); ?>&nbsp;</td>
                        <td><?php echo h($dt['anaphylaxis']); ?>&nbsp;</td>
                        <td><?php echo h($dt['encephalopathy']); ?>&nbsp;</td>
                        <td><?php echo h($dt['paralysis']); ?>&nbsp;</td>
                        <td><?php echo h($dt['shock']); ?>&nbsp;</td>
                        <td><?php echo h($dt['total']); ?>&nbsp;</td>
                        <td><?php
                            echo "&nbsp;";
                            echo $this->Html->link(
                                '<span class="label label-default tooltipper" title="Submit"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Submit </span>',
                                array('action' => 'dhis2'),
                                array('escape' => false)
                            );
                            ?></td>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var adates = $('#AefiStartDate, #AefiEndDate').datepicker({
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
                var option = this.id == "AefiStartDate" ? "minDate" : "maxDate",
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