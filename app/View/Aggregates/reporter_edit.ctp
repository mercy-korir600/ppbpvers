<?php
$this->assign('AGGREGATE', 'active');
echo $this->Session->flash();

echo $this->element('aggregates/aggregates_edit');
