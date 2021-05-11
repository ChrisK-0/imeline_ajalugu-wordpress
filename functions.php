<?php
function imeline_ajalugu_theme_support(){
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'imeline_ajalugu_theme_support' );

function imeline_ajalugu_menus(){
	$locations = array(
		'primary' => "Desktop Primary Left Sidebar",
		'footer' => "Footer Menu Items"
	);

	register_nav_menus($locations);
}

add_action('init', 'imeline_ajalugu_menus');

function imeline_ajalugu_styles() {
	wp_enqueue_style('imeline_ajalugu_css', get_template_directory_uri() . "/src/css/main.css", array(), '1.0');

}

add_action( 'wp_enqueue_scripts', 'imeline_ajalugu_styles');


function imeline_ajalugu_scripts() {
	wp_enqueue_script('imeline_ajalugu_js', get_template_directory_uri() . "/src/js/bundle.js", array(), '1.0',true );

}

add_action( 'wp_enqueue_scripts', 'imeline_ajalugu_scripts');




?>