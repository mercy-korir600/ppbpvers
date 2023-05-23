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
});