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
            <table id="contact_info"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th style="width: 17%"> <label>Name and contact information of person completing 
these clinical details:</label></th>
                    <th style="width: 17%"> <label>Designation:</label></th>
                    <th style="width: 13%"> <label> Date/time</label></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                    <?php
                          echo '<small class="help-block">Name</small>';    
                          echo $this->Form->input('person_details', array(
                            'label' => false, 'between' => false, 'placeholder' => 'full name',
                            'after' => false, 'class' => 'span11 autosave-ignore vaxname',));
                          echo '<small class="help-block">Contact</small>';    
                          echo $this->Form->input('person_contact', array(
                            'label' => false, 'between' => false, 'placeholder' => 'contact',
                            'after' => false, 'class' => 'span11 autosave-ignore vaxname',));
                        ?>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('person_designation', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'designation'
                        ));
                            
                        ?>
                    </td>
                    <td>
                    <?php 
                          echo '<small class="help-block">Date</small>';                         
                          echo $this->Form->input('person_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore date-pick-field',));
                          echo '<small class="help-block">Time</small>'; 
                          echo $this->Form->input('person_time', array('type' => 'time', 'timeFormat' => 24, 'interval' => 5, 'class' => 'span5', 'style' => 'display: inline;', 
                            'label' => false, 'between' => false, 'after' => false,));
                        ?>
                    </td>
                  </tr>
                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
