<div class="article">
	<h2 class="post-title"><?php the_title(); ?></h2>
	<div class="summary">
		<?php the_excerpt(); ?>
		<!--<?php the_content('Read the full story &gt;'); ?>-->
		<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<div class="image-gallery">
		<?php 
			$args = array(
			   'post_type' => 'attachment',
			   'numberposts' => -1,
			   'post_status' => null,
			   'post_parent' => $post->ID
			  );
			  $attachments = get_posts( $args );
			     if ( $attachments ) {
			        foreach ( $attachments as $attachment ) {
			           echo wp_get_attachment_image( $attachment->ID, 'post-image' );
			          }
			     }
		 ?>
	</div>
</div>