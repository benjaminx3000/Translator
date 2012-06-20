<?php
	//Custom post types
	// require_once 'postTypes/t_client.php';
	// require_once 'postTypes/t_lab.php';
	//require_once( 'postTypes/t_product_studio.php' );
	// require_once 'postTypes/t_xsmke.php';

//Taxonomy
add_action( 'init', 'create_event_types' );
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
			'capability_type' => 'page',
			'hierarchical' => true,
			'supports' => array('title','editor','excerpt','custom-fields','page-attributes','post-formats'),
			'has_archive' => true,
			// 'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true
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
			'can_export' => true
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
		    'menu_name' => 'Product Studio'
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
			'can_export' => true
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
			'can_export' => true
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
			'can_export' => true
		); 
		register_post_type('t_event',$args);
	}
}

$t_event = new t_event();	


	

	
?>