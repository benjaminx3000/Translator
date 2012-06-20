<?php

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
			'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('t_lab',$args);
	}
}

$t_lab = new t_lab();					
?>
				