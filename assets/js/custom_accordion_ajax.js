var phpThemeAssets = object_name.phpThemeAssets;

function addAccordion() {
    // jQuery('.accordion_container').load( phpThemeAssets +'accordion_adder.php');
    var AccordionAdder = jQuery('.accordion_container').load( phpThemeAssets +'accordion_adder.php');
    jQuery('.accordion_container').append( AccordionAdder );
};

jQuery(document).ready(function() {

    jQuery.ajax({ type: "GET",   
        url: phpThemeAssets+'accordion_adder.php',   
        success : function(load_custom_events) {
            // jQuery('.accordion_container').append(addAccordion());
            jQuery('.accordion_container').append( load_custom_events );
        }
    });
});