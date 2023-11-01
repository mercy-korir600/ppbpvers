<?php
$this->assign('KHIS', 'active');
echo $this->Session->flash();
$this->Html->script('reports', array('inline' => false));
$this->Html->script('highcharts/highcharts', array('inline' => false));
$this->Html->script('highcharts/modules/data', array('inline' => false));
if ($this->Session->read('Auth.User.group_id') === '2') $this->Html->script('highcharts/modules/exporting', array('inline' => false));
if ($this->Session->read('Auth.User.group_id') === '2') $this->Html->script('highcharts/modules/export-data', array('inline' => false));
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
      echo $this->Form->create('Report', array(
        'class' => 'ctr-groups',
        'style' => array('padding: 9px;', 'background-color: #F5F5F5'),
      ));
      ?>
      <table class="table table-condensed" style="margin-bottom: 2px;">
        <tbody>
          <tr>
          <td>
          <?php
            $monthOptions = array(
                'January' => 'January',
                'February' => 'February',
                'March' => 'March',
                'April' => 'April',
                'May' => 'May',
                'June' => 'June',
                'July' => 'July',
                'August' => 'August',
                'September' => 'September',
                'October' => 'October',
                'November' => 'November',
                'December' => 'December',
            );

                $currentYear = date('Y');
                $yearOptions = array();
                for ($i = 1960; $i <= $currentYear; $i++) {
                    $yearOptions[$i] = $i;
            }
            ?>
            <?php
                echo $this->Form->input(
                    'start_date_month',
                    array(
                    'div' => false, 'type' => 'select', 'class' => 'span3 input-small unauthorized_index',
                    'label' => array('class' => 'required', 'text' => 'Report Dates'), 'options' => $monthOptions, 'empty' => false
                    )
                );
                echo $this->Form->input(
                    'end_date_year',
                    array(
                    'div' => false, 'type' => 'select', 'class' => 'span3 input-small unauthorized_index',
                    'label' => false, 'options' => $yearOptions, 'empty' => false
                    )
                );
            ?>
            </td>

            <td>
              <?php
              echo $this->Form->input(
                'county_id',
                array(
                  'div' => false,
                  'type' => 'select',
                  'class' => 'span4 unauthorized_index',
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
            <td></td>
            <td>
              <?php
              echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                'class' => 'btn btn-primary',
                'div' => 'control-group',
                'div' => false,
                'formnovalidate' => 'formnovalidate',
                'style' => array('margin-bottom: 5px')
              ));
              ?>
            </td>
            <td>
              <?php
              echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => 'khis_summary'), array('class' => 'btn', 'escape' => false, 'style' => array('margin-bottom: 5px')));
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
</div>

<!-- JavaScript Bundle with Popper -->
<script type="text/javascript">
 $(function() {
  var monthYearPicker = $('#ReportStartDate, #ReportEndDate');
  
  // Generate an array of month options
  var monthOptions = [];
  for (var i = 0; i < 12; i++) {
    monthOptions.push($.datepicker.formatDate('MM', new Date(0, i, 1)));
  }

  // Generate an array of year options
  var yearOptions = [];
  var currentYear = new Date().getFullYear();
  for (var i = currentYear; i <= currentYear + 10; i++) {
    yearOptions.push(i);
  }

  var startMonthPicker = $('#ReportStartDate');
  var endYearPicker = $('#ReportEndDate');

  startMonthPicker.selectmenu({
    changeMonth: false,
    changeYear: false,
    items: monthOptions
  });

  endYearPicker.selectmenu({
    changeMonth: false,
    changeYear: false,
    items: yearOptions
  });
  
  // Initialize to the current month and year
  var currentDate = new Date();
  startMonthPicker.val($.datepicker.formatDate('MM', currentDate));
  endYearPicker.val(currentYear);
});
</script>