<div id="ContentBottom" class="translator-feed">
	
	<?php 
		$now = strtotime( date('d') );
		$query = array('t_event');
		$meta_query = array(array('key' => '_time_stamp',
			'value' => array(intval($now), intval($week_end) ),
			'compare' => '>='));
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
	
	<?php  while ( $loop->have_posts() ) : $loop->the_post() ; ?>
	<div id="<?php echo basename(get_permalink()); ?>"  <?php post_class(); ?>>
		<div class="entry-content">
			<div class="preview <?php echo (($count % 2 == 0)? 'odd' : 'even'); if( intval(get_post_meta(get_the_id(), '_time_stamp', true)) <= intval(time()) && intval(get_post_meta(get_the_id(), '_time_stamp', true))!= null){echo ' past';} ?>">
				<?php $post_type = get_post_type();
					$special_title = $post_title = get_post_meta(get_the_id(), '_stream_title', true);
					$post_title = get_the_title();
					switch ($post_type) {
						case 'post':
							$post_title = get_the_title() .  " <span class='author'>by " . get_the_author_meta('user_nicename',($post->post_author)) . "</span>";
							break;
						default:
							($special_title == '')? $post_title = get_the_title() : $post_title = $special_title;
							break;
					}
				?>
								
				<?php if($count % 2 == 0) { ?>
				<div class="svg-container plus left">
					<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
					<polygon class="plust" fill="#D71921" points="35,13 22,13 22,0 13,0 13,13 0,13 0,22 13,22 13,35 22,35 22,22 35,22 "/>
					<polygon class="minus" fill="#D71921" points="35,13 0,13 0,22 35,22 "/>
					</svg>
				</div>
				<?php } ?>

				<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Translator' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $post_title; ?></a></h2>

				<?php if($count % 2 == 1) { ?>
				<div class="svg-container plus">
					<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
					<polygon class="plust" fill="#D71921" points="35,13 22,13 22,0 13,0 13,13 0,13 0,22 13,22 13,35 22,35 22,22 35,22 "/>
					<polygon class="minus" fill="#D71921" points="35,13 0,13 0,22 35,22 "/>
					</svg>
				</div>
				<?php } ?>

			</div>
			<div id="contetnt<?php the_ID(); ?>" class="collapsable content">
				<?php $more = 0; ?>
				<?get_template_part('content', 'event');?>
			</div>
		</div>
	</div>
	<?php $count ++; ?>
	<?php endwhile; ?>
</div><!-- End #ContentBottom -->