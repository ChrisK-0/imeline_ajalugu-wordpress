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
		'menu_icon'           => 'dashicons-editor-ul',
		'show_in_rest'		  => true
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
    'hierarchical' 		=> true,
    'labels' 			=> $labels,
    'show_ui' 			=> true,
    'show_admin_column' => true,
	'show_in_rest' 		=> true,
    'query_var' 		=> true,
    'rewrite' 			=> array( 'slug' => 'category' ),
	'show_in_rest' 		=> true
  ));

}

add_action( 'init', 'create_categories_hierarchical_taxonomy', 0 );



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

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_609e754d53faf',
		'title' => 'Cover',
		'fields' => array(
			array(
				'key' => 'field_609e75549929f',
				'label' => 'Cover paragraph',
				'name' => 'cover_paragraph',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_609e767973d75',
				'label' => 'Cover anchor paragraph',
				'name' => 'cover_anchor',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
				),
			),
		),
		'menu_order' => 2,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_609e631e00273',
		'title' => 'Intro',
		'fields' => array(
			array(
				'key' => 'field_609e7061a2fba',
				'label' => 'Intro title',
				'name' => 'intro_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_609e6716d1628',
				'label' => 'Intro text',
				'name' => 'intro_text',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'No intro text given',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page',
					'operator' => '==',
					'value' => '7',
				),
			),
		),
		'menu_order' => 3,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_60a268d0f3ddb',
		'title' => 'Accordion content',
		'fields' => array(
			array(
				'key' => 'field_60a269038a697',
				'label' => 'Event image',
				'name' => 'event_image',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'custom_event',
				),
			),
		),
		'menu_order' => 4,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_609e778d5ed3d',
		'title' => 'Description',
		'fields' => array(
			array(
				'key' => 'field_609e7b6f1b133',
				'label' => 'Description span',
				'name' => 'description_span',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_609e7798da761',
				'label' => 'Description text',
				'name' => 'description_text',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
				),
			),
		),
		'menu_order' => 5,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_609e7c4374e8b',
		'title' => 'Footer',
		'fields' => array(
			array(
				'key' => 'field_60a3a725bc38d',
				'label' => 'Footer anchor',
				'name' => 'footer_anchor',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_60a3a7c1bf163',
				'label' => 'Footer text',
				'name' => 'footer_text',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_609e7c4b0f058',
				'label' => 'Modal content',
				'name' => 'modal_content',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
				),
			),
		),
		'menu_order' => 7,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_60a26514cdfe9',
		'title' => 'Accordions per page',
		'fields' => array(
			array(
				'key' => 'field_60a2658d71186',
				'label' => 'Accordions per page',
				'name' => 'accordions_per_page',
				'type' => 'number',
				'instructions' => 'set a number (number "0" or a number higher than the amount of categories to show all) without additional characters, for example: 3',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 3,
				'placeholder' => 3,
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => '',
				'step' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
				),
			),
		),
		'menu_order' => 9,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => true,
		'description' => 'set a number without additional characters, for example: 3',
	));
	
	endif;


?>