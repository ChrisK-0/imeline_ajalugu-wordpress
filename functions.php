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

function imeline_ajalugu_assets() {
	wp_enqueue_style('imeline_ajalugu_css', get_template_directory_uri() . "/assets/css/main.css", array(), '1.0');
	wp_enqueue_script('imeline_ajalugu_js', get_template_directory_uri() . "/assets/js/bundle.js", array(), '1.0',true );
}

add_action( 'wp_enqueue_scripts', 'imeline_ajalugu_assets');


// custom taxonomy and post type

// custom post type
function custom_events_list() {

	$labels = array(
		'name'                => __( 'Events', 'Post Type General Name', 'Imeline_ajalugu' ),
		'singular_name'       => __( 'Event', 'Post Type Singular Name', 'Imeline_ajalugu' ),
		'menu_name'           => __( 'Events', 'Imeline_ajalugu' ),
		'parent_item_colon'   => __( 'Parent Event', 'Imeline_ajalugu' ),
		'all_items'           => __( 'All Events', 'Imeline_ajalugu' ),
		'view_item'           => __( 'View Event', 'Imeline_ajalugu' ),
		'add_new_item'        => __( 'Add New Event', 'Imeline_ajalugu' ),
		'add_new'             => __( 'Add New', 'Imeline_ajalugu' ),
		'edit_item'           => __( 'Edit Event', 'Imeline_ajalugu' ),
		'update_item'         => __( 'Update Event', 'Imeline_ajalugu' ),
		'search_items'        => __( 'Search Event', 'Imeline_ajalugu' ),
		'not_found'           => __( 'Not Found', 'Imeline_ajalugu' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'Imeline_ajalugu' ),
	);
	// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'events', 'Imeline_ajalugu' ),
		'description'         => __( 'Events', 'Imeline_ajalugu' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'accordion' ),
		/* A hierarchical CPT is like Pages and can have Parent and child items. A non-hierarchical CPT is like Posts. */ 
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' 			=> true,
		'menu_icon'           => 'dashicons-editor-ul'
	);
	register_post_type( "custom_event", $args );
}
add_action( 'init', 'custom_events_list' );


// custom taxonomy 
//hook into the init action and call create_book_taxonomies when it fires
 
function create_categories_hierarchical_taxonomy() { 
  $labels = array(
    'name' => _x( 'categories', 'taxonomy general name' ),
    'singular_name' => _x( 'category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search categories' ),
    'all_items' => __( 'All categories' ),
    'parent_item' => __( 'Parent category' ),
    'parent_item_colon' => __( 'Parent category:' ),
    'edit_item' => __( 'Edit category' ), 
    'update_item' => __( 'Update category' ),
    'add_new_item' => __( 'Add New category' ),
    'new_item_name' => __( 'New category Name' ),
    'menu_name' => __( 'Categories' ),
  );    
// register the taxonomy
  register_taxonomy('categories',array('custom_event'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'category' ),
  ));

}

add_action( 'init', 'create_categories_hierarchical_taxonomy', 0 );




?>