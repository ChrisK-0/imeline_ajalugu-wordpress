<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- MAIN CSS -->
    <!-- 
        <link rel="stylesheet" href="main.css">
    -->
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
                        the_field('cover_paragraph');
                    ?>
                </p>

            </div>

            <div class="cover_anchor">
                <a id="gotoAccordionAnchor">
                    <p><img class="cover_anchor-arrow" src="../assets/imgs/goto_arrow_down.png">

                        <?php
                            the_field('cover_anchor');
                        ?>

                    </p>
                </a>
            </div>
    </div>
</div>

<!-- Site content -->
<div class="contents">

    <!-- Accordion heading -->
    <div class="intro" id="accordionTitle">
        <h2 class="intro_title">
            <?php
                the_field('intro_title');
            ?>     
        </h2>
        <p class="intro_text">
            <?php
                the_field('intro_text');
            ?>                
        </p>
    </div>

