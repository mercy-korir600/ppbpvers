<?php
$this->extend('/Reports/reports_manager');
$this->assign('medications-summary', 'active');
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
                <thead>
                    <tr>
                        <th>County</th>
                        <th>Medications Errors</th>
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
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($sex as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Medication']['gender'] . "</th>";
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
                        <th>Medications Errors</th>
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
        <h4>Medications Errors Per Year</h4>
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
                        <th>Medications Errors</th>
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
        <h4>Medications Errors per Month</h4>
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
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($months as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value[0]['month'] . "</th>";
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
        <h4>Medications Errors per Facility</h4>
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
            <table class="table table-condensed table-bordered" id="datatablefacility">
                <thead>
                    <tr>
                        <th>Facility</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($facilities as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Medication']['name_of_institution'] . "</th>";
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
        <h4>Medications Errors per Process</h4>
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
                        <th>Process</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($process as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Medication']['process_occur'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="span6">
        <h4>Error Outcome</h4>
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
                        <th>Error</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($error as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value[0]['error'] . "</th>";
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
        <h4>Reporter Qualification</h4>
        <div class="tab">
            <button class="tablinks" onclick="designationTab(event, 'designationChart')" id="designationOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksdesignation" onclick="designationTab(event, 'designationTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="designationChart" class="tabcontentdesignation">
            <div id="sadrs-designation"></div>

        </div>

        <div id="designationTable" class="tabcontentdesignation">
            <table class="table table-condensed table-bordered" id="datatabledesignation">
                <thead>
                    <tr>
                        <th>Qualification</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($designation as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['Designation']['name'] . "</th>";
                        echo "<td>" . $value[0]['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="span6">
        <h4>Contributing Factor</h4>
        <div class="tab">
            <button class="tablinks" onclick="factorTab(event, 'factorChart')" id="factorOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksfactor" onclick="factorTab(event, 'factorTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="factorChart" class="tabcontentfactor">
            <div id="sadrs-factor"></div>

        </div>

        <div id="factorTable" class="tabcontentfactor">
            <table class="table table-condensed table-bordered" id="datatablefactor">
                <thead>
                    <tr>
                        <th>Factor</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($factor as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value[0]['factor'] . "</th>";
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
        <h4>Product (Intended)</h4>
        <div class="tab">
            <button class="tablinks" onclick="piTab(event, 'piChart')" id="piOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkspi" onclick="piTab(event, 'piTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="piChart" class="tabcontentpi">
            <div id="sadrs-pi"></div>

        </div>

        <div id="piTable" class="tabcontentpi">
            <table class="table table-condensed table-bordered" id="datatablepi">
                <thead>
                    <tr>
                        <th>Product (Intended)</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pi as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['MedicationProduct']['product_name_i'] . "</th>";
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
        <h4>Product (Error)</h4>
        <div class="tab">
            <button class="tablinks" onclick="peTab(event, 'peChart')" id="peOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkspe" onclick="peTab(event, 'peTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="peChart" class="tabcontentpe">
            <div id="sadrs-pe"></div>

        </div>

        <div id="peTable" class="tabcontentpe">
            <table class="table table-condensed table-bordered" id="datatablepe">
                <thead>
                    <tr>
                        <th>Product (Error)</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pe as $key => $value) {
                        echo "<tr>";
                        echo "<th>".$value['MedicationProduct']['product_name_ii']."</th>";
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
    <div class="span12">
        <h4>Generic (Intended)</h4>
        <div class="tab">
            <button class="tablinks" onclick="giTab(event, 'giChart')" id="giOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksgi" onclick="giTab(event, 'giTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="giChart" class="tabcontentgi">
            <div id="sadrs-gi"></div>

        </div>

        <div id="giTable" class="tabcontentgi">
            <table class="table table-condensed table-bordered" id="datatablegi">
                <thead>
                    <tr>
                        <th>Generic (Intended)</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($gi as $key => $value) {
                        echo "<tr>";
                        echo "<th>".$value['MedicationProduct']['generic_name_i']."</th>";
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
    <div class="span12">
        <h4>Generic (Error)</h4>
        <div class="tab">
            <button class="tablinks" onclick="geTab(event, 'geChart')" id="geOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksge" onclick="geTab(event, 'geTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="geChart" class="tabcontentge">
            <div id="sadrs-ge"></div>

        </div>

        <div id="geTable" class="tabcontentge">
            <table class="table table-condensed table-bordered" id="datatablege">
                <thead>
                    <tr>
                        <th>Generic (Error)</th>
                        <th>Medications Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ge as $key => $value) {
                        echo "<tr>";
                        echo "<th>".$value['MedicationProduct']['generic_name_ii']."</th>";
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
<script type="text/javascript">
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

    function designationTab(evt, designationtabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentdesignation");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksdesignation");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(designationtabName).style.display = "block";
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

    function factorTab(evt, factortabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentfactor");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksfactor");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(factortabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function piTab(evt, pitabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentpi");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkspi");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(pitabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function peTab(evt, petabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentpe");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkspe");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(petabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function giTab(evt, gitabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentgi");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksgi");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(gitabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function geTab(evt, getabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentge");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksge");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(getabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it designation
    document.getElementById("geoOpen").click();
    document.getElementById("sexOpen").click();
    document.getElementById("ageOpen").click();
    document.getElementById("yearOpen").click();
    document.getElementById("monthOpen").click();
    document.getElementById("facilityOpen").click();
    document.getElementById("qualificationOpen").click();
    document.getElementById("outcomeOpen").click();
    document.getElementById("designationOpen").click();
    document.getElementById("factorOpen").click();
    document.getElementById("piOpen").click();
    document.getElementById("peOpen").click();
    document.getElementById("giOpen").click();
    document.getElementById("geOpen").click();
    Highcharts.chart('sadrs-ge', {
        data: {
            table: 'datatablege'
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
    Highcharts.chart('sadrs-gi', {
        data: {
            table: 'datatablegi'
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
    Highcharts.chart('sadrs-pe', {
        data: {
            table: 'datatablepe'
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
    Highcharts.chart('sadrs-pi', {
        data: {
            table: 'datatablepi'
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
    Highcharts.chart('sadrs-factor', {
        data: {
            table: 'datatablefactor'
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
    Highcharts.chart('sadrs-designation', {
        data: {
            table: 'datatabledesignation'
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