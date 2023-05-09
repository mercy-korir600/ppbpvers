$( function() {
    
    // $( "#SaefiCountyId" ).combobox();
	// allow typing in the combobox 
	// $( "#SaefiCountyId" ).combobox('option', 'forceSelect', false);
    $( "#toggle" ).on( "click", function() {
      // $( "#combobox" ).toggle();
      $( "#SaefiCountyId" ).toggle();
	  console.log('toggle');
    });

    if($('#SaefiReportType').val() == 'Followup') {
        $('#SaefiReporterEditForm :input').attr('readonly', 'readonly');
        $('.editable :input').prop('disabled', false).attr('readonly', false);

		// Open up the lab results section 
    }
	// when done typing in the county field, get the sub-counties
	
  

    //Person submitting
    $('.person-submit').on('change',function() {
        var pilih = $(this).val();
        if (pilih == 'Yes') {
            $('.diff:input').prop('disabled',false);
        } else {
            $('.diff:input').val('');
            $('.diff:input').prop('disabled',true);
        }
    });
    if($("#SaefiPersonSubmittingNo").is(':checked')){ $('.diff:input').prop('disabled',true); }

    $("#SaefiComplaintOther").click(function(){   
	    $("#SaefiComplaintOtherSpecify").attr('disabled', !this.checked)
	});
	if($("#SaefiComplaintOther").is(':checked')){ $("#SaefiComplaintOtherSpecify").attr('disabled', false); }

	$("#SaefiSaefiSymptoms").autocomplete({
			source: "/meddras/autocomplete.json"
	});

    $('.status_on_date').on('change',function() {
        var pilih = $(this).val();
        if (pilih == 'Died') {
            $('.status_on:input').prop('disabled',false);
        } else {
            $('.status_on:input').val('');
            $('.status_on:input').prop('disabled',true);
        }
    });
    if($("#SaefiStatusOnDateDisabled").is(':checked')){ $('.status_on:input').prop('disabled',true); }
    if($("#SaefiStatusOnDateRecovering").is(':checked')){ $('.status_on:input').prop('disabled',true); }
    if($("#SaefiStatusOnDateRecovered completely").is(':checked')){ $('.status_on:input').prop('disabled',true); }
    if($("#SaefiStatusOnDateUnknown").is(':checked')){ $('.status_on:input').prop('disabled',true); }

	//If not serious disable criteria
    if(!$('input[name="data[Saefi][serious]"][value="Yes"]').is(':checked')){ $('input[name="data[Saefi][serious_yes]"]').attr('disabled', true).attr('checked', false); }
    $('input[name="data[Saefi][serious]"]').click(function(){ 
        if ($(this).val() == 'No') {
            $('input[name="data[Saefi][serious_yes]"]').attr('disabled', this.checked).attr('checked', !this.checked);
            $('#serious_yes_clear').hide();
        } else {
            $('input[name="data[Saefi][serious_yes]"]').attr('disabled', false);
            $('#serious_yes_clear').show();
        }
    });
    if($('input[name="data[Saefi][serious]"][value="No"]').is(':checked')){ $('input[name="data[Saefi][serious_yes]"]').attr('disabled', true).attr('checked', false); }
	
    var cache2 = {},	lastXhr;
	$( "#SaefiInstitutionCode" ).autocomplete({
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache2 ) {
				response( cache2[ term ] );
				return;
			}

			lastXhr = $.getJSON( "/facility_codes/autocomplete.json", request, function( data, status, xhr ) {
				cache2[ term ] = data;
				if ( xhr === lastXhr ) {
					response( data );
				}
			});
		},
		select: function( event, ui ) {
			$( "#SaefiNameOfInstitution" ).val( ui.item.label );
			$( "#SaefiInstitutionCode" ).val( ui.item.value );
			$( "#SaefiVaccinationCenter" ).val( ui.item.label );
			return false;
		}
	});

	var cache3 = {},	lastXhr;
	$( "#SaefiNameOfInstitution" ).autocomplete({
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache3 ) {
				response( cache3[ term ] );
				return;
			}

			lastXhr = $.getJSON( "/facility_codes/autocomplete.json", request, function( data, status, xhr ) {
				cache3[ term ] = data;
				if ( xhr === lastXhr ) {
					response( data );
				}
			});
		},
		select: function( event, ui ) {
			$( "#SaefiNameOfInstitution" ).val( ui.item.label );
			$( "#SaefiInstitutionCode" ).val( ui.item.value );
      		$( "#SaefiVaccinationCenter" ).val( ui.item.label );
			return false;
		}
	});

	var cache3 = {},	lastXhr;
	$( "#SaefiVaccinationCenter" ).autocomplete({
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache3 ) {
				response( cache3[ term ] );
				return;
			}

			lastXhr = $.getJSON( "/facility_codes/autocomplete.json", request, function( data, status, xhr ) {
				cache3[ term ] = data;
				if ( xhr === lastXhr ) {
					response( data );
				}
			});
		},
		select: function( event, ui ) {
      		$( "#SaefiVaccinationCenter" ).val( ui.item.label );
			return false;
		}
	})
  });