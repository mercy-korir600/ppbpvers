<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
    // $this->Html->script('multi/list_of_aefis', array('inline' => false));
  //$this->Html->script('list_of_vaccines_v2', array('inline' => false));
?>
<style>
.vaccine-inputs {
    display: flex;
    flex-direction: column;
}
</style>
<div class="row-fluid">
    <div class="span12">
        <table id="relevant_patient_info" class="table table-bordered table-condensed table-pvborder">
            <thead>
                <tr>
                    <th style="width: 17%"> </th>
                    <th style="width: 5%"></th>
                </tr>
                <tr>
                    <th style="width: 17%">• Reconstitution procedure (✓)</th>
                    <th style="width: 5%"> Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p style="text-indent: 5em;">Same reconstitution syringe used for multiple vials of same vaccine?</p>
                    </td>
                    <td>
                            <?php
								echo $this->Form->input('reconstitution_multiple', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_multiple',
									'before' => '<div>
														<div class="controls">  <input type="hidden" value="" id="reconstitution_multiple_" name="data[Aefi][reconstitution_multiple]"> <label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('reconstitution_multiple', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_multiple',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('reconstitution_multiple', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_multiple',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('N/A' => 'N/A'),
								));
							?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="text-indent: 5em;">Same reconstitution syringe used for reconstituting different vaccines?</p>
                    </td>
                    <td>
                            <?php
								echo $this->Form->input('reconstitution_different', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_different',
									'before' => '<div>
														<div class="controls">  <input type="hidden" value="" id="reconstitution_different_" name="data[Aefi][reconstitution_different]"> <label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('reconstitution_different', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_different',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('reconstitution_different', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_different',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('N/A' => 'N/A'),
								));
							?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="text-indent: 5em;">Separate reconstitution syringe for each vaccine vial?</p>
                    </td>
                    <td>
                            <?php
								echo $this->Form->input('reconstitution_vial', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_vial',
									'before' => '<div>
														<div class="controls">  <input type="hidden" value="" id="reconstitution_vial_" name="data[Aefi][reconstitution_vial]"> <label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('reconstitution_vial', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vial',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('reconstitution_vial', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vial',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('N/A' => 'N/A'),
								));
							?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p style="text-indent: 5em;">Separate reconstitution syringe for each vaccination?</p>
                    </td>
                    <td>
                            <?php
								echo $this->Form->input('reconstitution_syringe', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_syringe',
									'before' => '<div>
														<div class="controls">  <input type="hidden" value="" id="reconstitution_syringe_" name="data[Aefi][reconstitution_syringe]"> <label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('reconstitution_syringe', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_syringe',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('reconstitution_syringe', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_syringe',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('N/A' => 'N/A'),
								));
							?>
                    </td>
                </tr>
				<tr>
                    <td>
                        <h5>• Are the vaccines and diluents used the same as those recommended by the manufacturer?</h5>
                    </td>
                    <td>
                            <?php
								echo $this->Form->input('reconstitution_vaccines', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_vaccines',
									'before' => '<div>
														<div class="controls">  <input type="hidden" value="" id="reconstitution_vaccines_" name="data[Aefi][reconstitution_vaccines]"> <label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('reconstitution_vaccines', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('reconstitution_vaccines', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('N/A' => 'N/A'),
								));
							?>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <!--/span-->
</div>
<!--/row-->
<hr>
