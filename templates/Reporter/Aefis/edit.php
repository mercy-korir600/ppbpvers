<!-- AEFI
    ================================================== -->
<section id="aefisadd">
    <div class="row-fluid">
        <div class="span12">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#" id="aefi_edit_tab1">
                        <?php
                        // debug($this->request->getData('report_type'));
                        ?>
                        <?php echo 'Initial Report ID: ' . $this->request->getData()['reference_no']; ?></a></li>
                <!-- <li id="aefi_edit_tab2">Follow up Reports()</li> -->

            </ul>

            <?php echo $this->element('aefi/aefi_edit'); ?>

        </div> <!-- /span -->
    </div> <!-- /row -->
</section> <!-- /row -->