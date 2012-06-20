<?php

/*-------------------------------------------------------------------------------------------*/
/* xsmkw Post Type */
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
			'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('t_xsmke',$args);
	}
}

$t_xsmke = new t_xsmke();					
?>
				