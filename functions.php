<?php
	function favicon_link() {
	    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";


	}
	add_action('wp_head', 'favicon_link');

	function create_post_type() {
		register_post_type( 'acme_product',
			array(
				'labels' => array(
					'name' => __( 'Products' ),
					'singular_name' => __( 'Product' ),
				),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
			'hierarchical' => true,
			'capability_type' => 'page',
			'query_var' => true,
			'publicly_queryable' => true,
			'supports' => array('title', 'editor', 'custom-fields', 'comments')
			)
		);
	}

	add_action( 'init', 'create_post_type' );
	


	// Add a Custom Post Type to a feed
	function add_cpt_to_feed( $qv ) {
	  if ( isset($qv['feed']) && !isset($qv['post_type']) )
	    $qv['post_type'] = array('post', 'acme_product');
	  return $qv;
	}
	add_filter( 'request', 'add_cpt_to_feed' );
?>