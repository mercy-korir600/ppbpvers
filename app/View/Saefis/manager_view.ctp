<?php
$this->assign('Serious Adverse Event Following Immunization', 'active');
$this->Html->script('comments/reviews', array('inline' => false));
?>

<!-- Adverse Event Following Immunization
    ================================================== -->
<section id="aefisview">
  <ul id="reviewer_tab" class="nav nav-tabs">
    <li class="active"><a href="#formview" data-toggle="tab"><?php echo $saefi['Saefi']['reference_no']; ?></a></li>
    <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count($saefi['ExternalComment']); ?>)</a></li>
    <li><a href="#committee_review" data-toggle="tab">Committee Review (<?php echo count($saefi['Review']); ?>)</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="formview">
      <div class="row-fluid">
        <div class="span10">
          <?php
          echo $this->element('saefi/saefi_view'); ?>
        </div>
        <div class="span2">
          <?php
          echo $this->Html->link(
            'Download PDF',
            array('controller' => 'saefis', 'action' => 'view', 'ext' => 'pdf', $saefi['Saefi']['id']),
            array(
              'class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',
              'data-content' => 'Download the pdf version of the report',
            )
          );
          ?>
          <hr>
          <?php
          //   if($this->Session->read('Auth.User.user_type') != 'Public Health Program')  echo $this->Form->postLink('<span class="btn btn-warning btn-block tooltipper" data-toggle="tooltip" title="Add follow up report">  <b>Follow-up</b> <i class="fa fa-plus" aria-hidden="true"></i> </span>', array('controller' => 'saefis' , 'action' => 'followup', $aefi['Sefi']['id']), array('escape' => false), __('Add a followup report?'));
          ?>

          <hr>
          <?php
          if ($saefi['Saefi']['submitted'] > 1) {
            echo $this->Html->link('Edit Report', '#', array(
              'name' => 'continueEditing',
              'class' => 'btn  btn-block mapop disabled',
              'id' => 'AefiContinueReport', 'title' => 'Submitted Report!',
              'data-content' => 'This report has been submitted to PPB and cannot be edited',
              'div' => false,
            ));
          } else {
            echo $this->Html->link('Edit Report', array('action' => 'edit', $saefi['Saefi']['id']), array(
              'name' => 'continueEditing',
              'class' => 'btn  btn-block mapop',
              'id' => 'AefiContinueReport', 'title' => 'Edit Report',
              'data-content' => 'This is possible only if the form has not been successfully submitted to PPB',
              'div' => false,
            ));
          }
          ?>
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
            echo $this->element('comments/list', ['comments' => $saefi['ExternalComment']]);
            ?>
          </div>
          <div class="span4 lefty">
            <?php
            echo $this->element('comments/add', [
              'model' => [
                'model_id' => $saefi['Saefi']['id'], 'foreign_key' => $saefi['Saefi']['id'],
                'model' => 'Saefi', 'category' => 'external', 'url' => 'report_feedback'
              ]
            ])
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="committee_review">
      <!-- 12600 Letters debat -->
      <div class="amend-form">
        <h5 class="text-info"><u>Committee Report</u></h5>
        <div class="row-fluid">
          <div class="span8">
          <?php
            echo $this->element('reviews/list', ['reviews' => $saefi['Review']]);
            ?>
          </div>
          <div class="span4 lefty">
            <div class="bs-example">
              <?php

              echo $this->Form->create('Review', array(
                'url' => array('controller' => 'reviews', 'action' => 'add', $saefi['Saefi']['id']),
                'type' => 'file',
                'class' => false,
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
                
                <?php
                   echo $this->Form->input('saefi_id', ['type' => 'hidden', 'value' => $saefi['Saefi']['id']]); 
                   echo $this->Form->input('user_id', ['type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')]);
               echo $this->Form->input('comment', ['label' => array('class' => 'required','text'=>'Committe Review'), 'type' => 'textarea']);  
                ?>
              </div>
              <div class="row-fluid">
                      <div class="span11">
                        <div class="reviewUploads">
                          <h6 class="muted"><b>Attach File(s) </b>
                              <button type="button" class="btn btn-primary btn-small addUpload">&nbsp;<i class="icon-plus"></i>&nbsp;</button>
                          </h6>
                          <hr>
                        </div>
                      </div>
                  </div>
              <div class="form-group"> 
                <div class="span12"> 
                  <button type="submit" class="btn btn-success active"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                </div> 
            </div>
              <?php
              echo $this->Form->end();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>