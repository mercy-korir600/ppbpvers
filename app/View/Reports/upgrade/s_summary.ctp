<?php
$this->extend('/Reports/upgrade/menu/serious');
$this->assign('s-summary', 'active');
$this->Html->css('summary', null, array('inline' => false));
?>

<?php $this->start('report'); ?>

<div class="row-fluid">

    <div class="span6">
        <h4>Serious AEFI</h4>
        <div class="tab">
            <button class="tablinks" onclick="aefiTab(event, 'aefiChart')" id="aefiOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinksaefi" onclick="aefiTab(event, 'aefiTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="aefiChart" class="tabcontentaefi">
            <div id="report-aefi"></div>

        </div>

        <div id="aefiTable" class="tabcontentaefi">
            <table class="table table-condensed table-bordered" id="datatableaefi">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>AEFI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($aefis as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['aefis'] . "</th>";
                        echo "<td>" . $value['cnt'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="span6">
        <h4>Serious SADR</h4>
        <div class="tab">
            <button class="tablinks" onclick="sadrTab(event, 'sadrChart')" id="sadrOpen">
                <i class="fa fa-pie-chart"></i> Chart
            </button>

            <button class="tablinkssadr" onclick="sadrTab(event, 'sadrTable')">
                <i class="fa fa-table"></i> Table
            </button>
        </div>

        <div id="sadrChart" class="tabcontentsadr">
            <div id="report-sadr"></div>

        </div>

        <div id="sadrTable" class="tabcontentsadr">
            <table class="table table-condensed table-bordered" id="datatablesadr">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>SADR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($sadr as $key => $value) {
                        echo "<tr>";
                        echo "<th>" . $value['sadr'] . "</th>";
                        echo "<td>" . $value['cnt'] . "</td>";
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
 
<script type="text/javascript">
    function sadrTab(evt, sadrtabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentsadr");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkssadr");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(sadrtabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function aefiTab(evt, aefitabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontentaefi");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinksaefi");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(aefitabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
 
    // Get the element with id="defaultOpen" and click on it vaccine  reason serious outcome facility month 
    document.getElementById("aefiOpen").click(); 
    document.getElementById("sadrOpen").click();

    Highcharts.chart('report-sadr', {
        data: {
            table: 'datatablesadr'
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

    Highcharts.chart('report-aefi', {
        data: {
            table: 'datatableaefi'
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
    
</script>
<?php $this->end(); ?>