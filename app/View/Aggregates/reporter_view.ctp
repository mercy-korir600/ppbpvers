<?php
$this->assign('AGGREGATE', 'active');
?>
<section id="sadrsview">
  <ul id="reviewer_tab" class="nav nav-tabs">
    <li class="active"><a href="#formview" data-toggle="tab"><?php echo $aggregate['Aggregate']['reference_no']; ?></a></li>
    <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count($aggregate['ExternalComment']); ?>)</a></li>
    <?php if (!empty($aggregate['ReviewerAggregate'])) { ?>
      <li><a href="#summary" data-toggle="tab">Summary Report</a></li>
      <li><a href="#recommendation_comments" data-toggle="tab">Recommendations</a></li>
    <?php } ?>


  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="formview">
      <div class="row-fluid">
        <div class="span10">
          <?php echo $this->element('aggregates/aggregate_view'); ?>
        </div>
        <div class="span2">
          <?php
          echo $this->Html->link('Download PDF', array('controller' => 'aggregates', 'action' => 'view', 'ext' => 'pdf', $aggregate['Aggregate']['id']),                            array('class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',                            'data-content' => 'Download the pdf version of the report',));
          echo "&nbsp;";
          echo $this->Form->postLink('<span class="btn btn-warning btn-block tooltipper" data-toggle="tooltip" title="Add follow up report">  <b>Follow-up</b> <i class="fa fa-plus" aria-hidden="true"></i> </span>', array('controller' => 'aggregates', 'action' => 'followup', $aggregate['Aggregate']['id']), array('escape' => false), __('Add a followup report?'));
          ?>
          <hr>
        </div>
      </div>
    </div>


    <div class="tab-pane" id="recommendation_comments">
      <!-- 12600 Letters debat -->
      <div class="amend-form">
        <h5 class="text-info"><u>Recommendations</u></h5>
        <div class="row-fluid">
          <div class="span8">
            <?php
            echo $this->element('comments/list', ['comments' => $summary['Recommendation']]);
            ?>
          </div>
          <div class="span4 lefty">
            <?php
            echo $this->element('comments/add', [
              'model' => [
                'model_id' => $summary['id'], 'foreign_key' => $summary['id'],
                'model' => 'Aggregate',
                'review' => false,
                'category' => 'recommendation',
                'url' => 'report_feedback'
              ]
            ])
            ?>
          </div>
        </div>
      </div>
    </div>


    <div class="tab-pane" id="summary">
      <div class="row-fluid">
        <div class="span10">
          <?php echo $this->element('aggregates/summary'); ?>
        </div>
        <div class="span2">
          <?php
          echo $this->Html->link('Download PDF', array('controller' => 'aggregates', 'action' => 'view', 'ext' => 'pdf', $aggregate['Aggregate']['id']),                            array('class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',                            'data-content' => 'Download the pdf version of the report',));
          echo "&nbsp;";
          echo $this->Form->postLink('<span class="btn btn-warning btn-block tooltipper" data-toggle="tooltip" title="Add follow up report">  <b>Follow-up</b> <i class="fa fa-plus" aria-hidden="true"></i> </span>', array('controller' => 'aggregates', 'action' => 'followup', $aggregate['Aggregate']['id']), array('escape' => false), __('Add a followup report?'));
          ?>
          <hr>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="external_report_comments">
      <!-- 12600 Letters debat -->
      <div class="amend-form">
        <h5 class="text-info"><u>FEEDBACK</u></h5>
        <div class="row-fluid">
          <div class="span8">
            <?php
            echo $this->element('comments/list', ['comments' => $aggregate['ExternalComment']]);
            ?>
          </div>
          <div class="span4 lefty">
            <?php
            echo $this->element('comments/add', [
              'model' => [
                'model_id' => $aggregate['Aggregate']['id'], 'foreign_key' => $aggregate['Aggregate']['id'],
                'model' => 'Aggregate', 'review' => false, 'category' => 'external', 'url' => 'report_feedback'
              ]
            ])
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>