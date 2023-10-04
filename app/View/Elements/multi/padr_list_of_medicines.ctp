<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medication $aefi
 */
  $this->Html->script('padr_list_of_medicines', array('inline' => false));
  $this->Html->css('padr', false, array('inline' => false));
?>

  <div style="background-color: #f5f5a4;"><h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE MEDICINE/VACCINE/DEVICE THAT CAUSED THE REACTION <br><em>(Include all medications)</em></h5></div>


    <div class="row-fluid srollable">
        <div class="span12">
            <table id="listOfPadrListOfMedicinesTable"  class="table table-bordered table-condensed table-pvborder">
                <tbody>
                  <?php
                    // $i = 0;
                    if (!empty($this->request->data['PadrListOfMedicine'])) {
                      $dr = count($this->request->data['PadrListOfMedicine'])-1;
                    } else {
                      $dr = 0;
                    }
                    for ($i = 0; $i <= $dr; $i++) {   
                  ?>
                  <tr>
                    <td rowspan="3" class="sailor"><?= $i+1; ?></td>
                    <td class = "padr_label"><?php
                          echo $this->Form->input('PadrListOfMedicine.'.$i.'.id', array('type' => 'hidden'));                          
                        ?>
                        Name of Medicine/Vaccine/Device 
                    </td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrListOfMedicine.'.$i.'.product_name', array(
                            'label' => false, 'between' => false, 'div' => false,
                            'after' => false, 'class' => 'padr_input-item',));
                        ?>
                    </td>
                    <td class = "padr_label">
                      Manufacturer
                    </td>                 
                    <td>
                        <?php
                        echo $this->Form->input('PadrListOfMedicine.'.$i.'.manufacturer', array(
                            'type' => 'text', 'label' => false, 'between' => false, 'div' => false,
                            'after' => false, 'class' => 'padr_input-item',));
                        ?>
                    </td> 
                    <td rowspan="3">
                        <button  type="button" class="btn btn-danger btn-small remove-padr-product"  value="<?php if (isset($medication['PadrListOfMedicine'][$i]['id'])) { echo $medication['PadrListOfMedicine'][$i]['id']; } ?>" >
                              <i class="icon-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td class = "padr_label">When did you start taking/using the medicine/vaccine/device? </td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrListOfMedicine.'.$i.'.start_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,  'div' => false,
                            'class' => 'date-pick-from padr_input-item',
                            'after' => false));
                        ?>
                    </td>
                    <td class = "padr_label">When did you stop taking/using the medicine/vaccine/device? <span class="help-block">(dd-mm-yyyy)</span> </td>
                    <td>
                        <?php
                        echo $this->Form->input('PadrListOfMedicine.'.$i.'.end_date', array(
                            'type' => 'text', 'label' => false, 'between' => false, 
                             'div' => false, 'class' => 'date-pick-to padr_input-item',
                            'after' => false));
                        ?>
                    </td> 
                  </tr>
                  <tr>
                    <td class = "padr_label">Expiry date of the medicine/vaccine/device</td>
                    <td>
                        <?php
                          echo $this->Form->input('PadrListOfMedicine.'.$i.'.expiry_date', array(
                            'type' => 'text', 'label' => false, 'between' => false,  'div' => false, 'class' => 'date-pick-field padr_input-item',
                            'after' => false));
                        ?>
                    </td>                    
                    <td class = "padr_label">Where did you buy the medicine/vaccine/device?  </td> 
                    <td> <?php
                        echo $this->Form->input('PadrListOfMedicine.'.$i.'.medicine_source', array(
                            'type' => 'text', 'label' => false, 'between' => false, 'div' => false,
                            'after' => false, 'class' => 'padr_input-item',));
                        ?>
                   </td> 
                  </tr>

                
                <?php } ?>
                <tr><td colspan="6"><label class="required"> For additional medicines/vaccines/devices, click <button  type="button" class="btn btn-success btn-mini" id="addPadrListOfMedicine"> Add <i class="fa fa-plus-square" aria-hidden="true"></i>  </button> </label>  </td></tr>
                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->

