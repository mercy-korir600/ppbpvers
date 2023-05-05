<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
// $this->Html->script('multi/list_of_aefis', array('inline' => false));
//$this->Html->script('list_of_vaccines_v2', array('inline' => false));
?>
<div class="row-fluid">
  <div class="span12">
    <table id="relevant_patient_info" class="table table-bordered table-condensed table-pvborder">
      <thead>
        <tr>
          <th style="width: 17%"> <label class="required">Criteria</label></th>
          <th style="width: 7%"> <label>Finding</label></th>
          <th style="width: 13%"> <label> Remarks (If yes provide details)</label></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <p>Past history of similar event</p>
          </td>
          <td>

            <?php
            echo $this->Form->input('past_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('past_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
            echo $this->Form->input('past_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));

            ?>
          </td>
          <td>
            <?php
            
            echo $this->Form->input('past_history_remarks', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
            ));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>Adverse event after previous vaccination(s)</p>
          </td>
          <td>
            <?php
           
            echo $this->Form->input('adverse_event', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('adverse_event', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
            echo $this->Form->input('adverse_event', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));

            ?>
          </td>
          <td>
            <?php
            echo $this->Form->input('adverse_event_remarks', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
            ));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>History of allergy to vaccine, drug or food</p>
          </td>
          <td>
            <?php
            
            echo $this->Form->input('allergy_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('allergy_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
            echo $this->Form->input('allergy_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));
            ?>
          </td>
          <td>
            <?php
            echo $this->Form->input('allergy_history_remarks', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
            ));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>Pre-existing illness (30 days) / congenital disorder</p>
          </td>
          <td>
            <?php
            
              
            echo $this->Form->input('existing_illness', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('existing_illness', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
            echo $this->Form->input('existing_illness', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));

            ?>
          </td>
          <td>
            <?php
            echo $this->Form->input('existing_illness_remarks', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
            ));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>History of hospitalization in last 30 days, with cause</p>
          </td>
          <td>
            <?php
           
            echo $this->Form->input('hospitalization_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('hospitalization_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
            echo $this->Form->input('hospitalization_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));
            ?>
          </td>
          <td>
            <?php
            echo $this->Form->input('hospitalization_history_remarks', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
            ));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>Patient currently on concomitant medication?<br>
              (If yes, name the drug, indication, doses & treatment dates)
            </p>
          </td>
          <td>
            <?php
         
            echo $this->Form->input('medication_vaccination', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('medication_vaccination', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
            echo $this->Form->input('medication_vaccination', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));

            ?>
          </td>
          <td>
            <?php
            echo $this->Form->input('medication_vaccination_remarks', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
            ));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>Family history of any disease (relevant to AEFI) or allergy
            </p>
          </td>
          <td>
            <?php
         
            echo $this->Form->input('family_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('family_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
            echo $this->Form->input('family_history', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));
            ?>
          </td>
          <td>
            <?php
            echo $this->Form->input('family_history_remarks', array(
              'label' => false, 'between' => false,
              'rows' => 1,
              'after' => false, 'class' => 'span11 autosave-ignore',
            ));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <h5 style="color: #0B6DA2;">For Adult women
            </h5>
          </td>
          <td>

          </td>
          <td>
            <h5 style="color: #0B6DA2;">If yes provide number of weeks
            </h5>
          </td>
        </tr>
        <tr>
          <td>
            <p>Currently pregnant?
            </p>
          </td>
          <td>
            <?php
           
 
            echo $this->Form->input('pregnant', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('pregnant', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
            echo $this->Form->input('pregnant', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));
            ?>
          </td>
          <td>
            <?php
            echo $this->Form->input('pregnant_weeks', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
            ));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>Currently breastfeeding?
            </p>
          </td>
          <td>
            <?php
          

            echo $this->Form->input('breastfeeding', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Yes' => 'Yes')
            ));
            echo $this->Form->input('breastfeeding', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'site_type',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('No' => 'No')
            ));
           
            ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div><!--/span-->
</div><!--/row-->
<hr>