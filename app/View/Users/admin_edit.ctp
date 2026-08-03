<?php  
	$this->assign('USERS', 'active');
 	$this->Html->script('widgets', array('inline' => false));
	$this->Html->script('user', array('inline' => false));
?>

<div class="row-fluid"> 	
	<div class="span12"> 	

	<div class="whmcscontainer">
    <div class="contentpadded">
			<?php echo $this->Html->link('<i class="icon-backward"></i> Back to Users', array('action' => 'index'), array('escape'=>false)); ?>
			<div class="page-header">
				<div class="styled_title"><h2>Update <?php echo $this->request->data['User']['username'].'\'s'?> Details</h2></div>
			</div>	
	<?php	
		//echo $this->element('banner');
		echo $this->Session->flash();
		
		                                                                                                                                          
                                                                                                                                                                                    
            echo $this->Form->create('User', array(                                                                                                                                 
                'class' => 'form-horizontal',                                                                                                                                           
                'inputDefaults' => array(                                                                                                                                               
                    'div' => array('class' => 'control-group'),                                                                                                                             
                    'label' => array('class' => 'control-label'),                                                                                                                           
                    'between' => '<div class="controls">',                                                                                                                                  
                    'after' => '</div>',                                                                                                                                                    
                    'class' => '',                                                                                                                                                          
                    'format' => array('before', 'label', 'between', 'input', 'after','error'),                                                                                              
                    'error' => array('attributes' => array('class' => 'controls help-block')),                                                                                              
                ),                                                                                                                                                                              
            ));                                                                                                                                                                     
                                                                                                                                                                                    
            echo $this->Form->input('id');                                                                                                                                          
        ?>                                                                                                                                                                      
                                                                                                                                             
    <div class="row-fluid">
        <div class="span4">
            <fieldset style=" padding: 15px; border-radius: 4px; border: 1px solid #e3e3e3;">
                <legend style="font-weight: bold; font-size: 16px; margin-bottom: 10px; border-bottom: none !important; border: 0 !important;">Profile Information</legend>
                <?php
                    echo $this->Form->input('username', array('label' => array('class' => 'control-label', 'text' => 'Username')));
                    echo $this->Form->input('name', array('label' => array('class' => 'control-label', 'text' => 'Name')));
                    echo $this->Form->input('email', array(
                        'type' => 'email',                
                        'div' => array('class' => 'control-group required'),
                        'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS')
                    ));                                                                                                                                                         
                    echo $this->Form->input('phone_no', array('label' => array('class' => 'control-label', 'text' => 'Phone Number')));
                    echo $this->Form->input('designation_id', array('label' => array('class' => 'control-label', 'text' => 'Designation')));
                    echo $this->Form->input('name_of_institution', array('label' => array('class' => 'control-label', 'text' => 'Institution Name')));
                    echo $this->Form->input('institution_code', array('label' => array('class' => 'control-label', 'text' => 'Institution Code')));
                    echo $this->Form->input('institution_address', array('label' => array('class' => 'control-label', 'text' => 'Address')));                        
                    echo $this->Form->input('institution_contact', array('label' => array('class' => 'control-label', 'text' => 'Contacts')));                        
                    echo $this->Form->input('sponsor_email', array('type' => 'email', 'label' => array('class' => 'control-label', 'text' => 'Company Email')));                            
                ?>  
				  <div class="form-actions" style="padding-left: 0; text-align: center; margin-top: 20px; border-top: none; background: transparent;">                                                                               
                    <?php echo $this->Form->submit('Update Profile', array('class' => 'btn btn-primary', 'div' => false)); ?>                                                               
                </div>                                                                                                                                                                      
            </fieldset>    
        </div>                                                                                                                                                                  
                                                      
        <div class="span4">                                                                                                                                                     
            <fieldset style=" padding: 15px; border-radius: 4px; border: 1px solid #e3e3e3;">                                                                   
               <legend style="font-weight: bold; font-size: 16px; margin-bottom: 10px; border-bottom: none !important; border: 0 !important;">Access & Permissions</legend>                     
                <?php                                                                                                                                                                   
                    echo $this->Form->input('group_id', array('label' => array('class' => 'control-label', 'text' => 'Group/Role')));                                           
                    echo $this->Form->input('user_type', array(                                                                                                                             
                        'type' => 'select',
                        'label' => array('class' => 'control-label', 'text' => 'User Type'),
                        'empty' => true,                
                        'options' => ['Market Authority' => 'Market Authority', 'County Pharmacist' => 'County Pharmacist', 'Public Health Program' => 'Public Health Program']                
                    ));                                                                                                                                                                     
                    echo $this->Form->input('health_program', array(                                                                                                                        
                        'type' => 'select',                                                                                                                                                     
                        'options' => [                                                                                                                                                          
                            'Malaria program' => 'Malaria program',                                                                                                                                 
                            'National Vaccines and immunisation program' => 'National Vaccines and immunisation program',                                                                           
                            'Neglected tropical diseases program' => 'Neglected tropical diseases program',                                                                                         
                            'MNCAH Priority Medicines' => 'MNCAH Priority Medicines',                                                                                                               
                            'TB program' => 'TB program',                                                                                                                                           
                            'NASCOP program' => 'NASCOP program',                                                                                                                                   
                            'Cancer/Oncology program' => 'Cancer/Oncology program'                                                                                                                  
                        ],                                                                                                                                                                      
                        'empty' => true,                                                                                                                                                        
                        'label' => array('class' => 'control-label', 'text' => 'Public Health Program')                
                    ));                                                                                                                                                                     
                    echo $this->Form->input('county_id', array(                                                                                                                             
                        'label' => array('class' => 'control-label required', 'text' => 'County'),                
                        'empty' => true,                                                                                                                                                        
                        'between' => '<div class="controls ui-widget">',                                                                                                        
                    ));                                                                                                                                                                         
                    echo $this->Form->input('is_active', array('label' => array('class' => 'control-label', 'text' => 'Is Active?')));                                          
                    echo $this->Form->input('initial_email', array(
                        'type' => 'checkbox',
                        'class' => false,                
                        'hiddenField' => false,                                                                                                                                                 
                        'label' => array('class' => 'control-label', 'text' => 'Turn off Notification Email?'),                                                                                 
                        'between' => '<div class="controls"> <input type="hidden" value="0" id="UserInitialEmail_" name="data[User][initial_email]"><label class="checkbox"     
  style="color:#C09853; font-weight:normal">',                                                                                                                               
                       'after' => 'Turn on/off the initial email sent after you create a report. Only the successful submit confirmation
																email will be sent. Check to turn off. Changes will take effect on next login.</label> </div>',                                                                                                    
                    ));                                                                                                                                                                     
                ?> 
				  <div class="form-actions" style="padding-left: 0; text-align: center; margin-top: 20px; border-top: none; background: transparent;">                                                                            
                    <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-success', 'div' => false)); ?>                                                           
                </div>                                                                                                                                                                         
            </fieldset>                                                                                                                                                             
        </div>                                                                                                                                                                  
                                                                                                                                                                
        <div class="span4">                                                                                                                                                     
            <fieldset style=" padding: 15px; border-radius: 4px; border: 1px solid #e3e3e3;">    
              <legend style="font-weight: bold; font-size: 16px; margin-bottom: 10px; border-bottom: none !important; border: 0 !important;">Security</legend>                                   
                <?php                                                                                                                                                                   
                    echo $this->Form->input('password', array(            
                        'required' => false,                                                                                                                                                    
                        'value' => '',                
                        'label' => array('class' => 'control-label', 'text' => 'New Password')                                                                                                  
                    ));                        
                    echo $this->Form->input('confirm_password', array(                                                                                                          
                        'type' => 'password',                                                                                                                                   
                        'required' => false,
                        'label' => array('class' => 'control-label', 'text' => 'Confirm New Password')
                    ));
                ?>
				  <div class="form-actions" style="padding-left: 0; text-align: center; margin-top: 20px; border-top: none; background: transparent;">                                                                              
                    <?php echo $this->Form->submit('Change Password', array('class' => 'btn btn-danger', 'div' => false)); ?>                                                               
                </div> 
            </fieldset>
        </div>

    </div>         
		</div>
	</div>
</div>
</div>


