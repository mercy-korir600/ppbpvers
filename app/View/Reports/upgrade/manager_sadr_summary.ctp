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
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablegeo">
                <thead>
                    <tr>
                        <th>County</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($geo as $key => $value) {
                        $c += $value[0]['cnt'];
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
                        echo "<th>" . $value['Sadr']['gender'] . "</th>";
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
        <?php $c = 0; ?>
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
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value[0]['ager'] . "</th>";
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
        <?php $c = 0; ?>
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
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value[0]['year'] . "</th>";
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
        <?php $c = 0; ?>
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
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value[0]['month'] . "</th>";
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
        <h4>SADRs per Title</h4>

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
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatabletitle">
                <thead>
                    <tr>
                        <th>Report Title</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($report_title as $key => $value) {
                        $c += $value[0]['rep'];
                        echo "<tr>";
                        echo "<th>" . $value['Sadr']['report_title'] . "</th>";
                        echo "<td>" . $value[0]['rep'] . "</td>";
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
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablequalification">
                <thead>
                    <tr>
                        <th>Qualification</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($qualification as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Designation']['name'] . "</th>";
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
        <h4>Seriousness of ADR</h4>
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
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatableserious">
                <thead>
                    <tr>
                        <th>Seriousness</th>
                        <th>ADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($seriousness as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value[0]['serious'] . "</th>";
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
    <div class="span6">
        <h4>Reasons for seriousness</h4>

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
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablereason">
                <thead>
                    <tr>
                        <th>Reasons for seriousness</th>
                        <th>SADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($seriousness_reason as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Sadr']['serious_reason'] . "</th>";
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
        <h4>SADRs by Outcome</h4>
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
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatableoutcome">
                <thead>
                    <tr>
                        <th>Outcome</th>
                        <th>ADRs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($outcome_data as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Sadr']['outcome'] . "</th>";
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
    // Get the element with id="defaultOpen" and click on it suspected
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
    document.getElementById("suspectedOpen").click();
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
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f}%'
                }
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase() +
                    ' (' + Highcharts.numberFormat(this.point.percentage, 1) + '%)';
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