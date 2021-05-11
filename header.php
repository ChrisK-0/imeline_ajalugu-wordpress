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
                    Vali nende põnevate lugude seast välja enda lemmikud.
                    Sinu ja teiste lugejate soovide põhjal paneme kokku ajakirja novembri numbri.
                    Nii sünnib Eesti esimene lugejate poolt kokku pandud ajakiri, mille Sina võid saada endale
                    tasuta!
                </p>
            </div>

            <div class="cover_anchor">
                <a id="gotoAccordionAnchor">
                    <p><img class="cover_anchor-arrow" src="wp-content/themes/imeline_ajalugu/src/imgs/goto_arrow_down.png">Vali oma lemmikartiklid</p>
                </a>
            </div>
    </div>
</div>

    <!-- Site content -->
    <div class="contents">

        <!-- Accordion heading -->
        <div class="intro" id="accordionTitle">
            <h2 class="intro_title">Pane kokku omaenda Imeline Ajalugu</h2>
            <p class="intro_text">
                Vali igast teemast kuni 3 artiklit Imelise Ajaloo novembri numbrisse. Tänutäheks saadame selle Sulle
                tasuta.<br>
                Kui Sul endal on ajakiri juba tellitud, telli tasuta number heale sõbrale, kolleegile või sugulasele.
            </p>
        </div>


        <!-- Accordion content -->

        <!-- THEME SELECTION #1 -->
        <button class="accordion">
            <span class="accordion_header">Pingelised syndmused</span>
            <span class="accordion_counter"><span class="accordion_counter">0</span> / 3</span>
        </button>
        <div class="panel">

            <label class="panel_content" for="acc_1_nr1">
                <input type="checkbox" class="panel_input" id="acc_1_nr1">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Aaretejaht</p>
                    <p class="panel_description">
                        1820: Hispaanlased lastivad laeva aaretega, kuid see röövitakse ja aare peidetakse väikesele saarele. Tänapäeva aaretejahtija läheb seda otsima.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_1_nr2">
                <input type="checkbox" class="panel_input" id="acc_1_nr2">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 2</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_1_nr3">
                <input type="checkbox" class="panel_input" id="acc_1_nr3">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 3</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_1_nr4">
                <input type="checkbox" class="panel_input" id="acc_1_nr4">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 4</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <div class="panel_next">
                <button class="next_theme">Järgmine teema</button>
            </div>

        </div>

        <!-- THEME SELECTION #2 -->
        <button class="accordion">
            <span class="accordion_header">Teemad #2</span>
            <span class="accordion_counter"><span class="accordion_counter">0</span> / 3</span>
        </button>
        <div class="panel">

            <label class="panel_content" for="acc_2_nr1">
                <input type="checkbox" class="panel_input" id="acc_2_nr1">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 1</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_2_nr2">
                <input type="checkbox" class="panel_input" id="acc_2_nr2">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 2</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_2_nr3">
                <input type="checkbox" class="panel_input" id="acc_2_nr3">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 3</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_2_nr4">
                <input type="checkbox" class="panel_input" id="acc_2_nr4">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 4</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <div class="panel_next">
                <button class="next_theme">Järgmine teema</button>
            </div>

        </div>

        <!-- THEME SELECTION #3 -->
        <button class="accordion">
            <span class="accordion_header">Teemad #3</span>
            <span class="accordion_counter"><span class="accordion_counter">0</span> / 3</span>
        </button>
        <div class="panel">

            <label class="panel_content" for="acc_3_nr1">
                <input type="checkbox" class="panel_input" id="acc_3_nr1">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 1</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_3_nr2">
                <input type="checkbox" class="panel_input" id="acc_3_nr2">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 2</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_3_nr3">
                <input type="checkbox" class="panel_input" id="acc_3_nr3">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 3</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <label class="panel_content" for="acc_3_nr4">
                <input type="checkbox" class="panel_input" id="acc_3_nr4">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 4</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

            <!-- absolute last theme has "border: none" to get rid of the double border. added with :last-of-type in accordion.scss -->
            <label class="panel_content" for="acc_3_nr5">
                <input type="checkbox" class="panel_input" id="acc_3_nr5">
                <span class="checkmark"></span>

                <div class="panel_img">
                    <img src="wp-content/themes/imeline_ajalugu/src/imgs/Layer 26.png">
                </div>

                <div class="panel_text">
                    <p class="panel_title">Syndmuse pealkiri 5</p>
                    <p class="panel_description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque placeat officiis totam quibusdam
                        odio? Eaque deleniti, suscipit, illum quam, aspernatur omnis enim asperiores numquam earum
                        doloremque ipsa nostrum blanditiis obcaecati.
                    </p>
                </div>
            </label>

        </div>

        <!-- Valmis! button div-->
        <div class="btn-wrapper">
            <input type="button" id="doneButton" value="Valmis!" class="btn btn-disabled" disabled>
        </div>


        