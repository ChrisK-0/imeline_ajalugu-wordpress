<?php
// if its one of the events, use the front page meta fields
if ( is_singular(array('custom_event')) ) {
    $the_query = new WP_Query( 'page_id=7' );
    while ($the_query -> have_posts()) : $the_query -> the_post(); 
        echo '
        <!-- description content -->
        <div class="description">
            <div class="description_text-wrapper mobile-container">
                <p class="description_text">
                    <span>'.get_field('description_span').'</span>
                    '.get_field('description_text').'
                </p>
            </div>
            <div class="description_img mobile-container">
                <img src="'.get_template_directory_uri().'/assets/imgs/covers.png">
            </div>
        </div>
    
    <!-- contents div end -->
    </div>
    
    <!-- Footer content -->
    <footer>
        <div class="footer_text">
            <a id="policyOpen" class="footer_anchor">'.get_field('footer_anchor').'</a>
    
            <p>'.get_field('footer_text').'</p>
        </div>
    </footer>
    
    <!-- The Modal -->
    <div id="policyModal" class="modal">
    
        <!-- Modal content -->
        <div class="modal_content">
            <button id="closeModal" class="modal_btn">&times;</button>
            <h1>Kampaania tingimused</h1>
                
            <p>
                '.get_field('modal_content').'    
            </p>
        </div>
    
    </div>
        ';
    endwhile;
} else {
    echo '
    <!-- description content -->
    <div class="description">
        <div class="description_text-wrapper mobile-container">
            <p class="description_text">
                <span>'.get_field('description_span').'</span>
                '.get_field('description_text').'
            </p>
        </div>
        <div class="description_img mobile-container">
            <img src="'.get_template_directory_uri().'/assets/imgs/covers.png">
        </div>
    </div>

<!-- contents div end -->
</div>

<!-- Footer content -->
<footer>
    <div class="footer_text">
        <a id="policyOpen" class="footer_anchor">'.get_field('footer_anchor').'</a>

        <p>'.get_field('footer_text').'</p>
    </div>
</footer>

<!-- The Modal -->
<div id="policyModal" class="modal">

    <!-- Modal content -->
    <div class="modal_content">
        <button id="closeModal" class="modal_btn">&times;</button>
        <h1>Kampaania tingimused</h1>
            
        <p>
            '.get_field('modal_content').'    
        </p>
    </div>

</div>
    ';
}

    wp_footer();
?>

</body>
</html>