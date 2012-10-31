<?php 
//look to see if images are attached to the post
//if not the post needs to be styled differently
	$has_attachments;
	$args = array(
	   'post_type' => 'attachment',
	   'numberposts' => -1,
	   'post_status' => null,
	   'post_parent' => $post->ID
	  );
	  $attachments = get_posts( $args );
	     if ( $attachments ) {
	        $has_attachments = true;
	     } else {
	     	$has_attachments = false;
	     }
 ?>
<div class="article <?php echo($has_attachments ? 'image' : 'no-image'); ?>">
	<h2 class="post-title"><?php the_title(); ?></h2>
	<div class="summary">
		<?php echo apply_filters('the_excerpt', $post->post_excerpt); ?>
		<?php
			$path_name = dirname(get_permalink());
			$post_name = basename(get_permalink());
			$originals = array('agency-posts',	'experience-series-posts',	'lab-posts',	'studio-posts');
			$rewrites =  array('agency',		'experience-series',		'lab',			'studio');
			$postlink = str_replace($originals, $rewrites, $path_name) . '/#' . $post_name;
		 ?>
		<a href="<?php echo $postlink; ?>" class="">Read the full story &rarr;</a>
	</div>

	<div class="image-gallery">
		<?php if($has_attachments){
			echo wp_get_attachment_image( $attachments[0]->ID, 'post-image' );
		} ?>
	
	</div>
</div>