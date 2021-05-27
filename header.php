<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        wp_head();
        $post = get_post();
        $events_archive_page = get_page_by_path( 'custom_event' );
        $events_archive_id = $events_archive_page->ID;
    ?>

</head>
<body>

<!-- cover content div, without it the background breaks/is non-existant -->
<div class="cover-bg">
    <!-- page cover -->
    <div class="cover mobile-container">
    
            <div class="cover_note">
                <p>Tee ise</p>

                <div class="cover_ribbon">
                    <div class="cover_ribbon-down"></div>
                </div>
            </div>

            <div class="cover_text">
                <p class="cover_title">
                    <span class="cover_title-transform">IMELINE</span>Ajalugu
                </p>

                <p class="cover_paragraph">
                    <?php
                        $front_page_id = get_option('page_on_front');
                        $front_page_query = new WP_Query( 'page_id='.$front_page_id );
                        $events_archive_query = new WP_Query( 'page_id='.$events_archive_id );
                        
                        if ( is_archive($events_archive_id) ) {
                            while ($events_archive_query -> have_posts()) : $events_archive_query -> the_post(); 
                    the_field('cover_paragraph');
                            endwhile;
                        } else {
                            while ($front_page_query -> have_posts()) : $front_page_query -> the_post(); 
                    the_field('cover_paragraph');
                            endwhile;
                        }
                    ?>
                </p>
            </div>

            <div class="cover_anchor">
            <?php


            if ( is_page($front_page_id) || is_archive($events_archive_id) ) {
                echo '
                <a id="gotoAccordionAnchor">
                    <p><img class="cover_anchor-arrow" src="'.get_template_directory_uri().'/assets/imgs/goto_arrow_down.png">
                        '.get_field('cover_anchor').'
                    </p>
                </a>
                    ';
            }
            ?>
            </div>
    </div>
</div>