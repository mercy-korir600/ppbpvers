<?php
    $this->assign('SFM', 'active');
    $ichecked = "&#x2611;";
    $nchecked = "&#x2610;"; 
    ?>

   <style>  
     .formbackp {                                                                                                                                                           
        background-color: #EBF3FA !important;
        border: 1px solid #B9D5ED !important;
        border-radius: 8px !important;
      }                                                                                                                                                    
      #printArea table, 
      #printArea th, 
      #printArea td {
        border: none !important;
      }
      #printArea table,                                                                                                                                                      
      #printArea table tr,                                                                                                                                                   
      #printArea table th,                                                                                                                                                   
      #printArea table td {                                                                                                                                                  
        background-color: transparent !important;                                                                                                                            
        background: transparent !important;                                                                                                                                  
        border: none !important;                                                                                                                                             
      }                       
      #printArea h5 {
        border-bottom: none !important;
      }
    </style>                                                                                                            
        <div class="row-fluid">                                                                                                                    
           <div class="<?php echo ($this->Session->read('Auth.User.group_id') == '3') ? 'span10' : 'span12'; ?>">                                                                                                                                              
            <div id="printArea" class="formbackp" style="padding: 20px;">                                                                                                                                                                                                                                
          <p><b>(FOM002/SFM/VMS/SOP/001)</b></p>                                                                                                                                                                                                                  
          <div class="row-fluid">                                                                                                                                                                                                                                 
            <div class="span12">                                                                                                                                                                                                                                  
              <?php                                                                                                                                                                                                                                               
              echo $this->Html->image('confidence.png', array('alt' => 'In Confidence', 'class' => 'pull-right'));                                                                                                                                                
              echo $this->Html->image('coa.png', array('alt' => 'Coat of Arms', 'style' => 'margin-left: 45%;'));                                                                                                                                                 
              ?>                                                                                                                                                                                                                                                  
              <div style="text-align: center;">                                                                                                                                                                                                                   
                <h4>MINISTRY OF HEALTH</h4>                                                                                                                                                                                                                       
                <h5>PHARMACY AND POISONS BOARD</h5>                                                                                                                                                                                                               
                <h5>P.O. Box 27663-00506 NAIROBI</h5>                                                                                                                                                                                                             
                <h5>Tel: +254795743049 | <b>Email:</b> pv@ppb.go.ke</h5>                                                                                                                                                                                          
                 <h5 style="background-color: #D9EDF7; color: #31708F; padding: 8px; font-weight: bold; border-radius: 4px;">                                                                                                                                                          
                  SUSPECTED FALSIFIED MEDICINE REPORT                                                                                                                                                                                                             
                </h5>                                                                                                                                                                                                                                             
              </div>                                                                                                                                                                                                                                              
            </div>                                                                                                                                                                                                                                                
          </div>                                                                                                                                                                                                                        
          <table class="table table-bordered" style="width: 100%; margin-top: 15px;">                                                                                                                                                                             
            <tr>                                                                                                                                                                                                                                                  
              <td style="width: 20%; background-color: #f9f9f9;"><strong>REFERENCE NO:</strong></td>                                                                                                                                                              
              <td style="width: 30%;"><h4 style="margin: 0; color: #b94a48;"><?php echo h($sfm['Sfm']['reference_no']); ?></h4></td>                                                                                                                              
              <td style="width: 20%; background-color: #f9f9f9;"><strong>SUBMISSION DATE:</strong></td>                                                                                                                                                           
              <td style="width: 30%;"><strong><?php echo !empty($sfm['Sfm']['created']) ? date('d-M-Y H:i', strtotime( $sfm['Sfm']['submitted_date'])) : 'N/A'; ?></strong></td>                                                                                          
            </tr>                                                                                                                                                                                                                                                 
          </table>                                                                                                                                                                                                                             
        <h5 style="border-bottom: 1px solid #ddd; padding-bottom: 4px;">                                                                                                         
    Details of Suspected Falsified Product                                                                                                                      
    </h5>                                                                                                                                                                                                                                                      
          <table class="table table-bordered table-striped" style="width: 100%;">                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th style="width: 25%;">Brand / Trade Name:</th>                                                                                                                                                                                                    
              <td style="width: 25%;"><?php echo h($sfm['Sfm']['brand_name']); ?></td>                                                                                                                                                           
              <th style="width: 25%;">Generic Name (INN):</th>                                                                                                                                                                                                    
              <td style="width: 25%;"><?php echo h($sfm['Sfm']['generic_name']); ?></td>                                                                                                                                                                          
            </tr>                                                                                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th>Batch / Lot Number:</th>                                                                                                                                                                                                                        
                <td><?php echo h($sfm['Sfm']['batch_number']); ?></td>                                                                                                                                                                                
              <th>Dosage Form:</th>                                                                                                                                                                                                                               
              <td><?php echo h($sfm['Sfm']['dosage_form']); ?></td>                                                                                                                                                                                       
            </tr>                                                                                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th>Date of Manufacture:</th>                                                                                                                                                                                                                       
              <td><?php echo !empty($sfm['Sfm']['manufacturing_date']) ? h($sfm['Sfm']['manufacturing_date']) : 'N/A'; ?></td>                                                                                                                                        
              <th>Expiry Date:</th>                                                                                                                                                                                                                               
              <td><?php echo !empty($sfm['Sfm']['expiry_date']) ? h($sfm['Sfm']['expiry_date']) : 'N/A'; ?></td>                                                                                                                                                  
            </tr>                                                                                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th>Stated Manufacturer:</th>                                                                                                                                                                                                                       
              <td><?php echo h($sfm['Sfm']['manufacturer_name']); ?></td>                                                                                                                                                                                         
              <th>Stated Country of Origin:</th>                                                                                                                                                                                                                  
              <td><?php echo h($sfm['Sfm']['country_of_origin']); ?></td>                                                                                                                                                                                         
            </tr>                                                                                                                                                                                                                                                 
          </table>                                                                                                                                                                                                                                                
                                                                                                                                                                                                                  
           <h5 style="border-bottom: 1px solid #ddd; padding-bottom: 4px;">                                                                                                         
     Indicators of Suspected Falsification                                                                                                                       
    </h5>                                                                                                                                                                                                                                                   
          <table class="table table-bordered" style="width: 100%;">                                                                                                                                                                                               
            <tr>                                                                                                                                                                                                                                                  
              <td style="width: 50%;">                                                                                                                                                                                                                            
                <p><?php echo (!empty($sfm['Sfm']['packaging_anomaly']) ? $ichecked : $nchecked); ?> Packaging anomaly / Altered box / Poor print</p>                                                                                                             
                <p><?php echo (!empty($sfm['Sfm']['labeling_discrepancy']) ? $ichecked : $nchecked); ?> Labeling discrepancy / Spelling errors</p>                                                                                                                
                <p><?php echo (!empty($sfm['Sfm']['appearance_change']) ? $ichecked : $nchecked); ?> Abnormal color, appearance, texture, or odor</p>                                                                                                             
              </td>                                                                                                                                                                                                                                               
              <td style="width: 50%;">                                                                                                                                                                                                                            
                <p><?php echo (!empty($sfm['Sfm']['fake_hologram']) ? $ichecked : $nchecked); ?> Fake or missing security seal / hologram</p>                                                                                                                     
                <p><?php echo (!empty($sfm['Sfm']['unregistered_product']) ? $ichecked : $nchecked); ?> Unregistered / Unapproved product in market</p>                                                                                                           
                <p><?php echo (!empty($sfm['Sfm']['therapeutic_failure']) ? $ichecked : $nchecked); ?> Total therapeutic failure / Adverse reaction</p>                                                                                                           
              </td>                                                                                                                                                                                                                                               
            </tr>                                                                                                                                                                                                                                                 
            <?php if (!empty($sfm['Sfm']['falsification_description'])): ?>                                                                                                                                                                                       
              <tr>                                                                                                                                                                                                                                                
                <td colspan="2">                                                                                                                                                                                                                                  
                  <strong>Detailed Description:</strong>                                                                                                                                                                                                          
                   <p style="white-space: pre-wrap; background-color: transparent; border: none; padding: 5px 0; margin-top: 5px;">                                                         
      <?php echo h($sfm['Sfm']['falsification_description']); ?>                                                                                                             
    </p>                                                                                                                                                                                                                                             
                </td>                                                                                                                                                                                                                                             
              </tr>                                                                                                                                                                                                                                               
            <?php endif; ?>                                                                                                                                                                                                                                       
          </table>                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                  
          <h5 style="border-bottom: 1px solid #ddd; padding-bottom: 4px;">                                                                                                         
     Source & Acquisition Details
    </h5>                                                                                                                                                                                                                                                                                                                                                                                                                       
          <table class="table table-bordered table-striped" style="width: 100%;">                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th style="width: 25%;">Outlet Type:</th>
    <td style="width: 25%;">
         <?php 
    if (!empty($sfm['Sfm']['source']) && $sfm['Sfm']['source'] === 'Other' && !empty($sfm['Sfm']['source_other'])) {
        echo h($sfm['Sfm']['source_other']);
    } elseif (!empty($sfm['Sfm']['source'])) {
        echo h($sfm['Sfm']['source']);
    } else {
        echo 'N/A';
    }
    ?>
    </td>                                                                                                                                                             
              <th style="width: 25%;">Facility / Shop Name:</th>                                                                                                                                                                                                  
              <td style="width: 25%;"><?php echo h($sfm['Sfm']['facility_name']); ?></td>                                                                                                                                                                         
            </tr>                                                                                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th>Date Purchased / Discovered:</th>                                                                                                                                                                                                               
              <td><?php echo !empty($sfm['Sfm']['purchase_date']) ? h($sfm['Sfm']['purchase_date']) : 'N/A'; ?></td>                                                                                                                                              
              <th>Supplier / Distributor:</th>                                                                                                                                                                                                                    
              <td><?php echo h($sfm['Sfm']['supplier_name']); ?></td>                                                                                                                                                                                             
            </tr>                                                                                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th>County:</th>                                                                                                                                                                                                                                    
              <td><?php echo isset($sfm['County']['county_name']) ? h($sfm['County']['county_name']) : 'N/A'; ?></td>                                                                                                                                             
              <th>Sub-County:</th>                                                                                                                                                                                                                                
              <td><?php echo isset($sfm['SubCounty']['sub_county_name']) ? h($sfm['SubCounty']['sub_county_name']) : 'N/A'; ?></td>                                                                                                                               
            </tr>                                                                                                                                                                                                                                                 
          </table>                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                 
          <h5 style="border-bottom: 1px solid #ddd; padding-bottom: 4px;">                                                                                                         
    Reporter Information                                                                                                                                        
    </h5>                                                                                                                                                                                                                                                  
          <table class="table table-bordered table-striped" style="width: 100%;">                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th style="width: 25%;">Reporter Name:</th>                                                                                                                                                                                                         
              <td style="width: 25%;"><?php echo h($sfm['Sfm']['reporter_name']); ?></td>                                                                                                                                                                         
              <th style="width: 25%;">Email Address:</th>                                                                                                                                                                                                         
              <td style="width: 25%;"><?php echo h($sfm['Sfm']['reporter_email']); ?></td>                                                                                                                                                                        
            </tr>                                                                                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <th>Phone Number:</th>                                                                                                                                                                                                                              
              <td><?php echo h($sfm['Sfm']['reporter_phone']); ?></td>                                                                                                                                                                                            
              <th>Designation / Cadre:</th>                                                                                                                                                                                                                       
              <td><?php echo isset($sfm['Designation']['name']) ? h($sfm['Designation']['name']) : 'N/A'; ?></td>                                                                                                                                                 
            </tr>                                                                                                                                                                                                                                                 
          </table>                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                       
          <?php if (!empty($sfm['Attachment'])): ?>                                                                                                                                                                                                               
             <h5 style="border-bottom: 1px solid #ddd; padding-bottom: 4px;">                                                                                                         
      Attached Samples / Photos                                                                                                                                              
    </h5>                                                                                                                                                                    
                                                                                                                                                                                                                                                          
            <ul>                                                                                                                                                                                                                                                  
              <?php foreach ($sfm['Attachment'] as $attachment): ?>                                                                                                                                                                                               
                <li>                                                                                                                                                                                                                                              
                  <?php                                                                                                                                                                                                                                           
                  echo $this->Html->link(                                                                                                                                                                                                                         
                    '<i class="icon-file"></i> ' . h($attachment['basename']),                                                                                                                                                                                    
                    '/files/attachment/file/' . $attachment['dirname'] . '/' . $attachment['basename'],                                                                                                                                                           
                    array('escape' => false, 'target' => '_blank')                                                                                                                                                                                                
                  );                                                                                                                                                                                                                                              
                  ?>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
   </div>
        </div>                                                                                                     
        <?php                                                                                  
    if ($this->Session->read('Auth.User.group_id') == '3'):                                                                                                                  
    ?>                                                                                                                                                                       
      <div class="span2 hide-from-print">                                                                                                                                    
        <div class="my-sidebar" data-spy="affix">                                                                                                                            
          <div class="awell">                                                                                                                                                
            <!-- 1. Follow Up Button -->                                                                                                                                     
            <?php                                                                                                                                                            
            echo $this->Html->link(                                                                                                                                          
              '<i class="icon-plus icon-white"></i> Follow Up',                                                                                                              
              array('controller' => 'sfms', 'action' => 'followup', $sfm['Sfm']['id']),                                                                                      
              array('escape' => false, 'class' => 'btn btn-primary btn-block', 'title' => 'Add Follow-up Report')                                                            
            );                                                                                                                                                               
            ?>                                                                                                                                                               
            <br><hr>                                                                                                                                 
            <?php                                                                                                                                                            
            echo $this->Html->link(                                                                                                                                          
              '<i class="icon-download-alt icon-white"></i> Download PDF',                                                                                                   
              array('controller' => 'sfms', 'action' => 'export_pdf', $sfm['Sfm']['id']),                                                                                    
              array('escape' => false, 'class' => 'btn btn-success btn-block')                                                                                               
            );                                                                                                                                                               
            ?>                                                                                                                                                               
            <br><hr>                                                                                                                                                         
                                                                                                                             
            <?php                                                                                                                                                            
            if (isset($sfm['Sfm']['submitted']) && $sfm['Sfm']['submitted'] <= 1) {                                                                                          
              echo $this->Html->link(                                                                                                                                        
                '<i class="icon-pencil icon-white"></i> Edit Report',                                                                                                        
                array('controller' => 'sfms', 'action' => 'edit', $sfm['Sfm']['id']),                                                                                        
                array('escape' => false, 'class' => 'btn btn-warning btn-block')                                                                                             
              );                                                                                                                                                             
              echo '<br><hr>';                                                                                                                                               
            }                                                                                                                                                                
            ?>                                                                                                                                                               
                                                                                                                                              
            <?php                                                                                                                                                            
            echo $this->Html->link(                                                                                                                                          
              '<i class="icon-arrow-left"></i> Back to List',                                                                                                                
              array('controller' => 'sfms', 'action' => 'index'),                                                                                                            
              array('escape' => false, 'class' => 'btn btn-block')                                                                                                           
            );
            ?> 
          </div>
        </div>  
      </div>  
    <?php endif; ?>   
        </div> 
    