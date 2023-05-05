<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
    // $this->Html->script('multi/list_of_aefis', array('inline' => false));
  //$this->Html->script('list_of_vaccines_v2', array('inline' => false));
?>
    <div class="row-fluid">
        <div class="span12">
            <table id="injection_technique"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th style="width: 17%"></th>
                    <th style="width: 7%"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <p>• Correct dose and route?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('injection_dose_route', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No'
                        ));
                            
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <p>• Time of reconstitution mentioned on the vial? (in case of freeze dried vaccines) </p>
                    </td>
                    <td>
                        <?php                        
						 echo $this->Form->input('injection_time_mentioned', array(
						   'type' => 'text', 'label' => false, 'between' => false,
						   'after' => false, 'class' => 'span11 autosave-ignore date-pick-field',));
                            
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <p>• Non-touch technique followed? </p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('injection_no_touch', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No'
                        ));
                            
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <p>• Contraindications screened prior to vaccination? </p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('injection_contraindications', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No'
                        ));
                            
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <p>• How many AEFI were reported from the centre that distributed the vaccine in the last 30 days? </p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('injection_reported', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
							'placeholder'=>''
                        ));
                            
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <p>• Training received by the vaccinator? (If Yes, specify the date of last training) </p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('injection_reported', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
							'placeholder'=>'Yes/No'
                        ));
						echo '<small class="help-block">Date</small>';                         
						echo $this->Form->input('injection_reported_time', array(
						  'type' => 'text', 'label' => false, 'between' => false,
						  'after' => false, 'class' => 'span11 autosave-ignore date-pick-field',));
                            
                        ?>
                    </td>
                  </tr>
                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
