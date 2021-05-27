<?php
// if its not the front page, use front page's footer meta fields
$front_page_id = get_option('page_on_front');

$events_archive_page = get_page_by_path( 'custom_event' );
$events_archive_id = $events_archive_page->ID;

if ( !is_page($front_page_id) && !is_archive($events_archive_id) ) {
    $front_page_query = new WP_Query( 'page_id='.$front_page_id );
    while ($front_page_query -> have_posts()) : $front_page_query -> the_post(); 
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
?>

<?php 
    wp_footer();
?>

</body>
</html>