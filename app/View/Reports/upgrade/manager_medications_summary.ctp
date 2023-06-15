<?php
$this->extend('/Reports/upgrade/menu/medications');
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
                        <th>Medication Errors</th>
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
                        <th>Medication Errors</th>
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
                        <th>Medication Errors</th>
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
        <h4>Medication Errors Per Year</h4>
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
                        <th>Medication Errors</th>
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
        <h4>Medication Errors per Month</h4>
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
                        <th>Medication Errors</th>
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
        </div>
    </div>
</div>
<hr>
 
<div class="row-fluid">
    <div class="span12">
        <h4>Medication Errors per Product (Intended)</h4>

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
            <table class="table table-condensed table-bordered" id="datatablereaction">
                <thead>
                    <tr>
                        <th>Product (Intended)</th>
                        <th>Medication Errors</th>
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
        <h4>Medication Errors per Product (Error)</h4>

        <div class="tab">
            <button class="tablinks" onclick="titleTab(event, 'titleChart')" id="titleOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkstitle" onclick="titleTab(event, 'titleTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="titleChart" class="tabcontenttitle">
            <div id="sadrs-title"></div>

        </div>

        <div id="titleTable" class="tabcontenttitle">
            <table class="table table-condensed table-bordered" id="datatabletitle">
                <thead>
                    <tr>
                        <th>Product Error</th>
                        <th>Medication Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pe as $key => $value) {
                        echo "<tr>";

                        echo "<th>" . $value['MedicationProduct']['product_name_ii'] . "</th>";
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
                        <th>Qualification</th>
                        <th>Medication Errors</th>
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
        <h4>Medical Errors per Process</h4>
        <div class="tab">
            <button class="tablinks" onclick="seriousTab(event, 'seriousChart')" id="seriousOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksserious" onclick="seriousTab(event, 'seriousTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="seriousChart" class="tabcontentserious">
            <div id="sadrs-serious"></div>

        </div>

        <div id="seriousTable" class="tabcontentserious">
            <table class="table table-condensed table-bordered" id="datatableserious">
                <thead>
                    <tr>
                        <th>Process</th>
                        <th>Medication Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($process as $key => $value) {
                        echo "<tr>";
                        echo "<th>".$value['Medication']['process_occur']."</th>";
                        echo "<td>".$value[0]['cnt']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <h4>Medication Errors per Generic (Intended)</h4>

        <div class="tab">
            <button class="tablinks" onclick="genericTab(event, 'genericChart')" id="genericOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksgeneric" onclick="genericTab(event, 'genericTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="genericChart" class="tabcontentgeneric">
            <div id="sadrs-generic"></div>

        </div>

        <div id="genericTable" class="tabcontentgeneric">
            <table class="table table-condensed table-bordered" id="datatablegeneric">
                <thead>
                    <tr>
                        <th>Generic (Intended)</th>
                        <th>Medication Errors</th>
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
        <h4>Medication Errors per Generic (Error)</h4>

        <div class="tab">
            <button class="tablinks" onclick="genericETab(event, 'genericEChart')" id="genericEOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksgenericE" onclick="genericETab(event, 'genericETable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="genericEChart" class="tabcontentgenericE">
            <div id="sadrs-genericE"></div>

        </div>

        <div id="genericETable" class="tabcontentgenericE">
            <table class="table table-condensed table-bordered" id="datatablegenericE">
                <thead>
                    <tr>
                        <th>Generic Error</th>
                        <th>Medication Errors</th>
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
<hr>
<div class="row-fluid">
    <div class="span6">
        <h4>Medication Errors per Contributing Factors</h4>

        <div class="tab">
            <button class="tablinks" onclick="reasonTab(event, 'reasonChart')" id="reasonOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksreason" onclick="reasonTab(event, 'reasonTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="reasonChart" class="tabcontentreason">
            <div id="sadrs-reason"></div>

        </div>

        <div id="reasonTable" class="tabcontentreason">
            <table class="table table-condensed table-bordered" id="datatablereason">
                <thead>
                    <tr>
                        <th>Contributing Factor</th>
                        <th>Medication Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($factor as $key => $value) {
                        echo "<tr>";
                        echo "<th>".$value[0]['factor']."</th>";
                        echo "<td>".$value[0]['cnt']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="span6">
        <h4>Medication Errors by Outcome</h4>
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
                        <th>Medication Errors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($error as $key => $value) {
                        echo "<tr>";
                        echo "<th>".$value[0]['error']."</th>";
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
        <h4>Medication Errors per Facility</h4>

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
                        <th>Medication Errors</th>
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
    function genericTab(evt, generictabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentgeneric");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksgeneric");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(generictabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    function genericETab(evt, genericEtabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentgenericE");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksgenericE");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(genericEtabName).style.display = "block";
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

    function titleTab(evt, titletabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontenttitle");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkstitle");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(titletabName).style.display = "block";
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

    function seriousTab(evt, serioustabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentserious");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksserious");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(serioustabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Reason
    function reasonTab(evt, reasontabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentreason");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksreason");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(reasontabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Outcome
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
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("geoOpen").click();
    document.getElementById("sexOpen").click();
    document.getElementById("seriousOpen").click();
    document.getElementById("ageOpen").click();
    document.getElementById("monthOpen").click();
    document.getElementById("yearOpen").click();
    document.getElementById("reactionOpen").click();
    document.getElementById("titleOpen").click();
    document.getElementById("qualificationOpen").click();
    document.getElementById("reasonOpen").click();
    document.getElementById("outcomeOpen").click();
    document.getElementById("facilityOpen").click();
    document.getElementById("genericOpen").click();
    document.getElementById("genericEOpen").click();
    
    Highcharts.chart('sadrs-generic', {
        data: {
            table: 'datatablegeneric'
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
    Highcharts.chart('sadrs-genericE', {
        data: {
            table: 'datatablegenericE'
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
    Highcharts.chart('sadrs-title', {
        data: {
            table: 'datatabletitle'
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
    Highcharts.chart('sadrs-serious', {
        data: {
            table: 'datatableserious'
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
    Highcharts.chart('sadrs-reason', {
        data: {
            table: 'datatablereason'
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
</script>
<?php $this->end(); ?>