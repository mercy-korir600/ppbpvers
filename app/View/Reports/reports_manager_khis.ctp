<?php
$this->assign('KHIS', 'active');
echo $this->Session->flash();
// $this->Html->css('comments', null, array('inline' => false));
$this->Html->script('reports', array('inline' => false));
$this->Html->script('highcharts/highcharts', array('inline' => false));
$this->Html->script('highcharts/modules/data', array('inline' => false));
if ($this->Session->read('Auth.User.group_id') === '2') $this->Html->script('highcharts/modules/exporting', array('inline' => false));
if ($this->Session->read('Auth.User.group_id') === '2') $this->Html->script('highcharts/modules/export-data', array('inline' => false));
?>


<div class="container">
  <div class="row">
    <div class="col-md-10">
    <?php
    echo $this->Form->create('Report', array(
      // 'url' => array_merge(array('action' => 'index'), $this->params['pass']),
      'class' => 'ctr-groups', 'style' => array('padding:9px;', 'background-color: #F5F5F5'),
    ));
    ?>
    <table class="table table-condensed" style="margin-bottom: 2px;">
      <tbody>

        <tr>
        <td>
              <?php
              echo $this->Form->input(
                'start_date',
                array(
                  'div' => false,
                  'type' => 'select',
                  'class' => 'span2 unauthorized_index',
                  'label' => array('class' => 'required', 'text' => 'Month'),
                  'options' => array(
                    '01' => 'January',
                    '02' => 'February',
                    '03' => 'March',
                    '04' => 'April',
                    '05' => 'May',
                    '06' => 'June',
                    '07' => 'July',
                    '08' => 'August',
                    '09' => 'September',
                    '10' => 'October',
                    '11' => 'November',
                    '12' => 'December'
                  ),
                  'empty' => 'Month'
                )
              );
              ?>
            </td>
            <td>
              <?php
              $currentYear = date('Y');
              $years = range(1960, $currentYear);
              echo $this->Form->input(
                'end_date',
                array(
                  'div' => false,
                  'type' => 'select',
                  'class' => 'span2 unauthorized_index',
                  'label' => array('class' => 'required', 'text' => 'Year'),
                  'options' => array_combine($years, $years),
                  'empty' => 'Year'
                )
              );
              ?>
            </td>
          <td></td>
          <td><?php
              echo $this->Form->input(
                'county_id',
                array(
                  'div' => false, 'type' => 'select', 'class' => 'span4 unauthorized_index',
                  'label' => array('class' => 'required', 'text' => 'County'),
                  'empty' => 'All',
                  'options' => $counties,
                  'default' => $this->Session->read('Auth.User.county_id')


                )
              );

              ?>
          </td>
        </tr>
        <tr>
          <td>

          </td>
          <td>
            <?php
            echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
              'name' => 'searchReport',
              'class' => 'btn btn-primary', 'div' => 'control-group', 'div' => false,
              'formnovalidate' => 'formnovalidate',
              'style' => array('margin-bottom: 5px')
            ));
            ?>
          </td>
          <td>
            <?php
            echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => '/'), array('class' => 'btn', 'escape' => false, 'style' => array('margin-bottom: 5px')));
            ?>
          </td>
          <td>
            <?php
            echo $this->Form->button('<i class="fa fa-paper-plane-o icon-white"></i> Upload', array(
              'name' => 'uploadReport',
              'onclick' => "return confirm('Are you sure you wish to upload the data?');",
              'class' => 'btn btn-success', 'div' => 'control-group', 'div' => false,
              'formnovalidate' => 'formnovalidate',
              'style' => array('margin-bottom: 5px')
            ));
            ?>
          </td>
        </tr>
      </tbody>
    </table>
    <?php echo $this->Form->end(); ?>
    <hr>

    <?php echo $this->fetch('report'); ?>
    </div>
 </div>


  <?php if ($is_mobile) { ?>
    <div class="span2">
      <?php

      if ($this->Session->read('Auth.User.user_type') == 'County Pharmacist') {
        echo $this->element('menus/report_county_sidebar');
      } elseif ($this->Session->read('Auth.User.user_type') == 'Public Health Program') {
        echo $this->element('menus/report_program_sidebar');
      } elseif ($this->Session->read('Auth.User.group_id') == 3) {
        echo $this->element('menus/report_public_sidebar');
      } elseif (!$this->Session->read('Auth.User')) {
        echo $this->element('menus/report_public_sidebar');
      } else {
        echo $this->element('menus/report_sidebar');
      }

      ?>
    </div>
  <?php } ?>
</div>

<!-- JavaScript Bundle with Popper -->
<script type="text/javascript">
  $(function() {
    var monthYearPicker = $('#ReportStartDate, #ReportEndDate');
    
    monthYearPicker.datepicker({
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true,
      dateFormat: 'MM yy',
      onClose: function (dateText, inst) {
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        
        $(this).datepicker('setDate', new Date(year, month, 1));
      }
    });
    
    // Hide the day part of the datepicker
    monthYearPicker.datepicker('setDate', new Date());
  });
</script>