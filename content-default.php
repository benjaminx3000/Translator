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
	<div class="post-preview">
		<?php the_content(); ?>

		<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	
	<div class="comments">
		<?php // comments_template( '', true ); ?>
	</div>
</div>