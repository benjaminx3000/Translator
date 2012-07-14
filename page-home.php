<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="ContentTop">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<div class="svg-container">
							<!--<svg version="1.0" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="193px" height="369.415px" viewBox="0 0 193 369.415" enable-background="new 0 0 193 369.415" xml:space="preserve">
							<g>
								<g>
									<path fill="#E6E7E8" d="M126.48,42.721c3.313,0,6,2.687,6,6s-2.687,6-6,6H126v143.737c34.372,12.15,59,44.925,59,83.457
										c0,34.912-20.218,65.099-49.582,79.5H57.582C28.218,347.014,8,316.827,8,281.915c0-38.532,24.628-71.307,59-83.457V54.721h-0.479
										c-3.313,0-6-2.687-6-6s2.687-6,6-6H126.48 M126.48,34.721H66.521c-7.72,0-14,6.28-14,14c0,4.954,2.586,9.315,6.479,11.804V192.98
										C23.483,207.96,0,243.004,0,281.915c0,18.395,5.197,36.285,15.03,51.736c9.564,15.03,23.061,27.115,39.029,34.946l1.667,0.817
										h1.856h77.836h1.856l1.667-0.817c15.969-7.831,29.465-19.916,39.029-34.946C187.803,318.2,193,300.31,193,281.915
										c0-38.911-23.483-73.955-59-88.935V60.525c3.893-2.489,6.48-6.851,6.48-11.805C140.48,41.001,134.2,34.721,126.48,34.721
										L126.48,34.721z"/>
								</g>
								<path fill="#F58337" d="M151.491,221.415H41.509C25.22,236.316,15,257.743,15,281.559c0,32.151,18.619,59.95,45.66,73.213h71.68
									C159.381,341.509,178,313.71,178,281.559C178,257.743,167.78,236.316,151.491,221.415z"/>
								<path fill="none" stroke="#FFFFFF" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" d="M81.294,259.427
									c-0.515,6.432-5.897,11.488-12.46,11.488c-5.974,0-10.969-4.19-12.207-9.795"/>
								<path fill="none" stroke="#FFFFFF" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" d="M135.154,260.961
									c-1.176,5.683-6.209,9.954-12.24,9.954c-6.563,0-11.946-5.059-12.46-11.491"/>
								<path fill="none" stroke="#FFFFFF" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" d="M136.985,294.057
									c-3.256,19.188-19.958,33.794-40.07,33.794c-20.137,0-36.855-14.645-40.083-33.869"/>
								<g class="bubble b1">
									<path fill="#F58337" d="M90.438,146.493c-6.617,0-12-5.383-12-12c0-6.616,5.383-11.999,12-11.999s12,5.383,12,11.999
										C102.438,141.11,97.055,146.493,90.438,146.493z"/>
									<path fill="#E6E7E8" d="M90.438,125.494c4.97,0,9,4.029,9,8.999c0,4.971-4.029,9-9,9s-9-4.029-9-9
										C81.438,129.523,85.468,125.494,90.438,125.494 M90.438,119.494c-8.271,0-15,6.729-15,14.999c0,8.271,6.729,15,15,15
										s15-6.729,15-15C105.438,126.223,98.709,119.494,90.438,119.494L90.438,119.494z"/>
								</g>
								<g class="bubble b2">
									<path fill="#F58337" d="M107.937,104.996c-6.617,0-12-5.383-12-12c0-6.616,5.383-11.999,12-11.999s12,5.383,12,11.999
										C119.937,99.613,114.554,104.996,107.937,104.996z"/>
									<path fill="#E6E7E8" d="M107.937,83.997c4.97,0,9,4.029,9,8.999c0,4.971-4.029,9-9,9s-9-4.029-9-9
										C98.938,88.026,102.967,83.997,107.937,83.997 M107.937,77.997c-8.271,0-15,6.729-15,14.999c0,8.271,6.729,15,15,15
										s15-6.729,15-15C122.937,84.726,116.208,77.997,107.937,77.997L107.937,77.997z"/>
								</g>
								<g class="bubble b3">
									<path fill="#F58337" d="M72.939,26.999c-6.617,0-12-5.383-12-12c0-6.616,5.383-11.999,12-11.999s12,5.383,12,11.999
										C84.938,21.616,79.556,26.999,72.939,26.999z"/>
									<path fill="#E6E7E8" d="M72.939,6c4.97,0,9,4.029,9,8.999c0,4.971-4.029,9-9,9s-9-4.029-9-9C63.939,10.029,67.969,6,72.939,6
										 M72.939,0c-8.271,0-15,6.729-15,14.999c0,8.271,6.729,15,15,15s15-6.729,15-15C87.938,6.729,81.21,0,72.939,0L72.939,0z"/>
								</g>
							</g>
							</svg>-->
						</div>
					<?php endwhile; // end of the loop. ?>
				</div><!--End #ContentTop -->

				<?php 
					$args = array( 'post_type' => array('t_client', 't_lab', 't_product_studio', 't_xsmke', 't_event', 'post'),
						'posts_per_page' => 10,
						'orderby' => 'date' );
					$loop = new WP_Query( $args );
				?>

				<div id="ContentBottom" class="translator-feed">
					<?php $count = 0; ?>
					<?php  while ( $loop->have_posts() ) : $loop->the_post() ; ?>
					<div id="<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<div class="preview">
								<?php $post_type = get_post_type();
									$post_title;
									switch ($post_type) {
										case 't_client':
											$post_title = get_the_title();
											break;
										case 't_product_studio':
											$post_title = get_the_title();
											break;
										case 't_lab':
											$post_title = get_the_title();
											break;
										case 't_event':
											$post_title = get_the_title();
											break;
										case 't_xsmke':
											$post_title = get_the_title();
											break;
										case 'post':
											$post_title = get_the_title() .  " <span class='author'>by " . get_the_author() . "</span>";
											break;
										default:
											$post_title = get_the_title();
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
							<div class="collapsable">
								<?php the_content(); ?>
								<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
								<?php the_taxonomies(); ?>
								<?php $count ++; ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div><!-- End #ContentBottom -->

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>