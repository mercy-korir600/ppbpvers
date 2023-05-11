<?php
$this->assign('Adverse Event Following Immunization', 'active');
$this->Html->script('comments/reviews', array('inline' => false));
?>

<div class="row-fluid">
    <div class="span12">
        <?php
        echo $this->element('saefi/saefi_view'); ?>
    </div>
</div>