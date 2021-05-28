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
		
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'categories' ),
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
		'menu_icon'           => 'dashicons-editor-ul',
		'rewrite' 			=> array( 'slug' => 'custom_event' ),
		'rest_base'          => 'custom_events',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_rest'		  => true,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', )
	);
	register_post_type( "custom_event", $args );
}
add_action( 'init', 'custom_events_list' );

// custom taxonomy 
function create_categories_hierarchical_taxonomy() { 
  $labels = array(
    'name' => _x( 'Event categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Event category', 'taxonomy singular name' ),
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

  register_taxonomy('categories',array('custom_event'), array(
    'hierarchical' 			=> true,
    'labels' 				=> $labels,
    'show_ui' 				=> true,
    'show_admin_column' 	=> true,
	'show_in_rest' 			=> true,
    'query_var' 			=> true,
    'rewrite' 				=> array( 'slug' => 'custom_category' ),
	'show_in_rest' 			=> true,
	'rest_base'             => 'category',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
  ));
}
add_action( 'init', 'create_categories_hierarchical_taxonomy', 'manage_edit-custom_category', 15 );


// custom taxonomy pattern column

add_filter( 'manage_edit-categories_columns', 'create_categories_pattern_column', 11, 1  );
add_action( 'manage_categories_custom_column', 'categories_pattern_column_metafield', 12, 3 );
add_action( 'pre_get_posts', 'categories_posts_orderby', 1 );
add_filter( 'manage_edit-categories_sortable_columns', 'categories_sortable_columns' );

// create the column
function create_categories_pattern_column( $columns ) {
    $columns['pattern'] = __( 'Pattern' );
    return $columns;
}

// get pattern metafield from custom meta fields
function categories_pattern_column_metafield( $value, $column, $term_id ) {
	$get_custom_category = get_term($term_id /*, 'custom_category'*/);
	$get_order_meta = get_field('category_order', $get_custom_category);
	switch($column) {
	  case 'pattern': 
		$value = $get_order_meta;
	  break;
	}
	return $value;  
}

// make order column sortable
function categories_sortable_columns($columns) {
	$columns['pattern'] = 'pattern';
	return $columns;
}

// sorting function
function categories_posts_orderby( $query ) {
	if( ! is_admin() || ! $query->is_main_query() ) {
		return;
	  }
	
	  if ( 'pattern' === $query->get( 'orderby') ) {
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'meta_key', 'pattern' );
		$query->set( 'meta_type', 'numeric' );
	  }
}


// Advanced Custom Fields

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/assets/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/assets/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// save JSON
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-jsons';
    return $path;
}

// load JSON
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-jsons';
    return $paths;
}

function event_archive() {
	$events_archive_page = get_page_by_path( 'custom_event' );
	$events_archive_id = $events_archive_page->ID;

	return [
		'id'			=> $events_archive_id,
		'is_archive'	=> is_archive($events_archive_id)
	];
}