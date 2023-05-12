<?php
$this->assign('AEFI', 'active');
$this->Html->script('jquery/combobox', array('inline' => false));
$this->Html->script('jquery/jquery.datetimepicker.full', array('inline' => false));
$this->Html->script('saefis', array('inline' => false));
$this->Html->css('jquery.datetimepicker', false, array('inline' => false));
$this->Html->script('jquery/jquery.datetimepicker.full', array('inline' => false));
?>

<?php
echo $this->Session->flash();
echo $this->Form->create('Saefi', array(
	'type' => 'file',
	'class' => 'form-horizontal',
	'inputDefaults' => array(
		'div' => array('class' => 'control-group'),
		'label' => array('class' => 'control-label required'),
		'between' => '<div class="controls">',
		'after' => '</div>',
		'class' => '',
		'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
		'error' => array('attributes' => array('class' => 'controls help-block')),
	),
));
?>
<div class="row-fluid">
	<div class="span10 formbacka">

		<?php
		echo $this->Form->input('id', array());
		// echo $this->Form->input('Aefi.report_type', array('type' => 'hidden'));
		echo $this->Form->input('Saefi.reference_no', array('type' => 'hidden'));
		?>

		<div class="row-fluid">
			<div class="span2">
				<?php
				echo $this->Html->image('header-object.png', array('alt' => 'AEFI'));
				?>
			</div>
			<div class="span8" style="text-align: center;">
				<h2>MINISTRY OF HEALTH</h2>
				<p class="lead">National Vaccines and Immunization Program</p>
				<h3>AEFI Investigation Form</h3>
				<p style="color: red;">(Only for Serious Adverse Events Following Immunization  Death / Disability /
					Hospitalization / Cluster)</p>
			</div>
			<div class="span2">
				<?php
				echo $this->Html->image('vaccinate2.png', array('alt' => 'AEFI'));
				echo "<br>";
				echo $this->Html->image('confidence.png', array('alt' => 'AEFI'));
				?>
			</div>
		</div><br>
		<div class="row-fluid">
			<div class="span8">
				<p class="controls" id="aefi_edit_tip"> <span class="label label-important">Tip:</span> Fields marked
					with <span style="color:red;">*</span> are mandatory</p>
				<?php

				?>
			</div>
			<div class="span4" id="aefi_edit_form_id">
				<h5> <?php echo  'Form ID: ' . $this->data['Saefi']['reference_no']; ?></h5>
				<h6><span class="label label-important">Important</span> Unique Form ID</h6>
			</div>
		</div>
		<!--/row-->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('province_id', [
					'label' => 'Province ',  'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Province <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>', 'options' => $county, 'empty' => true, 'escape' => false
				]);
				?>
			</div>
			<div class="span6">
				<?= $this->Form->input('district', array(
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'District <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>'
				)); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<?= $this->Form->input('name_of_vaccination_site', array(
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Address of vaccination site <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>'
				)); ?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('reporter_name', [
					'label' => 'Name of Investigating Health Worker',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Name of Investigating Health Worker <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>'
				]);
				?>
			</div>

		</div>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('designation_id', [
					'label' => 'Designation ',  'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Designation <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>', 'options' => $designations, 'empty' => true, 'escape' => false
				]);
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('telephone', [
					'label' => 'Telephone # Landline (with code)', 'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Telephone # Landline (with code)'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">

				<?php
				echo $this->Form->input('mobile', [
					'label' => 'Mobile', 'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Mobile <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('reporter_email', [
					'label' => 'Reporter email',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Reporter email <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
			</div>

		</div>
		<div class="row-fluid">
			<div class="span6">
				<p> <b>Place of vaccination <span style="color:red;">*</span><b></p>
				<?php


				echo $this->Form->input('place_vaccination', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'control-group required',
					'before' => '<label class="radio">',    'after' => '</label>',
					'options' => array('Govt. health facilit' => 'Govt. health facility'),
				));
				echo $this->Form->input('place_vaccination', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'control-group required',
					'before' => '<label class="radio">',    'after' => '</label>',
					'options' => array('Private health facility' => 'Private health facility'),
				));

				echo $this->Form->input('place_vaccination', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'control-group required',
					'before' => '<label class="radio">',    'after' => '</label>',
					'options' => array('Other' => 'Other'),
				));
				echo $this->Form->input('place_vaccination_other', [
					'label' => 'Other, (specify)',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Other, (specify)'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
			</div>

			<div class="span6">
				<p> <b>Vaccination in <span style="color:red;">*</span><b></p>
				<?php
				echo $this->Form->input('vaccination_in', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'control-group required',
					'before' => '<label class="radio">',    'after' => '</label>',
					'options' => array('Campaign' => 'Campaign'),
				));
				echo $this->Form->input('vaccination_in', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'control-group required',
					'before' => '<label class="radio">',    'after' => '</label>',
					'options' => array('Routine' => 'Routine'),
				));
				echo $this->Form->input('vaccination_in', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'control-group required',
					'before' => '<label class="radio">',    'after' => '</label>',
					'options' => array('Other' => 'Other'),
				));
				echo $this->Form->input('vaccination_in_other', [
					'label' => 'Other, (specify)',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Other, (specify)'),
					'after' => '<p class="help-block"> </p></div>',
				]);

				?>
			</div>

			<div class="span3">
				<?php

				?>
			</div>
		</div>

		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input(
					'report_date',
					array(
						'type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array(
							'class' => 'control-label required', 'text' => 'Date AEFI reported <span style="color:red;">*</span>'
						),
					)
				);
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input(
					'start_date',
					array(
						'type' => 'text', 'class' => 'span11 date-pick-field', 'label' => array(
							'class' => 'control-label required', 'text' => 'Date investigation started <span style="color:red;">*</span>'
						),
					)
				);
				?>
			</div>
		</div>
		<!-- End of Row -->
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('complete_date', array(
					'type' => 'text', 'class' => 'span11 date-pick-field',
					'label' => array(
						'class' => 'control-label required',
						'text' => 'Date investigation completed <span style="color:red;">*</span>'
					),
				));
				?>
			</div>
			<div class="span6">
				<?php

				?>
			</div>
		</div>
		<!-- End of Row -->
		<div class="row-fluid">
			<h4 style="text-align: center; margin-bottom: 10px;">Patient Details</h4>
		</div>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('patient_name', [
					'label' => 'Patient Name', 'type' => 'text',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Patient Name <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('gender', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Gender <span style="color:red;">*</span></label> </div>
												<div class="controls">   <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Male' => 'Male'),
				));
				echo $this->Form->input('gender', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('Female' => 'Female'),
				));
				echo $this->Form->input('gender', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
											<a class="tooltipper" data-original-title="Clears the checked value"
											onclick="$(\'.gender, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
											<em class="accordion-toggle">clear!</em></a> </label>
											</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
		</div>
		<!-- End of Row -->
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('patient_address', [
					'label' => 'Patient’s physical address <small class="muted">(Street name, house number, ward/village, phone number etc.)</small>:', 'type' => 'text',  'escape' => false,
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Patient’s physical address <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
			</div>
			<div class="span6">
				<div class="well-mine" style="background-color: #e6e6dfcc;">
					<?php
					echo $this->Form->input('date_of_birth', array(
						'type' => 'date',
						'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(choose day)', 'month' => '(choose month)', 'year' => '(choose year)'),
						'label' => array('class' => 'control-label required', 'text' => 'Date of Birth <span style="color:red;">*</span>'),
						//'title'=> 'Year is mandatory. Pick first day of the month if unsure.',
						'after' => ' <a style="font-weight:normal" onclick="$(\'.birthdate\').removeAttr(\'disabled\'); $(\'.birthdate\').val(\'\');
									$(\'#AefiAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#AefiAgeGroup\').val(\'\');" >
									<em class="accordion-toggle">clear!</em></a>
									<p class="help-block">  If selected, year is mandatory. </p></div>',
						'class' => 'tooltipper birthdate autosave-ignore ',
					));

					?>
					<h5 class="controls">--OR Age at onset--</h5>
					<?php
					echo $this->Form->input('age_at_onset_years', array('label' => array('class' => 'control-label', 'text' => 'Age in years'),));
					echo $this->Form->input('age_at_onset_months', array('label' => array('class' => 'control-label', 'text' => 'Age in months'),));
					echo $this->Form->input('age_at_onset_days', array('label' => array('class' => 'control-label', 'text' => 'Age in days'),));

					?>
					<h5 class="controls">--OR Age group--</h5>
					<?php
					echo $this->Form->input('age_group', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'age_group',
						'before' => '<div class="control-group"> <div> <label class="control-label">Age Group</label> </div>
													<div class="controls"> <label class="radio inline">',
						'after' => '</label>',
						'options' => array('< 1 year' => '< 1 year'),
					));
					echo $this->Form->input('age_group', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'age_group',
						'before' => '<label class="radio inline">', 'after' => '</label>',
						'options' => array('1 - 5 years' => '1 - 5 years'),
					));
					echo $this->Form->input('age_group', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'age_group',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio inline">',
						'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.age_group, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
						'options' => array('> 5 years' => '> 5 years'),
					));
					?>
				</div>
			</div>
		</div>
		<hr>
		<!-- End of Row -->
		<div class="row-fluid">
			<h4 style="margin-left: 15%;">*Complete below table if vaccination information missing on the AEFI reporting form</h4>
			<div class="col-xs-12">
				<?php echo $this->element('multi/saefi_list_of_vaccines'); ?></div>
		</div>
		<div class="row-fluid">
			<div class="span6 editable">
				<?php
				echo $this->Form->input('site_type', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'class' => 'site_type',
					'before' => '<div class="control-group ">   <label class="control-label required">
                        Type of site: <span style="color:red;">*</span></label>  <div class="controls">
                            <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Fixed' => 'Fixed'),
				));
				echo $this->Form->input('site_type', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'class' => 'site_type',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('Mobile' => 'Mobile')
				));
				echo $this->Form->input('site_type', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
					'class' => 'site_type',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('Outreach' => 'Outreach')
				));
				echo $this->Form->input('site_type', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious_yes',
					'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a id="serious_yes_clear" class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.serious_yes\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
					'options' => array('Other' => 'Other(Specify)'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('site_type_other', array('label' => false, 'rows' => 1, 'class' => 'span5'));
				?>
			</div>
		</div>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('symptom_date', array(
					'type' => 'datetime-local', 'class' => 'span11',
					'label' => array('class' => 'control-label required', 'text' => 'Date and time of first/key symptom <span style="color:red;">*</span>'),
				));
				echo $this->Form->input('status_on_date', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'status_on_date',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Status on the date of investigation (✓):<span style="color:red;">*</span></label> </div>
												<div class="controls">   <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Died' => 'Died'),
				));
				echo $this->Form->input('status_on_date', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_on_date',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('Disabled' => 'Disabled'),
				));
				echo $this->Form->input('status_on_date', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_on_date',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('Recovering' => 'Recovering'),
				));
				echo $this->Form->input('status_on_date', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_on_date',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('Recovered completely' => 'Recovered completely'),
				));
				echo $this->Form->input('status_on_date', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'status_on_date',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
											<a class="tooltipper" data-original-title="Clears the checked value"
											onclick="$(\'.status_on_date, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
											<em class="accordion-toggle">clear!</em></a> </label>
											</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));

				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('hospitalization_date', array(
					'type' => 'text', 'class' => 'span11 date-pick-field  ',
					'label' => array('class' => 'control-label required', 'text' => 'Date of hospitalization <span style="color:red;">*</span>'),
				));
				echo $this->Form->input('died_date', array(
					'type' => 'datetime-local', 'class' => 'span11 status_on',
					'label' => array('class' => 'control-label required', 'text' => 'If died, date and time of death <span style="color:red;">*</span>'),
				));
				?>
			</div>
		</div>
		<!-- End of Row -->
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('autopsy_done', array(
					'type' => 'radio',
					'label' => false,
					'legend' => false,
					'div' => false,
					'hiddenField' => false,
					'error' => false,
					'class' => 'autopsy_done status_on',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Autopsy done <span style="color:red;">*</span></label> </div>
													<div class="controls"> <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('autopsy_done', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'autopsy_done status_on',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_done, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('No' => 'No'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('autopsy_done_date', array('type' => 'text', 'class' => 'span11 date-pick-field status_on', 'label' => array('class' => 'control-label required', 'text' => 'If yes, date:'),));
				?>
			</div>
		</div>
		<!-- End of Row -->

		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('autopsy_planned', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'autopsy_planned status_on',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Autopsy planned <span style="color:red;">*</span></label> </div>
													<div class="controls">   <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('autopsy_planned', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'autopsy_planned status_on',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('No' => 'No'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('autopsy_planned_date', array('type' => 'datetime-local', 'class' => 'span11 status_on', 'label' => array('class' => 'control-label required', 'text' => 'If yes, date:'),));
				?>
			</div>
		</div>
		<!-- End of Row -->
		<hr>
		<h4 style="text-align:center;">Section B: <span class="text-center">Relevant patient information prior to immunization </span></h4>
		<!-- Start of Row -->
		<div class="row-fluid">
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th style="width: 50%;" class="text-center">Criteria</th>
						<th style="width: 25%;" class="text-center">Finding</th>
						<th style="width: 25%;" class="text-center">Remarks (If yes, provide details)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><label>Past history of similar event</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('past_history', array(
									'type' => 'radio',  'label' => false, 
									'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'past_history',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('past_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'past_history',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('past_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'past_history',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>
						</td>
						<td>
							<?= $this->Form->input('past_history_remarks', [
								'label' => false,
								'rows' => 2,
								'class' =>'phistory',
								'div' => ['class' => 'control-group required '],
								'after' => '<p class="help-block"> </p></div>',
								'templateVars' => ['class' => 'd-block']
							]); ?>
						</td>

					</tr>
					<tr>
						<td><label>Adverse event after previous vaccination(s)</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('adverse_event', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'adverse_event',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('adverse_event', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'adverse_event',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('adverse_event', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'adverse_event',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('adverse_event_remarks', [
								'label' => false,
								'rows' => 2,
								'class'=>'padverse_event',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>
						</td>
					</tr>
					<tr>
						<td><label>History of allergy to vaccine, drug or food</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('allergy_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'allergy_history',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('allergy_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'allergy_history',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('allergy_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'allergy_history',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('allergy_history_remarks', [
								'label' => false,
								'rows' => 2,
								'class'=>'pallergy_history',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>

						</td>
					</tr>

					<tr>
						<td><label>Pre-existing comorbidity/ congenital disorder?</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('comorbidity_disorder', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'comorbidity_disorder',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('comorbidity_disorder', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'comorbidity_disorder',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('comorbidity_disorder', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'comorbidity_disorder',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('comorbidity_disorder_remarks', [
								'label' => false,
								'rows' => 2,
								'class' =>'pcomorbidity_disorder',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>
						</td>
					</tr>
					<tr>
						<td><label>Pre-existing acute illness (30 days) prior to vaccination</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('existing_illness', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'existing_illness',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('existing_illness', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'existing_illness',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('existing_illness', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'existing_illness',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('existing_illness_remarks', [
								'label' => false,
								'rows' => 2,
								'class' => 'pexisting_illness',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>
						</td>
					</tr>
					<tr>
						<td><label>Has the patient tested Covid19 positive prior to vaccination?</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('covid_positive', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'covid_positive',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('covid_positive', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'covid_positive',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('covid_positive', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'covid_positive',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('covid_positive_remarks', [
								'label' => false,
								'rows' => 2,
								'class' => 'pcovid_positive',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>
						</td>
					</tr>
					<tr>
						<td><label>History of hospitalization in last 30 days, with cause</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('hospitalization_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'hospitalization_history',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('hospitalization_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'hospitalization_history',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('hospitalization_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'hospitalization_history',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('hospitalization_history_remarks', [
								'label' => false,
								'rows' => 2,
								'class' =>'phospitalization_history',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>
						</td>
					</tr>
					<tr>
						<td><label>
								<!-- Was patient on medication at time of vaccination? -->
								Was the patient receiving any concomitant medication?
								(If yes, name the drug, indication, doses & treatment dates)</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('medication_vaccination', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'medication_vaccination',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('medication_vaccination', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'medication_vaccination',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('medication_vaccination', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'medication_vaccination',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('medication_vaccination_remarks', [
								'label' => false,
								'rows' => 2,
								'class' => 'pmedication_vaccination',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>
						</td>
					</tr>
					<tr>
						<td><label>Did patient consult faith healers before/after vaccination?
								*specify</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('faith_healers', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'faith_healers',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('faith_healers', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'faith_healers',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('faith_healers', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'faith_healers',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('faith_healers_remarks', [
								'label' => false,
								'rows' => 2,
								'class' =>'pfaith_healers',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>
						</td>
					</tr>
					<tr>
						<td><label>Family history of any disease (relevant to AEFI) or allergy</label></td>
						<td>
							<div class="col-xs-12">
								<?php
								echo $this->Form->input('family_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'family_history',
									'before' => '<label class="radio inline">',
									'after' => '</label>',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('family_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'family_history',
									'before' => '<label class="radio inline">', 'after' => '</label>',
									'options' => array('No' => 'No'),
								));
								echo $this->Form->input('family_history', array(
									'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'family_history',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio inline">',
									'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
									'options' => array('Unknown' => 'Unknown'),
								));
								?>
							</div>

						</td>
						<td>
							<?= $this->Form->input('family_history_remarks', [
								'label' => false,
								'rows' => 2,
								'class' => 'pfamily_history',
								'div' => array('class' => 'control-group required'),
								'after' => '<p class="help-block"> </p></div>',
							]); ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- End of Row -->
		<!-- Start of Row -->
		<p><b>For Adult Women:</b></p>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('pregnant', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'pregnant',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Currently pregnant?</label> </div>
												<div class="controls">  <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('pregnant', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnant',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('pregnant', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnant',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.pregnant, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
				<div class="col-xs-5">
					<?php
					echo $this->Form->input('breastfeeding', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'breastfeeding',
						'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Currently breastfeeding? </label> </div>
												<div class="controls">   <label class="radio inline">',
						'after' => '</label>',
						'options' => array('Yes' => 'Yes'),
					));
					echo $this->Form->input('breastfeeding', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'breastfeeding',
						'before' => '<label class="radio inline">', 'after' => '</label>',
						'options' => array('No' => 'No'),
					));
					echo $this->Form->input('breastfeeding', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'breastfeeding',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio inline">',
						'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.breastfeeding, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
						'options' => array('Unknown' => 'Unknown'),
					));
					?>
				</div>
			</div>
			<div class="span6">
				<div class="col-xs-4" id="choice-pregnancy">
					<?php
					echo $this->Form->input('pregnant_weeks', [
						'label' => 'Weeks', 
						'type' => 'text', 
						'escape' => false,
						'class' => 'ppregnant',
						'div' => array('class' => 'control-group required'),
						'label' => array('class' => 'control-label required', 'text' => 'Weeks'),
						'after' => '<p class="help-block"> </p></div>',
					]);
					?>
				</div>
			</div>
		</div>
		<!-- End of Row -->
		<!-- Start of Row -->
		<p><b>For Infants:</b></p>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('infant', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'infant',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">The birth was:</label> </div>
												<div class="controls">  <label class="radio inline">',
					'after' => '</label>',
					'options' => array('full-term' => 'full-term'),
				));
				echo $this->Form->input('infant', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'infant',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('pre-term' => 'pre-term'),
				));
				echo $this->Form->input('infant', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'infant',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.infant, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('post-term' => 'post-term'),
				));
				?>
				<div class="col-xs-5">
					<?php
					echo $this->Form->input('delivery_procedure', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'delivery_procedure',
						'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Delivery procedure was:</label> </div>
												<div class="controls">   <label class="radio inline">',
						'after' => '</label>',
						'options' => array('Normal' => 'Normal'),
					));
					echo $this->Form->input('delivery_procedure', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'delivery_procedure',
						'before' => '<label class="radio inline">', 'after' => '</label>',
						'options' => array('Caesarean' => 'Caesarean'),
					));
					echo $this->Form->input('delivery_procedure', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'delivery_procedure',
						'before' => '<label class="radio inline">', 'after' => '</label>',
						'options' => array('Assisted (forceps, vacuum etc.)' => 'Assisted (forceps, vacuum etc.)'),
					));
					echo $this->Form->input('delivery_procedure', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'delivery_procedure',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio inline">',
						'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.delivery_procedure, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
						'options' => array('Complication' => 'with complication'),
					));
					?>
				</div>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('birth_weight', [
					'label' => 'Weeks', 'type' => 'text',  'escape' => false,
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Birth weight'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
				<?php
				echo $this->Form->input('delivery_procedure_specify', [
					'label' => 'Weeks', 'type' => 'text',  'escape' => false,
					'class' => 'pdelivery_procedure',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'If complication, specify'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
			</div>
		</div>
		<!-- End of Row -->
		<hr>
		<h4 style="text-align:center;">Section C Details of first examination** of serious AEFI case</h4>
		<p style="text-align:center;"><b>Source of information (tick all that apply)</b></p>
		<hr>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<h5>Source of information (✓ all that apply): <span style="color:red;">*</span></h5>
				<?php
				echo $this->Form->input('source_examination', array(
					'type' => 'checkbox',   'before' => '<div class="control-group">',
					'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
					'between' => '<label class="checkbox">',
					'after' => 'Examination by the investigator </label>',
				));
				echo $this->Form->input('source_documents', array(
					'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
					'between' =>'<label class="checkbox">',
					'after' => 'Documents  </label>',
				));
				echo $this->Form->input('source_verbal', array(
					'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
					'between' => '<label class="checkbox">',
					'after' => 'Verbal autopsy </label>',
				));
				echo $this->Form->input('source_other', array(
					'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
					'between' => '<label class="checkbox">',
					'after' => 'Other   </label>',
				)); 
				 
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('other_sources', [
					'label' => 'Other sources who provided information (specify):',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Other sources who provided information (specify):<span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>',
				]);
				?>
			</div>
		</div>
		<!-- End of Row -->
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('examiner_name', [
					'label' => 'Name examiner', 'type' => 'text',  'escape' => false,
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Name of the person who first examined/treated the patient: <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>',
				]);

				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('signs_symptoms', [
					'label' => 'Signs and symptoms in chronological order from the time of vaccination: ', 'escape' => false
				]);
				?>
			</div>
		</div>
		<!-- End of Row -->
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('person_details', [
					'label' => 'Name person', 'type' => 'text',  'escape' => false,
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Name and contact information of person completing these clinical details: <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>',
				]);

				?>
				<?php
				echo $this->Form->input('person_date', array(
					'type' => 'datetime-local', 'class' => 'span11',
					'label' => array('class' => 'control-label required', 'text' => 'Date <span style="color:red;">*</span>'),
				));
				?>
			</div>
			<div class="span6">
				<?php
			 

				echo $this->Form->input('person_designation', [
					'label' => 'Designation ',  'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'Designation <span style="color:red;">*</span>'),
					'after' => '<p class="help-block"> </p></div>', 'options' => $designations, 'empty' => true, 'escape' => false
				]);
				?>
			</div>
		</div>
		<!-- End of Row -->
		<hr>
		<h5><strong>**Instructions – Attach copies of ALL available documents (including case sheet, discharge
				summary, case notes, laboratory reports and autopsy reports, prescriptions for concomitant medication) and then complete additional
				information NOT AVAILABLE in existing documents, i.e.</strong> </h5><br>
		<ul>
			<li><strong>If patient has received medical care </strong>– attach copies of all available documents
				(including case sheet, discharge summary, laboratory reports and autopsy reports, if available) and
				write only the information that is not available in the attached documents below
			</li>
			<div class="row">
				<div class="col-xs-12"><?php echo $this->Form->input('medical_care', ['label' => false]); ?></div>
			</div>
			<li>
				<strong>If patient has not received medical care </strong> – obtain history, examine the patient and
				write down your findings below (add additional sheets if necessary)
			</li>
			<div class="row">
				<div class="col-xs-12"><?php echo $this->Form->input('not_medical_care', ['label' => false]); ?>
				</div>
			</div>
		</ul>
		</h4>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="col-xs-4">
				<div class="control-label"><label>Autopsy report (if available):</label></div>
			</div>
			<div class="col-xs-7">
				<?php
				if (!empty($saefi['reports'])) {
					echo '<p><b>File attachment:</b></p>';
					echo $this->Html->link($saefi['reports'][0]->file, substr($saefi['reports'][0]->dir, 8) . '/' . $saefi['reports'][0]->file, ['fullBase' => true]);
				} else {
					echo $this->Form->input('reports.0.file', ['type' => 'file', 'label' => false, 'templates' => 'table_form']);
				}
				?>
			</div>
			<!-- <p>Attachments!!</p> -->
			<div class="col-xs-12"><?php echo $this->element('multi/attachments', ['model' => 'Saefi', 'group' => 'attachments']); ?>
			</div>
		</div>
		<!-- End of Row -->

		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="col-xs-12">
				<div class="col-md-8">
					<?php
					echo $this->Form->input('final_diagnosis', ['label' => 'Provisional / Final diagnosis:']);
					//echo $this->element('multi/saefi_reactions');

					?>
					<!-- Original File -->
				</div>
				 

			</div>
		</div>
		<hr>
		<!-- End of Row -->
		<h4 style="text-align:center;">Section D Details of vaccines provided at the site linked to AEFI on the corresponding day</h4>
		<hr>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="col-xs-12">
				<?php
				//echo $this->element('multi/saefi_list_of_vaccines', ['editable' => $editable]); 
				?>
			</div>
		</div>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="col-xs-12">
				<p><b>a) When was the patient vaccinated:</b> <b style="color: green;">(select answer below and
						respond to ALL questions)</b></p>
				<div class="col-xs-12">
					<?php
					echo $this->Form->input('when_vaccinated', array(
						'type' => 'radio',
						'label' => false,
						'legend' => false,
						'div' => false, 'hiddenField' => false,
						'error' => false, 'class' => 'when_vaccinated',
						'before' => ' </div>
												<div class="controls"> <label class="radio inline">',
						'after' => '</label>',
						'options' => [
							'Within the first vaccinations of the session' => 'Within the first vaccinations of the session',
						],
					));
					echo $this->Form->input('when_vaccinated', array(
						'type' => 'radio',
						'label' => false,
						'legend' => false,
						'div' => false, 'hiddenField' => false,
						'error' => false, 'class' => 'when_vaccinated',
						'before' => ' </div>
												<div class="controls">  <label class="radio inline">',
						'after' => '</label>',
						'options' => [
							'Within the last vaccinations of the session' => 'Within the last vaccinations of the session',
						],
					));
					echo $this->Form->input('when_vaccinated', array(
						'type' => 'radio',
						'label' => false,
						'legend' => false,
						'div' => false, 'hiddenField' => false,
						'error' => false, 'class' => 'when_vaccinated',
						'before' => ' </div>
												<div class="controls">   <label class="radio inline">',
						'after' => '</label>',
						'options' => [
							'Unknown' => 'Unknown'
						],
					));
					?>
				</div>
				<br />
				<br />
				<br />
				<p><b>In case of multidose vials, was the vaccine given</b></p>
				<div class="col-xs-12">
					<?php
					echo $this->Form->input('vaccine_given', array(
						'type' => 'radio',
						'label' => false,
						'legend' => false,
						'div' => false, 'hiddenField' => false,
						'error' => false, 'class' => 'vaccine_given',
						'before' => ' </div>
												<div class="controls">  <label class="radio inline">',
						'after' => '</label>',
						'options' => [
							'within the first few doses of the vial administered' => 'within the first few doses of the vial administered',
						],
					));
					echo $this->Form->input('vaccine_given', array(
						'type' => 'radio',
						'label' => false,
						'legend' => false,
						'div' => false, 'hiddenField' => false,
						'error' => false, 'class' => 'vaccine_given',
						'before' => ' </div>
												<div class="controls">  <label class="radio inline">',
						'after' => '</label>',
						'options' => [
							'within the last doses of the vial administered' => 'within the last doses of the vial administered',
						],
					));
					echo $this->Form->input('vaccine_given', array(
						'type' => 'radio',
						'label' => false,
						'legend' => false,
						'div' => false, 'hiddenField' => false,
						'error' => false, 'class' => 'vaccine_given',
						'before' => ' </div>
												<div class="controls">  <label class="radio inline">',
						'after' => '</label>',
						'options' => [
							'Unknown' => 'Unknown'
						],
					));
					?>
				</div>
				<div class="col-xs-12">
					<?php echo $this->Form->input('when_vaccinated_specify', ['label' => 'Specify:']); ?>
				</div>
			</div>
		</div>
		<!-- End of Row -->
		<hr>
		<p style="text-align:center;"> <b style="color:red; text-align:center;">It is compulsory for you to provide explanations for ‘yes’ answers separately</b>
			<hr>
		</p>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="col-xs-12">
				<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th style="width: 55%;" class="text-center"></th>
							<th style="width: 25%;" class="text-center"> Response</th>
							<th style="width: 25%;" class="text-center">Remarks</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><label>b) Was there an error in prescribing or non-adherence to recommendations for
									use of this vaccine?</label></td>
							<td>
								<div class="col-xs-12">
									<?php
									echo $this->Form->input('prescribing_error', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'prescribing_error',
										'before' => '<label class="radio inline">',
										'after' => '</label>',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('prescribing_error', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'prescribing_error',
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio inline">',
										'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
										'options' => array('No' => 'No'),
									));
									?>
								</div>
							</td>
							<td>
								<?= $this->Form->input('prescribing_error_specify', [
									'label' => false,
									'rows' => 1,
									'div' => array('class' => 'control-group required span12'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
						</tr>
						<tr>
							<td><label>c) Based on your investigation, do you feel that the vaccine (ingredients)
									administered could have been unsterile?</label></td>
							<td>
								<div class="col-xs-12">
									<?php
									echo $this->Form->input('vaccine_unsterile', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'vaccine_unsterile',
										'before' => '<label class="radio inline">',
										'after' => '</label>',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('vaccine_unsterile', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_unsterile',
										'before' => '<label class="radio inline">', 'after' => '</label>',
										'options' => array('No' => 'No'),
									));
									echo $this->Form->input('vaccine_unsterile', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_unsterile',
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio inline">',
										'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
										'options' => array('Unable to assess' => 'Unable to assess'),
									));
									?>
								</div>
							</td>
							<td>
								<?= $this->Form->input('vaccine_unsterile_specify', [
									'label' => false,
									'rows' => 1,
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
						</tr>
						<tr>
							<td><label>d) Based on your investigation, do you feel that the vaccine's physical
									condition (e.g. colour, turbidity, foreign substances etc.) was abnormal at the
									time of administration?</label></td>
							<td>
								<div class="col-xs-12">
									<?php
									echo $this->Form->input('vaccine_condition', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'vaccine_condition',
										'before' => '<label class="radio inline">',
										'after' => '</label>',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('vaccine_condition', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_condition',
										'before' => '<label class="radio inline">', 'after' => '</label>',
										'options' => array('No' => 'No'),
									));
									echo $this->Form->input('vaccine_condition', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_condition',
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio inline">',
										'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
										'options' => array('Unable to assess' => 'Unable to assess'),
									));
									?>
								</div>
							</td>
							<td>
								<?= $this->Form->input('vaccine_condition_specify', [
									'label' => false,
									'rows' => 1,
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
						</tr>
						<tr>
							<td><label>e) Based on your investigation, do you feel that there was an error in
									vaccine reconstitution/preparation by the vaccinator (e.g. wrong product, wrong
									diluent, improper mixing, improper syringe filling etc.)?</label></td>
							<td>
								<div class="col-xs-12">
									<?php
									echo $this->Form->input('vaccine_reconstitution', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'vaccine_reconstitution',
										'before' => '<label class="radio inline">',
										'after' => '</label>',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('vaccine_reconstitution', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_reconstitution',
										'before' => '<label class="radio inline">', 'after' => '</label>',
										'options' => array('No' => 'No'),
									));
									echo $this->Form->input('vaccine_reconstitution', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_reconstitution',
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio inline">',
										'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
										'options' => array('Unable to assess' => 'Unable to assess'),
									));
									?>
								</div>
							</td>
							<td>
								<?= $this->Form->input('vaccine_reconstitution_specify', [
									'label' => false,
									'rows' => 1,
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
						</tr>
						<tr>
							<td><label>f) Based on your investigation, do you feel that there was an error in
									vaccine handling (e.g. cold chain failure during transport, storage and/or
									immunization session etc.)?</label></td>
							<td>
								<div class="col-xs-12">
									<?php
									echo $this->Form->input('vaccine_handling', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'vaccine_handling',
										'before' => '<label class="radio inline">',
										'after' => '</label>',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('vaccine_handling', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_handling',
										'before' => '<label class="radio inline">', 'after' => '</label>',
										'options' => array('No' => 'No'),
									));
									echo $this->Form->input('vaccine_handling', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_handling',
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio inline">',
										'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
										'options' => array('Unable to assess' => 'Unable to assess'),
									));
									?>
								</div>
							</td>
							<td>
								<?= $this->Form->input('vaccine_handling_specify', [
									'label' => false,
									'rows' => 1,
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
						</tr>
						<tr>
							<td><label>g) Based on your investigation, do you feel that the vaccine was administered
									incorrectly (e.g. wrong dose, site or route of administration, wrong needle
									size, not following good injection practice etc.)?</label></td>
							<td>
								<div class="col-xs-12">
									<?php
									echo $this->Form->input('vaccine_administered', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'vaccine_administered',
										'before' => '<label class="radio inline">',
										'after' => '</label>',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('vaccine_administered', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_administered',
										'before' => '<label class="radio inline">', 'after' => '</label>',
										'options' => array('No' => 'No'),
									));
									echo $this->Form->input('vaccine_administered', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_administered',
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio inline">',
										'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
										'options' => array('Unable to assess' => 'Unable to assess'),
									));
									?>
								</div>
							</td>
							<td>
								<?= $this->Form->input('vaccine_administered_specify', [
									'label' => false,
									'rows' => 1,
									'div' => array('class' => 'control-group'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
						</tr>
						<tr>
							<td><label>h) Number vaccinated from the concerned vaccine vial/ampoule </label></td>
							<td>
								<?= $this->Form->input('vaccinated_vial', [
									'label' => false,
									'type' => 'number',
									'div' => array('class' => 'span4 align-left'),
									'style' => 'text-align: left;',
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
							<td>

							</td>
						</tr>
						<tr>
							<td><label>i) Number vaccinated with the concerned vaccine in the same session</label>
							</td>
							<td>
								<?= $this->Form->input('vaccinated_session', [
									'label' => false,
									'type' => 'number',
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
							<td>

							</td>
						</tr>
						<tr>
							<td><label>j) Number vaccinated with the concerned vaccine having the same batch number
									in other locations. Specify locations: </label></td>
							<td>
								<?= $this->Form->input('vaccinated_locations', [
									'label' => false,
									'type' => 'number',
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
							<td>
								<?= $this->Form->input('vaccinated_locations_specify', [
									'label' => false,
									'rows' => 1,
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
						</tr>
						<tr>
							<td><label>k) Is this case a part of a cluster?</label></td>
							<td>
								<div class="col-xs-12">
									<?php
									echo $this->Form->input('vaccinated_cluster', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'vaccinated_cluster',
										'before' => '<label class="radio inline">',
										'after' => '</label>',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('vaccinated_cluster', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccinated_cluster',
										'before' => '<label class="radio inline">', 'after' => '</label>',
										'options' => array('No' => 'No'),
									));
									echo $this->Form->input('vaccinated_cluster', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccinated_cluster',
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio inline">',
										'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
										'options' => array('Unable to assess' => 'Unable to assess'),
									));
									?>
								</div>
							</td>
							<td>

							</td>
						</tr>
						<tr>
							<td><label>i. If yes, how many other cases have been detected in the cluster?</label>
							</td>
							<td>
								<?= $this->Form->input('vaccinated_cluster_number', [
									'label' => false,
									'type' => 'number',
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
							<td>

							</td>
						</tr>
						<tr>
							<td><label>a. Did all the cases in the cluster receive vaccine from the same
									vial?</label></td>
							<td>
								<div class="col-xs-12">
									<?php
									echo $this->Form->input('vaccinated_cluster_vial', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'vaccinated_cluster_vial',
										'before' => '<label class="radio inline">',
										'after' => '</label>',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('vaccinated_cluster_vial', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccinated_cluster_vial',
										'before' => '<label class="radio inline">', 'after' => '</label>',
										'options' => array('No' => 'No'),
									));
									echo $this->Form->input('vaccinated_cluster_vial', array(
										'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccinated_cluster_vial',
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio inline">',
										'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.autopsy_planned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
										'options' => array('Unable to assess' => 'Unable to assess'),
									));
									?>
								</div>
							</td>
							<td>

							</td>
						</tr>
						<tr>
							<td><label>b. If no, number of vials used in the cluster (enter details
									separately)</label></td>
							<td>
								<?= $this->Form->input('vaccinated_cluster_vial_number', [
									'label' => false,
									'type' => 'number',
									'div' => array('class' => 'control-group required'),
									'after' => '<p class="help-block"> </p></div>',
								]); ?>
							</td>
							<td>

							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<!-- End of Row -->
		<hr>
		<h4 style="text-align:center;">
			Section E Immunization practices at the place(s) where concerned vaccine was used <br>
			<small style="text-align:center;">(Complete this section by asking and/or observing practice)</small>
		</h4>
		<hr>
		<p style="text-align:center;"><strong>Syringes and needles used:</strong></p>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('syringes_used', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'syringes_used',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Are AD syringes used for immunization?</label> </div>
												<div class="controls">   <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('syringes_used', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'syringes_used',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('syringes_used', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'syringes_used',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.syringes_used, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
				<?= $this->Form->input('syringes_used_other', [
					'label' => 'If other, specify',
					'div' => array('class' => 'control-group required'),
					'label' => array('class' => 'control-label required', 'text' => 'If other, specify'),
					'after' => '<p class="help-block"> </p></div>',
				]); ?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('syringes_used_specify', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'syringes_used_specify',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">If no, specify the type of syringes used:</label> </div>
												<div class="controls">  <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Glass' => 'Glass'),
				));
				echo $this->Form->input('syringes_used_specify', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'syringes_used_specify',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('Disposable' => 'Disposable'),
				));
				echo $this->Form->input('syringes_used_specify', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'syringes_used_specify',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('Recycled disposable' => 'Recycled disposable'),
				));
				echo $this->Form->input('syringes_used_specify', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'syringes_used_specify',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.syringes_used_specify, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Other' => 'Other'),
				));
				?>

			</div>
		</div>
		<hr>
		<p style="text-align:center;"><strong>Reconstitution: (complete only if applicable, NA if not applicable)</strong></p>
		<hr>
		<p style="text-align:center;"><b>Reconstitution procedure :</b></p>
		<!-- Start of Row -->
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('reconstitution_multiple', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_multiple',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Same reconstitution syringe used for multiple vials of same vaccine?</label> </div>
												<div class="controls">   <label class="radio inline">',
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
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.reconstitution_multiple, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('N/A' => 'N/A'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('reconstitution_different', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_different',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Same reconstitution syringe used for reconstituting different vaccines?</label> </div>
												<div class="controls">  <label class="radio inline">',
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
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.reconstitution_different, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('N/A' => 'N/A'),
				));
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('reconstitution_vial', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_vial',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Separate reconstitution syringe for each vaccine vial?</label> </div>
												<div class="controls">  <label class="radio inline">',
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
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.reconstitution_vial, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('N/A' => 'N/A'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('reconstitution_syringe', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_syringe',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Separate reconstitution syringe for each vaccination?</label> </div>
												<div class="controls">  <label class="radio inline">',
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
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.reconstitution_syringe, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('N/A' => 'N/A'),
				));
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('reconstitution_vaccines', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Are the vaccines and diluents used the same as those recommended by the manufacturer?</label> </div>
												<div class="controls"> <label class="radio inline">',
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
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.reconstitution_vaccines, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('N/A' => 'N/A'),
				));
				?>
			</div>
			<div class="span6">
				<?= $this->Form->input('reconstitution_observations', [
					'label' => 'Specific key findings/additional observations and comments:',
					'rows' => 3,
					'div' => array('class' => 'control-group required'),
					'after' => '<p class="help-block"> </p></div>',
				]); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('injection_dose_route', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'injection_dose_route',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Correct dose and route?</label> </div>
												<div class="controls"> <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('injection_dose_route', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'injection_dose_route',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.injection_dose_route, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('No' => 'No'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('injection_time_mentioned', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'injection_time_mentioned',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Time of reconstitution mentioned on the vial? (in case of freeze dried vaccines)</label> </div>
												<div class="controls">   <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('injection_time_mentioned', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'injection_time_mentioned',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.injection_time_mentioned, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('No' => 'No'),
				));
				?>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<?php
					echo $this->Form->input('injection_no_touch', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'injection_no_touch',
						'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Non-touch technique followed?</label> </div>
												<div class="controls"> <label class="radio inline">',
						'after' => '</label>',
						'options' => array('Yes' => 'Yes'),
					));
					echo $this->Form->input('injection_no_touch', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'injection_no_touch',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio inline">',
						'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.injection_no_touch, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
						'options' => array('No' => 'No'),
					));
					?>
				</div>
				<div class="span6">
					<?php
					echo $this->Form->input('injection_contraindications', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'injection_contraindications',
						'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Contraindications screened prior to vaccination?</label> </div>
												<div class="controls">   <label class="radio inline">',
						'after' => '</label>',
						'options' => array('Yes' => 'Yes'),
					));
					echo $this->Form->input('injection_contraindications', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'injection_contraindications',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio inline">',
						'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.injection_contraindications, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
						'options' => array('No' => 'No'),
					));
					?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<?php
					echo $this->Form->input('injection_reported', [
						'label' => 'How many AEFI were reported from the centre that distributed the vaccine in the last 30 days?',
						'div' => array('class' => 'control-group required'),
						'label' => array('class' => 'control-label required', 'text' => 'How many AEFI were reported from the centre that distributed the vaccine in the last 30 days?'),
						'after' => '<p class="help-block"> </p></div>',
					]);
					?>
				</div>
				<div class="span6">
					<?php
					echo $this->Form->input('injection_vaccines', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'injection_vaccines',
						'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Training received by the vaccinator?</label> </div>
												<div class="controls"> <label class="radio inline">',
						'after' => '</label>',
						'options' => array('Yes' => 'Yes'),
					));
					echo $this->Form->input('injection_vaccines', array(
						'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'injection_vaccines',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio inline">',
						'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.injection_vaccines, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
						'options' => array('No' => 'No'),
					));
					?>

				</div>
			</div>
		</div>
		<div class="col-xs-12">
			<?php
			echo $this->Form->input('injection_vaccines_yes', [
				'label' => 'If yes, specify',
				'div' => array('class' => 'control-group required'),
				'label' => array('class' => 'control-label required', 'text' => 'If yes, specify'),
				'after' => '<p class="help-block"> </p></div>',
			]);
			?>
		</div>
		<div class="col-xs-12">
			<?php
			echo $this->Form->input('injection_observations', [
				'label' => 'Specific key findings/additional observations and comments:',
				'div' => array('class' => 'control-group required'),
				'label' => array('class' => 'control-label required', 'text' => 'Specific key findings/additional observations and comments:'),
				'after' => '<p class="help-block"> </p></div>',
			]);
			?>
		</div>
		<hr>
		<h4 style="text-align:center;"> Section F Cold chain and transport <br>
			<small style="text-align:center;">(Complete this section by asking and/or observing practice)</small>
		</h4>
		<hr>
		<hr>
		<p style="text-align:center;"><strong>Last vaccine storage point:</strong></p>
		<hr>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('cold_temperature', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'cold_temperature',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Is the temperature of the vaccine storage refrigerator monitored?</label> </div>
												<div class="controls">  <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('cold_temperature', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'cold_temperature',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.cold_temperature, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('No' => 'No'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('cold_temperature_specify', ['label' => 'If “yes”, provide details of monitoring separately.']);
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('procedure_followed', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'procedure_followed',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Was the correct procedure for storing vaccines, diluents and syringes followed?</label> </div>
												<div class="controls"> <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('procedure_followed', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('procedure_followed', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'procedure_followed',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.procedure_followed, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('other_items', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'other_items',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Was any other item (other than EPI vaccines and diluents) in the refrigerator or freezer?</label> </div>
												<div class="controls">   <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('other_items', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('other_items', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'other_items',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.other_items, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('partial_vaccines', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'partial_vaccines',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Were any partially used reconstituted vaccines in the refrigerator?</label> </div>
												<div class="controls">  <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('partial_vaccines', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('partial_vaccines', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'partial_vaccines',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.partial_vaccines, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('unusable_vaccines', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'unusable_vaccines',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Were any unusable vaccines (expired, no label, VVM at stages 3 or 4, frozen) in the refrigerator?</label> </div>
												<div class="controls">  <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('unusable_vaccines', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('unusable_vaccines', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'unusable_vaccines',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.unusable_vaccines, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('unusable_diluents', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'unusable_diluents',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Were any unusable diluents (expired, manufacturer not matched, cracked, dirty ampoule) in the store?</label> </div>
											<div class="controls">  <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('unusable_diluents', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('unusable_diluents', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'unusable_diluents',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
											<a class="tooltipper" data-original-title="Clears the checked value"
											onclick="$(\'.unusable_diluents, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
											<em class="accordion-toggle">clear!</em></a> </label>
											</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('additional_observations', ['label' => 'Specific key findings/additional observations and comments:']);
				?>
			</div>
		</div>
		<hr>
		<p style="text-align:center;"><strong>Vaccine transportation from the refrigerator to the vaccination centre:</strong></p>
		<hr>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('cold_transportation', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'cold_transportation',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Was cold chain properly maintained during transportation?</label> </div>
												<div class="controls"> <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('cold_transportation', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('cold_transportation', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'cold_transportation',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.cold_transportation, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('vaccine_carrier', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'vaccine_carrier',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Was the vaccine carrier sent to the site on the same day as vaccination?</label> </div>
												<div class="controls">   <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('vaccine_carrier', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('vaccine_carrier', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'vaccine_carrier',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
												<a class="tooltipper" data-original-title="Clears the checked value"
												onclick="$(\'.vaccine_carrier, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
												<em class="accordion-toggle">clear!</em></a> </label>
												</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<?php
				echo $this->Form->input('coolant_packs', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'coolant_packs',
					'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Were conditioned coolant-packs used?</label> </div>
											<div class="controls">   <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('coolant_packs', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reconstitution_vaccines',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('coolant_packs', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'coolant_packs',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label> <label>
											<a class="tooltipper" data-original-title="Clears the checked value"
											onclick="$(\'.coolant_packs, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
											<em class="accordion-toggle">clear!</em></a> </label>
											</div> </div>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('transport_findings', ['label' => 'Specific key findings/additional observations and comments:']);
				?>
			</div>
		</div>
		<hr>
		<h4 style="text-align:center;">Section G Community investigation (Please visit locality and interview parents/others)</h4>
		<hr>
		<div class="row-fluid">
			<p style="text-indent: 5em;">Were any similar events reported within a time period similar to when the adverse event occurred and in the same locality? </p>
			<div style="margin-left: 5rem;">
				<?php
				echo $this->Form->input('similar_events', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'similar_events',
					'before' => ' <label class="radio inline">',
					'after' => '</label>',
					'options' => array('Yes' => 'Yes'),
				));
				echo $this->Form->input('similar_events', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'similar_events',
					'before' => '<label class="radio inline">', 'after' => '</label>',
					'options' => array('No' => 'No'),
				));
				echo $this->Form->input('similar_events', array(
					'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'similar_events',
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
					'before' => '<label class="radio inline">',
					'after' => '</label>',
					'options' => array('Unknown' => 'Unknown'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('similar_events_describe', array(
					'label' => array('class' => 'control-label required', 'rows' => 2, 'text' =>  'If yes, describe:'),
				));
				?>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<?php
					echo $this->Form->input('similar_events_episodes', array(
						'label' => array('class' => 'control-label required', 'text' =>  'If yes, how many events/episodes?'),
					));
					?>
				</div>
			</div>
			<hr class="darker">

		</div>
		<div class="row-fluid">
			<p style="text-indent: 5em;">Of those effected, how many are: </p>
			<div class="span6">
				<?php
				echo $this->Form->input('affected_vaccinated', array(
					'label' => array('class' => 'control-label required', 'text' =>  '• Vaccinated:'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('affected_not_vaccinated', array(
					'label' => array('class' => 'control-label required', 'text' =>  '• Not vaccinated:'),
				));
				?>
			</div>
			<div class="span6">
				<?php
				echo $this->Form->input('affected_unknown', array(
					'label' => array('class' => 'control-label required', 'text' =>  '• Unknown:'),
				));
				?>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php
					echo $this->Form->input('community_comments', array(
						'class' => 'span9',  'rows' => '3',
						'label' => array('class' => 'control-label required', 'text' => 'Other comments:
                    '),
						//'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
					));
					?>
				</div>
			</div>
		</div>
		<hr>
		<h4 style="text-align:center;">Section H Other relevant findings/observations/comments</h4>
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<?php
				echo $this->Form->input('relevant_findings', array(
					'class' => 'span9',  'rows' => '3',
					'label' => array(
						'class' => 'control-label required', 'text' => ' '
					),
					//'after' => '<p>Including history of similar reaction or other allergies, concomitant medication/vaccine,concomitant illness, other cases,pregnacy status and other relevant information </p></div>'
				));
				?>
			</div>
		</div>
	</div>
	</div>
	<div class="span2">
		<div class="my-sidebar" data-spy="affix">
			<div class="awell">
				<?php
				// echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(
				//     'name' => 'saveChanges',
				//     'class' => 'btn btn-success mapop',
				//     'formnovalidate' => 'formnovalidate',
				//     'id' => 'SaefiSaveChanges', 'title' => 'Save & continue editing',
				//     'data-content' => 'Save changes to form without submitting it.
				//                                       The form will still be available for further editing.',
				//     'div' => false,
				// ));
				 

				?>
				<br>
				<hr>
				<?php
				echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit', array(
					'name' => 'submitReport',
					'onclick' => "return confirm('Are you sure you wish to submit the report?');",
					'class' => 'btn btn-primary btn-block mapop',
					'id' => 'SiteInspectionSubmitReport', 'title' => 'Save and Submit Report',
					'data-content' => 'Submit report for peer review and approval.',
					'div' => false,
				));

				?>
				<br>
				<hr>
				<?php
				echo $this->Html->link(
					'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF',
					array('action' => 'view', 'ext' => 'pdf', $this->request->data['Saefi']['id']),
					array(
						'escape' => false, 'class' => 'btn btn-info btn-block mapop', 'title' => 'Download PDF',
						'data-content' => 'Download the pdf version of the report',
					)
				);
				?>
				<br>
				<hr>
				<?php
				echo $this->Html->link(
					'<i class="fa fa-times" aria-hidden="true"></i> Cancel',
					array('controller' => 'users', 'action' => 'dashboard'),
					array('escape' => false, 'class' => 'btn btn-danger btn-block')
				);

				?>
			</div>
		</div>
	</div>
</div>
<?php
echo $this->Form->end();
?>