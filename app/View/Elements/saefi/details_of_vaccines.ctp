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
            <table id="relevant_patient_info"  class="table table-bordered table-condensed table-pvborder">
                <thead>
                  <tr>
                    <th style="width: 17%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                    <th style="width: 7%"> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                  <tr>
                  <td>
                        <p>Number immunized
                        for each antigen at
                        session site. Attach
                        record if available.</p>
                    </td>
                    <td>
                        <p>Vaccine name</p>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('vaccine_given', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                  </tr>
                  <tr>
                  <td>
                    </td>
                    <td>
                        <p>Number of doses</p>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                    <td>
                    <?php
                          echo $this->Form->input('', array(
                            'label' => false, 'between' => false,
                            'after' => false, 'class' => 'span11 autosave-ignore',));
                        ?>
                    </td>
                  </tr>
                  </tr>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
