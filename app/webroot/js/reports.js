$(document).ready(function () {
    $("#ReportReportTitle").autocomplete({
        source: "/meddras/autocomplete.json"
    });
    $("#ReportSuspectedDrug").autocomplete({
        source: "/drug_dictionaries/autocomplete.json"
    });
    $("#ReportVaccine").autocomplete({
        source: "/vaccines/autocomplete.json"
    });
    var cache3 = {}, lastXhr;
    $("#ReportCompanyName").autocomplete({
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
            $("#ReportCompanyName").val(ui.item.label); 
            return false;
        }
    });
});