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
	<div class="event-info">
		<div class="date-time">
			<h3 class="date"><?php echo get_post_meta(get_the_id(), '_event_date', true); ?></h3>
			<p class="time">
				<?php echo get_post_meta(get_the_id(), '_event_start_time', true) . ' - ' . get_post_meta(get_the_id(), '_event_end_time', true); ?>
			</p>
		</div>

		<p class="location"><?php echo get_post_meta(get_the_id(), '_location', true); ?></p>
	</div>
	<div class="comments">
		<?php comments_template( '', true ); ?>
	</div>
</div>