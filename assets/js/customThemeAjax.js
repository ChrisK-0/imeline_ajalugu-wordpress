// next theme checker
function createNextThemeBtn() {
    // const if ajax cant get it
    const accordionPanel = document.getElementsByClassName('panel');
  
    const panelDivLength = accordionPanel.length;
    const panelDivLast = panelDivLength-1;
    const panelThemeBtnDiv = document.getElementsByClassName('panel_next');

    // if statement to see if there even is any currently active accordion
    if ( accordionPanel ) {
        for ( let i=0; i<panelDivLength; i++ ) {
    
        // if is last or already contains panel_next and btn
        if ( i == panelDivLast || accordionPanel[i].lastElementChild.contains(panelThemeBtnDiv[i]) ) {
            // continue - avoid adding next_theme button
            continue;
        } else {
            // create next theme parts (const)

             // create panel_next
            const createNextDiv = document.createElement("DIV");
            createNextDiv.className = 'panel_next';
            const createNextBtn = document.createElement("BUTTON");
            createNextBtn.className = 'next_theme';
            createNextBtn.innerHTML = 'Järgmine teema';
            createNextDiv.appendChild(createNextBtn);
    
            // append to current panel
            accordionPanel[i].appendChild(createNextDiv); 
    
        }
        } // for end
    }
} // function end


jQuery(document).ready(function() {
    jQuery.ajax({
        type: 'POST',
        url: frontend_ajax_object.ajaxurl,
        dataType: "html",
        data: { action : 'get_ajax_posts' },
        success: function( response ) {

            jQuery('#add_accordion_ajax').click(function() {
                jQuery( response ).appendTo('.accordion_container');

                // run next theme re-work function after 
                createNextThemeBtn();
            })
        },
    });
});
