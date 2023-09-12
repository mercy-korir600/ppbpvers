<?php
$this->extend('/Reports/reports_manager');
$this->assign('sadr-summary', 'active');
$this->Html->css('summary', null, array('inline' => false));
?>

<?php $this->start('report'); ?>
<div class="row-fluid">
    <div class="span6">
        <h4>Geographical Distribution</h4>
        <div class="tab">
            <button class="tablinks" onclick="geoTab(event, 'geoChart')" id="geoOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksgeo" onclick="geoTab(event, 'geoTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="geoChart" class="tabcontentgeo">
            <div id="sadrs-geo"></div>

        </div>

        <div id="geoTable" class="tabcontentgeo">
            <table class="table table-condensed table-bordered" id="datatablegeo">
                <?php $c = 0; ?>
                <thead>
                    <tr>
                        <th>County</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($geo as $key => $value) {
                        $count = $value[0]['cnt'];
                        $c += $count;
                        echo "<tr>";
                        echo "<th>" . $value['County']['county_name'] . "</th>";
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
    <div class="span6">
        <h4>Gender Distribution</h4>
        <div class="tab">
            <button class="tablinks" onclick="sexTab(event, 'sexChart')" id="sexOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinks" onclick="sexTab(event, 'sexTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="sexChart" class="tabcontentsex">
            <div id="sadrs-sex"></div>

        </div>

        <div id="sexTable" class="tabcontentsex">
            <table class="table table-condensed table-bordered" id="datatablesex">
                <?php $c = 0; ?>
                <thead>
                    <tr>
                        <th>Sex</th>
                        <th>ADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($sex as $key => $value) {
                        $count = $value[0]['cnt'];
                        $c += $count;
                        echo "<tr>";
                        echo "<th>" . $value['Sadr']['gender'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Total</th>
                        <th><?= $c; ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span6">
        <h4>Age Distribution</h4>

        <div class="tab">
            <button class="tablinks" onclick="ageTab(event, 'ageChart')" id="ageOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksage" onclick="ageTab(event, 'ageTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="ageChart" class="tabcontentage">
            <div id="sadrs-age"></div>

        </div>

        <div id="ageTable" class="tabcontentage">
            <table class="table table-condensed table-bordered" id="datatableage">
                <thead>
                    <tr>
                        <th>Age group</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($age as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value[0]['ager'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Total</th>
                        <th><?= $c; ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="span6">
        <h4>SADRs Per Year</h4>
        <div class="tab">
            <button class="tablinks" onclick="yearTab(event, 'yearChart')" id="yearOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksyear" onclick="yearTab(event, 'yearTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="yearChart" class="tabcontentyear">
            <div id="sadrs-year"></div>

        </div>

        <div id="yearTable" class="tabcontentyear">
            <table class="table table-condensed table-bordered" id="datatableyear">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($year as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value[0]['year'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Total</th>
                        <th><?= $c; ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span12">
        <h4>SADRs per Month</h4>
        <div class="tab">
            <button class="tablinks" onclick="monthTab(event, 'monthChart')" id="monthOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksmonth" onclick="monthTab(event, 'monthTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="monthChart" class="tabcontentmonth">
            <div id="sadrs-month"></div>

        </div>

        <div id="monthTable" class="tabcontentmonth">

            <table class="table table-condensed table-bordered" id="datatablemonth">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($monthly as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value[0]['month'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Total</th>
                        <th><?= $c; ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span12">
        <h4>SADRs per Suspected Drug</h4>
        <div class="tab">
            <button class="tablinks" onclick="suspectedTab(event, 'suspectedChart')" id="suspectedOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkssuspected" onclick="suspectedTab(event, 'suspectedTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="suspectedChart" class="tabcontentsuspected">
            <div id="sadrs-suspected"></div>

        </div>

        <div id="suspectedTable" class="tabcontentsuspected">
            <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablesuspected">
                <thead>
                    <tr>
                        <th>Drug</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($suspected as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['SadrListOfDrug']['drug_name'] . "</th>";
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
<div class="row-fluid">
    <div class="span12">
        <h4>SADRs per Reaction</h4>

        <div class="tab">
            <button class="tablinks" onclick="reactionTab(event, 'reactionChart')" id="reactionOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksreaction" onclick="reactionTab(event, 'reactionTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="reactionChart" class="tabcontentreaction">
            <div id="sadrs-reaction"></div>

        </div>

        <div id="reactionTable" class="tabcontentreaction">
            <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablereaction">
                <thead>
                    <tr>
                        <th>Reaction</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($reaction as $key => $value) {
                        $c += $value[0]['rea'];
                        echo "<tr>";
                        echo "<th>" . $value['Sadr']['reaction'] . "</th>";
                        echo "<td>" . $value[0]['rea'] . "</td>";
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

<div class="row-fluid">
    <div class="span12">
        <h4>SADRs per Facility</h4>

        <div class="tab">
            <button class="tablinks" onclick="facilityTab(event, 'facilityChart')" id="facilityOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksfacility" onclick="facilityTab(event, 'facilityTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="facilityChart" class="tabcontentfacility">
            <div id="sadrs-facility"></div>

        </div>

        <div id="facilityTable" class="tabcontentfacility">
            <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablefacility">
                <thead>
                    <tr>
                        <th>Facility</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($facility_data as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Sadr']['name_of_institution'] . "</th>";
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


<!-- End of County Pharmacist -->
<script type="text/javascript">
    // Facility
    function facilityTab(evt, facilitytabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentfacility");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksfacility");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(facilitytabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Suspected
    function suspectedTab(evt, suspectedtabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentsuspected");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkssuspected");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(suspectedtabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Reaction

    function reactionTab(evt, reactiontabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentreaction");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksreaction");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(reactiontabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function geoTab(evt, geotabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentgeo");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksgeo");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(geotabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function sexTab(evt, sextabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentsex");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkssex");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(sextabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function ageTab(evt, agetabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentage");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksage");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(agetabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function monthTab(evt, monthtabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentmonth");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksmonth");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(monthtabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function yearTab(evt, yeartabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentyear");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksyear");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(yeartabName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    // Get the element with id="defaultOpen" and click on it
    document.getElementById("geoOpen").click();
    document.getElementById("sexOpen").click();
    document.getElementById("ageOpen").click();
    document.getElementById("monthOpen").click();
    document.getElementById("yearOpen").click();
    document.getElementById("reactionOpen").click();
    document.getElementById("facilityOpen").click();
    document.getElementById("suspectedOpen").click();

    Highcharts.chart('sadrs-facility', {
        data: {
            table: 'datatablefacility'
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

    Highcharts.chart('sadrs-reaction', {
        data: {
            table: 'datatablereaction'
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
    Highcharts.chart('sadrs-suspected', {
        data: {
            table: 'datatablesuspected'
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
    Highcharts.chart('sadrs-geo', {
        data: {
            table: 'datatablegeo'
        },
        chart: {
            type: 'bar'
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

    Highcharts.chart('sadrs-sex', {
        data: {
            table: 'datatablesex'
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: ''
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f}%'
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b><br/>Percentage: <b>{point.percentage:.1f}%</b>'
        },
        series: [{
            data: {
                parsed: function(columns) {
                    // Find the "Total" row index
                    var totalIndex = columns[0].indexOf('Total');

                    // Remove the "Total" row from the data
                    if (totalIndex !== -1) {
                        columns[0].splice(totalIndex, 1);
                        columns[1].splice(totalIndex, 1);
                    }
                }
            }
        }]
    });

    Highcharts.chart('sadrs-age', {
        data: {
            table: 'datatableage'
        },
        chart: {
            type: 'bar'
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
    Highcharts.chart('sadrs-month', {
        data: {
            table: 'datatablemonth'
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
    Highcharts.chart('sadrs-year', {
        data: {
            table: 'datatableyear'
        },
        chart: {
            type: 'bar'
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