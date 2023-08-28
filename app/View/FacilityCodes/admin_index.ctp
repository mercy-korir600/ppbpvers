<?php 
	$this->assign('CMS', 'active');
 ?>

      <!-- CMS
    ================================================== -->
	<h3>Content Management System <small>(FACILITY CODES)</small></h3>
		<p>Search for the content that you wish to modify and change accordingly.</p>	
		<hr>
	<div class="row-fluid" style="margin-bottom: 9px;">	
		<div class="span0 columns">
			<div class="row-fluid">
				<div class="span12">
					  <?php //echo $this->element('admin/contentmenu')?>
					  
				</div><!--/span-->
			</div><!--/row-->	
		</div> <!-- /span5 -->

		<div class="span11 columns">
				<?php 	
					echo $this->Form->create('FacilityCode', array(
						'url' => array_merge(array('action' => 'admin_index', 'admin' => true), $this->params['pass']),
						'class' => 'well',
					));
				?>
				<div class="row-fluid">
					<div class="span2 columns">
					<?php
						echo $this->Html->link('Add a Facility', array('controller' => 'facility_codes', 'action' => 'add', 'admin' => true ), array('class' => 'btn btn-info'));
					 
						echo $this->Html->link('Upload Facilities', "#", array(
							'class' => 'btn btn-success',
							'data-toggle' => 'modal',
							'data-target' => '#uploadModal'
						));
						
					?>
					</div>
					<div class="span3 columns">
					<?php
						echo $this->Form->input('facility_code', array('div' => false, 'class' => 'span10', 'label' => array('class' => 'required', 'text' => 'Facility Code')));
					?>
					</div>
					<div class="span3 columns">
					<?php
						echo $this->Form->input('facility_name', array('div' => false, 'class' => 'span10', 'label' => array('class' => 'required', 'text' => 'Facility Name')));
					?>
					</div>
					<div class="span4 columns">
					<p class="muted">Search on any field.</p>
					<?php	
						// echo $this->Form->submit(__('Search', true), array('div' => 'control-group', 'class' => 'btn btn-inverse'));
						echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
									'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
								));
						echo $this->Form->end();
					?>
					</div>
				</div>
				
				<div class="row-fluid">	
			
					<?php
						if(count($facility_Codes) >  0) { ?>
					<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>, 
										showing <span class="badge">{:current}</span> facilites out of 
										<span class="badge badge-inverse">{:count}</span> total, starting on record <span class="badge">{:start}</span>, 
										ending on <span class="badge">{:end}</span>')
						));
					?>	
					</p>
					<div class="pagination">
						<ul>
						<?php
							echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
							echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active'));
							echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false ));
						?>
						</ul>
					</div>	
					<hr>
						<table  class="table table-striped">		
						<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('id');?></th>
								<th><?php echo $this->Paginator->sort('facility_code');?></th>
								<th><?php echo $this->Paginator->sort('facility_name');?></th>
								<th><?php echo $this->Paginator->sort('county');?></th>
								<th><?php echo $this->Paginator->sort('sub_county');?></th>
								<th><?php echo $this->Paginator->sort('ward');?></th>
								<th><?php echo __('Actions');?></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($facility_Codes as $facilityCode): ?>
							<tr>
								<td><?php echo h($facilityCode['FacilityCode']['id']); ?>&nbsp;</td>
								<td><?php echo h($facilityCode['FacilityCode']['facility_code']); ?>&nbsp;</td>
								<td><?php echo h($facilityCode['FacilityCode']['facility_name']); ?>&nbsp;</td>
								<td><?php echo h($facilityCode['FacilityCode']['county']); ?>&nbsp;</td>
								<td><?php echo h($facilityCode['FacilityCode']['sub_county']); ?>&nbsp;</td>
								<td><?php echo h($facilityCode['FacilityCode']['ward']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link('<span class="label label-info"><i class="icon-pencil icon-white"></i> Edit</span>' , 
											array('controller' => 'facility_codes', 'action' => 'edit', $facilityCode['FacilityCode']['id']), array('escape' => false)); ?>&nbsp;
									<?php echo $this->Form->postLink(__('<span class="label label-important"><i class="icon-trash icon-white"></i> Delete</span>'), 
											array('action' => 'delete', $facilityCode['FacilityCode']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $facilityCode['FacilityCode']['id'])); ?>&nbsp;
								</td>
							</tr>
						<?php endforeach; ?>		
						</tbody>
						</table>
						
						<?php } else { ?>
							<p>There were no reports that met your search criteria.</p>
						<?php } ?>	
				</div> <!-- /row-fluid -->
			</div> <!-- /span6 -->
		
	   </div> <!-- /row-fluid -->


	   <!-- Add this code wherever you want the modal to appear in your view -->
<!-- Add this code wherever you want the modal to appear in your view -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload CSV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
				<?php echo $this->Form->create('Upload', array('type' => 'file', 'url' => array('controller' => 'facility_codes', 'action' => 'upload'))); ?>

                <?php echo $this->Form->input('csv_file', array('type' => 'file')); ?>
            </div>
            <div class="modal-footer">
                <?php echo $this->Form->button('Upload', array('class' => 'btn btn-primary')); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-header .close {
        margin-top: -1.5rem;
        margin-right: -0.5rem;
    }
</style>

