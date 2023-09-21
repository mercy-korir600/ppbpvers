<?php
$this->assign('Home', 'active');
$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
$this->Html->script('home', array('inline' => false));
$this->Html->script('holder/holder', array('inline' => false));
$this->Html->css('landing', false, array('inline' => false));
$this->Html->css('upgrade', false, array('inline' => false));
?>

<style type="text/css">
    .provider {
        background-color: #F0F9F2;
        padding-top: 2%;
        text-align: left;
    }

    .row-fluid {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .span8 {
        padding-top: 2%;
    }

    .buttons {
        background-color: #B5CDB9;
        text-align: center;
    }

    .left {}
</style>

<div class="provider">
    <div class="row-fluid left">
        <div class="span8">
            <h2>Who can report?</h2><br>
            <p><b>Any healthcare provider and pharmaceuticals company can report on safety issues on medicines, products or vaccines. </b></p>
            </p><br><br>
        </div>

    </div>

    <div class="row-fluid left tools">
        <div class="span4"> 

            <p style="text-align: left;">1.   <?php echo $this->Html->link(
                  '<i class="fa fa-file-o" aria-hidden="true"></i> Adverse Events Following Immunization Reporting Form',
                  array('controller' => 'aefis', 'action' => 'guest_add'),
                  array('escape' => false, 'class' => 'btn btn-success')
                ); ?></p>
            <p style="text-align: left;">2.  <?php echo $this->Html->link(
                  '<i class="fa fa-file-o" aria-hidden="true"></i> Poor Quality Health Products and Technologies Reporting Form',
                  array('controller' => 'pqmps', 'action' => 'guest_add'),
                  array('escape' => false, 'class' => 'btn btn-success')
                ); ?></p>
            <p style="text-align: left;">3. <?php echo $this->Html->link(
                  '<i class="fa fa-file-o" aria-hidden="true"></i> Suspected Adverse Drug Reaction Reporting Form',
                  array('controller' => 'sadrs', 'action' => 'guest_add'),
                  array('escape' => false, 'class' => 'btn btn-success')
                ); ?></p>
            <p style="text-align: left;">4.   <?php echo $this->Html->link(
                  '<i class="fa fa-file-o" aria-hidden="true"></i> Medical Devices Reporting Form',
                  array('controller' => 'devices', 'action' => 'guest_add'),
                  array('escape' => false, 'class' => 'btn btn-success')
                ); ?></p>
            <p style="text-align: left;">5.  <?php echo $this->Html->link(
                  '<i class="fa fa-file-o" aria-hidden="true"></i> Medication Errors Reporting Form',
                  array('controller' => 'medications', 'action' => 'guest_add'),
                  array('escape' => false, 'class' => 'btn btn-success')
                ); ?></p>
            <p style="text-align: left;">6. <?php echo $this->Html->link(
                  '<i class="fa fa-file-o" aria-hidden="true"></i> Bloos Transfusion Reaction Reporting Form',
                  array('controller' => 'transfusions', 'action' => 'guest_add'),
                  array('escape' => false, 'class' => 'btn btn-success')
                ); ?></p>  

           
                
        </div>
         <div class="span4"></div>
    </div>
</div> 