<?php                                                                                                                                                                    
    $this->extend('/Reports/reports');                                                                                                                                       
    $this->assign('sfms-summary', 'active');                                                                                                                                 
    $this->assign('reports-home', 'active');                                                                                                                                 
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
                <div id="sfm-geo"></div>                                                                                                                                     
            </div>                                                                                                                                                           
                                                                                                                                                                             
            <div id="geoTable" class="tabcontentgeo">                                                                                                                        
                <table class="table table-condensed table-bordered" id="datatablegeo">                                                                                       
                    <thead>                                                                                                                                                  
                        <tr>                                                                                                                                                 
                            <th>County</th>                                                                                                                                  
                            <th>SFM Reports</th>                                                                                                                             
                        </tr>                                                                                                                                                
                    </thead>                                                                                                                                                 
                    <tbody>                                                                                                                                                  
                        <?php $c_geo = 0; ?>                                                                                                                                 
                        <?php if (!empty($geo)): ?>                                                                                                                          
                            <?php foreach ($geo as $value): ?>                                                                                                               
                                <?php $count = (int)$value[0]['cnt']; $c_geo += $count; ?>                                                                                   
                                <tr>                                                                                                                                         
                                    <th><?php echo h(isset($value['County']['county_name']) ? $value['County']['county_name'] : 'Unassigned'); ?></th>                       
                                    <td><?php echo $count; ?></td>                                                                                                           
                                </tr>                                                                                                                                        
                            <?php endforeach; ?>                                                                                                                             
                        <?php endif; ?>                                                                                                                                      
                    </tbody>                                                                                                                                                 
                </table>                                                                                                                                                     
                <table class="table table-condensed table-bordered">                                                                                                         
                    <tbody>                                                                                                                                                  
                        <tr>                                                                                                                                                 
                            <th>Total</th>                                                                                                                                   
                            <th><?php echo $c_geo; ?></th>                                                                                                                   
                        </tr>                                                                                                                                                
                    </tbody>                                                                                                                                                 
                </table>                                                                                                                                                     
            </div>                                                                                                                                                           
        </div>                                                                                                                                                               
                                                                                                                                                      
        <div class="span6">                                                                                                                                                  
            <h4>SFM Reports Per Year</h4>                                                                                                                                    
            <div class="tab">                                                                                                                                                
                <button class="tablinks" onclick="yearTab(event, 'yearChart')" id="yearOpen">                                                                                
                    <i class="fa fa-pie-chart"></i> Chart                                                                                                                    
                </button>                                                                                                                                                    
                <button class="tablinksyear" onclick="yearTab(event, 'yearTable')">                                                                                          
                    <i class="fa fa-table"></i> Table                                                                                                                        
                </button>                                                                                                                                                    
            </div>                                                                                                                                                           
                                                                                                                                                                             
            <div id="yearChart" class="tabcontentyear">                                                                                                                      
                <div id="sfm-year"></div>                                                                                                                                    
            </div>                                                                                                                                                           
                                                                                                                                                                             
            <div id="yearTable" class="tabcontentyear">                                                                                                                      
                <table class="table table-condensed table-bordered" id="datatableyear">                                                                                      
                    <thead>                                                                                                                                                  
                        <tr>                                                                                                                                                 
                            <th>Year</th>                                                                                                                                    
                            <th>SFM Reports</th>                                                                                                                             
                        </tr>                                                                                                                                                
                    </thead>                                                                                                                                                 
                    <tbody>                                                                                                                                                  
                        <?php $c_year = 0; ?>                                                                                                                                
                        <?php if (!empty($year)): ?>                                                                                                                         
                            <?php foreach ($year as $value): ?>                                                                                                              
                                <?php $count = (int)$value[0]['cnt']; $c_year += $count; ?>                                                                                  
                                <tr>                                                                                                                                         
                                    <th><?php echo h($value[0]['year']); ?></th>                                                                                             
                                    <td><?php echo $count; ?></td>                                                                                                           
                                </tr>                                                                                                                                        
                            <?php endforeach; ?>                                                                                                                             
                        <?php endif; ?>                                                                                                                                      
                    </tbody>                                                                                                                                                 
                </table>                                                                                                                                                     
                <table class="table table-condensed table-bordered">                                                                                                         
                    <tbody>                                                                                                                                                  
                        <tr>                                                                                                                                                 
                            <th>Total</th>                                                                                                                                   
                            <th><?php echo $c_year; ?></th>                                                                                                                  
                        </tr>                                                                                                                                                
                    </tbody>                                                                                                                                                 
                </table>                                                                                                                                                     
            </div>                                                                                                                                                           
        </div>                                                                                                                                                               
    </div>                                                                                                                                                                   
                                                                                                                                                                             
    <hr>                                                                                                                                                                     
                                                                                                                                                                             
    <div class="row-fluid">                                                                                                                                     
        <div class="span12">                                                                                                                                                 
            <h4>SFM Reports Per Month</h4>                                                                                                                                   
            <div class="tab">                                                                                                                                                
                <button class="tablinks" onclick="monthTab(event, 'monthChart')" id="monthOpen">                                                                             
                    <i class="fa fa-pie-chart"></i> Chart                                                                                                                    
                </button>                                                                                                                                                    
                <button class="tablinksmonth" onclick="monthTab(event, 'monthTable')">                                                                                       
                    <i class="fa fa-table"></i> Table                                                                                                                        
                </button>                                                                                                                                                    
            </div>                                                                                                                                                           
                                                                                                                                                                             
            <div id="monthChart" class="tabcontentmonth">                                                                                                                    
                <div id="sfm-month"></div>                                                                                                                                   
            </div>                                                                                                                                                           
                                                                                                                                                                             
            <div id="monthTable" class="tabcontentmonth">                                                                                                                    
                <table class="table table-condensed table-bordered" id="datatablemonth">                                                                                     
                    <thead>                                                                                                                                                  
                        <tr>                                                                                                                                                 
                            <th>Month</th>                                                                                                                                   
                            <th>SFM Reports</th>                                                                                                                             
                        </tr>                                                                                                                                                
                    </thead>                                                                                                                                                 
                    <tbody>                                                                                                                                                  
                        <?php $c_month = 0; ?>                                                                                                                               
                        <?php if (!empty($monthly)): ?>                                                                                                                      
                            <?php foreach ($monthly as $value): ?>                                                                                                           
                                <?php $count = (int)$value[0]['cnt']; $c_month += $count; ?>                                                                                 
                                <tr>                                                                                                                                         
                                    <th><?php echo h($value[0]['month']); ?></th>                                                                                            
                                    <td><?php echo $count; ?></td>                                                                                                           
                                </tr>                                                                                                                                        
                            <?php endforeach; ?>                                                                                                                             
                        <?php endif; ?>                                                                                                                                      
                    </tbody>                                                                                                                                                 
                </table>                                                                                                                                                     
                <table class="table table-condensed table-bordered">                                                                                                         
                    <tbody>                                                                                                                                                  
                        <tr>                                                                                                                                                 
                            <th>Total</th>                                                                                                                                   
                            <th><?php echo $c_month; ?></th>                                                                                                                 
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
                                                                                                                                                       
        document.getElementById("geoOpen").click();                                                                                                                          
        document.getElementById("yearOpen").click();                                                                                                                         
        document.getElementById("monthOpen").click();                                                                                                                        
                                                                                                        
        Highcharts.chart('sfm-geo', {                                                                                                                                        
            data: { table: 'datatablegeo' },                                                                                                                                 
            chart: { type: 'bar' },                                                                                                                                          
            title: { text: '' },                                                                                                                                             
            yAxis: { allowDecimals: false, title: { text: 'Reports' } },                                                                                                     
            tooltip: {                                                                                                                                                       
                formatter: function() {                                                                                                                                      
                    return '<b>' + this.series.name + '</b><br/>' +                                                                                                          
                        this.point.y + ' ' + this.point.name.toLowerCase();                                                                                                  
                }                                                                                                                                                            
            }                                                                                                                                                                
        });                                                                                                                                                                  
                                                                                                                                                                             
        Highcharts.chart('sfm-year', {                                                                                                                                       
            data: { table: 'datatableyear' },                                                                                                                                
            chart: { type: 'column' },                                                                                                                                       
            title: { text: '' },                                                                                                                                             
            yAxis: { allowDecimals: false, title: { text: 'Reports' } }                                                                                                      
        });                                                                                                                                                                  
                                                                                                                                                                             
        Highcharts.chart('sfm-month', {                                                                                                                                      
            data: { table: 'datatablemonth' },                                                                                                                               
           chart: { type: 'column' },                                                                                                                                        
            title: { text: '' },
            yAxis: { allowDecimals: false, title: { text: 'Reports' } }
        });
    </script>
  
    <?php $this->end(); ?>