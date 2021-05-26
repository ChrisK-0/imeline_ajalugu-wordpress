<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        wp_head();
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
                        $the_query = new WP_Query( 'page_id=7' );
                        while ($the_query -> have_posts()) : $the_query -> the_post(); 
                            the_field('cover_paragraph');
                        endwhile;
                    ?>
                </p>
            </div>

            <?php 
            if ( get_field('cover_anchor') ) {
                echo '
            <div class="cover_anchor">
                <a id="gotoAccordionAnchor">
                    <p><img class="cover_anchor-arrow" src="'.get_template_directory_uri().'/assets/imgs/goto_arrow_down.png">
                        '.get_field('cover_anchor').'
                    </p>
                </a>
            </div>
                    ';
            } else {
                echo '
            <div class="cover_anchor">
            </div>
                    ';
            }
            ?>
    </div>
</div>