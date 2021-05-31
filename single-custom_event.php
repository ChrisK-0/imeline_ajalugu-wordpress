<?php 
	get_header();
?>

<?php
    if(have_posts() ){
        while(have_posts() ){
            the_post();
			$content_to_strip = get_the_content();
			$stripped_content = wp_strip_all_tags($content_to_strip);

			echo '
	<!-- Site content -->
	<div class="contents">
		<div class="event_single-wrap">

			<!-- content -->
			<div class="event_single">
				';
			if ( get_field("event_image") ) {
				echo '
				<div class="panel_img">
					<img src="'.get_field("event_image").'">
				</div>
				'; // end IF echo
			}
			echo '
				<div class="panel_text">
					<p class="panel_title">
						'.get_the_title().'
					</p>

					<p class="panel_description">
						'.$stripped_content.'
					</p>
				</div>
			</div>
		</div>
			';
        }
    } else {
			echo '
	<!-- Site content -->
	<div class="contents">
		<div class="event_single-wrap">
			<p>Something went horribly wrong (single-custom_event.php)</p>
		</div>
				';
	}
?>

	<div class="page_view">
        <!-- Link to the accordion archive page -->
        <a class="page_view-all page_view-single" href="<?php echo get_home_url( 'custom_event' ); ?>">Tagasi esilehele</a>
	</div>

<?php 
	get_footer();
?>