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
		<?php 
			$content = apply_filters('the_content', $post->post_content);
		?>
		<?php echo $content; ?>
		<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
		<div class="more">
			<?php 
			$blog = '';
				if($post->post_type == 'post'){
					$blog = '/our-thinking';
				}
			?>

			<!-- <a class="button" href="<?php echo dirname(get_permalink()) . $blog . '#' . basename(get_permalink()); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Translator' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Read more</a> -->
		</div>
	</div>
	<div class="image-gallery">
		<?php if($has_attachments){
	        foreach ( $attachments as $attachment ) {
	          echo wp_get_attachment_image( $attachment->ID, 'post-image' );
	      	}
		} ?>
	</div>
	<div class="comments">
		<?php // comments_template( '', true ); ?>
	</div>
</div>