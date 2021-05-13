<?php
    get_header();
?>


<?php 
    $post_id = 21;
    $post = get_post($post_id);
    $blocks = parse_blocks($post->post_content);
    foreach ($blocks as $block) {
        if ($block['blockName'] != 'core/shortcode') {
            echo render_block($block);
        }
    }
    
    $blocks[0];
?>

<?php 
    $post_id = 13;
    $post = get_post($post_id);
    $blocks = parse_blocks($post->post_content);
    foreach ($blocks as $block) {
        if ($block['blockName'] != 'core/shortcode') {
            echo render_block($block);
        }
    }
    
    $blocks[0];
?>

<?php 
    get_footer();
?>