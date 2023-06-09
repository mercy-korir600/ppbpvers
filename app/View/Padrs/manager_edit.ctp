<?php
    $this->assign('PADR', 'active');        
    echo $this->Session->flash();
?>

<div class="row-fluid">
	<div class="span12"> 
	</div>
</div>
<hr>
<?php 
  echo $this->element('padr/padr_edit'); 
?>
