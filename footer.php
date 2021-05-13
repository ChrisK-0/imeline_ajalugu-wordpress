<!-- description content -->
<div class="description">
            <div class="description_text-wrapper mobile-container">
                <p class="description_text">
                <?php 
                    $post_id = 24;
                    $post = get_post($post_id);
                    $blocks = parse_blocks($post->post_content);
                    foreach ($blocks as $block) {
                        if ($block['blockName'] != 'core/shortcode') {
                            echo render_block($block);
                        }
                    }
                    
                    $blocks[0];
                ?>
            </div>
            <div class="description_img mobile-container">
                <img src="wp-content/themes/imeline_ajalugu/assets/imgs/covers.png">
            </div>
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

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, illo minus. Dolores eos minus earum, illo provident voluptatem mollitia quisquam, tempore 
                hic soluta adipisci quam nobis accusamus cum accusantium possimus commodi, unde reprehenderit fugiat dicta dolor id aliquam cupiditate illum. Pariatur, eaque
                . Soluta sapiente aliquam optio dolores sint quisquam aperiam voluptatibus qui eius ea cum assumenda debitis libero temporibus dignissimos, id minima iste od
                io! Accusantium ipsum itaque doloribus dignissimos eveniet sapiente, non magnam fugit ratione, maiores quasi labore est provident quisquam pariatur, consequ
                atur dolorem esse placeat et beatae eaque ducimus sit assumenda? Delectus eaque illo perferendis possimus at odio, neque dicta dolores distinctio eum quibusd
                am ipsum suscipit provident sed! Dignissimos delectus reiciendis consectetur iure eius, suscipit eaque veniam laboriosam sed rerum animi vitae optio natus iu
                sto commodi magnam magni, blanditiis architecto tempore enim. Omnis doloremque vero voluptas voluptatibus iste qui natus eius labore ipsam beatae. Molestias,
                 dolore sit animi nobis, debitis dolorum deserunt aut voluptates consectetur doloribus tempora quaerat repudiandae fuga iste rerum repellendus cum corporis f
                 acere. Animi eveniet perferendis vero adipisci quos obcaecati ullam, ab, expedita aliquam, exercitationem reprehenderit praesentium incidunt modi aspernatur
                  tenetur odit iure. Porro provident esse eos eius optio architecto dolore magni nisi? Expedita, quisquam dicta?                
            </p>
        </div>

    </div>

<?php 
    wp_footer();
?>

</body>
</html>