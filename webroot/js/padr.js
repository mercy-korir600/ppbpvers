$(document).ready(function () {

  // County Operations:

  $('.county').on('change', function () {
    var selectedCounty = $(this).val();
    console.log('selected county **** ' + selectedCounty);
    var subCountySelect = $('.sub_county');
    subCountySelect.empty();
    $.ajax({
      url: '/api/subCounties/autocomplete.json', // Replace with your API endpoint
      type: 'GET',
      data: { county: selectedCounty },
      success: function (response) {
        console.log(response);
        // Assuming the response is an array of sub-counties 
        if (Array.isArray(response.codes)) {
          $.each(response.codes, function (index, subCounty) {
            console.log(subCounty);
            subCountySelect.append(
              $('<option></option>').val(subCounty.id).text(subCounty.name)
            );
          });
        }
      },
      error: function (xhr, status, error) {
        console.error('Error fetching sub-counties:', error);
        subCountySelect.append('<option value="">Error loading sub-counties</option>');
      }
    });

  });

  var dates2 = $('.date-pick-from, .date-pick-to').datepicker({
    minDate: "-100Y", maxDate: "-0D",
    dateFormat: 'dd-mm-yy',
    showButtonPanel: true,
    changeMonth: true,
    changeYear: true,
    showAnim: 'show'
  });

  $('.date-pick-field').datepicker({
    minDate: "-100Y",
    dateFormat: 'dd-mm-yy'
  });

  //If SADR disable PQHPT and vice versa
  $('.pqmp').hide();
  $('.sadr').hide();
  $('.end').hide();
  $('input[name="reaction_on"]').click(function () {
    if ($(this).val() == 'No') {
     
      $('.end').show("slow");
    } else { 
      $('.end').hide();
    }
  });
  $('input[name="report_sadr"]').click(function () {
    if ($(this).val() == 'Side Effects') {
      $('.pqmp').hide();
      $('.sadr').show("slow");
    } else {
      $('.pqmp').show("slow");
      $('.sadr').hide();
    }
  });
  if ($('input[name="report_sadr"][value="Side Effects"]').is(':checked')) {
    $('.pqmp').hide(); $('.sadr').show("slow");
  }
  if ($('input[name="report_sadr"][value="Poor Quality Medicine"]').is(':checked')) {
    $('.sadr').hide(); $('.pqmp').show("slow");
  }
  $('input[name="reaction_on"]').click(function () {
    if ($(this).val() == 'Yes') {
      $('input[name="outcome"]:first').attr('disabled', this.checked).attr('checked', !this.checked);
    } else {
      $('input[name="outcome"]').attr('disabled', false);
    }
  });

  if ($('input[name="reaction_on"][value="Yes"]').is(':checked')) {
    $('input[name="outcome"]:first').attr('disabled', this.checked).attr('checked', !this.checked);
  }
});
