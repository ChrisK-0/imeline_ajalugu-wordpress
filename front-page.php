    <?php
        get_header();
    ?>

        <!-- Accordion content -->

        <?php // create array for events
$custom_events_posts = new WP_Query(
    array(
        'post_type' => 'custom_event',
        'posts_per_page' => 4,
        'orderby' => 'rand',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'categories',
                'field' => 'slug',
                'terms' => 'japan-wars'
            )
        )
    )
);
?>



<?php 
    $eventAccordionNumber = 0;
    
    if($custom_events_posts->have_posts()) : 
        $eventPanelNumber = 0;
    
?>

<button class="accordion">
            <span class="accordion_header">
                <?php
                    get_terms();
                ?>
            </span>
            <span class="accordion_counter"><span class="accordion_counter">0</span> / 3</span>
</button>

    <div class="panel">
    <?php while($custom_events_posts->have_posts()) : $custom_events_posts->the_post(); ?>

        <?php // separate labels for each checkbox inside the div with class "panel"
    
            echo '  <label class="panel_content" for="acc_'.$eventAccordionNumber.'_nr'.$eventPanelNumber.'">
                    <input type="checkbox" class="panel_input" id="acc_'.$eventAccordionNumber.'_nr'.$eventPanelNumber.'">
                    <span class="checkmark"></span>

                    <div class="panel_img">
                        <img src="/wp-content/themes/imeline_ajalugu/assets/imgs/Layer 26.png">
                    </div>

                    <div class="panel_text">
                        <p class="panel_title">'.the_title().'</p>
                        <p class="panel_description">
                            '.the_content().'
                        </p>
                    </div>
            '; // end of echo
    
        $eventPanelNumber++;
        ?>
        
    <?php 
        endwhile; 
        $eventAccordionNumber++;
    ?>
    </div>
<?php endif; wp_reset_postdata(); ?>


            <!-- Valmis! button div-->
            <div class="btn-wrapper">
                <input type="button" id="doneButton" value="Valmis!" class="btn btn-disabled" disabled>
            </div>

    <?php 
        get_footer();
    ?>