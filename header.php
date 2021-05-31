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
                        $front_page_id = get_option('page_on_front');

                        if ( event_archive()['is_archive'] ) {
                    the_field('cover_paragraph', event_archive()['id'] );
                        } elseif ( is_front_page() ) {
                    the_field('cover_paragraph', $front_page_id );
                        }
                    ?>
                </p>
            </div>
            <div class="cover_anchor">
            <?php
            if ( is_page($front_page_id) xor event_archive()['is_archive'] ) {
                echo '
                <a id="gotoAccordionAnchor">
                    <p><img class="cover_anchor-arrow" src="'.get_template_directory_uri().'/assets/imgs/goto_arrow_down.png">
                        ';
                echo ( event_archive()['is_archive']) ? the_field('anchor_text', event_archive()['id']) : the_field('anchor_text');
                echo '
                    </p>
                </a>
                    ';
            } 
            ?>
            </div>
    </div>
</div>