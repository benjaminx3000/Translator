<?php

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
			'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('t_client',$args);
	}
}

$t_client = new t_client();					
?>
				