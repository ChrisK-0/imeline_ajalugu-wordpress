jQuery(document).ready(function() {
    jQuery.ajax({
        type: 'POST',
        url: frontend_ajax_object.ajaxurl,
        dataType: "html", // add data type
        data: { action : 'get_ajax_posts' },
        success: function( response ) {
            
            jQuery('#add_accordion_ajax').click(function() {

                jQuery( response ).appendTo('.accordion_container');
            })

        }
    });
});

                // console.log( response );
                //jQuery( '.accordion_container' ).html( response ); // frontend_ajax_object.accordionadderurl