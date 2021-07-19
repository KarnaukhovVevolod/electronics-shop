

$(function(){
    $("#slider-range1").slider({
        range: true,
        min: 0,
        step: 100,
        max: 1000000,
        values: [400, 550000],
        slide: function( event, ui ){
            $("#amount").val("$" + ui.values[0] + "- $" + ui.values[1]);
            $('#price_min').val(ui.values[0]);
            $('#price_max').val(ui.values[1]);
        }
    });
    
    $('#price_min').val($('#slider-range1').slider("values",0));
    $('#price_max').val($('#slider-range1').slider("values",1));
    
});





