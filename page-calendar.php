<?php get_header(); ?>
		<?php $page_name = $post->post_name; ?>
		<div id="primary" class="<?php echo 'page-' . $page_name; ?>">
			<div id="content" role="main">
				<div id="ContentTop" class="interior-page <?php echo $page_name; ?>">
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="container" >
						<?php
						$_stream_title = get_post_meta(get_the_id(), '_stream_title', true);
						if( $_stream_title != '') { ?>
						<h1 class="page-title"><?php echo($_stream_title); ?></h1>
						<?php } ?>
						<?php 
							if ( has_post_thumbnail() ) { 
								the_post_thumbnail(array(300, 1000));
							} 
						?>
						<?php the_content(); ?>
						
						<?php
							$week_start = strtotime( date('Y\WW') );
						?>
						<?php 
							$query = array('t_event');
							$meta_query = array(array('key' => '_time_stamp',
								'value' => intval($week_start),
								'compare' => '>='));
							$args = array('post_type' => $query,
								'posts_per_page' => 10,
								'meta_key' => '_time_stamp',
								'orderby' => 'meta_value_num',
								'order' => 'DEC',
								'meta_query' => $meta_query);
							$events_loop = new WP_Query( $args );
						 ?>

					</div>

					<?php endwhile; // end of the loop. ?>
				</div><!--End #ContentTop -->
				<div id="ContentMid">
					<div class="container">
						<?php 
							get_template_part('tabs', $page_name);
						?>
					</div>
					<div class="box"></div>
				</div>
				
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>