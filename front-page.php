<?php
    get_header();
?>





<!-- Accordion content + accordion generator -->
<?php 
    // getting category names
    $terms = get_terms( array(
        'taxonomy'   => 'categories', // Swap in your custom taxonomy name
        'hide_empty' => true, 
));

// give accordion a number for uniqueness
$eventAccordionNumber = 0;

foreach( $terms as $term ) {
        // create array for events
        $custom_events_posts = new WP_Query(
            array(
                'post_type' => 'custom_event',
                'orderby' => 'rand',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categories',
                        'field' => 'slug',
                        'terms' => $term
                    )
                )
            )
        );




    
    if($custom_events_posts->have_posts()) {
        // give panels numbers for uniqueness
        $eventPanelNumber = 0;

        echo '
            <button class="accordion">
                <span class="accordion_header">
                        '.$term->name.'
                </span>
                <span class="accordion_counter"><span class="accordion_counter">0</span> / 3</span>
            </button>

            <div class="panel">
            '; // end echo

        while($custom_events_posts->have_posts()) : $custom_events_posts->the_post();
            // separate labels for each checkbox inside the div with class "panel"

            echo '  
                <label class="panel_content" for="acc_'.$eventAccordionNumber.'_nr'.$eventPanelNumber.'">
                <input type="checkbox" class="panel_input" id="acc_'.$eventAccordionNumber.'_nr'.$eventPanelNumber.'">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="'.get_template_directory_uri().'/assets/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">'.get_the_title().'</p>
                    <p class="panel_description">
                        '.get_the_content().'
                    </p>
                </div>
                </label>
                '; // end of echo
            $eventPanelNumber++;

        endwhile; 
        $eventAccordionNumber++;
        
        echo '</div>'; // ends the div with class panel, which holds all the labels for an accordion

    }; 
    wp_reset_query(); 







} // END TERMS FOREACH


?>
    <!-- Valmis! button div-->
    <div class="btn-wrapper">
        <input type="button" id="doneButton" value="Valmis!" class="btn btn-disabled" disabled>
    </div>

<?php 
    get_footer();
?>