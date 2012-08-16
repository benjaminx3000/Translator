<?php
//this adds jquery ui for the datepicker on the enent post type metabox :P
add_action('admin_init', 'load_admin_scripts');
function load_admin_scripts(){
	wp_enqueue_script('main',
		get_stylesheet_directory_uri() . '/js/main.js',
		array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'));
	wp_enqueue_style( 'jquery-ui', get_stylesheet_directory_uri() . '/css/jquery-ui.css' );
}
//load custom scripts
add_action('wp_enqueue_scripts', 'load_custom_scripts');
function load_custom_scripts(){
	wp_register_script('fancybox', get_stylesheet_directory_uri() .'/js/fancyBox/source/jquery.fancybox.pack.js' );
	wp_register_script('plugins', get_stylesheet_directory_uri() .'/js/plugins.js' );
	wp_enqueue_script('main',
		get_stylesheet_directory_uri() . '/js/main.js', //this is hack!!! make a separate script for admin panel!!
		array('jquery', 'fancybox', 'plugins'));
	wp_enqueue_style( 'fancyboxStyle', get_stylesheet_directory_uri() . '/js/fancyBox/source/jquery.fancybox.css' );
}
// register custom image sizes
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'post-image', 510, 600 ); //300 pixels wide (and unlimited height)
}

//add twitter to user profiles
function my_new_contactmethods( $contactmethods ) {
// Add Twitter
$contactmethods['twitter_handle'] = 'Twitter Handle @';


 
return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

//Taxonomy
add_action( 'init', 'create_event_types' );
add_action( 'init', 'create_product_names' );
function create_event_types() {
 $labels = array(
    'name' => _x( 'Event-Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Event-Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Event-Types' ),
    'all_items' => __( 'All Event-Types' ),
    'parent_item' => __( 'Parent Event-Type' ),
    'parent_item_colon' => __( 'Parent Event-Type:' ),
    'edit_item' => __( 'Edit Event-Type' ),
    'update_item' => __( 'Update Event-Type' ),
    'add_new_item' => __( 'Add New Event-Type' ),
    'new_item_name' => __( 'New Location Event-Type' ),
  ); 	

  register_taxonomy('event-type','t_event',array(
    'hierarchical' => true,
    'labels' => $labels
  ));
}

function create_product_names() {
 $labels = array(
    'name' => _x( 'Product-Name', 'taxonomy general name' ),
    'singular_name' => _x( 'Product Name', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Product Names' ),
    'all_items' => __( 'All Product Names' ),
    'parent_item' => __( 'Parent Product Name' ),
    'parent_item_colon' => __( 'Parent Product Name:' ),
    'edit_item' => __( 'Edit Product Name' ),
    'update_item' => __( 'Update Product Name' ),
    'add_new_item' => __( 'Add New Product Name' ),
    'new_item_name' => __( 'New Location Product Name' ),
  ); 	

  register_taxonomy('product-name','t_product_studio',array(
    'hierarchical' => false,
    'labels' => $labels
  ));
}
//Widget Areas


// add_action('widgets_init', 'register_my_widgets');
// function register_my_widgets(){
// 	register_sidebar( array(
// 		'name' => __( 'Home Page Sidebar', 'Translator' ),
// 		'id' => 't-sidebar-1',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget' => "</aside>",
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );
// 	register_sidebar( array(
// 		'name' => __( 'Client Sidebar', 'Translator' ),
// 		'id' => 't-sidebar-2',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget' => "</aside>",
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );
// 	register_sidebar( array(
// 		'name' => __( 'Lab Sidebar', 'Translator' ),
// 		'id' => 't-sidebar-3',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget' => "</aside>",
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );
// 	register_sidebar( array(
// 		'name' => __( 'Product Studio Sidebar', 'Translator' ),
// 		'id' => 't-sidebar-4',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget' => "</aside>",
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );
// 	register_sidebar( array(
// 		'name' => __( 'XSMKE Sidebar', 'Translator' ),
// 		'id' => 't-sidebar-5',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget' => "</aside>",
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );
// 	register_sidebar( array(
// 		'name' => __( 'Calendar Sidebar', 'Translator' ),
// 		'id' => 't-sidebar-6',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget' => "</aside>",
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );
// }

/*-------------------------------------------------------------------------------------------*/
/* t_client Post Type */
/*-------------------------------------------------------------------------------------------*/

class t_client {
	
