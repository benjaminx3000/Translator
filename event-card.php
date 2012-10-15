<div class="event-card">
	<?php
		$terms = wp_get_post_terms($post->ID, 'event-type', array("fields" => "names"));
		$img = '';
	?>

	<?php 
	if ( count($terms) ) {
		switch ($terms[0]) {
			case 'Experience Series':
			case 'XSMKE':
				$img = 'icon-xsmke.png';
				break;
			case 'Focused Lab':
			case 'Open Lab':
				$img = 'icon-lab.jpg';
				break;
			default:
				$img = 'icon-default.png';
				break;
		}
	} ?>
	<?php if( has_post_thumbnail() ) { ?>
		<?php echo get_the_post_thumbnail( $post->ID, 'icon', array('class' => 'icon') ); ?> 
	<?php } else { ?>
		<img class="icon" src="<?php echo get_stylesheet_directory_uri() . '/css/img/' . $img ?>">
	<?php } ?>
	
	<div class="content">
		<h3><?php the_title(); ?></h3>
		<div class="date-time">
			<h4 class="date-time">
				<span class="date">
					<?php echo get_post_meta(get_the_id(), '_event_date', true); ?>
				</span><br>
				<span class="time">
					<?php echo get_post_meta(get_the_id(), '_event_start_time', true) . ' - ' . get_post_meta(get_the_id(), '_event_end_time', true); ?>
				<span>
			</h4>
		</div>
			<p class="excerpt">
				<?php the_excerpt(); ?>
			</p>
		
		<?php $link =  get_post_meta(get_the_id(), '_location_link', true); ?>
		<p>
			<span class="location-name">
				<?php echo get_post_meta(get_the_id(), '_location', true); ?>
			</span>
			<span class="address"><?php echo get_post_meta(get_the_id(), '_address', true); ?></span> 
			<?php if($link){echo " <a class='location' href='$link' target='_blank'>map</a>";} ?>
		</p>
	</div>
</div>