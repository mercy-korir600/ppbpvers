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
            <table id="cold_chain_transport"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th style="width: 17%"><h5>Last vaccine storage point:</h5></th>
                    <th style="width: 7%"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <p>• Is the temperature of the vaccine storage refrigerator monitored?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('cold_temperature', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No'
                        ));
                            
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <p style="text-indent: 5em;">o If “yes”, was there any deviation outside of 2-8
° C after the vaccine was placed inside?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('cold_temperature_deviation', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No'
                        ));
                            
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <p style="text-indent: 5em;">o If “yes”, provide details of monitoring separately.</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('cold_temperature_specify', array(
                            'label' => false, 'rows'=>1, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore'
                        ));
                            
                        ?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                        <p>• Was the correct procedure for storing vaccines, diluents and syringes followed?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('procedure_followed', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No'
                        ));
                            
                        ?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                        <p>• Was any other item (other than EPI vaccines and diluents) in the refrigerator or freezer?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('other_items', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No/Unknown'
                        ));
                            
                        ?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                        <p>• Were any partially used reconstituted vaccines in the refrigerator?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('partial_vaccines', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No/Unknown'
                        ));
                            
                        ?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                        <p>• Were any unusable vaccines (expired, no label, VVM at stages 3 or 4, frozen) in the refrigerator?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('unusable_vaccines', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No/Unknown'
                        ));
                            
                        ?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                        <p>• Were any unusable diluents (expired, manufacturer not matched, cracked, dirty ampoule) in the 
store? </p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('unusable_diluents', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No/Unknown'
                        ));
                            
                        ?>
                    </td>
                  </tr>
                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
