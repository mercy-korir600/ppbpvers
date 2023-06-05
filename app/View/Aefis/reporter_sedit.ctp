
<?php
    $this->assign('Adverse Event Following Immunization', 'active');        
    echo $this->Session->flash();
?>
      <!-- AEFI
    ================================================== -->
    <section id="aefisadd">
    <div class="row-fluid">
        <div class="span12">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#" id="aefi_edit_tab1"><?php    echo 'Initial Report ID: '.$this->data['Saefi']['reference_no']; ?></a></li>
            <!-- <li id="aefi_edit_tab2">Follow up Reports()</li> -->
        </ul>

            <?php echo $this->element('saefi/saefi_edit');?>

        </div> <!-- /span -->
    </div> <!-- /row -->
</section> <!-- /row -->

