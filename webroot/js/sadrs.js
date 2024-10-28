$(document).ready(function () {
    $('#report-title').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: '/Meddras/autocomplete.json', // Replace with your API endpoint
                data: {
                    term: request.term // Pass the input value to the API
                },
                success: function (data) {
                    response($.map(data.codes, function (item) {
                        return {
                            label: item.label, // Display name in the dropdown
                            value: item.value,
                        };
                    }));
                }
            });
        },
        minLength: 2, // Start searching after 2 characters
        select: function (event, ui) {
            console.log(ui.item);
            // $("#report-title").val(ui.item.label); 
        }
    });

    $('#reaction').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: '/Meddras/autocomplete.json', // Replace with your API endpoint
                data: {
                    term: request.term // Pass the input value to the API
                },
                success: function (data) {
                    response($.map(data.codes, function (item) {
                        return {
                            label: item.label, // Display name in the dropdown
                            value: item.value,
                        };
                    }));
                }
            });
        },
        minLength: 2, // Start searching after 2 characters
        select: function (event, ui) {
            console.log(ui.item);
            // $("#report-title").val(ui.item.label); 
        }
    });
    $('#institution-code').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: '/api/facilityCodes/autocomplete.json', // Replace with your API endpoint
                data: {
                    term: request.term // Pass the input value to the API
                },
                success: function (data) {
                    response($.map(data.codes, function (item) {

                        return {
                            label: item.label, // Display name in the dropdown
                            value: item.value, // Use code as the input value
                            addr: item.addr,
                            phone: item.phone
                        };
                    }));
                }
            });
        },
        minLength: 2, // Start searching after 2 characters
        select: function (event, ui) {
            console.log(ui.item);
            $("#name-of-institution").val(ui.item.label);
            $("#institution-code").val(ui.item.value);
            $("#address").val(ui.item.addr);
            $("#institution-contact").val(ui.item.phone);
        }
    });
    var defaultSubCountyId = $('#defaultSubCountyId').text().trim(); // Get default ID from <p> tag
    if (defaultSubCountyId != "") {
        console.log('selected sub county ');
        console.log(defaultSubCountyId);
        var subCountySelect = $('.sub_county');
        subCountySelect.empty();
        $.ajax({
            url: '/api/subCounties/single.json', // Replace with your API endpoint
            type: 'GET',
            data: { county: defaultSubCountyId },
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
    }

    $('#date-of-birth,#date-of-onset-of-reaction').datepicker({
        minDate: "-100Y", maxDate: "-0D",
        dateFormat: 'dd-mm-yy',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        showAnim: 'show'
    });


    if ($('input[name="gender"]:checked').val() === "Male") {
        $(".pregnancy_status").attr("disabled", "disabled");
        $(".pregnancy_status").prop("checked", false);
    }

    $(".gender").on("click", function () {
        var selectedValue = $('input[name="gender"]:checked').val();
        // Disable all elements with the class 'pregnancy_status'
        $(".pregnancy_status").attr("disabled", "disabled");
        $(".pregnancy_status").prop("checked", false);

        // Conditionally enable based on selected value
        if (selectedValue === "Female" || selectedValue === "Unknown") {
            $(".pregnancy_status").removeAttr("disabled");
        }
    });

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


    $("#SadrCountyId").combobox();

    if ($("#SadrReportType").val() == "Followup") {
        $("#SadrReporterEditForm :input").attr("readonly", "readonly");
        $(".editable :input").prop("disabled", false).attr("readonly", false);
        if ($("#SadrSeriousYes").is(":checked")) {
            console.log("Yes was selected initially");
            $("#SadrSeriousNo").prop("disabled", true); // disable the "No" option
            $("#clearButton").prop("disabled", true);
        }

        // Handle the scale for severity
        if ($("#SadrSeverityMild").is(":checked")) {
            $("#SadrSeverityMild").prop("disabled", false);
            $("#SadrSeverityModerate").prop("disabled", false);
            $("#SadrSeveritySevere").prop("disabled", false);
            $("#SadrSeverityFatal").prop("disabled", false);
            $("#SadrSeverityUnknown").prop("disabled", true);
        }
        if ($("#SadrSeverityModerate").is(":checked")) {
            $("#SadrSeverityMild").prop("disabled", true);
            $("#SadrSeverityModerate").prop("disabled", false);
            $("#SadrSeveritySevere").prop("disabled", false);
            $("#SadrSeverityFatal").prop("disabled", false);
            $("#SadrSeverityUnknown").prop("disabled", true);
        }
        if ($("#SadrSeveritySevere").is(":checked")) {
            $("#SadrSeverityMild").prop("disabled", true);
            $("#SadrSeverityModerate").prop("disabled", true);
            $("#SadrSeveritySevere").prop("disabled", false);
            $("#SadrSeverityFatal").prop("disabled", false);
            $("#SadrSeverityUnknown").prop("disabled", true);
        }
        if ($("#SadrSeverityFatal").is(":checked")) {
            $("#SadrSeverityMild").prop("disabled", true);
            $("#SadrSeverityModerate").prop("disabled", true);
            $("#SadrSeveritySevere").prop("disabled", true);
            $("#SadrSeverityFatal").prop("disabled", false);
            $("#SadrSeverityUnknown").prop("disabled", true);
        }
        if ($("#SadrSeverityUnknown").is(":checked")) {
            $("#SadrSeverityMild").prop("disabled", false);
            $("#SadrSeverityModerate").prop("disabled", false);
            $("#SadrSeveritySevere").prop("disabled", false);
            $("#SadrSeverityFatal").prop("disabled", false);
            $("#SadrSeverityUnknown").prop("disabled", false);
        }
    }

    //Person submitting
    $(".person-submit").on("change", function () {
        var pilih = $(this).val();
        if (pilih == "Yes") {
            $(".diff:input").prop("disabled", false);
        } else {
            $(".diff:input").val("");
            $(".diff:input").prop("disabled", true);
        }
    });
    if ($(".PersonSubmittingNo").is(":checked")) {
        $(".diff:input").prop("disabled", true);
    }

    $('.date-pick-field').datepicker({
        dateFormat: 'yy-mm-dd', // Adjust the format as per your requirement
        changeMonth: true,
        changeYear: true,
        minDate: "-100Y",
        maxDate: "-0D",
    });
 
    $("#SadrReaction").autocomplete({
        source: "/meddras/autocomplete.json",
    });

    // get the id of Sadr_medicinal_product_
    $("#SadrMedicinalProduct").change(function () {
        $("#SadrHerbalProduct").attr("checked", false);
        $("#SadrCosmeceuticals").attr("checked", false);
        $("#SadrProductOther").attr("checked", false);
    });
    // get the Sadr_herbal_product_
    $("#SadrHerbalProduct").change(function () {
        $("#SadrMedicinalProduct").attr("checked", false);
        $("#SadrCosmeceuticals").attr("checked", false);
        $("#SadrProductOther").attr("checked", false);
    });
    // Sadr_cosmeceuticals_
    $("#SadrCosmeceuticals").change(function () {
        $("#SadrHerbalProduct").attr("checked", false);
        $("#SadrMedicinalProduct").attr("checked", false);
        $("#SadrProductOther").attr("checked", false);
    });
    // Sadr_product_other_
    $("#SadrProductOther").change(function () {
        $("#SadrHerbalProduct").attr("checked", false);
        $("#SadrCosmeceuticals").attr("checked", false);
        $("#SadrMedicinalProduct").attr("checked", false);
    });

    $("#SadrReactionReaction").autocomplete({
        source: "/meddras/autocomplete.json",
    });
});
