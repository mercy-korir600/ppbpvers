<?php
$this->extend('/Reports/upgrade/menu/d_aefi');
$this->assign('d-aefi-analysis', 'active');
$this->Html->css('summary', null, array('inline' => false));
?>

<?php $this->start('report'); ?>

<div class="row-fluid">
    <div class="span12">
        <table class="table table-condensed table-bordered">
            <thead>
                <tr>
                    <th>Vaccine Name</th>
                    <th>N-Total</th>
                    <th>A-Drug</th>
                    <th colspan="2">Disproportionality Analysis Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($inputData as $key => $value) {
                    echo "<tr>";
                    echo "<th>" . $value['current_drug_name'] . "</th>";
                    echo "<th>" . $value['N_total_reports'] . "</th>";
                    echo "<th>" . $value['A_reports_with_drug'] . "</th>";
                    echo "<td>"; ?>
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th>Drug Reaction</th>
                                <th>B-</th>
                                <th>AB</th>
                                <th>E_AB</th>
                                <th>IC</th>
                                <th>Log IC</th>
                                <th>Var(IC)</th>
                                <th>Standard Error (SE) of IC</th>
                                <th>95% Confidence Interval</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($value['reactionDetails'] as $key => $dt) { ?>
                                <?php
                                echo "<tr>"; 
                                echo "<td>" . $dt['reaction_at_hand'] . "</td>";
                                echo "<td>" . $dt['B_reports_with_reaction'] . "</td>";
                                echo "<td>" . $dt['AB_reports_with_drug_and_reaction'] . "</td>";
                                echo "<td>" . $dt['E_(AB)_expected_count'] . "</td>";
                                echo "<td>" . $dt['IC_raw_calculated_data'] . "</td>";
                                echo "<td>" . $dt['IC_raw_calculated_log_data'] . "</td>"; 
                                echo "<td>" . $dt['Var(IC)_Variance_of_IC'] . "</td>";
                                echo "<td>" . $dt['Standard_Error_(SE)_of_IC'] . "</td>";
                                echo "<td>" . $dt['95%_Confidence_Interval'] . "</td>";
                                echo "</tr>";  
                                ?>

                            <?php } ?>
                        </tbody>
                    </table><?php

                            echo "</td>";
                            echo "</tr>";
                        }
                            ?>

            </tbody>
        </table>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <h4>AEFIs per Vaccines</h4>
        <div class="tab">
            <button class="tablinks" onclick="vaccineTab(event, 'vaccineChart')" id="vaccineOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksvaccine" onclick="vaccineTab(event, 'vaccineTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="vaccineChart" class="tabcontentvaccine">
            <div id="sadrs-vaccine"></div>

        </div>

        <div id="vaccineTable" class="tabcontentvaccine">
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
            </table>
            <table class="table table-condensed table-bordered">

                <tbody>
                    <tr>
                        <th>Total</th>
                        <th><?= $c; ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>

<script type="text/javascript">
    function vaccineTab(evt, vaccinetabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentvaccine");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksvaccine");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(vaccinetabName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    // Get the element with id="defaultOpen" and click on it vaccine  reason serious outcome facility month
    document.getElementById("vaccineOpen").click();



    Highcharts.chart('sadrs-vaccine', {
        data: {
            table: 'datatablevaccine'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: '',

        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
</script>
<?php $this->end(); ?>