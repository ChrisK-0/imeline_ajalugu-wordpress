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

    // total amount of taxonomies in array
    $total_of_event_categories = count($terms);

    // give accordion a number for uniqueness
    $eventAccordionNumber = 0;



    // accordion per page limiter
    $current_accordion_number = 0;
    $accordions_per_page = get_field('accordions_per_page');


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




    
    if( $custom_events_posts->have_posts() ) {
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

            // filter get_the_content, so it doesnt add extra <p> tags
            $to_strip = get_the_content();
            $stripped_content = strip_tags($to_strip);

            if ( get_field("event_image") ) {
                $custom_event_image = '
                                            <div class="panel_img">
                                                <img src="'.get_field("event_image").'">
                                            </div>
                                            
                                            '; // end echo
            } else {
                $custom_event_image = '

                                            '; // end echo
            }

            echo '  
                <label class="panel_content" for="accordion-'.$eventAccordionNumber.'_panel-'.$eventPanelNumber.'">
                <input type="checkbox" class="panel_input" id="accordion-'.$eventAccordionNumber.'_panel-'.$eventPanelNumber.'">

                    <span class="checkmark-custom"></span>

                
                '.$custom_event_image.'

                <div class="panel_text">
                    <p class="panel_title">
                        '.get_the_title().'
                    </p>
                    <p class="panel_description">
                        '.$stripped_content.'
                    </p>
                </div>
                </label>
                '; // end echo
            $eventPanelNumber++;

        endwhile; 
        $eventAccordionNumber++;
        
        if ( $eventAccordionNumber != $total_of_event_categories ) {
            echo '
                <div class="panel_next">
                    <button class="next_theme">Järgmine teema</button>
                </div>    
                '; // end echo
        }

        echo '</div>'; // ends the div with class panel, which holds all the labels for an accordion

    }; // END IF

    wp_reset_query();


    // increment current accordion number by 1 for each category loop
    $current_accordion_number++;
    // if current accordion number is equal to manually set accordions per page, then break the foreach category loop
    if ($current_accordion_number == $accordions_per_page) {
        break;
    }
} // END TERMS FOREACH


?>
    <!-- Valmis! button div-->
    <div class="btn-wrapper">
        <input type="button" id="doneButton" value="Valmis!" class="btn btn-disabled" disabled>
    </div>

<?php 
    get_footer();
?>