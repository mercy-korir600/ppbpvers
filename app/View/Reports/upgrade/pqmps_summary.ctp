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
                        $count = $value[0]['cnt'];
                        $c += $count;
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
                        $count = $value[0]['cnt'];
                        $c += $count;
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
                        $count = $value[0]['cnt'];
                        $c += $count;
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
                        $count = $value[0]['cnt'];
                        $c += $count;
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
    // Get the element with id="defaultOpen" and click on it qualification formulation category complaint medical brands manufacturer supplier country  generic_name country monthly facility
    document.getElementById("geoOpen").click();
    document.getElementById("yearOpen").click();
    document.getElementById("brandsOpen").click();
    document.getElementById("generic_nameOpen").click();
    document.getElementById("monthlyOpen").click();


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