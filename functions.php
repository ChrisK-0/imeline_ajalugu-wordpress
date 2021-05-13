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

?>


<?php // custom taxonomy and post type

// custom post type
function custom_events_list() {


/*	Old
	$labels = [
		"name" => __( "Events", "custom-post-type-ui" ),
		"singular_name" => __( "Event", "custom-post-type-ui" ),
		"all_items" => __( "All events", "custom-post-type-ui" ),
		"add_new" => __( "Add event", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new event", "custom-post-type-ui" ),
		"edit_item" => __( "Edit event", "custom-post-type-ui" ),
		"new_item" => __( "New event", "custom-post-type-ui" ),
		"view_item" => __( "View event", "custom-post-type-ui" ),
		"view_items" => __( "View events", "custom-post-type-ui" ),
		"search_items" => __( "Search event", "custom-post-type-ui" ),
		"not_found" => __( "Event not found", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into event", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter events", "custom-post-type-ui" ),
		"attributes" => __( "Event attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Event", "custom-post-type-ui" ),
	];
*/
	$labels = array(
		'name'                => _x( 'Events', 'Post Type General Name', 'Imeline_ajalugu' ),
		'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'Imeline_ajalugu' ),
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
/* Old
	$args = [
		"label" => __( "Events", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "events", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "page-attributes", "post-formats" ],
		"show_in_graphql" => false,
	];
*/
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
//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_topics_nonhierarchical_taxonomy', 0 );
 
function create_topics_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Topics', 'taxonomy general name' ),
    'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Topics' ),
    'popular_items' => __( 'Popular Topics' ),
    'all_items' => __( 'All Topics' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Topic' ), 
    'update_item' => __( 'Update Topic' ),
    'add_new_item' => __( 'Add New Topic' ),
    'new_item_name' => __( 'New Topic Name' ),
    'separate_items_with_commas' => __( 'Separate topics with commas' ),
    'add_or_remove_items' => __( 'Add or remove topics' ),
    'choose_from_most_used' => __( 'Choose from the most used topics' ),
    'menu_name' => __( 'Topics' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('topics','events',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'topic' ),
  ));
}
	
?>