jQuery(document).ready(function() {
    jQuery('#img-circle').fadeIn(4000);

    var changeTooltipPosition = function(event) {
      var tooltipX = event.pageX - 210;
      var tooltipY = event.pageY - 15;
      jQuery('div.tooltip').css({top: tooltipY, left: tooltipX});
    };

    var showTooltip = function(event) {
      jQuery('div.tooltip').remove();
      jQuery('<div class="tooltip">¿Necesitas Ayuda? </div>')
            .appendTo('body');
      changeTooltipPosition(event);
    };

    var hideTooltip = function() {
       jQuery('div.tooltip').remove();
    };


    jQuery("#img-circle").bind({
       mousemove : changeTooltipPosition,
       mouseenter : showTooltip,
       mouseleave: hideTooltip,
       
    });


    //Function to associate event to the bubble
    jQuery(function() {
        jQuery('#img-circle').click(function() {
            alert("Dibujar Chat");
        });
    });
});






