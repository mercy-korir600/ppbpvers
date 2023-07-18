    
    <ul class="nav nav-list sidebar-<?php echo $redir; ?>">
      <li class="text-center <?php echo $this->fetch('reports-home'); ?>">
      	<?php
            echo $this->Html->link('REPORTS',  array('controller' => 'reports', 'action'=>'index', 'prefix' => false ), array('escape' => false, 'class' => 'text-success'));
        ?>
      </li>      
      <li class="divider"></li>
      <li class="nav-header"><i class="fa fa-ambulance" aria-hidden="true"></i> SUSPECTED ADVERSE DRUG REACTIONS</li>
      <li class="<?php echo $this->fetch('sadr-summary'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> SADR',  array('controller' => 'reports', 'action'=>'summary', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      
     
      <li class="nav-header"><i class="fa fa-child" aria-hidden="true"></i> ADVERSE EVENTS FOLLOWING IMMUNIZATION</li>
      <li class="<?php echo $this->fetch('aefi-summary'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> AEFI',  array('controller' => 'reports', 'action'=>'aefi_summary', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
       
      <li class="nav-header"><i class="fa fa-medkit" aria-hidden="true"></i> POOR QUALITY HEALTH PRODUCTS AND TECHNOLOGIES</li>
      <li class="<?php echo $this->fetch('pqmps-summary'); ?>">
      	<?php
	        echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> PQHPTs',  array('controller' => 'reports', 'action'=>'pqmps_summary', 'admin' => false ),
	                  array('escape' => false));
        ?>
      </li>
       
      <li class="nav-header"><i class="fa fa-stethoscope" aria-hidden="true"></i> MEDICAL DEVICES</li>
      <li class="<?php echo $this->fetch('devices-summary'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Medical Devices',  array('controller' => 'reports', 'action'=>'devices_summary', 'admin' => false ),
                      array('escape' => false));
        ?>                        	
      </li>
       
      <li class="nav-header"><i class="fa fa-chain-broken" aria-hidden="true"></i> MEDICAL ERRORS</li>
    
      <li class="<?php echo $this->fetch('medications-summary'); ?>">
        <?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> Medication Errors',  array('controller' => 'reports', 'action'=>'medications_summary', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      
      <li class="nav-header"><i class="fa fa-eyedropper" aria-hidden="true"></i> BLOOD TRANSFUSION</li>
      <li class="<?php echo $this->fetch('transfusions-summary'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> BLood Transfusion',  array('controller' => 'reports', 'action'=>'transfusions_summary', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      
      <li class="nav-header"><i class="fa fa-thermometer-full" aria-hidden="true"></i> SERIOUS ADVERSE EVENTS</li>
      <li class="<?php echo $this->fetch('saes-summary'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> SAE',  array('controller' => 'reports', 'action'=>'saes_summary', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="nav-header"><i class="fa fa-thermometer-full" aria-hidden="true"></i> E2B</li>
      <li class="<?php echo $this->fetch('e2b-summary'); ?>">
      	<?php
            echo $this->Html->link('<i class="fa fa-caret-right" aria-hidden="true"></i> E2B',  array('controller' => 'reports', 'action'=>'e2b_summary', 'admin' => false ),
                      array('escape' => false));
        ?>
      </li>
      <li class="divider"></li>
    </ul>