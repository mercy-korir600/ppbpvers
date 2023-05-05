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
          <th style="width: 17%"></th>
          <th style="width: 7%"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <p> a) When was the patient immunized? (✓ the below and respond to ALL questions)</p>
          </td>
          <td>
            <?php
            echo $this->Form->input('when_vaccinated', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'when_vaccinated',
              'before' => '<label class="radio inline">',
              'after' => '</label>',
              'options' => array('Within the first vaccinations of the session' => 'Within the first vaccinations of the session'),
            ));
            echo $this->Form->input('when_vaccinated', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'when_vaccinated',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Within the last vaccinations of the session ' => 'Within the last vaccinations of the session ')
            ));
            echo $this->Form->input('when_vaccinated', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'when_vaccinated',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));

            

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p> In case of multidose vials, was the vaccine given</p>
          </td>
          <td>
            <?php
            echo $this->Form->input('when_vaccinated_specify', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'when_vaccinated_specify',
              'before' => '<label class="radio inline">',
              'after' => '</label>',
              'options' => array('within the first few doses of the vial administered? ' => 'within the first few doses of the vial administered? '),
            ));
            echo $this->Form->input('when_vaccinated_specify', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'when_vaccinated_specify',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('within the  ' => 'last doses of the vial administered? ')
            ));
            echo $this->Form->input('when_vaccinated_specify', array(
              'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
              'class' => 'when_vaccinated_specify',
              'before' => '<label class="radio inline">', 'after' => '</label>',
              'options' => array('Unknown' => 'Unknown')
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p> b) Was there an error in prescribing or non-adherence to recommendations for use of this
              vaccine?</p>
          </td>
          <td>
            <?php
            echo $this->Form->input('prescribing_error', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No'
            ));
            echo $this->Form->input('prescribing_error_specify', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'specify'
            ));

            ?>
          </td>
        </tr>

        <tr>
          <td>
            <p> c) Based on your investigation, do you feel that the vaccine (ingredients) administered could have
              been unsterile?
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccine_unsterile', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unable to assess'
            ));
            echo $this->Form->input('vaccine_unsterile_specify', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'specify'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p> d) Based on your investigation, do you feel that the vaccine's physical condition (e.g. colour,
              turbidity, foreign substances etc.) was abnormal at the time of administration?
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccine_condition', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unable to assess'
            ));
            echo $this->Form->input('vaccine_condition_specify', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'specify'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p> e) Based on your investigation, do you feel that there was an error in vaccine
              reconstitution/preparation by the vaccinator (e.g. wrong product, wrong diluent, improper
              mixing, improper syringe filling etc.)?
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccine_reconstitution', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unable to assess'
            ));
            echo $this->Form->input('vaccine_reconstitution_specify', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'specify'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>f) Based on your investigation, do you feel that there was an error in vaccine handling (e.g.
              break in cold chain during transport, storage and/or immunization session etc.)?
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccine_handling', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unable to assess'
            ));
            echo $this->Form->input('vaccine_handling_specify', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'specify'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>g) Based on your investigation, do you feel that the vaccine was administered incorrectly (e.g.
              wrong dose, site or route of administration, wrong needle size, not following good injection
              practice etc.)?
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccine_administered', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unable to assess'
            ));
            echo $this->Form->input('vaccine_administered_specify', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'specify'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>h) Number immunized from the concerned vaccine vial/ampoule
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccinated_vial', array(
              'label' => false, 'rows' => 1, 'between' => false, 'type' => 'number',
              'after' => false, 'class' => 'span11 autosave-ignore'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>i) Number immunized with the concerned vaccine in the same session
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccinated_session', array(
              'label' => false, 'rows' => 1, 'between' => false, 'type' => 'number',
              'after' => false, 'class' => 'span11 autosave-ignore'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>j) Number immunized with the concerned vaccine having the same batch number in other locations. Specify locations:
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccinated_locations', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore'
            ));
            echo $this->Form->input('vaccinated_locations_specify', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'specify'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>k) Could the vaccine given to this patient have a quality defect or is substandard or falsified?
            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unable to assess'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>l) Could this event be a stress response related to immunization (e.g. acute stress response,
              vasovagal reaction, hyperventilation, dissociative neurological symptom reaction etc.)?

            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('', array(
              'label' => false, 'rows' => 1, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unable to assess'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>m) Is this case a part of a cluster?

            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccinated_cluster', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unknown'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>i. If yes, how many other cases have been detected in the cluster?

            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccinated_cluster_number', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore'
            ));

            ?>
          </td>
        </tr>

        <tr>
          <td>
            <p>a.Did all the cases in the cluster receive vaccine from the same vial?

            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccinated_cluster_vial', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore',
              'placeholder' => 'Yes/No/ Unknown'
            ));

            ?>
          </td>
        </tr>
        <tr>
          <td>
            <p>b.If no, number of vials used in the cluster (enter details separately)

            </p>
          </td>
          <td>
            <?php
            echo $this->Form->input('vaccinated_cluster_vial_number', array(
              'label' => false, 'between' => false,
              'after' => false, 'class' => 'span11 autosave-ignore'
            ));

            ?>
          </td>
        </tr>

      </tbody>
    </table>
  </div><!--/span-->
</div><!--/row-->
<hr>