<?php
    $this->assign('Dashboard', 'active');
  echo  $this->Html->script('dashboard', array('inline' => false));
?>

<section>
    <div class="row-fluid">
        <div class="span8">
            <h4 class="text-success">Reports</h4>
            <div class="row-fluid">
                <div class="span4 formback" style="padding: 4px;">
                  <h5>Suspected Adverse Drug Reaction</h5>
                  <?php
                    echo '<ol>';
                    foreach ($sadrs as $sadr) {
                      if($sadr['submitted'] > 1) {
                        echo "<li>";
                          echo $this->Html->link($sadr['report_title'].' <small class="muted">('.$sadr['reference_no'].')</small>', array('controller' => 'sadrs', 'action' => 'view', $sadr['id']),
                            array('escape' => false, 'class' => 'text-'.((isset($sadr['serious']) && $sadr['serious'] == 'Yes') ? 'error' : 'success')));
                        echo "</li>";
                      } 
                    }
                    echo '</ol>';
                    echo '<p>'.$this->Html->link('All SADRs >>', array('controller' => 'sadrs', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-link')).'</p>';
                    echo $this->Html->link('<p> >> All </p>', array('controller' => 'sadrs', 'action' => 'index'), array('escape' => false));                     
                  ?>
                </div>
                <div class="span4 formbacka" style="padding: 4px;">   
                  <h5>AEFI</h5>                 
                    <?php
                      echo '<ol>';
                      foreach ($aefis as $aefi) {
                        if($aefi['submitted'] > 1) {
                            echo "<li>";
                            $vaccine_name = (!empty($aefi['AefiListOfVaccine'][0]['vaccine_name'])) ? $aefi['AefiListOfVaccine'][0]['vaccine_name'] : $aefi['reference_no'];
                            $vaccine_name = (!empty($aefi['AefiListOfVaccine'][0]['Vaccine']['vaccine_name'])) ? $aefi['AefiListOfVaccine'][0]['Vaccine']['vaccine_name'] : $aefi['reference_no'];
                              echo $this->Html->link($vaccine_name.' <small class="muted">('.$aefi['reference_no'].')</small>', array('controller' => 'aefis', 'action' => 'view', $aefi['id']),
                                array('escape' => false, 'class' => 'text-'.((isset($aefi['serious']) && $aefi['serious'] == 'Yes') ? 'error' : 'success')));
                              echo "&nbsp;";
                              echo $this->Form->postLink('<span class="label label-inverse tooltipper" data-toggle="tooltip" title="Add follow up report"> <i class="fa fa-facebook" aria-hidden="true"></i> </span>', array('controller' => 'aefis' , 'action' => 'followup', $aefi['id']), array('escape' => false), __('Add a followup report?'));
                            echo "</li>";
                        }
                      }
                      echo '</ol>';
                    ?>
                </div>
                <div class="span4 formbackp" style="padding: 4px;">
                  <h5>Poor-Quality Health Products and Technologies</h5>
                    <?php
                      echo '<ol>';
                      foreach ($pqmps as $pqmp) {
                        if($pqmp['submitted'] > 1) {
                          echo "<li>";
                            echo $this->Html->link($pqmp['brand_name'].' <small class="muted">('.$pqmp['reference_no'].')</small>', array('controller' => 'pqmps', 'action' => 'view', $pqmp['id']),
                              array('escape' => false, 'class' => 'text-'.((in_array($pqmp['product_formulation'], ['Injection', 'Powder for Reconstitution of Injection', 'Eye drops', 'Nebuliser solution']) 
                                || $pqmp['therapeutic_ineffectiveness'] || $pqmp['particulate_matter']) ? 'error' : 'success'))); 
                          echo "</li>"; 
                        } 
                      }
                      echo '</ol>';
                    ?>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span4 formbackd" style="padding: 4px;">
                  <h5>Medical Devices</h5>
                  <?php
                    echo '<ol>';
                    foreach ($devices as $device) {
                      if($device['submitted'] > 1) {
                          echo "<li>";
                            echo $this->Html->link($device['report_title'].' <small class="muted">('.$device['reference_no'].')</small>', array('controller' => 'devices', 'action' => 'view', $device['id']),
                              array('escape' => false, 'class' => 'text-'.((isset($device['serious']) && in_array($device['serious'], ['Fatal', 'Serious'])) ? 'error' : 'success')));
                          echo "</li>";
                      } 
                    }
                    echo '</ol>'; 
                  ?>
                </div>
                <div class="span4 formbackm" style="padding: 4px;">  
                  <h5>Medication Errors</h5>                  
                    <?php
                      echo '<ol>';
                      foreach ($medications as $medication) {
                        if($medication['submitted'] > 1) {
                          $generic_name_i = (!empty($medication['MedicationProduct'][0]['generic_name_i'])) ? $medication['MedicationProduct'][0]['generic_name_i'] : $medication['reference_no'];
                          echo "<li>";
                            echo $this->Html->link($generic_name_i.' <small class="muted">('.$medication['reference_no'].')</small>', array('controller' => 'medications', 'action' => 'view', $medication['id']),
                              array('escape' => false, 'class' => 'text-success')); 
                          echo "</li>";
                        } 
                      }
                      echo '</ol>';
                    ?>
                </div>
                <div class="span4 formbackt" style="padding: 4px;">
                  <h5>Transfusions Reactions</h5>
                    <?php
                      echo '<ol>';
                      foreach ($transfusions as $transfusion) {
                        if($transfusion['submitted'] > 1) {
                          echo "<li>";
                            echo $this->Html->link($transfusion['diagnosis'].' <small class="muted">('.$transfusion['reference_no'].')</small>', array('controller' => 'transfusions', 'action' => 'view', $transfusion['id']),
                              array('escape' => false, 'class' => 'text-success')); 
                          echo "</li>";
                        } 
                      }
                      echo '</ol>';
                    ?>
                </div>
            </div>
            <hr>
            <div class="row-fluid">
                <div class="span4 pformback" style="padding: 4px;">
                  <h5>Public Reports</h5>
                  <?php
                    echo '<ol>';
                    foreach ($padrs as $padr) {
                        echo "<li>";
                          echo $this->Html->link($padr['reporter_name'].' <small class="muted">('.$padr['reference_no'].')</small>', array('controller' => 'padrs', 'action' => 'view', $padr['id']),
                            array('escape' => false));
                        echo "</li>";
                    }
                    echo '</ol>'; 
                  ?>
                </div>
                <div class="span4 formbacksa">                  
                  <?php
                    echo $this->Html->link('<h5> SAE </h5>' ,
                      array('controller' => 'saes', 'action' => 'index'),
                      array('escape' => false));
                    ?>
                  <?php
                    echo '<ol>';
                    foreach ($saes as $sae) {
                        echo "<li>";
                          echo $this->Html->link($sae['reference_no'].' <small class="muted">('.$sae['form_type'].')</small>', array('controller' => 'saes', 'action' => 'view', $sae['id']),
                            array('escape' => false));
                        echo "</li>";
                    }
                    echo '</ol>'; 
                  ?>
                </div>
                <div class="span4"></div>
              </div>
        </div>

        <div class="span4"><!-- Notifications -->          
          <h4 class="text-warning">Notifications!</h4>
          <div class="thumbnail">
            <img alt="" src="/img/preferences_desktop_notification.png">
            <div class="caption">
              <h4><?php echo $this->Html->link('Notifications', array('controller' => 'notifications', 'action' => 'index'),
            array('escape' => false, 'class' => 'text-success'));?> <small>Actions that require your attention.</small></h4>
              <?php
                echo $this->element('flash/notifications', ['notifications' => $notifications]);
              ?>
            </div>
          </div>
        </div>
    </div>
</section>
