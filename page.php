<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="ContentTop" class="interior-page">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<?php $page_name = $post->post_name; ?>
					<?php endwhile; // end of the loop. ?>
				</div><!--End #ContentTop -->

				<?php 
					$query;
					switch ($page_name) {
						case 'client':
							$query = array('t_client');
							break;
						case 'studio':
						case 'product-studio':
							$query = array('t_product_studio');
							break;
						case 'lab':
							$query = array('t_lab' , 't_event');
							break;
						case 'calendar':
							$query = array('t_event');
							break;
						case 'experience-series':
							$query = array('t_xsmke');
							break;
						case 'about':
							$query = array();
							break;
						default:
							$query = array('t_product_studio', 't_event', 't_client', 't_lab', 't_xsmke');
							break;
					}

					$args = array( 'post_type' => $query,
						'posts_per_page' => 10,
						'orderby' => 'date' );
					$loop = new WP_Query( $args );
				?>

				<div id="ContentBottom" class="translator-feed">
					<?php $count = 0; global $more;?>
					<?php  while ( $loop->have_posts() ) : $loop->the_post() ; ?>
					<div id="<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<div class="preview">
								<?php $post_type = get_post_type();
									$special_title = $post_title = get_post_meta(get_the_id(), '_stream_title', true);
									$post_title = get_the_title();
									switch ($post_type) {
										case 'post':
											$post_title = get_the_title() .  " <span class='author'>by " . get_the_author() . "</span>";
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
									<polygon fill="#D71921" points="35,13 22,13 22,0 13,0 13,13 0,13 0,22 13,22 13,35 22,35 22,22 35,22 "/>
									</svg>
								</div>
								<?php } ?>

								<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Translator' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $post_title; ?></a></h2>

								<?php if($count % 2 == 1) { ?>
								<div class="svg-container plus">
									<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
									<polygon fill="#D71921" points="35,13 22,13 22,0 13,0 13,13 0,13 0,22 13,22 13,35 22,35 22,22 35,22 "/>
									</svg>
								</div>
								<?php } ?>
							</div>
							<div class="collapsable content">
								<?php $more = 0; ?>
								<?php 
									switch (get_post_type()) {
										case 't_event':
											get_template_part('content', 'event');
											break;
										default:
											get_template_part('content', 'post');
											break;
									}
								?>
								<?php $count ++; ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div><!-- End #ContentBottom -->

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>