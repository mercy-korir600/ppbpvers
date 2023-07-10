<?php
$this->assign('Home', 'active');
$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
$this->Html->script('home', array('inline' => false));
$this->Html->script('holder/holder', array('inline' => false));
$this->Html->css('landing', false, array('inline' => false));
$this->Html->css('upgrade', false, array('inline' => false));
?>
<style type="text/css">
	.hero{
        background-color: #F0F9F2;
        display: flex;
        width: 100%;
        padding-top: 2%;
	}

	.image {
		width: 30%;
        margin-right: 20%;
	}
    </style>
   
<hr>
    <div class="row-fluid hero">
        <div class="span8" style="margin-left: 20%;">
            <h2> What can you report on?</h2><br>
            <p>Any member of the public is able to report any cases of medicine side effects<br> or incidents involving medical devices and poor quality health products and technologies. For minors, parents/gaurdians<br>can report on their behalf.</p>
            <p>
                <a class="btn btn-primary btn-lg" href="/padrs/add">
                    <span style="line-height: 60px;">Submit a Report</span>
                </a>
            </p>

        </div>
        <div class="image">
            <img src="/img/public2.png" />
	    </div>
    </div>

<div class="container marketing">
    <br> <br> <br> 

    <br><br>
    <div class="row-fluid">

        <div class="container">
            <div class="header_">
                <h2>Guidelines</h2>
                <br>
            </div>
            <div id="accordion" class="accordion">
               
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <a class="card-title">
                            Guide to reporting poor quality health products and technologies
                        </a>
                    </div>
                    <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                        <br>
                        <p style="text-align: left;">i. Indicate your name and county</p>
                        <p style="text-align: left;">ii. Indicate your contact- telephone number (It is important for follow up by the Pharmacy and Poisons Board and to obtain additional information as well as providing you with the feedback)</p>
                        <p style="text-align: left;">iii. Select report on poor quality medicine</p>
                        <p style="text-align: left;">iv.Select the issue with the medicine or medical device e.g., wrong labeling, no label, unusual material in the medicine, color change, unusual smell, medicine is not working, different color shade of the packaging, malfunction of medical device or others (specify),</p>
                        <p style="text-align: left;">v. Indicate name of the product e.g. Xmol syrup</p>
                        <p style="text-align: left;">vi. Indicate where you bought / obtained the medicine from e.g., X Chemist</p>
                        <p style="text-align: left;">vii. If you have any photos or documents you can attach</p>
                        <p style="text-align: left;">viii. Indicate the date for reporting</p>
                    </div>
                </div>
                <br>
                <div class="card mb-0">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <a class="card-title"> 
                            Guide to reporting side effects
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <br>
                            <p style="text-align: left;">i. Indicate your name and county</p>
                            <p style="text-align: left;">ii. Indicate your contact- telephone number (It is important for follow up by the Pharmacy and Poisons Board and to obtain additional information as well as providing you with the feedback)</p>
                            <p style="text-align: left;">iii. Select report on medicine side effects.</p>
                            <p style="text-align: left;">iv. Select the symptoms or condition you are experiencing from the list e.g Vomiting or diarrhoea, Dizziness or drowsiness, Headache e.tc</p>
                            <p style="text-align: left;">v. If a symptom or condition is not in the list provided, indicate it on the other side effects experienced.</p>
                            <p style="text-align: left;">vi. Indicate the date when the reaction started and select whether or not if you are still experiencing the condition.</p>
                            <p style="text-align: left;">vii. Indicate name of the product e.g. Xmol syrup</p>
                            <p style="text-align: left;">viii. Indicate where you bought / obtained the medicine from e.g., X Chemist</p>
                            <p style="text-align: left;">ix. If you have any photos or documents you can attach</p>
                            <p style="text-align: left;">x. Indicate the date for reporting</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row-fluid">
        <div class="blank_public"></div>
    </div>
</div>