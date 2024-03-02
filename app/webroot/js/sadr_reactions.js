$(function() {
    // Multi Drugs Handling
    $("#addSadrReaction").on("click", addSadrReactions);
    $(document).on('click', '.removeSadrReaction', removeSadrReaction);
    
    

    // Multi Drugs Handling
    function addSadrReactions() {
        var se = $("#sadr-reactions .sadr-reaction-group").last().find('button').attr('id');
        if ( typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('sadr_reactionsButton', '')) + 1;
        } else {
            intId = 1;
        }
        if ($("#sadr-reactions .sadr-reaction-group").length < 9) {
            var new_SadrReaction = $('<div class="sadr-reaction-group">\
                <div class="row-fluid">\
                    <div class="span8">\
                      <input type="hidden" name="data[SadrReaction][{i}][id]" class="" id="SadrReaction{i}Id">\
                      <div class="control-group">\
                        <div class="controls"><input type="text" name="data[SadrReaction][{i}][reaction]" class="span8 reaction" id="SadrReaction{i}Reaction"></div>\
                      </div>\
                    </div>\
                    <div class="row-fluid">\
                      <div class="span12">\
                        <div class="controls"><button type="button" id="sadr_reactionsButton{i}" class="btn btn-small btn-danger removeSadrReaction"><i class="icon-trash"></i> Remove Reaction</button></div> \
                      </div>\
                    </div>\
                </div>\
              </div>\
            </div>'.replace(/{i}/g, intId)); 
            $("#sadr-reactions").append(new_SadrReaction);
            $('.reaction').autocomplete({
                source: "/meddras/autocomplete.json"
            });
        } else {
            alert("Sorry, cant add more than "+$("#sadr-reactions .sadr-reaction-group").length+" descriptions!");
        }

    }
 
    function removeSadrReaction() {
        intId = parseFloat($(this).attr('id').replace('sadr_reactionsButton', ''));
        
        var inputVal = $('#SadrReaction'+ intId +'Id').val();
        if (inputVal) {
          
            $.ajax({
                type:'POST',
                url:'/sadr_reactions/delete/'+inputVal+'.json',
                data:{'id': inputVal},
                success : function(data) {
                    // console.log(data);
                }
            });
        }
        $(this).closest('div.sadr-reaction-group').remove();
    }
});
