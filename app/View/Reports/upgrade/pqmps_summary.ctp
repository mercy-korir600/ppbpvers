<?php
$this->extend('/Reports/reports_manager');
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
            <table class="table table-condensed table-bordered" id="datatableyear">
                <thead>
                    <tr>
                        <th>Age group</th>
                        <th>PQHPTs</th>
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
     
   
</div>
<hr>

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
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("geoOpen").click(); 
    document.getElementById("yearOpen").click();


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