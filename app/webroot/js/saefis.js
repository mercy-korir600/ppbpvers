$(function () {
 
	$("#toggle").on("click", function () {
		// $( "#combobox" ).toggle();
		$("#SaefiCountyId").toggle();
		console.log('toggle');
	});

	if ($('#SaefiReportType').val() == 'Followup') {
		$('#SaefiReporterEditForm :input').attr('readonly', 'readonly');
		$('.editable :input').prop('disabled', false).attr('readonly', false);

		// Open up the lab results section 
	}
	// when done typing in the county field, get the sub-counties



	//Person submitting
	$('.person-submit').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.diff:input').prop('disabled', false);
		} else {
			$('.diff:input').val('');
			$('.diff:input').prop('disabled', true);
		}
	});
	if ($("#SaefiPersonSubmittingNo").is(':checked')) { $('.diff:input').prop('disabled', true); }

	$("#SaefiComplaintOther").click(function () {
		$("#SaefiComplaintOtherSpecify").attr('disabled', !this.checked)
	});
	if ($("#SaefiComplaintOther").is(':checked')) { $("#SaefiComplaintOtherSpecify").attr('disabled', false); }

	$("#SaefiSaefiSymptoms").autocomplete({
		source: "/meddras/autocomplete.json"
	});

	$('.status_on_date').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Died') {
			$('.status_on:input').prop('disabled', false);
		} else {
			$('.status_on:input').val('');
			$('.status_on:input').prop('disabled', true);
		}
	});
	if ($("#SaefiStatusOnDateDisabled").is(':checked')) { $('.status_on:input').prop('disabled', true); }
	if ($("#SaefiStatusOnDateRecovering").is(':checked')) { $('.status_on:input').prop('disabled', true); }
	if ($("#SaefiStatusOnDateRecovered completely").is(':checked')) { $('.status_on:input').prop('disabled', true); }
	if ($("#SaefiStatusOnDateUnknown").is(':checked')) { $('.status_on:input').prop('disabled', true); }

	// SECTION B:
	$('.past_history').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.phistory:input').prop('disabled', false);
		} else {
			$('.phistory:input').val('');
			$('.phistory:input').prop('disabled', true);
		}
	});
	if ($("#SaefiPastHistoryYes").is(':checked')) { $('.phistory:input').prop('disabled', false); }
	// End

	// Start
	$('.adverse_event').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.padverse_event:input').prop('disabled', false);
		} else {
			$('.padverse_event:input').val('');
			$('.padverse_event:input').prop('disabled', true);
		}
	});
	if ($("#SaefiPastAdverseEventYes").is(':checked')) { $('.padverse_event:input').prop('disabled', false); }

	// End

	// Start
	$('.allergy_history').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pallergy_history:input').prop('disabled', false);
		} else {
			$('.pallergy_history:input').val('');
			$('.pallergy_history:input').prop('disabled', true);
		}
	});
	if ($("#SaefiAllergyHistoryYes").is(':checked')) { $('.pallergy_history:input').prop('disabled', false); }

	// End
	// Start
	$('.existing_illness').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pexisting_illness:input').prop('disabled', false);
		} else {
			$('.pexisting_illness:input').val('');
			$('.pexisting_illness:input').prop('disabled', true);
		}
	});
	if ($("#SaefiExistingIllnessYes").is(':checked')) { $('.pexisting_illness:input').prop('disabled', false); }

	// End
	// Start
	$('.comorbidity_disorder').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pcomorbidity_disorder:input').prop('disabled', false);
		} else {
			$('.pcomorbidity_disorder:input').val('');
			$('.pcomorbidity_disorder:input').prop('disabled', true);
		}
	});
	if ($("#SaefiComorbidityDisorderYes").is(':checked')) { $('.pcomorbidity_disorder:input').prop('disabled', false); }

	// End
	// Start
	$('.covid_positive').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pcovid_positive:input').prop('disabled', false);
		} else {
			$('.pcovid_positive:input').val('');
			$('.pcovid_positive:input').prop('disabled', true);
		}
	});
	if ($("#SaefiComorbidityDisorderYes").is(':checked')) { $('.pcovid_positive:input').prop('disabled', false); }

	// End 
	// Start
	$('.hospitalization_history').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.phospitalization_history:input').prop('disabled', false);
		} else {
			$('.phospitalization_history:input').val('');
			$('.phospitalization_history:input').prop('disabled', true);
		}
	});
	if ($("#SaefiHospitalizationHistoryYes").is(':checked')) { $('.phospitalization_history:input').prop('disabled', false); }

	// End   
	// Start
	$('.medication_vaccination').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pmedication_vaccination:input').prop('disabled', false);
		} else {
			$('.pmedication_vaccination:input').val('');
			$('.pmedication_vaccination:input').prop('disabled', true);
		}
	});
	if ($("#SaefiMedicationVaccinationYes").is(':checked')) { $('.pmedication_vaccination:input').prop('disabled', false); }

	// End  
	// Start
	$('.faith_healers').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pfaith_healers:input').prop('disabled', false);
		} else {
			$('.pfaith_healers:input').val('');
			$('.pfaith_healers:input').prop('disabled', true);
		}
	});
	if ($("#SaefiFaithHealersYes").is(':checked')) { $('.pfaith_healers:input').prop('disabled', false); }
	// Start
	$('.family_history').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pfamily_history:input').prop('disabled', false);
		} else {
			$('.pfamily_history:input').val('');
			$('.pfamily_history:input').prop('disabled', true);
		}
	});
	if ($("#SaefiFamilyHistoryYes").is(':checked')) { $('.pfamily_history:input').prop('disabled', false); }
	// End 
	// Start
	$('.pregnant').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.ppregnant:input').prop('disabled', false);
		} else {
			$('.ppregnant:input').val('');
			$('.ppregnant:input').prop('disabled', true);
		}
	});
	if ($("#SaefiPregnantYes").is(':checked')) { $('.ppregnant:input').prop('disabled', false); }
	// End 
	// Start
	$('.delivery_procedure').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Complication') {
			$('.pdelivery_procedure:input').prop('disabled', false);
		} else {
			$('.pdelivery_procedure:input').val('');
			$('.pdelivery_procedure:input').prop('disabled', true);
		}
	});
	if ($("#SaefiDeliveryProcedureComplication").is(':checked')) { $('.pdelivery_procedure:input').prop('disabled', false); }
	// End
	//If not serious disable criteria
	if (!$('input[name="data[Saefi][serious]"][value="Yes"]').is(':checked')) { $('input[name="data[Saefi][serious_yes]"]').attr('disabled', true).attr('checked', false); }
	$('input[name="data[Saefi][serious]"]').click(function () {
		if ($(this).val() == 'No') {
			$('input[name="data[Saefi][serious_yes]"]').attr('disabled', this.checked).attr('checked', !this.checked);
			$('#serious_yes_clear').hide();
		} else {
			$('input[name="data[Saefi][serious_yes]"]').attr('disabled', false);
			$('#serious_yes_clear').show();
		}
	});
	if ($('input[name="data[Saefi][serious]"][value="No"]').is(':checked')) { $('input[name="data[Saefi][serious_yes]"]').attr('disabled', true).attr('checked', false); }




	// Start of Section B: 
	$('.prescribing_error').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pprescribing_error:input').prop('disabled', false);
		} else {
			$('.pprescribing_error:input').val('');
			$('.pprescribing_error:input').prop('disabled', true);
		}
	});
	if ($("#SaefiPrescribingErrorYes").is(':checked')) { $('.pprescribing_error:input').prop('disabled', false); }

	// vaccine_unsterile
	$('.vaccine_unsterile').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pvaccine_unsterile:input').prop('disabled', false);
		} else {
			$('.pvaccine_unsterile:input').val('');
			$('.pvaccine_unsterile:input').prop('disabled', true);
		}
	});
	if ($("#SaefiVaccineUnsterileYes").is(':checked')) { $('.pvaccine_unsterile:input').prop('disabled', false); }
	// vaccine_condition
	$('.vaccine_condition').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pvaccine_condition:input').prop('disabled', false);
		} else {
			$('.pvaccine_condition:input').val('');
			$('.pvaccine_condition:input').prop('disabled', true);
		}
	});
	if ($("#SaefiVaccineConditionYes").is(':checked')) { $('.pvaccine_condition:input').prop('disabled', false); }
	// vaccine_reconstitution
	$('.vaccine_reconstitution').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pvaccine_reconstitution:input').prop('disabled', false);
		} else {
			$('.pvaccine_reconstitution:input').val('');
			$('.pvaccine_reconstitution:input').prop('disabled', true);
		}
	});
	if ($("#SaefiVaccineReconstitutionYes").is(':checked')) { $('.pvaccine_reconstitution:input').prop('disabled', false); }
	// vaccine_handling
	$('.vaccine_handling').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pvaccine_handling:input').prop('disabled', false);
		} else {
			$('.pvaccine_handling:input').val('');
			$('.pvaccine_handling:input').prop('disabled', true);
		}
	});
	if ($("#SaefiVaccineHandlingYes").is(':checked')) { $('.pvaccine_handling:input').prop('disabled', false); }

	// vaccine_administered
	$('.vaccine_administered').on('change', function () {
		var pilih = $(this).val();
		if (pilih == 'Yes') {
			$('.pvaccine_administered:input').prop('disabled', false);
		} else {
			$('.pvaccine_administered:input').val('');
			$('.pvaccine_administered:input').prop('disabled', true);
		}
	});
	if ($("#SaefiVaccineAdministeredYes").is(':checked')) { $('.pvaccine_administered:input').prop('disabled', false); }


	var cache2 = {}, lastXhr;
	$("#SaefiInstitutionCode").autocomplete({
		source: function (request, response) {
			var term = request.term;
			if (term in cache2) {
				response(cache2[term]);
				return;
			}

			lastXhr = $.getJSON("/facility_codes/autocomplete.json", request, function (data, status, xhr) {
				cache2[term] = data;
				if (xhr === lastXhr) {
					response(data);
				}
			});
		},
		select: function (event, ui) {
			$("#SaefiNameOfInstitution").val(ui.item.label);
			$("#SaefiInstitutionCode").val(ui.item.value);
			$("#SaefiVaccinationCenter").val(ui.item.label);
			return false;
		}
	});

	var cache3 = {}, lastXhr;
	$("#SaefiNameOfInstitution").autocomplete({
		source: function (request, response) {
			var term = request.term;
			if (term in cache3) {
				response(cache3[term]);
				return;
			}

			lastXhr = $.getJSON("/facility_codes/autocomplete.json", request, function (data, status, xhr) {
				cache3[term] = data;
				if (xhr === lastXhr) {
					response(data);
				}
			});
		},
		select: function (event, ui) {
			$("#SaefiNameOfInstitution").val(ui.item.label);
			$("#SaefiInstitutionCode").val(ui.item.value);
			$("#SaefiVaccinationCenter").val(ui.item.label);
			return false;
		}
	});

	var cache3 = {}, lastXhr;
	$("#SaefiVaccinationCenter").autocomplete({
		source: function (request, response) {
			var term = request.term;
			if (term in cache3) {
				response(cache3[term]);
				return;
			}

			lastXhr = $.getJSON("/facility_codes/autocomplete.json", request, function (data, status, xhr) {
				cache3[term] = data;
				if (xhr === lastXhr) {
					response(data);
				}
			});
		},
		select: function (event, ui) {
			$("#SaefiVaccinationCenter").val(ui.item.label);
			return false;
		}
	})
});