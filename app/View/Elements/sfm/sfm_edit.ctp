<?php
    $this->assign('SFM', 'active');
    $this->Html->script('jquery/combobox', array('inline' => false));
    ?>

    <style>
        .formbackp {
      background-color: #EBF3FA !important; 
      border: 1px solid #B9D5ED !important;  
      border-radius: 8px !important;
    }
      .sfm-form-container {
        max-width: 100%;
        box-sizing: border-box;
      }
      .table-responsive {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
      @media (max-width: 767px) {
        .formbackp {
          width: 100% !important;
          margin-left: 0 !important;
          padding: 10px !important;
          box-sizing: border-box !important;
        }
        .row-fluid [class*="span"] {
          width: 100% !important;
          margin-left: 0 !important;
          float: none !important;
          box-sizing: border-box !important;
          margin-bottom: 10px;
        }
        .form-horizontal .control-label {
          float: none !important;
          width: 100% !important;
          text-align: left !important;
          padding-top: 0 !important;
          margin-bottom: 4px !important;
          font-weight: bold;
        }
        .form-horizontal .controls {
          margin-left: 0 !important;
          width: 100% !important;
        }
        .form-horizontal input[type="text"],
        .form-horizontal input[type="password"],
        .form-horizontal textarea,
        .form-horizontal select {
          width: 100% !important;
          max-width: 100% !important;
          box-sizing: border-box !important;
        }
        .header-logo-coa {
          margin-left: 0 !important;
          display: block;
          margin: 0 auto 10px auto !important;
          max-width: 70px;
        }
        .header-confidence-img {
          float: none !important;
          display: block;
          margin: 0 auto 10px auto !important;
          max-width: 100px;
        }
        .btn-responsive {
          width: 100% !important;
          margin-bottom: 8px !important;
          box-sizing: border-box !important;
        }
        .formbackp h4.text-error {
        color: #333333 !important;
    }
      }
    </style>

    <?php
    echo $this->Session->flash();

    echo $this->Form->create('Sfm', array(
        'type' => 'file',
        'class' => 'form-horizontal sfm-form-container',
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
          <div class="span10 formbackp" style="padding: 15px;">   
                                                                                                                                                                                                                                                                  
            <?php                                                                                                                                                                                                                                                 
            echo $this->Form->input('Sfm.id');                                                                                                                                                                                                                    
            echo $this->Form->input('Sfm.reference_no', array('type' => 'hidden'));                                                                                                                                                                               
            ?>                                                                                                                                                                                                                                                    
                                                                                                                                                                                                                                                                  
            <p><b>(FOM002/SFM/VMS/SOP/001)</b></p>                                                                                                                                                                                                                
            <div class="row-fluid">                                                                                                                                                                                                                               
                <div class="span12">                                                                                                                                                                                                                              
                    <?php                                                                                                                                                                                                                                         
                    echo $this->Html->image('confidence.png', array('alt' => 'in confidence', 'class' => 'pull-right header-confidence-img'));
                    echo $this->Html->image('coa.png', array('alt' => 'COA', 'class' => 'header-logo-coa', 'style' => 'margin-left: 45%;'));
                    ?>                                                                                                                                                                                                                                            
                    <div class="babayao" style="text-align: center;">                                                                                                                                                                                             
                        <h4>MINISTRY OF HEALTH</h4>                                                                                                                                                                                                               
                        <h5>PHARMACY AND POISONS BOARD</h5>                                                                                                                                                                                                       
                        <h5>P.O. Box 27663-00506 NAIROBI</h5>                                                                                                                                                                                                     
                        <h5>Tel: +254795743049</h5>                                                                                                                                                                                                               
                        <h5><b>Email:</b> pv@ppb.go.ke</h5>                                                                                                                                                                                                       
                        <h5 style="background-color: #f2dede; color: #b94a48; padding: 6px; font-weight: bold;">                                                                                                                                                  
                             SUSPECTED FALSIFIED MEDICINE REPORT FORM                                                                                                                                                                                       
                        </h5>                                                                                                                                                                                                                                     
                    </div>                                                                                                                                                                                                                                        
                </div>                                                                                                                                                                                                                                            
            </div>                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                                  
            <div class="row-fluid">
                <div class="span8"></div>                                                                                                                                                                                                                         
                 <div class="span4">                                                                                                                                                      
        <div id="sfm_edit_form_id">                                                                                                                                          
            <h4>                                                                                                                                                             
                <?php echo 'Form ID: ' . (!empty($this->request->data['Sfm']['reference_no']) ? $this->request->data['Sfm']['reference_no'] : 'new'); ?>                   
            </h4>                                                                                                                                                            
            <h5>                                                                                                                                                             
                <?php echo 'Form Type: ' . (!empty($this->request->data['Sfm']['report_type']) ? $this->request->data['Sfm']['report_type'] : 'Initial'); ?>
            </h5>
        </div>
    </div>                                                                                                                                                                                                                                          
            </div>
            <hr>                                                                                                                                                                                                                         
             <h4>Details of Suspected Falsified Product</h4>                                                                                                                                             
            <div class="row-fluid">                                                                                                                                                                                                                               
                <div class="span6">                                                                                                                                                                                                                               
                    <?php                                                                                                                                                                                                                                         
                    echo $this->Form->input('Sfm.brand_name', array(
                        'label' => array('class' => 'control-label required', 'text' => 'Brand / Trade Name <span class="text-error">*</span>'),
                        'placeholder' => 'e.g., Panadol'
                    ));
                    echo $this->Form->input('Sfm.generic_name', array(
                        'label' => array('class' => 'control-label', 'text' => 'Generic Name (INN)'),                                                                                                                                                             
                        'placeholder' => 'e.g., Paracetamol'                                                                                                                                                                                                      
                    ));                                                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.batch_number', array(                                                                                                                                                                                            
                        'label' => array('class' => 'control-label required', 'text' => 'Batch / Lot Number <span class="text-error">*</span>'),                                                                                                                  
                    ));                                                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.dosage_form', array(
                        'label' => 'Dosage Form',                                                                                                                                                                                                                 
                        'type' => 'select',                                                                                                                                                                                                                       
                        'empty' => '--- Select Dosage Form ---',                                                                                                                                                                                                  
                        'options' => array(                                                                                                                                                                                                                       
                            'Tablet' => 'Tablet',                                                                                                                                                                                                                 
                            'Capsule' => 'Capsule',                                                                                                                                                                                                               
                            'Syrup/Suspension' => 'Syrup / Suspension',                                                                                                                                                                                           
                            'Injection' => 'Injection',                                                                                                                                                                                                           
                            'Ointment/Cream' => 'Ointment / Cream',                                                                                                                                                                                               
                            'Eye Drops' => 'Eye Drops',                                                                                                                                                                                                           
                            'Other' => 'Other'                                                                                                                                                                                                                    
                        )                                                                                                                                                                                                                                         
                    ));                                                                                                                                                                                                                                           
                    ?>
                </div>                                                                                                                                                                                                                                            
                <div class="span6">                                                                                                                                                                                                                               
                    <?php                                                                                                                                                                                                                                         
                   echo $this->Form->input('Sfm.manufacturing_date', array(                                                                                                                   
        'label' => 'Date of Manufacture',                                                                                                                                    
        'type' => 'text',                                                                                                                                                    
        'id' => 'manufacturing_date',                                                                                                                                          
        'class' => 'datepicker',                                                                                                                                             
        'placeholder' => 'YYYY-MM-DD'                                                                                                                                        
    ));                                                                                                                                                                                                                                                                                                                                                                                          
                  echo $this->Form->input('Sfm.expiry_date', array(                                                                                                                        
        'label' => 'Expiry Date',                                                                                                                                            
        'type' => 'text',                                                                                                                                                    
        'id' => 'expiry_date',                                                                                                                                               
        'class' => 'datepicker',                                                                                                                                             
        'placeholder' => 'YYYY-MM-DD'                                                                                                                                        
    ));                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.manufacturer_name', array(                                                                                                                                                                                       
                        'label' => 'Stated Manufacturer Name',                                                                                                                                                                                                    
                    ));
                    echo $this->Form->input('Sfm.country_of_origin', array(                                                                                                                                                                                       
                        'label' => 'Stated Country of Origin',                                                                                                                                                                                                    
                    ));                                                                                                                                                                                                                                           
                    ?>
                </div>                                                                                                                                                                                                                                            
            </div>                                                                                                                                                                                                                                                
            <hr>

            <h4>Indicators of Suspected Falsification</h4>  
            <p class="muted">Check all options that apply to the suspected product:</p>                                                                                                                                                                           
            <div class="row-fluid">
                <div class="span6">                                                                                                                                                                                                                               
                    <?php                                                                                                                                                                                                                                         
                    echo $this->Form->input('Sfm.packaging_anomaly', array(                                                                                                                                                                                       
                        'type' => 'checkbox', 'label' => false, 'div' => false,                                                                                                                                                                                   
                        'between' => '<label class="checkbox">',                                                                                                                                                                                                  
                        'after' => 'Packaging anomaly / Altered box / Poor print quality</label>',
                    ));                                                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.labeling_discrepancy', array(                                                                                                                                                                                    
                        'type' => 'checkbox', 'label' => false, 'div' => false,                                                                                                                                                                                   
                        'between' => '<label class="checkbox">',                                                                                                                                                                                                  
                        'after' => 'Labeling discrepancy / Spelling errors / Wrong text</label>',                                                                                                                                                                 
                    ));                                                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.appearance_change', array(                                                                                                                                                                                       
                        'type' => 'checkbox', 'label' => false, 'div' => false,
                        'between' => '<label class="checkbox">',                                                                                                                                                                                                  
                        'after' => 'Abnormal appearance, color change, texture, or odor</label>',                                                                                                                                                                 
                    ));                                                                                                                                                                                                                                           
                    ?>                                                                                                                                                                                                                                            
                </div>                                                                                                                                                                                                                                            
                <div class="span6">                                                                                                                                                                                                                               
                    <?php                                                                                                                                                                                                                                         
                    echo $this->Form->input('Sfm.fake_hologram', array(
                        'type' => 'checkbox', 'label' => false, 'div' => false,                                                                                                                                                                                   
                        'between' => '<label class="checkbox">',                                                                                                                                                                                                  
                        'after' => 'Fake or missing security seal / hologram</label>',                                                                                                                                                                            
                    ));                                                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.unregistered_product', array(                                                                                                                                                                                    
                        'type' => 'checkbox', 'label' => false, 'div' => false,                                                                                                                                                                                   
                        'between' => '<label class="checkbox">',                                                                                                                                                                                                  
                        'after' => 'Unregistered / Unapproved product in market</label>',                                                                                                                                                                         
                    ));                                                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.therapeutic_failure', array(
                        'type' => 'checkbox', 'label' => false, 'div' => false,                                                                                                                                                                                   
                        'between' => '<label class="checkbox">',                                                                                                                                                                                                  
                        'after' => 'Total therapeutic failure / Unexpected adverse reaction</label>',                                                                                                                                                             
                    ));                                                                                                                                                                                                                                           
                    ?>                                                                                                                                                                                                                                            
                </div>                                                                                                                                                                                                                                            
            </div>                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                                  
            <div class="row-fluid" style="margin-top: 15px;">                                                                                                                                                                                                     
                <div class="span12">                                                                                                                                                                                                                              
                    <?php                                                                                                                                                                                                                                         
                    echo $this->Form->input('Sfm.falsification_description', array(
                        'type' => 'textarea',                                                                                                                                                                                                                     
                        'rows' => 4,                                                                                                                                                                                                                              
                        'class' => 'span11',                                                                                                                                                                                                                      
                        'label' => array('class' => 'control-label', 'text' => 'Detailed Description of Falsification Reason'),                                                                                                                                   
                        'placeholder' => 'Describe why you suspect this medicine is falsified (e.g., mismatched batch numbers, suspicious source, unexpected side effects)...'                                                                                    
                    ));                                                                                                                                                                                                                                           
                    ?>                                                                                                                                                                                                                                            
                </div>                                                                                                                                                                                                                                            
            </div>                                                                                                                                                                                                                                                
            <hr>                                                                                                                                                                                                                                                  
                                                                                                                                                                                                                                    
            <h4> Source & Acquisition Details</h4> 
            <div class="row-fluid">                                                                                                                                                                                                                               
                <div class="span6">                                                                                                                                                                                                                               
                                                                                                                                                           
    <?php                                                                                                                                                                    
    echo $this->Form->input('Sfm.source', array(                                                                                                                             
        'label' => 'Source / Outlet Type',                                                                                                                                   
        'id' => 'source',                                                                                                                                                    
        'type' => 'select',                                                                                                                                                  
        'empty' => '--- Select Outlet Type ---',                                                                                                                             
        'options' => array(                                                                                                                                                  
            'Hospital Pharmacy' => 'Hospital Pharmacy',                                                                                                                      
            'Community Pharmacy' => 'Community Pharmacy / Chemist',                                                                                                          
            'Wholesaler' => 'Wholesaler / Distributor',                                                                                                                      
            'Informal Market / Street' => 'Informal Market / Street Vendor',                                                                                                 
            'Online Pharmacy' => 'Online Pharmacy / Website',                                                                                                                
            'Other' => 'Other'                                                                                                                                               
        )                                                                                                                                                                    
    ));                                                                                                                                                                      
                                                                                                                                            
    echo '<div id="source_other_div" style="display: none;">';                                                                                                               
    echo $this->Form->input('Sfm.source_other', array(                                                                                                            
        'label' => 'Specify Other Outlet Type',                                                                                                                              
        'placeholder' => 'Type the outlet type here...'                                                                                                                      
    ));                                                                                                                                                                      
  echo '</div>';
  
        echo $this->Form->input('Sfm.facility_name', array(
            'label' => 'Facility / Shop Name',
            'placeholder' => 'Name of pharmacy or outlet where found'
        ));
        echo $this->Form->input('Sfm.purchase_date', array(
            'label' => 'Date Obtained',
            'type' => 'text',
            'id' => 'purchase_date',
            'class' => 'datepicker',
            'placeholder' => 'YYYY-MM-DD'
        ));                                                                                                                                                                  
        ?>                                                                                                                                                                                                                                           
                </div>                                                                                                                                                                                                                                            
                <div class="span6">
                    <?php                                                                                                                                                                                                                                         
                    echo $this->Form->input('Sfm.supplier_name', array(                                                                                                                                                                                           
                        'label' => 'Supplier / Distributor Name',                                                                                                                                                                                                 
                    ));                                                                                                                                                                                                                                           
                     echo $this->Form->input('Sfm.county_id', array(                                                                                                                          
        'label' => 'County',                                                                                                                                                 
        'id' => 'county_id',                                                                                                                                                 
        'empty' => '--- Select County ---'                                                                                                                                   
    ));                                                                                                                                                                      
                                                                                                                                                                             
    echo $this->Form->input('Sfm.sub_county_id', array(                                                                                                                      
        'label' => 'Sub-County',                                                                                                                                             
        'id' => 'sub_county_id',                                                                                                                                             
        'empty' => '--- Select Sub-County ---'                                                                                                                               
    ));                                                                                                                                                                                                                                         
                    ?>                                                                                                                                                                                                                                            
                </div>                                                                                                                                                                                                                                            
            </div>                                                                                                                                                                                                                                                
            <hr>                                                                                                                                                                                                                                                  
                                                                                                                                                                                                                                          
          <h4>Reporter Information</h4>                                                                                                                                                               
            <div class="row-fluid">                                                                                                                                                                                                                               
                <div class="span6">                                                                                                                                                                                                                               
                    <?php                                                                                                                                                                                                                                         
                    echo $this->Form->input('Sfm.reporter_name', array(                                                                                                                                                                                           
                        'label' => 'Reporter Name',                                                                                                                                                                                                               
                        'default' => $this->Session->read('Auth.User.name')                                                                                                                                                                                       
                    ));                                                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.reporter_email', array(                                                                                                                                                                                          
                        'label' => 'Email Address',                                                                                                                                                                                                               
                        'default' => $this->Session->read('Auth.User.email')                                                                                                                                                                                      
                    ));
                    ?>                                                                                                                                                                                                                                            
                </div>                                                                                                                                                                                                                                            
                <div class="span6">                                                                                                                                                                                                                               
                    <?php                                                                                                                                                                                                                                         
                   echo $this->Form->input('Sfm.reporter_phone', array(                                                                                                                     
        'label' => 'Phone Number',                                                                                                                                           
        'type' => 'text',                                                                                                                                                    
        'id' => 'reporter_phone',                                                                                                                                            
        'placeholder' => ' +254712345678',                                                                                                                 
        'default' => $this->Session->read('Auth.User.phone_no')                                                                                                              
    ));                                                                                                                                                                                                                                           
                    echo $this->Form->input('Sfm.designation_id', array(                                                                                                                                                                                          
                        'label' => 'Designation / Cadre',                                                                                                                                                                                                         
                        'empty' => '--- Select Designation ---'                                                                                                                                                                                                   
                    ));                                                                                                                                                                                                                                           
                    ?>                                                                                                                                                                                                                                            
                </div>                                                                                                                                                                                                                                            
            </div>
            <hr>                                                                                                                                                                                                                                                  
               </div>                                                                                                                                                                                                                                                   
                                                                                                                                                                                                                                 
            <div class="span2">                                                                                                                                                      
        <div class="my-sidebar" data-spy="affix">                                                                                                                            
            <div class="awell">                                                                                                                                              
                <?php                                                                                                                                                  
                echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(                                                            
                    'name' => 'submitReport',                                                                                                                                
                    'value' => 'new',                                                                                                                                      
                    'class' => 'btn btn-success btn-block mapop',                                                                                                            
                    'formnovalidate' => 'formnovalidate',                                                                                                                    
                    'title' => 'Save & continue editing',                                                                                                                    
                    'data-content' => 'Save changes to form without submitting it.',                                                                                         
                    'div' => false,                                                                                                                                          
                ));                                                                                                                                                          
                ?>                                                                                                                                                           
                <br><hr>                                                                                                                                                     
                                                                                                                                                                             
                <?php                                                                                                                                                     
                echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit', array(                                                             
                    'name' => 'submitReport',                                                                                                                                
                    'value' => 'submit',                                                                                                                                     
                    'onclick' => "return confirm('Are you sure you wish to submit the report?');",                                                                           
                    'class' => 'btn btn-primary btn-block mapop',                                                                                                            
                    'title' => 'Save and Submit Report',                                                                                                                     
                    'data-content' => 'Submit report for review and approval.',                                                                                              
                    'div' => false,                                                                                                                                          
                ));                                                                                                                                                          
                ?>                                                                                                                                                           
                <br><hr>                                                                                                                                                     
                                                                                                                                                                             
                <?php                                                                                                                             
                $sfmId = isset($this->request->data['Sfm']['id']) ? $this->request->data['Sfm']['id'] : '';                                                                  
                echo $this->Html->link(                                                                                                                                      
                    '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF',                                                                                      
                    array('action' => 'view', 'ext' => 'pdf', $sfmId),                                                                                                       
                    array('escape' => false, 'class' => 'btn btn-info btn-block mapop', 'title' => 'Download PDF')                                                           
                );
                ?>
                <br><hr>
  
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

    <?php echo $this->Form->end(); ?>     
     <script>                                                                                                                                                                 
    $(document).ready(function() {                                                                                                                                           
        $('.datepicker').datepicker({                                                                                                                                        
            dateFormat: 'yy-mm-dd',                                                                                                                                          
            changeMonth: true,                                                                                                                                               
            changeYear: true                                                                                                                                                 
        });                                                                                                                                                                  
                                                                                                                                  
        $('.datepicker').on('keydown paste', function(e) {                                                                                                                   
            e.preventDefault();
        });
    });
    </script>  
    <script>                                                                                                                                                                 
    $(document).ready(function() {                                                                                                                                           
        function toggleOtherOutlet() {                                                                                                                                       
            if ($('#purchase_location_type').val() === 'Other') {                                                                                                            
                $('#purchase_location_other_div').slideDown();                                                                                                               
            } else {                                                                                                                                                         
                $('#purchase_location_other_div').slideUp();                                                                                                                 
                $('#SfmPurchaseLocationOther').val('');                                                                                       
            }                                                                                                                                                                
        }                                                                                                                                         
        toggleOtherOutlet();                                                                                                                                         
        $('#purchase_location_type').on('change', function() {                                                                                                               
            toggleOtherOutlet();
        });
    });
    </script>      
        <script>                                                                                                                                                                 
    $(document).ready(function() {                                                                                                                                           
        $('#county_id').on('change', function() {                                                                                                                            
            var countyId = $(this).val();                                                                                                                                    
            var subCountySelect = $('#sub_county_id');                                                                                                                                    
            subCountySelect.empty();                                                                                                                                         
            subCountySelect.append('<option value="">--- Select Sub-County ---</option>');                                                                                   
                                                                                                                                                                             
            if (countyId) {                                                                                                                              
                $.ajax({                                                                                                                                                     
                    url: '/sub_counties/constituency/' + countyId + '.json',                                                                                                 
                    type: 'GET',                                                                                                                                             
                    dataType: 'json',                                                                                                                                        
                    success: function(data) {                                                                                                                                
                        var subCounties = data.sub_counties || data;                                                                                                         
                        $.each(subCounties, function(id, name) {                                                                                                             
                            subCountySelect.append($('<option>', {                                                                                                           
                                value: id,                                                                                                                                   
                                text: name                                                                                                                                   
                            }));                                                                                                                                             
                        });                                                                                                                                                  
                    }                                                                                                                                                        
                });                                                                                                                                                          
            }                                                                                                                                                                
        });                                                                                                                                                                  
    });                                                                                                                                                                      
    </script>  
      <script>                                                                                                                                                                 
    $(document).ready(function() {                                                                                                                   
        var phoneInput = $('#reporter_phone, #SfmReporterPhone, input[name="data[Sfm][reporter_phone]"]');                                                                   
    
        phoneInput.on('keyup input paste change', function() {
            var element = this;
            setTimeout(function() {
                element.value = element.value.replace(/[^0-9+]/g, '');
            }, 0);
        });       
    });    
    </script>      
    
    <script>
    $(document).ready(function() {
        function showInlineError(inputEl, message) {
            var container = inputEl.closest('.control-group, div');
            container.find('.date-inline-error').remove();
            if (message) {
                inputEl.after('<span class="date-inline-error help-block text-error" style="color: #b94a48; font-weight: bold; margin-top: 4px; display: block;"><i class="fa fa-exclamation-circle"></i> ' + message + '</span>');
                container.addClass('error');
            } else {
                container.removeClass('error');
            }
        }

        $('form').on('submit', function(e) {
            var mfgInput = $('#manufacture_date, #SfmManufactureDate');
            var expInput = $('#expiry_date, #SfmExpiryDate');
            var obtInput = $('#purchase_date, #SfmPurchaseDate');

            var mfgDate = mfgInput.val();
            var expDate = expInput.val();
            var obtDate = obtInput.val();

            $('.date-inline-error').remove();
            $('.control-group, div').removeClass('error');

            var hasError = false;

            if (mfgDate && expDate && mfgDate > expDate) {
                showInlineError(mfgInput, 'Date of Manufacture cannot be after Expiry Date.');
                showInlineError(expInput, 'Expiry Date cannot be before Date of Manufacture.');
                hasError = true;
            }

            if (mfgDate && obtDate && obtDate < mfgDate) {
                showInlineError(obtInput, 'Date Obtained cannot be before Date of Manufacture.');
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $('.date-inline-error:first').offset().top - 100
                }, 400);
                return false;
            }
        });

        $('#manufacture_date, #SfmManufactureDate, #expiry_date, #SfmExpiryDate, #purchase_date, #SfmPurchaseDate').on('change', function() {
            $(this).closest('.control-group, div').removeClass('error').find('.date-inline-error').remove();
        });
    });
    </script>
     <script>                                                                                                                                                                 
    $(document).ready(function() {                                                                                                                                           
        function toggleSourceOther() {                                                                                                                                       
            var selectedVal = $('#source, #SfmSource').val();                                                                                                                
            if (selectedVal === 'Other') {                                                                                                                                   
                $('#source_other_div').show();                                                                                                                               
            } else {                                                                                                                                                         
                $('#source_other_div').hide();                                                                                                                               
            }                                                                                                                                                                
        }       
        toggleSourceOther();
        $('#source, #SfmSource').on('change', function() {
            toggleSourceOther();
        });
    });
    </script>
