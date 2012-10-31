<div class="article event">
	<?php if(get_post_type() != 'post') { ?>
	<h2 class="post-title"><?php the_title(); ?></h2>
	<?php } ?>

	<div class="event-info">
		<div class="date-time">
			<h3 class="date"><?php echo get_post_meta(get_the_id(), '_event_date', true); ?></h3>
			<p class="time">
				<?php echo get_post_meta(get_the_id(), '_event_start_time', true) . ' - ' . get_post_meta(get_the_id(), '_event_end_time', true); ?>
			</p>
		</div>
		<?php $link =  get_post_meta(get_the_id(), '_location_link', true); ?>
		<p>
			<span class="location-name">
				<?php if($link){echo "<a class='location' href='$link' target='_blank'>";} ?>
				<?php echo get_post_meta(get_the_id(), '_location', true); ?>
				<?php if($link){echo '</a>';} ?>
			</span><br>
		
		<span class="address"><?php echo get_post_meta(get_the_id(), '_address', true); ?></span></p>
	</div>
	<div class="summary">
		<?php echo apply_filters('the_content', $post->post_content); ?>
		<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
</div>