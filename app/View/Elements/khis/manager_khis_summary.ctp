<?php
$this->extend('/Reports/reports_manager_khis');
$this->assign('khis-summary', 'active');
$this->Html->css('summary', null, array('inline' => false));
?>

<?php $this->start('report'); ?>
<div class="row-fluid">

    <div class="span6">
        <h4>AEFIs Gender Distribution</h4>

        <?php $c = 0; ?>
        <table class="table table-condensed table-bordered" id="datatablesex">
            <thead>
                <tr>
                    <th>Sex</th>
                    <th>ADRs</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($sex as $key => $value) {
                    $c += $value[0]['cnt'];
                    echo "<tr>";
                    echo "<th>" . $value['Aefi']['gender'] . "</th>";
                    echo "<td>" . $value[0]['cnt'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th><?= $c; ?></th>
                </tr>
            </tfoot>
        </table>

    </div>
    <div class="span6">
        <!-- Age distribution -->
        <h4>AEFIs Age Distribution</h4>

        <?php $c = 0; ?>
        <table class="table table-condensed table-bordered" id="datatableage">
            <thead>
                <tr>
                    <th>Age group</th>
                    <th>AEFIs</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($age as $key => $value) {
                    $c += $value[0]['cnt'];
                    echo "<tr>";
                    echo "<th>" . $value[0]['ager'] . "</th>";
                    echo "<td>" . $value[0]['cnt'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th><?= $c; ?></th>
                </tr>
            </tfoot>
        </table>


    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span6">
        <h4>AEFIs per Vaccines</h4>

        <?php $c = 0; ?>
        <table class="table table-condensed table-bordered" id="datatablevaccine">
            <thead>
                <tr>
                    <th>Vaccine</th>
                    <th>AEFIs</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vaccine as $key => $value) {
                    $c += $value[0]['cnt'];
                    echo "<tr>";
                    echo "<th>" . $value['Vaccine']['vaccine_name'] . "</th>";
                    echo "<td>" . $value[0]['cnt'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th><?= $c; ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="span6">
        <h4>AEFIs per Month</h4>

        <?php $c = 0; ?>
        <table class="table table-condensed table-bordered" id="datatablemonth">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>AEFIs</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($months as $key => $value) {
                    $count = $value[0]['cnt'];
                    $c += $count;
                    echo "<tr>";
                    echo "<th>" . $value[0]['month'] . "</th>";
                    echo "<td>" . $value[0]['cnt'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th><?= $c; ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
  
<?php $this->end(); ?>