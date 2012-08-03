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
	<?php if(get_post_type() != 'post') { ?>
	<h2 class="post-title"><?php the_title(); ?></h2>
	<?php } ?>
	<div class="summary">
		<?php the_content('Read the full story &gt;'); ?>
		<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<div class="image-gallery">
		<?php if(get_post_type() == 't_event') { ?>
		<div class="event-info">
			<h3 class="date"><?php echo get_post_meta(get_the_id(), '_event_date', true); ?></h3>
			<p class="location"><?php echo get_post_meta(get_the_id(), '_location', true); ?></p>
		</div>
		<?php } ?>
		<?php if($has_attachments){
			echo wp_get_attachment_image( $attachments[0]->ID, 'post-image' );
	        // foreach ( $attachments as $attachment ) {
	        //    echo wp_get_attachment_image( $attachment->ID, 'post-image' );
		} ?>
	
	</div>
	<div class="comments">
		<?php // comments_template( '', true ); ?>
	</div>
</div>