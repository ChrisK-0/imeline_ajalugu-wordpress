<?php
    get_header();
?>

<!-- Site content -->
<div class="contents">

    <!-- Accordion heading -->
    <div class="intro" id="accordionTitle">
        <h2 class="intro_title">
            <?=
                get_field('intro_title');
            ?>     
        </h2>

        <p class="intro_text">
            <?=
                get_field('intro_text');
            ?>                
        </p>
    </div>
    
    <div class="accordion_container" id="accordion_container">

<?php
    // accordion per page limiter
    $accordions_per_page = get_field('accordions_per_page');

    // getting category names
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $term_args = array(
        'taxonomy'   => 'categories',
        'hide_empty' => true,
        'post_status' => 'publish',
        'orderby' => 'name',
        'order' => 'ASC',
        );
    
    $terms = new WP_Term_Query($term_args);    

    // give accordion a number for uniqueness
    $accordion_number = 0;

    $current_accordion_number = 0;
    $published_categories = count( $terms->get_terms() );

foreach( $terms->get_terms() as $term ) {
    // create array for events
    $custom_events_posts = new WP_Query(
        array(
            'post_type' => 'custom_event',
            'orderby' => 'name',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'categories',
                    'field' => 'slug',
                    'terms' => $term,
                )
            )
        )
    );

    if( $custom_events_posts->have_posts() ) {
        // give panels numbers for uniqueness
        $event_label_number = 0;

        echo '
    <button class="accordion">
        <span class="accordion_header">
                '.$term->name.'
        </span>

        <span class="accordion_counter"><span class="accordion_counter">0</span> / 3</span>
    </button>

    <div class="panel">
            '; // end echo


        while($custom_events_posts->have_posts()) : 
            $custom_events_posts->the_post();

            $next_post = get_next_post();
            $prev_post = get_previous_post();

            // filter get_the_content, so it doesnt add extra <p> tags
            $content_to_strip = get_the_content();
            $stripped_content = wp_strip_all_tags($content_to_strip);

            // separate labels for each checkbox inside the div with class "panel"
            echo '  
        <label class="panel_content" for="accordion-'.$accordion_number.'_panel-'.$event_label_number.'">
            <input type="checkbox" class="panel_input" id="accordion-'.$accordion_number.'_panel-'.$event_label_number.'">
            <span class="checkmark-custom"></span>
                    '; // end echo
                if ( get_field("event_image") ) {
                    echo '
            <div class="panel_img">
                <img src="'.get_field("event_image").'">
            </div>
                    '; // end echo
                }
                echo '
            <div class="panel_text">
                <a class="panel_title" href="'.get_page_uri($post).'">
                    '.get_the_title().'
                </a>

                <p class="panel_description">
                    '.$stripped_content.'
                </p>
            </div>
        </label>
                '; // end echo
            $event_label_number++;

        endwhile; 
        $accordion_number++;

        if ( $accordion_number != $published_categories && $accordion_number != $accordions_per_page ) {
            echo '
        <div class="panel_next">
            <button class="next_theme">Järgmine teema</button>
        </div>
                '; // end echo
        }

        echo '</div>'; // ends the div with class panel, which holds all the labels for an accordion

    }; // END IF

    wp_reset_postdata();

    // increment current accordion number by 1 for each category loop
    $current_accordion_number++;
    // if current accordion number is equal to manually set accordions per page, then break the foreach category loop
    if ($current_accordion_number == $accordions_per_page ) {
        break;
    }
} // END TERMS FOREACH

?>

    </div><!-- accordion_container div ending -->

    <!-- Link to the accordion archive page -->
    <div class="page_view">
        <a class="page_view-all" href="<?php echo get_post_type_archive_link( 'custom_event' ); ?>">Vaata kõiki</a>
        <?php 
            // add more acccordions button not included when all accordions are already displayed
            if ( $accordions_per_page != 0 ) {
                echo '
                <!-- Add extra accordions -->
                <button id="add_accordion_ajax" class="page_view-all">Lisa akkordion</button>
                    '; // end echo
            }
        ?>
    </div>

<!-- Valmis! button div-->
    <div class="btn-wrapper">
        <input type="button" id="doneButton" value="Valmis!" class="btn btn-disabled" disabled>
    </div>

<?php 
    get_footer();
?>