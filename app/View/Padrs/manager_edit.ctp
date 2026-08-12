<?php
    $this->assign('PADR', 'active');
    echo $this->Session->flash();
?>

<div class="row-fluid">
	<div class="span12">
	</div>
</div>
<hr>
<section id="padrsview">
	<ul class="nav nav-tabs">
		<li><a href="#formview" data-toggle="tab">Original</a></li>
		<li class="active"><a href="#formedit" data-toggle="tab"><?php echo (!empty($padr['Padr']['reference_no'])) ? $padr['Padr']['reference_no'] : $padr['Padr']['id']; ?></a></li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane" id="formview">
			<div class="row-fluid">
				<div class="span10">
					<?php echo $this->element('padr/padr_view'); ?>
				</div>
				<div class="span2">
					<?php
					echo $this->Html->link(
						'<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF',
						array('controller' => 'padrs', 'action' => 'view', 'ext' => 'pdf', $padr['Padr']['id']),
						array(
							'class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',
							'escape' => false,
							'data-content' => 'Download the pdf version of the report',
						)
					);
					?>
					<hr>
				</div>
			</div>
		</div>
		<div class="tab-pane active" id="formedit">
			<?php echo $this->element('padr/padr_edit'); ?>
		</div>
	</div>
</section>
