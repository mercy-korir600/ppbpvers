<?php
$this->extend('/Reports/upgrade/menu/sae');
$this->assign('saes-summary', 'active');
$this->Html->css('summary', null, array('inline' => false));
?>

<?php $this->start('report'); ?>
<div class="row-fluid">
    <div class="span6">
        <h4>SAEs per Causality</h4>
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
                <thead>
                    <tr>
                        <th>County</th>
                        <th>SAEs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($geo as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['County']['county_name'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="span6">
        <h4>Patient Sex Distribution</h4>
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
                <thead>
                    <tr>
                        <th>Sex</th>
                        <th>ADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($sex as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Sae']['gender'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
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
                        <th>SAEs</th>
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
        </div>
    </div>
    <div class="span6">
        <h4>SAEs Per Year</h4>
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
                        <th>Age group</th>
                        <th>SAEs</th>
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
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span12">
        <h4>SAEs per Month</h4>
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
                        <th>SAEs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($months as $key => $value) {
                        echo "<tr>";
                        echo "<th>".$value[0]['month']."</th>";
                        echo "<td>".$value[0]['cnt']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span6">
        <h4>SAEs per Causality</h4>
        <div class="tab">
            <button class="tablinks" onclick="qualificationTab(event, 'qualificationChart')" id="qualificationOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksqualification" onclick="qualificationTab(event, 'qualificationTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="qualificationChart" class="tabcontentqualification">
            <div id="sadrs-qualification"></div>

        </div>

        <div id="qualificationTable" class="tabcontentqualification">
            <table class="table table-condensed table-bordered" id="datatablequalification">
                <thead>
                    <tr>
                        <th>Causality</th>
                        <th>AEFIs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($causality as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Sae']['causality'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="span6">
        <h4>SAEs per Outcome</h4>
        <div class="tab">
            <button class="tablinks" onclick="outcomeTab(event, 'outcomeChart')" id="outcomeOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksoutcome" onclick="outcomeTab(event, 'outcomeTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="outcomeChart" class="tabcontentoutcome">
            <div id="sadrs-outcome"></div>

        </div>

        <div id="outcomeTable" class="tabcontentoutcome">
            <table class="table table-condensed table-bordered" id="datatableoutcome">
                <thead>
                    <tr>
                        <th>Outcome</th>
                        <th>SAEs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($outcome as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Sae']['outcome'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span12">
        <h4>SAEs per Manufacturer</h4>
        <div class="tab">
            <button class="tablinks" onclick="manuTab(event, 'manuChart')" id="manuOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksmanu" onclick="manuTab(event, 'manuTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="manuChart" class="tabcontentmanu">
            <div id="sadrs-manu"></div>

        </div>

        <div id="manuTable" class="tabcontentmanu">
            <table class="table table-condensed table-bordered" id="datatablemanu">
                <thead>
                    <tr>
                        <th>Manufacturer</th>
                        <th>SAEs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($causality as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Sae']['causality'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span12">
        <h4>SAEs per Source</h4>
        <div class="tab">
            <button class="tablinks" onclick="sourceTab(event, 'sourceChart')" id="sourceOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkssource" onclick="sourceTab(event, 'sourceTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="sourceChart" class="tabcontentsource">
            <div id="sadrs-source"></div>

        </div>

        <div id="sourceTable" class="tabcontentsource">
            <table class="table table-condensed table-bordered" id="datatablesource">
                <thead>
                    <tr>
                        <th>Source</th>
                        <th>SAEs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($causality as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Sae']['causality'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span12">
        <h4>SAEs per Suspected Medicine</h4>
        <div class="tab">
            <button class="tablinks" onclick="medTab(event, 'medChart')" id="medOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksmed" onclick="medTab(event, 'medTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="medChart" class="tabcontentmed">
            <div id="sadrs-med"></div>

        </div>

        <div id="medTable" class="tabcontentmed">
            <table class="table table-condensed table-bordered" id="datatablemed">
                <thead>
                    <tr>
                        <th>Suspected Medicine</th>
                        <th>SAEs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($causality as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Sae']['causality'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="span12">
        <h4>SAEs per Concomitant Drug</h4>
        <div class="tab">
            <button class="tablinks" onclick="concTab(event, 'concChart')" id="concOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksconc" onclick="concTab(event, 'concTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="concChart" class="tabcontentconc">
            <div id="sadrs-conc"></div>

        </div>

        <div id="concTable" class="tabcontentconc">
            <table class="table table-condensed table-bordered" id="datatableconc">
                <thead>
                    <tr>
                        <th>Concomitant Drug</th>
                        <th>SAEs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($causality as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Sae']['causality'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<script type="text/javascript">
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
    function outcomeTab(evt, outcometabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentoutcome");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksoutcome");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(outcometabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    function qualificationTab(evt, qualificationtabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentqualification");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksqualification");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(qualificationtabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    function concTab(evt, conctabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentconc");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksconc");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(conctabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    function medTab(evt, medtabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentmed");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksmed");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(medtabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    function sourceTab(evt, sourcetabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentsource");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkssource");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(sourcetabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    function manuTab(evt, manutabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentmanu");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksmanu");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(manutabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("geoOpen").click();
    document.getElementById("sexOpen").click();
    document.getElementById("ageOpen").click();
    document.getElementById("yearOpen").click();
    document.getElementById("monthOpen").click();
    document.getElementById("qualificationOpen").click();
    document.getElementById("outcomeOpen").click();
    document.getElementById("concOpen").click();
    document.getElementById("medOpen").click();
    document.getElementById("sourceOpen").click();
    document.getElementById("manuOpen").click();
    Highcharts.chart('sadrs-manu', {
        data: {
            table: 'datatablemanu'
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
    Highcharts.chart('sadrs-source', {
        data: {
            table: 'datatablesource'
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
    Highcharts.chart('sadrs-med', {
        data: {
            table: 'datatablemed'
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
    Highcharts.chart('sadrs-conc', {
        data: {
            table: 'datatableconc'
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

    Highcharts.chart('sadrs-qualification', {
        data: {
            table: 'datatablequalification'
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
    Highcharts.chart('sadrs-outcome', {
        data: {
            table: 'datatableoutcome'
        },
        chart: {
            type: 'pie'
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
    Highcharts.chart('sadrs-outcome', {
        data: {
            table: 'datatableoutcome'
        },
        chart: {
            type: 'pie'
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