	function t_client() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'Client Posts',
		    'singular_name' => 'Client Post',
		    'add_new' => 'Add New',
		    'all_items' => 'All Client Posts',
		    'add_new_item' => 'Add New Client Post',
		    'edit_item' => 'Edit Client Post',
		    'new_item' => 'New Client Post',
		    'view_item' => 'View Client Post',
		    'search_items' => 'Search Client Posts',
		    'not_found' =>  'No Posts found',
		    'not_found_in_trash' => 'No Posts found in trash',
		    'parent_item_colon' => 'Parent Client Post:',
		    'menu_name' => 'Client Post'
		);
		$args = array(
			'labels' => $labels,
			'description' => "A description for your post type",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 20,
			//'menu_icon' => '/absolute/url/to/icon',
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array('title','editor','excerpt','custom-fields','page-attributes','post-formats', 'sticky'),
			'has_archive' => true,
			// 'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true,
			'register_meta_box_cb' => 'add_feet_title_metaboxes'
		); 
		register_post_type('t_client',$args);
	}
}

$t_client = new t_client();	

/*-------------------------------------------------------------------------------------------*/
/* t_lab Post Type */
/*-------------------------------------------------------------------------------------------*/

class t_lab {
	
	function t_lab() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'XDLab',
		    'singular_name' => 'Lab Post',
		    'add_new' => 'Add New Lab Post',
		    'all_items' => 'All Lab Posts',
		    'add_new_item' => 'Add New Lab Post',
		    'edit_item' => 'Edit Lab Post',
		    'new_item' => 'New Lab Post',
		    'view_item' => 'View Lab Post',
		    'search_items' => 'Search Lab Posts',
		    'not_found' =>  'No Lab Posts found',
		    'not_found_in_trash' => 'No Posts found in trash',
		    'parent_item_colon' => 'Parent Lab Post:',
		    'menu_name' => 'XDLab'
		);
		$args = array(
			'labels' => $labels,
			'description' => "A description for your post type",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 21,
			// 'menu_icon' => '/absolute/url/to/icon',
			'capability_type' => 'page',
			'hierarchical' => true,
			'supports' => array('title','editor','excerpt','custom-fields','page-attributes','post-formats'),
			'has_archive' => true,
			// 'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true,
			'register_meta_box_cb' => 'add_feet_title_metaboxes'
		); 
		register_post_type('t_lab',$args);
	}
}

$t_lab = new t_lab();

/*-------------------------------------------------------------------------------------------*/
/* t_product_studio Post Type */
/*-------------------------------------------------------------------------------------------*/

class t_product_studio {
	
	function t_product_studio() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'Product',
		    'singular_name' => 'Product',
		    'add_new' => 'Add New',
		    'all_items' => 'All Products',
		    'add_new_item' => 'Add New Product',
		    'edit_item' => 'Edit Product',
		    'new_item' => 'New Product',
		    'view_item' => 'View Product',
		    'search_items' => 'Search Products',
		    'not_found' =>  'No products found',
		    'not_found_in_trash' => 'No Posts found in trash',
		    'parent_item_colon' => 'Parent Product:',
		    'menu_name' => 'Studio'
		);
		$args = array(
			'labels' => $labels,
			'description' => "A description for your post type",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 23,
			// 'menu_icon' => '/absolute/url/to/icon',
			'capability_type' => 'page',
			'hierarchical' => true,
			'supports' => array('title','editor','excerpt','custom-fields','page-attributes','post-formats'),
			'has_archive' => true,
			// 'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true,
			'register_meta_box_cb' => 'add_feet_title_metaboxes'
		); 
		register_post_type('t_product_studio',$args);
	}
}

$t_product_studio = new t_product_studio();	

/*-------------------------------------------------------------------------------------------*/
/* xsmke Post Type */
/*-------------------------------------------------------------------------------------------*/

class t_xsmke {
	
	function t_xsmke() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'XSMKE',
		    'singular_name' => 'XS Post',
		    'add_new' => 'Add XS Post',
		    'all_items' => 'All XS Posts',
		    'add_new_item' => 'Add New XS Post',
		    'edit_item' => 'Edit XS Post',
		    'new_item' => 'New XS Post',
		    'view_item' => 'View XS Post',
		    'search_items' => 'Search XS Posts',
		    'not_found' =>  'No XS Posts found',
		    'not_found_in_trash' => 'No XS Posts found in trash',
		    'parent_item_colon' => 'Parent XS Post:',
		    'menu_name' => 'XSMKE'
		);
		$args = array(
			'labels' => $labels,
			'description' => "A description for your post type",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 24,
			// 'menu_icon' => '/absolute/url/to/icon',
			'capability_type' => 'page',
			'hierarchical' => true,
			'supports' => array('title','editor','excerpt','custom-fields','page-attributes','post-formats'),
			'has_archive' => true,
			// 'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true,
			'register_meta_box_cb' => 'add_feet_title_metaboxes'
		); 
		register_post_type('t_xsmke',$args);
	}
}

$t_xsmke = new t_xsmke();	

/*-------------------------------------------------------------------------------------------*/
/* Event Post Type */
/*-------------------------------------------------------------------------------------------*/

