<div id="this-week" class="this-week hentry">
	<div class="entry-content">
		<div class="preview even">
			<h2>
				<a href="#this-week-at" rel="bookmark">What's going on this week at Translator</a>
			</h2>
			<div class="svg-container plus">
				<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
				<polygon class="plust" fill="#D71921" points="35,13 22,13 22,0 13,0 13,13 0,13 0,22 13,22 13,35 22,35 22,22 35,22 "/>
				<polygon class="minus" fill="#D71921" points="35,13 0,13 0,22 35,22 "/>
				</svg>
			</div>
		</div>
		<div id="this-week-at" class="collapsable expanded content">
			<div class="article">
				<?php
					$week_start = strtotime( date('Y\WW') );
					$week_end = strtotime( date('Y\WW') . '+1 weeks' );
				?>
				<?php 
					$query = array('t_event');
					$meta_query = array(array('key' => '_time_stamp',
						'value' => array(intval($week_start), intval($week_end) ),
						'compare' => 'BETWEEN'));
					$args = array('post_type' => $query,
						'posts_per_page' => 10,
						'meta_key' => '_time_stamp',
						'orderby' => 'meta_value_num',
						'order' => 'DEC',
						'meta_query' => $meta_query);
					$loop = new WP_Query( $args );
					$event_count = 0;
					$rows = ceil($loop->post_count / 3);
				 ?>
				<?php  while ( $loop->have_posts() ) : $loop->the_post() ; ?><? //get_template_part('content', 'event');?>
				<?php if($event_count % 3 == 0) { ?>
					<div class="row <?php if( ceil(($event_count + 1) / 3) == $rows ) {echo 'row-' . $loop->post_count % 3;} ?>">
				<?php } ?>
				<?php //get_template_part('event', 'card'); ?>
				<?php include(locate_template('event-card.php')); ?>
				<?php if($event_count % 3 == 2 || $event_count + 1 == $loop->post_count) { ?>
					</div> <!-- the end -->
				<?php } ?>
				<?php $event_count ++; ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
	