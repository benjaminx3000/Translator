<?php

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
			'rewrite' => array('slug' => 'your-slug', 'with_front' => 'before-your-slug'),
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('t_product_studio',$args);
	}
}

$t_product_studio = new t_product_studio();	


?>
				