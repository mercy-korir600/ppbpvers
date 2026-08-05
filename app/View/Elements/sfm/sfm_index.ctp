<?php                                                                                                                                                                    
    $this->assign('SFM', 'active');                                                                                                                                          
    echo $this->Session->flash();                                                                                                                                            
    ?>
<style>
  .table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 15px;
  }
  @media (max-width: 767px) {
    .row-fluid [class*="span"] {
      width: 100% !important;
      margin-left: 0 !important;
      float: none !important;
      box-sizing: border-box !important;
      margin-bottom: 12px;
    }
    .ctr-groups table, 
    .ctr-groups tbody, 
    .ctr-groups tr, 
    .ctr-groups td {
      display: block !important;
      width: 100% !important;
      box-sizing: border-box !important;
    }
    .ctr-groups td {
      padding: 4px 0 !important;
      border: none !important;
    }
    .btn-responsive {
      width: 100% !important;
      margin-bottom: 8px !important;
      box-sizing: border-box !important;
    }
  }
</style>

<div class="row-fluid">
  <div class="span12">
    <?php
    if (isset($redir) && $redir == 'reporter') {
      echo '<div style="margin-bottom: 10px;">';
      echo $this->Html->link(
        '<i class="fa fa-plus-circle" aria-hidden="true"></i> New SFM',
        array('controller' => 'sfms', 'action' => 'add'),
        array('escape' => false, 'class' => 'btn btn-success btn-responsive')
      );
      echo '</div>';
    }
    ?>
    <h3>Suspected Falsified Medicines 
      <small><i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, & <i class="icon-eye-open"></i> View Reports</small>
    </h3>
    <hr class="soften" style="margin: 7px 0px;">
  </div>
