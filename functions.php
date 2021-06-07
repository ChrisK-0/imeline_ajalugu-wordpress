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
add_action( 'manage_categories_custom_column', 'categories_pattern_custom_columns', 12, 3 );
add_action( 'pre_get_posts', 'categories_posts_orderby', 1 );
add_filter( 'manage_edit-categories_sortable_columns', 'categories_sortable_columns' );

// create the column
function create_categories_pattern_column( $columns ) {
    $columns['pattern'] = __( 'Pattern' );
    return $columns;
}

// get pattern metafield from custom meta fields
function categories_pattern_custom_columns( $value, $column, $term_id ) {
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

// theme custom archive
function event_archive() {
	$events_archive_page = get_page_by_path( 'custom_event' );
	$events_archive_id = $events_archive_page->ID;

	return [
		'id'			=> $events_archive_id,
		'is_archive'	=> is_archive($events_archive_id)
	];
}


// ajax
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
    /**
     * frontend ajax requests.
     */
    wp_enqueue_script( 'frontend-ajax',  get_template_directory_uri() . '/assets/js/custom_accordion_ajax.js', array('jquery'), null, true );
    wp_localize_script( 'frontend-ajax', 'frontend_ajax_object',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'mybundlejs' => get_template_directory_uri().'/assets/js/bundle.js',
        )
    );
}


// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');
// ADD ACCORDION
function get_ajax_posts() {
	global $my_accordion_array;
    // terms array - getting category names
    $my_accordion_array = get_terms( array(
        'taxonomy'   => 'categories',
        'hide_empty' => true,
        'post_status' => 'publish',
        'orderby' => 'name',
        'order' => 'ASC'
    ));


    // accordion per page limiter
	$front_page_id = get_option('page_on_front');
    $accordions_per_page = get_field('accordions_per_page', $front_page_id);

	// variable to help with adding to already existing accordions (label id...)
	//$next_accordion_to_add = $accordions_per_page; deprecated

    // give accordion a number for uniqueness
    $accordion_number = $accordions_per_page; // remove this chain

	// for if statements - counting already existing categories
    $current_accordion_number = $accordions_per_page;
    $published_categories = count($my_accordion_array);

	// specifies the amount of accordions to add
	$amount_of_categories = count($my_accordion_array);
	$accordions_to_add = $amount_of_categories-$accordions_per_page;
	//$generator_index = 1;

	$pelmeen = 0;

	// removes already existing accordions from the terms array
	while ( $pelmeen != $accordions_per_page ) {
		// break everything if no more accordions are existant
		if ( count($my_accordion_array) == 0  ) {
			global $my_accordion_array;
			$my_accordion_array = 0;
			break;
		}

		array_shift($my_accordion_array);
		$pelmeen++;
	}


	foreach ($my_accordion_array as $term) {
				// create array for events
				$custom_events_posts = new WP_Query(
					array(
						'post_type' => 'custom_event',
						// 'orderby' => 'ASC', // rand, DESC, ASC
						'post_status' => 'publish',
						'tax_query' => array(
							array(
								'taxonomy' => 'categories',
								'field' => 'slug',
								'terms' => $term
							)
						)
					)
				);

				if ( $custom_events_posts->have_posts() ) {

					// give panels numbers for uniqueness
					$event_label_number = 0;

					echo '
		<button class="accordion">
			<span class="accordion_header">
					'.$term->name.'
			</span>

			<span class="accordion_counter"><span class="accordion_counter">0</span> / 3</span>
		</button>

		<div class="panel">
						'; // end echo

					while ( $custom_events_posts->have_posts() ) {
						$custom_events_posts->the_post();

						// $response .= $accordions_per_page;

						$content_to_strip = get_the_content();
						$stripped_content = wp_strip_all_tags($content_to_strip);
	
						echo '
		<label class="panel_content" for="accordion-'.$accordion_number.'_panel-'.$event_label_number.'">
			<input type="checkbox" class="panel_input" id="accordion-'.$accordion_number.'_panel-'.$event_label_number.'">
			<span class="checkmark-custom"></span>
					'; // end echo
				if ( get_field("event_image") ) {
					echo '
			<div class="panel_img">
				<img src="'.get_field("event_image").'">
			</div>
					'; // end echo
				}
				echo '
			<div class="panel_text">
				<a class="panel_title" href="'.get_page_uri($post).'">
					'.get_the_title().'
				</a>

				<p class="panel_description">
					'.$stripped_content.'
				</p>
			</div>
		</label>
							'; // end echo
						$event_label_number++;

					} // end while

					$accordion_number++;

					if ( $accordion_number != $published_categories && $accordion_number != $accordions_per_page ) {
						echo '
		<div class="panel_next">
			<button class="next_theme">Järgmine teema</button>
		</div>
							'; // end echo
					}
				} /* else {
					$response .= get_template_part('none');
				} */ // end if

		echo '</div>'; // ends the div with class panel, which holds all the labels for an accordion

				// increment current accordion number by 1 for each category loop
				$current_accordion_number++;

				// currently does not do what its supposed to
				array_shift($my_accordion_array);

	}; // end for each

	wp_reset_query();

    // exit;
    wp_die();
}
?>