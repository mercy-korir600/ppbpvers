<?php
    $this->assign('AEFI', 'active');
    $this->Html->script('khis', array('inline' => false));
?>


<?php 
  echo $this->element('aefi/aefi_dhis2'); 
?>