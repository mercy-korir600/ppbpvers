<?php
$this->extend('/Reports/upgrade/menu/pqhpt');
$this->assign('pqmps-summary', 'active');
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
                        <th>PQHPTs</th>
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
        <h4>PQHPTs Per Year</h4>
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
                        <th>PQHPTs</th>
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
    <div class="span6">
        <h4>PQHPTs per Reporter Qualification</h4>
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
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($designation as $key => $value) {
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
        <h4>PQHPTs per Product Formulation</h4>
        <div class="tab">
            <button class="tablinks" onclick="formulationTab(event, 'formulationChart')" id="formulationOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksformulation" onclick="formulationTab(event, 'formulationTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="formulationChart" class="tabcontentformulation">
            <div id="sadrs-formulation"></div>

        </div>

        <div id="formulationTable" class="tabcontentformulation">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatableformulation">
                <thead>
                    <tr>
                        <th>Formulation</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($formulation as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Pqmp']['product_formulation'] . "</th>";
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
        <h4>Product Category</h4>
        <div class="tab">
            <button class="tablinks" onclick="categoryTab(event, 'categoryChart')" id="categoryOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkscategory" onclick="categoryTab(event, 'categoryTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="categoryChart" class="tabcontentcategory">
            <div id="sadrs-category"></div>

        </div>

        <div id="categoryTable" class="tabcontentcategory">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablecategory">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($category as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value[0]['category'] . "</th>";
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
        <h4>Product Complaint</h4>
        <div class="tab">
            <button class="tablinks" onclick="complaintTab(event, 'complaintChart')" id="complaintOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkscomplaint" onclick="complaintTab(event, 'complaintTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="complaintChart" class="tabcontentcomplaint">
            <div id="sadrs-complaint"></div>

        </div>

        <div id="complaintTable" class="tabcontentcomplaint">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablecomplaint">
                <thead>
                    <tr>
                        <th>Complaint</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($complaint as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value[0]['complaint'] . "</th>";
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
        <h4>PQHPTs per Medical Device</h4>
        <div class="tab">
            <button class="tablinks" onclick="medicalTab(event, 'medicalChart')" id="medicalOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksmedical" onclick="medicalTab(event, 'medicalTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="medicalChart" class="tabcontentmedical">
            <div id="sadrs-medical"></div>

        </div>

        <div id="medicalTable" class="tabcontentmedical">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablemedical">
                <thead>
                    <tr>
                        <th>Medical Device</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($medical as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value[0]['device'] . "</th>";
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
        <h4>PQHPTs per Brand Name</h4>
        <div class="tab">
            <button class="tablinks" onclick="brandsTab(event, 'brandsChart')" id="brandsOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksbrands" onclick="brandsTab(event, 'brandsTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="brandsChart" class="tabcontentbrands">
            <div id="sadrs-brands"></div>

        </div>

        <div id="brandsTable" class="tabcontentbrands">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablebrands">
                <thead>
                    <tr>
                        <th>Brand Name</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($brands as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Pqmp']['brand_name'] . "</th>";
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
        <h4>PQHPTs per Manufacturer</h4>
        <div class="tab">
            <button class="tablinks" onclick="manufacturerTab(event, 'manufacturerChart')" id="manufacturerOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksmanufacturer" onclick="manufacturerTab(event, 'manufacturerTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="manufacturerChart" class="tabcontentmanufacturer">
            <div id="sadrs-manufacturer"></div>

        </div>

        <div id="manufacturerTable" class="tabcontentmanufacturer">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablemanufacturer">
                <thead>
                    <tr>
                        <th>Manufacturer</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($manufacturer as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Pqmp']['name_of_manufacturer'] . "</th>";
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
        <h4>PQHPTs per Supplier</h4>
        <div class="tab">
            <button class="tablinks" onclick="supplierTab(event, 'supplierChart')" id="supplierOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkssupplier" onclick="supplierTab(event, 'supplierTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="supplierChart" class="tabcontentsupplier">
            <div id="sadrs-supplier"></div>

        </div>

        <div id="supplierTable" class="tabcontentsupplier">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablesupplier">
                <thead>
                    <tr>
                        <th>Supplier</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($supplier as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Pqmp']['supplier_name'] . "</th>";
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
        <h4>PQHPTs per Generic Name</h4>
        <div class="tab">
            <button class="tablinks" onclick="generic_nameTab(event, 'generic_nameChart')" id="generic_nameOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksgeneric_name" onclick="generic_nameTab(event, 'generic_nameTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="generic_nameChart" class="tabcontentgeneric_name">
            <div id="sadrs-generic_name"></div>

        </div>

        <div id="generic_nameTable" class="tabcontentgeneric_name">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablegeneric_name">
                <thead>
                    <tr>
                        <th>Generic Name</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($generic_name as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Pqmp']['generic_name'] . "</th>";
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
        <h4>PQHPTs per Country</h4>
        <div class="tab">
            <button class="tablinks" onclick="countryTab(event, 'countryChart')" id="countryOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkscountry" onclick="countryTab(event, 'countryTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="countryChart" class="tabcontentcountry">
            <div id="sadrs-country"></div>

        </div>

        <div id="countryTable" class="tabcontentcountry">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablecountry">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($country as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Country']['name'] . "</th>";
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
        <h4>Month</h4>
        <div class="tab">
            <button class="tablinks" onclick="monthlyTab(event, 'monthlyChart')" id="monthlyOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksmonthly" onclick="monthlyTab(event, 'monthlyTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="monthlyChart" class="tabcontentmonthly">
            <div id="sadrs-monthly"></div>

        </div>

        <div id="monthlyTable" class="tabcontentmonthly">
        <?php $c = 0; ?>
            <table class="table table-condensed table-bordered" id="datatablemonthly">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>PQHPTs</th>
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
        <h4>PQHPTs per Facility</h4>
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
                        <th>PQHPTs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($facility as $key => $value) {
                        $c += $value[0]['cnt'];
                        echo "<tr>";
                        echo "<th>" . $value['Pqmp']['facility_name'] . "</th>";
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

    function formulationTab(evt, formulationtabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentformulation");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksformulation");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(formulationtabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function categoryTab(evt, categorytabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentcategory");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkscategory");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(categorytabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function complaintTab(evt, complainttabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentcomplaint");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkscomplaint");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(complainttabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function medicalTab(evt, medicaltabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentmedical");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksmedical");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(medicaltabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function brandsTab(evt, brandstabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentbrands");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksbrands");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(brandstabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function manufacturerTab(evt, manufacturertabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentmanufacturer");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksmanufacturer");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(manufacturertabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function supplierTab(evt, suppliertabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentsupplier");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkssupplier");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(suppliertabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function generic_nameTab(evt, generic_nametabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentgeneric_name");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksgeneric_name");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(generic_nametabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function countryTab(evt, countrytabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentcountry");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkscountry");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(countrytabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function monthlyTab(evt, monthlytabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentmonthly");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksmonthly");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(monthlytabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

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
    // Get the element with id="defaultOpen" and click on it qualification formulation category complaint medical brands manufacturer supplier country  generic_name country monthly facility
    document.getElementById("geoOpen").click();
    document.getElementById("yearOpen").click();
    document.getElementById("qualificationOpen").click();
    document.getElementById("formulationOpen").click();
    document.getElementById("categoryOpen").click();
    document.getElementById("complaintOpen").click();
    document.getElementById("medicalOpen").click();
    document.getElementById("brandsOpen").click();
    document.getElementById("manufacturerOpen").click();
    document.getElementById("supplierOpen").click();
    document.getElementById("generic_nameOpen").click();
    document.getElementById("countryOpen").click();
    document.getElementById("monthlyOpen").click();
    document.getElementById("facilityOpen").click();

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

    Highcharts.chart('sadrs-monthly', {
        data: {
            table: 'datatablemonthly'
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
    document.getElementById("countryOpen").click();

    Highcharts.chart('sadrs-country', {
        data: {
            table: 'datatablecountry'
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

    Highcharts.chart('sadrs-generic_name', {
        data: {
            table: 'datatablegeneric_name'
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

    Highcharts.chart('sadrs-supplier', {
        data: {
            table: 'datatablesupplier'
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

    Highcharts.chart('sadrs-manufacturer', {
        data: {
            table: 'datatablemanufacturer'
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

    Highcharts.chart('sadrs-brands', {
        data: {
            table: 'datatablebrands'
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

    Highcharts.chart('sadrs-medical', {
        data: {
            table: 'datatablemedical'
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

    Highcharts.chart('sadrs-complaint', {
        data: {
            table: 'datatablecomplaint'
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

    Highcharts.chart('sadrs-category', {
        data: {
            table: 'datatablecategory'
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


    Highcharts.chart('sadrs-formulation', {
        data: {
            table: 'datatableformulation'
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

    Highcharts.chart('sadrs-year', {
        data: {
            table: 'datatableyear'
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