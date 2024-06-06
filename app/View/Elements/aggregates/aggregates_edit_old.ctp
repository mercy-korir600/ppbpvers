<?php
$this->assign('AGGREGATE', 'active');
$this->Html->script('jquery/combobox', array('inline' => false));
$this->Html->script('ce2b', array('inline' => false));
?>

<!-- SADR
    ================================================== -->
<section id="sadrsadd">

    <?php
    echo $this->Session->flash();
    echo $this->Form->create('Aggregate', array(
        'type' => 'file',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'div' => array('class' => 'control-group'),
            'label' => array('class' => 'control-label'),
            'between' => '<div class="controls">',
            'after' => '</div>',
            'class' => '',
            'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
            'error' => array('attributes' => array('class' => 'controls help-block')),
        ),
    ));
    ?>
    <div class="row-fluid">
        <div class="span10 formbackd">

            <?php
            echo $this->Form->input('Aggregate.id', array());
            echo $this->Form->input('Aggregate.reference_no', array('type' => 'hidden'));
            ?>

            <p><b>(FOM001/HPT/VMS/SOP/001)</b></p>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                    echo $this->Html->image('confidence.png', array('alt' => 'in confidence', 'class' => 'pull-right'));
                    echo $this->Html->image('coa.png', array('alt' => 'COA', 'style' => 'margin-left: 45%;'));
                    ?>
                    <div class="babayao" style="text-align: center;">
                        <h4>MINISTRY OF HEALTH</h4>
                        <h5>PHARMACY AND POISONS BOARD</h5>
                        <h5>P.O. Box 27663-00506 NAIROBI</h5>
                        <h5>Tel: +254795743049</h5>
                        <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
                        <h5 style="color: red;">Aggregate Report FORM</h5>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row-fluid">
                <div class="span12">
                    <?php
                    echo $this->Form->input('company_name', array(
                        'label' => array('class' => 'control-label required', 'text' => 'Company Name<span style="color:red;">*</span>'),
                        'placeholder' => ' ',
                        'type' => 'hidden',
                        'title' => 'Company Name',
                        'after' => '<p class="help-block"> </p></div>',
                        'class' => 'span9',
                    ));
                    echo $this->Form->input('company_code', array(
                        'type' => 'hidden'
                    ));


                    echo $this->Form->input(
                        'introduction',
                        array(
                            'class' => 'span8',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '1. Introduction <span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p></div>',
                        )
                    );
                    echo $this->Form->input(
                        'worldwide_marketing ',
                        array(
                            'class' => 'span8',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '2. Worldwide Marketing Approval Status <span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p></div>',
                        )
                    );
                    echo $this->Form->input(
                        'action_taken',
                        array(
                            'class' => 'span8',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '3. Actions Taken in the Reporting Interval for Safety Reasons <span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p></div>',
                        )
                    );
                    echo $this->Form->input(
                        'reference_changes',
                        array(
                            'class' => 'span8',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '4 Changes to Reference Safety Information <span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p></div>',
                        )
                    );
                    ?>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span4 editable">
                                <?php
                                echo $this->Form->input(
                                    'estimated_exposure',
                                    array(
                                        'class' => 'span12',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '5 Estimated Exposure and Use Patterns<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p></div>',
                                    )
                                );
                                ?></div>

                            <div class="span4 editable">
                                <?php

                                echo $this->Form->input(
                                    'cumulative_subject',
                                    array(
                                        'class' => 'span12',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '5.1 Cumulative Subject Exposure in Clinical Trials <span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p></div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span4 editable">
                                <?php
                                echo $this->Form->input(
                                    'interval_patient',
                                    array(
                                        'class' => 'span12',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '5.2 Cumulative and Interval Patient Exposure from Marketing Experience <span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p></div>',
                                    )


                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->input(
                        'summary_tabulations_data',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '6 Data in Summary Tabulations <span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p></div>',
                        )
                    );
                    ?>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span4 editable">
                                <?php
                                echo $this->Form->input(
                                    'reference_information',
                                    array(
                                        'class' => 'span12',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '6.1 Reference Information<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p></div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span4 editable">
                                <?php
                                echo $this->Form->input(
                                    'summary_tabulations_sae',
                                    array(
                                        'class' => 'span12',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '6.2 Cumulative Summary Tabulations of Serious Adverse Events from Clinical Trials <span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p></div>',
                                    )
                                );
                                ?>

                            </div>
                            <div class="span4 editable">
                                <?php
                                echo $this->Form->input(
                                    'post_market_data_source',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '6.3 Cumulative and Interval Summary Tabulations from Post-Marketing Data Sources <span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>
                                    </div>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php


                    echo $this->Form->input(
                        'significant_finding',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '7 Summaries of Significant Findings from Clinical Trials during the Reporting Period<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );
                    ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span4 editable">
                                <?php

                                echo $this->Form->input(
                                    'completed_clinical_trials',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '7.1 Completed Clinical Trials<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p> </div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span4 editable">
                                <?php
                                echo $this->Form->input(
                                    'ongoing_clinical_trials',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '7.2 Ongoing Clinical Trials<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p> </div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span4 editable">
                                <?php

                                echo $this->Form->input(
                                    'long_term_follow_up',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '7.3 Long-Term Follow-up<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p> </div>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6 editable">
                                <?php

                                echo $this->Form->input(
                                    'other_therapeutic',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '7.4 Other Therapeutic Use of Medicinal Product<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p></div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span6 editable">
                                <?php

                                echo $this->Form->input(
                                    'related_safety_data',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '7.5 New Safety Data Related to Combination Therapies<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p></div>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->input(
                        'non_interventional_studies',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '8 Findings from Non-Interventional Studies<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>
                    </div>',
                        )
                    );

                    echo $this->Form->input(
                        'other_clinical_trials_sources',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '9 Information from Other Clinical Trials and Sources<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );

                    echo $this->Form->input(
                        'non_clinical_data',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '10 Non-Clinical Data<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );

                    echo $this->Form->input(
                        'literature',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '11 Literature<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );

                    echo $this->Form->input(
                        'periodic_reports',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '12 Other Periodic Reports<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );

                    echo $this->Form->input(
                        'efficacy_lack',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '13 Lack of Efficacy in Controlled Clinical Trials<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );

                    echo $this->Form->input(
                        'late_breaking',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '14 Late-Breaking Information<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );

                    echo $this->Form->input(
                        'signals_overview',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '15 Overview of Signals: New, Ongoing, or Closed<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );

                    echo $this->Form->input(
                        'signal_risk_evaluation',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '16 Signal and Risk Evaluation<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );
                    ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6 editable">
                                <?php
                                echo $this->Form->input(
                                    'summary_safety_concerns',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '16.1 Summary of Safety Concerns<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>  </div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span6 editable">
                                <?php

                                echo $this->Form->input(
                                    'signal_evaluation',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '16.2 Signal Evaluation<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>  </div>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6 editable">
                                <?php
                                echo $this->Form->input(
                                    'risk_new_evaluation',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '16.3 Evaluation of Risks and New Information<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>  </div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span6 editable">
                                <?php
                                echo $this->Form->input(
                                    'risk_cjaracterization',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '16.4 Characterisation of Risks<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p> </div>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6 editable">
                                <?php
                                echo $this->Form->input(
                                    'effectiveness_minimisation',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '16.5 Effectiveness of Risk Minimisation (if applicable)<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>  </div>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php

                    echo $this->Form->input(
                        'benefit_evaluation',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '17 Benefit Evaluation<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>   </div>',
                        )
                    );
                    ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span4 editable">
                                <?php
                                echo $this->Form->input(
                                    'important_baseline',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '17.1 Important Baseline Efficacy/Effectiveness Information<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>   </div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span4 editable">
                                <?php

                                echo $this->Form->input(
                                    'newly_information',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '17.2 Newly Identified information on Efficacy/ Effectiveness<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>   </div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span4 editable">
                                <?php
                                echo $this->Form->input(
                                    'characterisation_benefits',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '17.3 Characterisation of Benefits<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>  </div>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php

                    echo $this->Form->input(
                        'intergrated_risk_benefit',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '18 Integrated Benefit-Risk Analysis for Approved Indications<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );
                    ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6 editable">
                                <?php
                                echo $this->Form->input(
                                    'risk_context',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '18.1 Benefit-Risk Context - Medical Need and Important Alternatives<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p> </div>',
                                    )
                                );
                                ?>
                            </div>
                            <div class="span6 editable">
                                <?php
                                echo $this->Form->input(
                                    'risk_analysis_evaluation',
                                    array(
                                        'class' => 'span10',
                                        'rows' => '3',
                                        'label' => array('class' => 'control-label required', 'text' => '18.2 Benefit-Risk Analysis Evaluation<span style="color:red;">*</span>'),
                                        'after' => '<p class="help-block"> </p>  </div>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->input(
                        'conclusions',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '19 Conclusions and Actions<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>   </div>',
                        )
                    );

                    echo $this->Form->input(
                        'appendices',
                        array(
                            'class' => 'span10',
                            'rows' => '3',
                            'label' => array('class' => 'control-label required', 'text' => '20 Appendices to the PBRER<span style="color:red;">*</span>'),
                            'after' => '<p class="help-block"> </p>  </div>',
                        )
                    );

                    echo $this->element('multi/aggregates', ['model' => 'Aggregate', 'group' => 'attachment', 'examples' => '']);

                    ?>
                </div>
            </div>
            <hr>

            <div class="row-fluid">
                <div class="span6">
                    <?php
                    echo $this->Form->input('reporter_name', array(
                        'div' => array('class' => 'control-group required'),
                        'label' => array('class' => 'control-label required', 'text' => 'Name of Person Reporting <span style="color:red;">*</span>'),
                    ));
                    echo $this->Form->input('reporter_email', array(
                        'type' => 'email',
                        'div' => array('class' => 'control-group required'),
                        'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>')
                    ));

                    ?>
                </div>
                <!--/span-->
                <div class="span6">
                    <?php
                    echo $this->Form->input(
                        'designation_id',
                        array('label' => array('class' => 'control-label required', 'text' => 'DESIGNATION' . ' <span style="color:red;">*</span>'), 'empty' => true)
                    );
                    echo $this->Form->input('reporter_phone', array(
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.' . ' <span style="color:red;">*</span>')
                    ));

                    echo $this->Form->input('reporter_date', array(
                        'type' => 'text', 'class' => 'date-pick-field',
                        'label' => array('class' => 'control-label required', 'text' => 'Date <span style="color:red;">*</span>'),
                    ));
                    ?>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <table class="table table-bordered  table-condensed table-pvborderless">
                <tbody>
                    <tr>
                        <td width="45%">
                            <h5 class="pull-right text-success">Is the person submitting different from reporter?&nbsp;</h5>
                        </td>
                        <td>
                            <?php
                            echo $this->Form->input('person_submitting', array(
                                'type' => 'radio',    'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'person-submit',
                                'before' => '<div class="form-inline">
												<input type="hidden" value="" id="SadrPersonSubmitting_" name="data[Aggregate][person_submitting]">
												<label class="radio">',
                                'after' => '</label>&nbsp;&nbsp;',
                                'options' => array('Yes' => 'Yes'),
                            ));
                            echo $this->Form->input('person_submitting', array(
                                'type' => 'radio',    'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'person-submit',
                                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                                'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                                'before' => '<label class="radio">', 'after' => '</label> </div>',
                                'options' => array('No' => 'No'),
                            ));
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row-fluid">
                <div class="span6">
                    <?php
                    echo $this->Form->input('reporter_name_diff', array(
                        'div' => array('class' => 'control-group required'), 'class' => 'diff',
                        'label' => array('class' => 'control-label required', 'text' => 'Name <span style="color:red;">*</span>'),
                    ));
                    echo $this->Form->input('reporter_email_diff', array(
                        'type' => 'email',
                        'div' => array('class' => 'control-group required'), 'class' => 'diff',
                        'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>')
                    ));
                    ?>
                </div>
                <!--/span-->
                <div class="span6">
                    <?php
                    echo $this->Form->input('reporter_designation_diff', array(
                        'type' => 'select', 'options' => $designations, 'empty' => true, 'class' => 'diff',
                        'label' => array('class' => 'control-label required', 'text' => 'Designation' . ' <span style="color:red;">*</span>'), 'empty' => true
                    ));
                    echo $this->Form->input('reporter_phone_diff', array(
                        'div' => array('class' => 'control-group'), 'class' => 'diff',
                        'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.' . ' <span style="color:red;">*</span>')
                    ));
                    echo $this->Form->input('reporter_date_diff', array(
                        'type' => 'text', 'class' => 'date-pick-field diff',
                        'label' => array('class' => 'control-label required', 'text' => 'Date'),
                    ));
                    ?>
                </div>
                <!--/span-->
            </div>
            <!--/row-->


        </div> <!-- /span -->
        <div class="span2">
            <div class="my-sidebar" data-spy="affix">
                <div class="awell">
                    <?php
                    echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(
                        'name' => 'saveChanges',
                        'class' => 'btn btn-success mapop',
                        'formnovalidate' => 'formnovalidate',
                        'id' => 'SadrSaveChanges', 'title' => 'Save & continue editing',
                        'data-content' => 'Save changes to form without submitting it.
	                                              The form will still be available for further editing.',
                        'div' => false,
                    ));
                    ?>
                    <br>
                    <hr>
                    <?php
                    echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit', array(
                        'name' => 'submitReport',
                        'onclick' => "return confirm('Are you sure you wish to submit the report?');",
                        'class' => 'btn btn-primary btn-block mapop',
                        'id' => 'SiteInspectionSubmitReport', 'title' => 'Save and Submit Report',
                        'data-content' => 'Submit report for peer review and approval.',
                        'div' => false,
                    ));

                    ?>
                    <br>
                    <hr>
                    <?php

                    echo $this->Html->link(
                        '<i class="fa fa-times" aria-hidden="true"></i> Cancel',
                        array('controller' => 'users', 'action' => 'dashboard'),
                        array('escape' => false, 'class' => 'btn btn-danger btn-block')
                    );
                    ?>
                </div>
            </div>
        </div>
    </div> <!-- /row -->
    <?php echo $this->Form->end(); ?>
</section> <!-- /row -->