<!-- is supposed to end contents div -->
</div>

    <!-- description content -->
    <div class="description">
        <div class="description_text-wrapper mobile-container">
            <p class="description_text">
                <span><?php the_field('description_span'); ?></span>
                <?php the_field('description_text'); ?>
            </p>
        </div>
        <div class="description_img mobile-container">
            <img src="wp-content/themes/imeline_ajalugu/assets/imgs/covers.png">
        </div>
    </div>

    <!-- Footer content -->
    <footer>
            <div class="footer_text">
                <a id="policyOpen" class="footer_anchor">Tutvu kampaania tingimustega</a>
                <p>Klienditeeninduse e-post: <a href="#">register@imelineajalugu.ee</a>, tel: 667 0099 (tööpäeviti 9-17)</p>
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