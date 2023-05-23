<?php
    $this->assign('MED', 'active');
    $this->Html->script('jquery/combobox', array('inline' => false));
    $this->Html->script('medication', array('inline' => false));
 ?>
 
<section id="medicationsadd">
    <div class="row-fluid">
        <div class="span12">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#" id="medication_edit_tab1"><?php    echo $this->data['Medication']['reference_no']; ?></a></li>
            
        </ul>

            <?php echo $this->element('medication/medication_edit');?>

        </div>  
    </div>  
</section>  