class t_event {
	
	function t_event() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'Events',
		    'singular_name' => 'Event',
		    'add_new' => 'Add New Event',
		    'all_items' => 'All Events',
		    'add_new_item' => 'Add Event',
		    'edit_item' => 'Edit Event',
		    'new_item' => 'New Event',
		    'view_item' => 'View Event',
		    'search_items' => 'Search Events',
		    'not_found' =>  'No evets found',
		    'not_found_in_trash' => 'No event found in trash',
		    'parent_item_colon' => 'Parent Event Post:',
		    'menu_name' => 'Events'
		);
		$args = array(
			'labels' => $labels,
			'description' => "A description for your post type",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 25,
			// 'menu_icon' => '/absolute/url/to/icon',
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array('title','editor','custom-fields','page-attributes'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'events', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true,
			'register_meta_box_cb' => 'add_events_metaboxes'
		); 
		register_post_type('t_event',$args);
	}
}

$t_event = new t_event();


//Meta boxes for events
add_action('add_meta_boxes', 'add_feet_title_metaboxes');
// Add the Events Meta Boxes
function add_events_metaboxes() {
	add_meta_box('t_events_date', 'Event Info', 't_events_date', 't_event', 'normal', 'high');
	add_meta_box('t_stream_title', 'Feed Title', 't_stream_title', 't_event', 'normal', 'high');
}
//name
function add_feet_title_metaboxes(){
	add_meta_box('t_stream_title', 'Feed Title', 't_stream_title', 't_product_studio', 'normal', 'high');
	add_meta_box('t_stream_title', 'Feed Title', 't_stream_title', 't_client', 'normal', 'high');
	add_meta_box('t_stream_title', 'Feed Title', 't_stream_title', 't_xsmke', 'normal', 'high');
	add_meta_box('t_stream_title', 'Feed Title', 't_stream_title', 't_lab', 'normal', 'high');
	add_meta_box('t_stream_title', 'Feed Title', 't_stream_title', 't_event', 'normal', 'high');
	add_meta_box('t_stream_title', 'Feed Title', 't_stream_title', 'page', 'normal', 'high');
}

// The Event Location Metabox
function t_events_date() {
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    // Get the date data if its already been entered
    $date = get_post_meta($post->ID, '_event_date', true);
    // Echo out the field
    echo '<label for="_event_date">Event Date</label>';
    echo '<input type="text" name="_event_date" value="' . $date  . '" class="datepicker " />';

    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_location', true);
    // Echo out the field
    echo '<label for="_location">Event Location</label>';
    echo '<input type="text" name="_location" value="' . $location  . '" class="" />';
}

//Studio product and client name metabox
function t_stream_title(){
	global $post;
	echo '<input type="hidden" name="titlemeta_noncename" id="titlemeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    // Get the date data if its already been entered
    $stream_title = get_post_meta($post->ID, '_stream_title', true);
    // Echo out the field
    echo '<input type="text" name="_stream_title" value="' . $stream_title  . '" class="widefat"/>';
}


// Save the Metabox Data
function t_save_events_meta($post_id, $post) {
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times

    if(!array_key_exists('eventmeta_noncename', $_POST)) {
    	return $post->ID;
    }
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    	return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $events_meta['_event_date'] = $_POST['_event_date'];
    $events_meta['_location'] = $_POST['_location'];
    // Add values of $events_meta as custom fields
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}

function t_save_stream_title($post_id, $post){
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times

    if(!array_key_exists('titlemeta_noncename', $_POST)) {
    	return $post->ID;
    }
    if ( !wp_verify_nonce( $_POST['titlemeta_noncename'], plugin_basename(__FILE__) )) {
    	return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $name_meta['_stream_title'] = $_POST['_stream_title'];
    
    // Add values of $name_meta as custom fields
    foreach ($name_meta as $key => $value) { // Cycle through the $name_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}

add_action('save_post', 't_save_events_meta', 1, 2); // save the custom fields
add_action('save_post', 't_save_stream_title', 1, 2); // save the custom fields


//Fitler to add class names based on taxonomy
add_filter( 'post_class', 't_post_class', 10, 3 );
if( !function_exists( 't_post_class' ) ) {
    /**
     * Append taxonomy terms to post class.
     * @since 2010-07-10
     */
    function t_post_class( $classes, $class, $ID ) {
        $taxonomy = 'event-type';
        $terms = get_the_terms( (int) $ID, $taxonomy );
        if( !empty( $terms ) ) {
            foreach( (array) $terms as $order => $term ) {
                if( !in_array( $term->slug, $classes ) ) {
                    $classes[] = $term->slug;
                }
            }
        }
        return $classes;
    }
}


	

	
?>