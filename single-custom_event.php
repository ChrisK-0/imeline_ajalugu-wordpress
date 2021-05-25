<?php
/*
Template Name: Single event
Template Post Type: post, custom_event
*/

get_header(); ?>

<?php
    if(have_posts() ){
        while(have_posts() ){
            the_post();



			the_content();
			echo '
			<p>test</p>
			<script> console.log("test13213231312312312") </script>
			';

        }
    } else {

	}
?>


<?php
get_footer();
