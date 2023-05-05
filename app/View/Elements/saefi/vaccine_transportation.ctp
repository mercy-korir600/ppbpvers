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
            <table id="vaccine_transportation"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th style="width: 17%"><h5>Vaccine transportation:</h5></th>
                    <th style="width: 7%"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <p>• Type of vaccine carrier used</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('cold_transportation', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>''
                        ));
                            
                        ?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                        <p>• Was the vaccine carrier sent to the site on the same day as vaccination?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('vaccine_carrier', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No/Unknown'
                        ));
                            
                        ?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                        <p>• Was the vaccine carrier returned from the site on the same day as vaccination?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('transport_findings', array(
                            'label' => false, 'rows'=>1, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',
                            'placeholder'=>'Yes/No/Unknown'
                        ));
                            
                        ?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                        <p>• Was a conditioned ice-pack used?</p>
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('coolant_packs', array(
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