</div>                                                                                                                                                                                                                                    
    <div class="row-fluid">                                                                                                                                                                                                                                       
      <div class="span12">                                                                                                                                                                                                                                        
        <?php                                                                                                                                                                                                                                                     
        echo $this->Form->create('Sfm', array(                                                                                                                                                                                                                    
          'url' => array_merge(array('action' => 'index'), $this->params['pass']),                                                                                                                                                                                
          'class' => 'ctr-groups',                                                                                                                                                                                                                                
          'style' => 'padding: 9px; background-color: #F5F5F5; border: 1px solid #e3e3e3; border-radius: 4px; margin-bottom: 15px;',                                                                                                                              
        ));                                                                                                                                                                                                                                                       
        ?>                                                                                                                                                                                                                                                        
        <table class="table table-condensed" style="margin-bottom: 2px;">                                                                                                                                                                                         
          <tbody>                                                                                                                                                                                                                                                 
            <tr>                                                                                                                                                                                                                                                  
              <td>                                                                                                                                                                                                                                                
                <?php                                                                                                                                                                                                                                             
                echo $this->Form->input('reference_no', array(                                                                                                                                                                                                    
                  'div' => false,                                                                                                                                                                                                                                 
                  'placeholder' => 'SFM/2026/001',                                                                                                                                                                                                                
                  'class' => 'span12',                                                                                                                                                                                                                            
                  'label' => array('class' => 'required', 'text' => 'Reference No.')                                                                                                                                                                              
                ));                                                                                                                                                                                                                                               
                ?>                                                                                                                                                                                                                                                
              </td>                                                                                                                                                                                                                                               
              <td>                                                                                                                                                                                                                                                
                <?php                                                                                                                                                                                                                                             
                echo $this->Form->input('brand_name', array(                                                                                                                                                                                                      
                  'div' => false,                                                                                                                                                                                                                                 
                  'placeholder' => 'Brand / Product Name',                                                                                                                                                                                                        
                  'class' => 'span12',                                                                                                                                                                                                                            
                  'label' => array('class' => 'required', 'text' => 'Brand Name')                                                                                                                                                                                 
                ));                                                                                                                                                                                                                                               
                ?>                                                                                                                                                                                                                                                
              </td>                                                                                                                                                                                                                                               
              <td>                                                                                                                                                                                                                                                
                <?php                                                                                                                                                                                                                                             
                echo $this->Form->input('batch_number', array(                                                                                                                                                                                                    
                  'div' => false,                                                                                                                                                                                                                                 
                  'placeholder' => 'Batch / Lot #',                                                                                                                                                                                                               
                  'class' => 'span12',                                                                                                                                                                                                                            
                  'label' => array('class' => 'required', 'text' => 'Batch No.')                                                                                                                                                                                  
                ));                                                                                                                                                                                                                                               
                ?>                                                                                                                                                                                                                                                
              </td>                                                                                                                                                                                                                                               
              <td>                                                                                                                                                                                                                                                
                <?php                                                                                                                                                                                                                                             
                echo $this->Form->input('start_date', array(                                                                                                                                                                                                      
                  'div' => false,                                                                                                                                                                                                                                 
                  'type' => 'text',                                                                                                                                                                                                                               
                  'class' => 'input-small datepicker',                                                                                                                                                                                                            
                  'placeholder' => 'Start Date',                                                                                                                                                                                                                  
                  'label' => array('class' => 'required', 'text' => 'Start Date')                                                                                                                                                                                 
                ));                                                                                                                                                                                                                                               
                ?>                                                                                                                                                                                                                                                
              </td>                                                                                                                                                                                                                                               
              <td>                                                                                                                                                                                                                                                
                <?php                                                                                                                                                                                                                                             
                echo $this->Form->input('end_date', array(                                                                                                                                                                                                        
                  'div' => false,                                                                                                                                                                                                                                 
                  'type' => 'text',                                                                                                                                                                                                                               
                  'class' => 'input-small datepicker',                                                                                                                                                                                                            
                  'placeholder' => 'End Date',                                                                                                                                                                                                                    
                  'label' => array('class' => 'required', 'text' => 'End Date')                                                                                                                                                                                   
                ));                                                                                                                                                                                                                                               
                ?>                                                                                                                                                                                                                                                
              </td>                                                                                                                                                                                                                                               
                   <td>
            <?php
            echo $this->Form->input(
              'county_id',
              array(
                'div' => false,
                'empty' => true,
                'class' => 'input-small',
                'label' => array('class' => 'required', 'text' => 'County')
              )
            );
            ?>
          </td>  
           <td>
            <?php
            echo $this->Form->input(
              'designation_id',
              array(
                'div' => false,
                'empty' => true,
                'class' => 'input-small',
                'label' => array('class' => 'required', 'text' => 'Designation')
              )
            );
            ?>

          </td>                                                                                                                                                                                                                                      
            </tr>   
             <tr>
          <td><label for="SadrPages" class="required">Pages</label>

            <?php
            echo $this->Form->input('pages', array(
              'type' => 'select',
              'div' => false,
              'class' => 'input-small',
              'selected' => isset($this->request->params['paging']['Sfm']['limit']) ? $this->request->params['paging']['Sfm']['limit'] : 25,
              'empty' => true,
              'options' => $page_options,
              'label' => false,
            ));
            ?>
          </td>
          <td>
            <?php
            ?>
          </td>
          <td>
            <?php
            echo $this->Form->input('bulk_action', [
              'type' => 'select',
              'options' => [
                'archive' => 'Archive Selected',
                'delete' => 'Delete Selected'
              ],
              'label' => false,
              'empty' => 'Choose bulk action',
              'class' => 'form-control'
            ]);
            ?>
          </td>

          <td>
            <?php
            echo $this->Form->button('<i class="icon-refresh icon-white"></i> Bulk Action', array(
              'class' => 'btn btn-warning',
              'div' => 'control-group',
              'div' => false,
              'formnovalidate' => 'formnovalidate',
              'style' => array('margin-bottom: 5px')
            ));
            ?>
          </td>
          <td>
            <?php

            echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
              'class' => 'btn btn-primary',
              'div' => 'control-group',
              'div' => false,
              'formnovalidate' => 'formnovalidate',
              'style' => array('margin-bottom: 5px')
            ));
            ?>
          </td>
          <td>
            <?php
            echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => 'index'), array('class' => 'btn', 'escape' => false, 'style' => array('margin-bottom: 5px')));
            ?>
          </td>
          <td>
            <?php
            echo $this->Html->link('<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel', array('action' => 'index', 'ext' => 'csv', '?' => $this->request->query), array('class' => 'btn btn-success', 'escape' => false));
            ?>
          </td>                                                                                                                                                                                                                                              
          </tbody>                                                                                                                                                                                                                                                
        </table>   
         <p>
      <?php
      echo $this->Paginator->counter(array(
        'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
                showing <span class="badge">{:current}</span> SFMs out of
                <span class="badge badge-inverse">{:count}</span> total, starting on record <span class="badge">{:start}</span>,
                ending on <span class="badge">{:end}</span>')
      ));
      ?>
    </p>                                                                                                                                                                                                                                               
        <?php echo $this->Form->end(); ?>  
        <div class="pagination">
      <ul>
        <?php
        echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'disabledTag' => 'a', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'currentTag' => 'a', 'escape' => false));
        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
        echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'disabledTag' => 'a', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
        ?>
      </ul>
    </div>                                                                                                                                                                                                                       
      </div>                                                                                                                                                                                                                                                      
    </div>                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                    
    <div class="row-fluid">                                                                                                                                                                                                                                       
      <div class="span12 table-responsive" style="overflow-x: auto;">                                                                                                                                                                                                                                        
        <table class="table table-striped table-bordered table-hover">                                                                                                                                                                                            
            <thead>                                                                                                                                                                  
      <tr>                                                                                                                                                                   
        <th>#</th>                                                                                                                                                           
        <th><?php echo $this->Paginator->sort('reference_no', 'Reference No.'); ?></th>                                                                                      
        <th><?php echo $this->Paginator->sort('report_type', 'Report Type'); ?></th>                                                                                         
        <th><?php echo $this->Paginator->sort('brand_name', 'Brand Name'); ?></th>                                                                                           
        <th><?php echo $this->Paginator->sort('created', 'Date Created'); ?></th>                                                                                            
        <th><?php echo $this->Paginator->sort('submitted_date', 'Date Submitted'); ?></th>                                                                                   
        <th class="actions">Actions</th>                                                                                                                                     
      </tr>                                                                                                                                                                  
    </thead>                                                                                                                                                                                                                                                 
          <tbody>                                                                                                                                                                                                                                                 
            <?php                                                                                                                                                                                                                                                 
            $i = 0;                                                                                                                                                                                                                                               
            foreach ($sfms as $sfm):                                                                                                                                                                                                                              
              $i++;                                                                                                                                                                                                                                               
            ?>                                                                                                                                                                                                                                                    
                                                                                                                                                                                       
    <tr>                                                                                                                                                                     
      <!-- 1. ID / Index -->                                                                                                                                                 
      <td><?php echo $i; ?></td>                                                                                                                                             
                                                                                                                                                                         
    <td>                                                                                                                                                                     
      <strong>                                                                                                                                                               
        <?php                                                                                                                                                                
        $refNo = (!empty($sfm['Sfm']['reference_no']) && $sfm['Sfm']['reference_no'] !== 'new')                                                                              
                 ? $sfm['Sfm']['reference_no']                                                                                                                               
                 : 'new';                                                                                                                                                    
                                                                                                                                                                             
        $submitted = isset($sfm['Sfm']['submitted']) ? $sfm['Sfm']['submitted'] : 0;                                                                                                                                                                                                                                                                    
        if ($submitted >= 1) {                                                                                                                           
            echo $this->Html->link(                                                                                                                                          
                h($refNo),                                                                                                                                                   
                array('controller' => 'sfms', 'action' => 'view', $sfm['Sfm']['id'])                                                                                         
            );                                                                                                                                                               
        } else {                                                                                                                          
            echo $this->Html->link(                                                                                                                                          
                '<span>' . h($refNo) . '</span>',                                                                                                                            
                array('controller' => 'sfms', 'action' => 'edit', $sfm['Sfm']['id']),                                                                                        
                array('escape' => false, 'title' => 'Click to Edit Draft Report')                                                                                            
            );                                                                                                                                                               
        }                                                                                                                                                                    
        ?>                                                                                                                                                                   
      </strong>                                                                                                                                                              
    </td>                                                                                                                                                 
      <td>                                                                                                                                                                   
        <span class="label label-info">                                                                                                                                      
          <?php echo h(!empty($sfm['Sfm']['report_type']) ? $sfm['Sfm']['report_type'] : 'Initial'); ?>                                                                      
        </span>                                                                                                                                                              
      </td>                                                                                                                                                  
      <td>                                                                                                                                                                   
        <?php echo h(isset($sfm['Sfm']['brand_name']) ? $sfm['Sfm']['brand_name'] : ''); ?>                                                                                  
        <?php if (!empty($sfm['Sfm']['generic_name'])): ?>                                                                                                                   
          <br><small class="muted">(<?php echo h($sfm['Sfm']['generic_name']); ?>)</small>                                                                                   
        <?php endif; ?>                                                                                                                                                      
      </td>                                                                                                                                                   
      <td>                                                                                                                                                                   
        <?php echo !empty($sfm['Sfm']['created']) ? date('d-M-Y', strtotime($sfm['Sfm']['created'])) : '-'; ?>                                                               
      </td>                                                                                                                                             
      <td>                                                                                                                                                                   
        <?php                                                                                                                                                                
        if (!empty($sfm['Sfm']['submitted_date']) && $sfm['Sfm']['submitted_date'] != '0000-00-00 00:00:00') {                                                               
          echo date('d-M-Y H:i', strtotime($sfm['Sfm']['submitted_date']));
        } else {
          echo '<span class="muted">Unsubmitted</span>';
        }
        ?>
      </td>
      <td class="actions">                                                                                                                                                     
      <?php                                                                                                                                                                  
      $submitted = isset($sfm['Sfm']['submitted']) ? $sfm['Sfm']['submitted'] : 0;                                                                                           
      if ($submitted < 1):                                                                                                                                                  
      ?>                                                                                                                                       
        <?php                                                                                                                                                                
        echo $this->Html->link(                                                                                                                                              
          '<i class="icon-pencil"></i> Edit',                                                                                                                                
          array('controller' => 'sfms', 'action' => 'edit', $sfm['Sfm']['id']),                                                                                              
          array('escape' => false, 'class' => 'btn btn-mini btn-warning', 'title' => 'Edit Report')                                                                          
        );                                                                                                                                                                   
        echo '&nbsp;';                                                                                                                                                       
        ?>                                                                                                                                                                   
                                                                                                                                        
        <?php                                                                                                                                                                
        echo $this->Html->link(                                                                                                                                              
          '<i class="icon-download-alt"></i> PDF',                                                                                                                           
          array('controller' => 'sfms', 'action' => 'export_pdf', $sfm['Sfm']['id']),                                                                                        
          array('escape' => false, 'class' => 'btn btn-mini btn-info', 'title' => 'Export PDF')                                                                              
        );                                                                                                                                                                   
        echo '&nbsp;';                                                                                                                                                       
        ?>                                                                                                                                                                   
                                                                                                                               
        <?php                                                                                                                                                                
        echo $this->Form->postLink(                                                                                                                                          
          '<i class="icon-trash"></i> Delete',                                                                                                                               
          array('controller' => 'sfms', 'action' => 'delete', $sfm['Sfm']['id']),                                                                                            
          array('escape' => false, 'class' => 'btn btn-mini btn-danger', 'title' => 'Delete Report'),                                                                        
          __('Are you sure you want to delete report %s?', $sfm['Sfm']['reference_no'])                                                                                      
        );                                                                                                                                                                   
        ?>                                                                                                                                                                   
                                                                                                                                                                             
      <?php else: ?>                                                                                                                                                         
                                                                                                                                                        
        <?php                                                                                                                                                                
        echo $this->Html->link(                                                                                                                                              
          '<i class="icon-eye-open"></i> View',                                                                                                                              
          array('controller' => 'sfms', 'action' => 'view', $sfm['Sfm']['id']),                                                                                              
          array('escape' => false, 'class' => 'btn btn-mini btn-info', 'title' => 'View Report')                                                                             
        );                                                                                                                                                                   
        echo '&nbsp;';                                                                                                                                                       
        ?>                                                                                                                                                                   
                                                                                                                                      
        <?php                                                                                                                                                                
        echo $this->Html->link(                                                                                                                                              
          '<i class="icon-plus"></i> Follow Up',                                                                                                                             
          array('controller' => 'sfms', 'action' => 'followup', $sfm['Sfm']['id']),                                                                                          
          array('escape' => false, 'class' => 'btn btn-mini btn-success', 'title' => 'Add Follow Up Report')                                                                 
        );                                                                                                                                                                   
        echo '&nbsp;';                                                                                                                                                       
        ?>                                                                                                                                                                   
                                                                                                                                              
        <?php
        echo $this->Html->link(
          '<i class="icon-download-alt"></i> PDF',
          array('controller' => 'sfms', 'action' => 'export_pdf', $sfm['Sfm']['id']),
          array('escape' => false, 'class' => 'btn btn-mini', 'title' => 'Export PDF')
        );
        ?>
  
      <?php endif; ?>
    </td>                                                                                                                                                                                                                                     
              </tr>                                                                                                                                                                                                                                               
            <?php endforeach; ?>                                                                                                                                                                                                                                  
                                                                                                                                                                                                                                                                  
            <?php if (empty($sfms)): ?>                                                                                                                                                                                                                           
              <tr>                                                                                                                                                                                                                                                
                <td colspan="9" class="text-center text-error">                                                                                                                                                                                                   
                  <em>No Suspected Falsified Medicine reports found matching your criteria.</em>                                                                                                                                                                  
                </td>                                                                                                                                                                                                                                             
              </tr>                                                                                                                                                                                                                                               
            <?php endif; ?>                                                                                                                                                                                                                                       
          </tbody>                                                                                                                                                                                                                                                
        </table> 
      </div>
    </div>