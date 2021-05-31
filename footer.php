<?php
    // if its not the front or the archive page, use front page's footer meta fields
    $front_page_id = get_option('page_on_front');
    $front_page_query = new WP_Query( 'page_id='.$front_page_id );
?>
        
        <!-- description content -->
        <div class="description">
            <div class="description_text-wrapper mobile-container">
                <p class="description_text">
                <?php
if ( !is_front_page() && !event_archive()['is_archive'] ) {
    while ($front_page_query -> have_posts()) : $front_page_query -> the_post();
    echo '
                    <span>'.get_field('description_span').'</span>
                '.get_field('description_text').'
        ';
    endwhile;
} else {
    echo '
                    <span>'.get_field('description_span').'</span>
                '.get_field('description_text').'
        ';
}
?>
            </p>
        </div>
        <div class="description_img mobile-container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/covers.png">
        </div>
    </div>

<!-- contents div end -->
</div>

<!-- Footer content -->
<footer>
    <div class="footer_text">
<?php
if ( !is_front_page() && !event_archive()['is_archive'] ) {
    while ($front_page_query -> have_posts()) : $front_page_query -> the_post();
    echo '
        <a id="policyOpen" class="footer_anchor">'.get_field('footer_anchor').'</a>

        <p>'.get_field('footer_text').'</p>
        ';
    endwhile;
} else {
    echo '
        <a id="policyOpen" class="footer_anchor">'.get_field('footer_anchor').'</a>

        <p>'.get_field('footer_text').'</p>
        ';
}
?>
    </div>
</footer>

<!-- The Modal -->
<div id="policyModal" class="modal">

    <!-- Modal content -->
    <div class="modal_content">
        <button id="closeModal" class="modal_btn">&times;</button>
        <h1>Kampaania tingimused</h1>
            
        <p>
<?php
if ( !is_front_page() && !event_archive()['is_archive'] ) {
    while ($front_page_query -> have_posts()) : $front_page_query -> the_post();
            the_field('modal_content');
    endwhile;
} else {
            the_field('modal_content');
}
?>
        </p>
    </div>
</div>

<?php 
    wp_footer();
?>

</body>
</html>