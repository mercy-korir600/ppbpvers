$(function () {

    if ($('#AefiCategory').val() == 'country') {
        $('.diff:input, .sub:input, .ward:input').prop('disabled', true);
    } else if ($('#AefiCategory').val() == 'county') {
        $('.diff:input, .sub:input, .ward:input').prop('disabled', true);
        $('.diff:input').prop('disabled', false);
    } else if ($('#AefiCategory').val() == 'ward') {
        $('.diff:input, .sub:input, .ward:input').prop('disabled', true);
        $('.diff:input, .sub:input').prop('disabled', false);
    } else if ($('#AefiCategory').val() == 'facility') { 
        $('.diff:input, .sub:input, .ward:input').prop('disabled', false);
    } else {

        $('.diff:input').prop('disabled', false);

    }
    $('.category').on('change', function () {
        var value = $(this).val();
        var disableAll = function () {
            $('.diff:input, .sub:input, .ward:input').val('').prop('disabled', true);
        };

        if (value == 'country') {
            disableAll();
        } else if (value == 'county') {
            disableAll();
            $('.diff:input').prop('disabled', false);
        } else if (value == 'ward') {
            disableAll();
            $('.diff:input, .sub:input').prop('disabled', false);
        } else if (value == 'facility') {
            $('.diff:input, .sub:input, .ward:input').prop('disabled', false);
        } else {
            $('.diff:input').prop('disabled', false);
        }
    });
    //Load Sub Counties
    $('#AefiCounty').change(function () {
        var county_id = $(this).val();

        $.ajax({
            url: '/sub_counties/constituency/' + county_id + '.json',
            success: function (data) {

                // get the select element
                var select = $('#AefiSubCounty');
                // clear the select
                select.empty();
                // add the options
                $.each(data, function (key, value) {
                    select.append('<option value=' + key + '>' + value + '</option>');
                }
                );
            }
        });
    });

    // Load Wards

    $('#AefiSubCounty').change(function () {
        var county_id = $(this).val();
        var selectedOption = $(this).find("option:selected");
        var county_id = selectedOption.val();
        var county_label = selectedOption.text();

        $.ajax({
            url: '/facility_codes/wards/' + county_label + '.json',
            success: function (data) {
                console.log(data);
                // get the select element
                var select = $('#AefiWard');
                // clear the select
                select.empty();
                // add the options
                $.each(data, function (index, item) {
                    select.append('<option value="' + item['ward'] + '">' + item['ward'] + '</option>');
                });
 
            }
        });
    });

});
