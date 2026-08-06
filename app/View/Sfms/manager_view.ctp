 <?php                                                                                                                                                                    
    $this->assign('SFM', 'active');                                                                                                                                          
    ?>                                                                                                                                                                       
                                                                                                                                                                             
    <section id="sfmsview">                                                                                                                                             
      <ul class="nav nav-tabs">                                                                                                                                              
        <li class="active">                                                                                                                                                  
          <a href="#formview" data-toggle="tab">                                                                                                                             
            <i class="fa fa-file-text-o"></i> <?php echo (!empty($sfm['Sfm']['reference_no'])) ? h($sfm['Sfm']['reference_no']) : 'Report #' . h($sfm['Sfm']['id']); ?>      
          </a>                                                                                                                                                               
        </li>                                                                                                                                                                
        <li>                                                                                                                                                                 
          <a href="#external_report_comments" data-toggle="tab">                                                                                                             
            <i class="fa fa-comments-o"></i> Feedback (<?php echo isset($sfm['ExternalComment']) ? count($sfm['ExternalComment']) : 0; ?>)                                   
          </a>                                                                                                                                                               
        </li>                                                                                                                                                                
        <li>                                                                                                                                                                 
          <a href="#committee-review" data-toggle="tab">                                                                                                                     
            <i class="fa fa-users"></i> Committee Review (<?php echo isset($sfm['ReviewComment']) ? count($sfm['ReviewComment']) : 0; ?>)                                    
          </a>                                                                                                                                                               
        </li>                                                                                                                                                                
      </ul>                                                                                                                                                                  
                                                                                                                                                                             
      <div class="tab-content">                                                                                                                                              
                                                                                                                             
        <div class="tab-pane active" id="formview">                                                                                                                          
          <div class="row-fluid">                                                                                                                                            
            <div class="span10">                                                                                                                                             
              <?php echo $this->element('sfm/sfm_view'); ?>                                                                                                                  
            </div>                                                                                                                                                           
            <div class="span2">                                                                                                                                              
              <?php                                                                                                                                                          
              echo $this->Html->link(                                                                                                                                        
                '<i class="fa fa-file-pdf-o"></i> Download PDF',                                                                                                             
                array('controller' => 'sfms', 'action' => 'view', 'ext' => 'pdf', $sfm['Sfm']['id']),                                                                        
                array(                                                                                                                                                       
                  'class' => 'btn btn-primary btn-block mapop',                                                                                                              
                  'title' => 'Download PDF',                                                                                                                                 
                  'escape' => false,                                                                                                                                         
                  'data-content' => 'Download the PDF version of this SFM report',                                                                                           
                )                                                                                                                                                            
              );                                                                                                                                                             
              ?>                                                                                                                                                             
              <hr>                                                                                                                                                           
            </div>                                                                                                                                                           
          </div>                                                                                                                                                             
        </div>                                                                                                                                                               
                                                                                                                                          
        <div class="tab-pane" id="external_report_comments">                                                                                                                 
          <div class="amend-form">                                                                                                                                           
            <h5 class="text-info"><u>REPORTER FEEDBACK</u></h5>                                                                                                              
            <div class="row-fluid">                                                                                                                                          
              <div class="span8">                                                                                                                                            
                <?php                                                                                                                                                        
                echo $this->element('comments/list', [                                                                                                                       
                  'comments' => isset($sfm['ExternalComment']) ? $sfm['ExternalComment'] : array()                                                                           
                ]);                                                                                                                                                          
                ?>                                                                                                                                                           
              </div>                                                                                                                                                         
              <div class="span4 lefty">                                                                                                                                      
                <?php                                                                                                                                                        
                echo $this->element('comments/add', [                                                                                                                        
                  'model' => [                                                                                                                                               
                    'model_id' => $sfm['Sfm']['id'],                                                                                                                         
                    'foreign_key' => $sfm['Sfm']['id'],                                                                                                                      
                    'model' => 'Sfm',                                                                                                                                        
                    'category' => 'external',                                                                                                                                
                    'url' => 'report_feedback',                                                                                                                              
                    'review' => false                                                                                                                                        
                  ]                                                                                                                                                          
                ]);                                                                                                                                                          
                ?>                                                                                                                                                           
              </div>                                                                                                                                                         
            </div>                                                                                                                                                           
          </div>                                                                                                                                                             
        </div>                                                                                                                                                               
                                                                                                                                                  
        <div class="tab-pane" id="committee-review">                                                                                                                         
          <div class="amend-form">                                                                                                                                           
            <h5 class="text-info"><u>COMMITTEE REVIEW</u></h5>                                                                                                               
            <div class="row-fluid">                                                                                                                                          
              <div class="span8">                                                                                                                                            
                <?php                                                                                                                                                        
                echo $this->element('comments/index', [                                                                                                                      
                  'comments' => isset($sfm['ReviewComment']) ? $sfm['ReviewComment'] : array()                                                                               
                ]);                                                                                                                                                          
                ?>                                                                                                                                                           
              </div>                                                                                                                                                         
              <div class="span4 lefty">                                                                                                                                      
                <?php                                                                                                                                                        
                echo $this->element('comments/add', [                                                                                                                        
                  'model' => [                                                                                                                                               
                    'model_id' => $sfm['Sfm']['id'],                                                                                                                         
                    'foreign_key' => $sfm['Sfm']['id'],                                                                                                                      
                    'model' => 'Sfm',                                                                                                                                        
                    'category' => 'review',                                                                                                                                  
                    'url' => 'report_feedback',                                                                                                                              
                    'review' => true                                                                                                                                         
                  ]                                                                                                                                                          
                ]);                                                                                                                                                          
                ?>                                                                                                                                                           
              </div>                                                                                                                                                         
            </div>                                                                                                                                                           
          </div>                                                                                                                                                             
        </div>                                                                                                                                                               
                                                                                                                                                                             
      </div>                                                                                                                                                                 
    </section>                                               