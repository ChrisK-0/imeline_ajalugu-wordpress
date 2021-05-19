

    <!-- description content -->
    <div class="description">
        <div class="description_text-wrapper mobile-container">
            <p class="description_text">
                <span><?php the_field('description_span'); ?></span>
                <?php the_field('description_text'); ?>
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
        <a id="policyOpen" class="footer_anchor"><?php the_field('footer_anchor'); ?></a>
        <p><?php the_field('footer_text'); ?></p>
    </div>
</footer>

<!-- The Modal -->
<div id="policyModal" class="modal">

    <!-- Modal content -->
    <div class="modal_content">
        <button id="closeModal" class="modal_btn">&times;</button>
        <h1>Kampaania tingimused</h1>
            <?php the_field('modal_content'); ?>
        <p>
                    
        </p>
    </div>

</div>

<?php 
    wp_footer();
?>

</body>
</html>