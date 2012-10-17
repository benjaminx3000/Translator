<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="ContentTop" class="interior-page">
					<div class="container">
						<?php while ( have_posts() ) : the_post(); ?>
							<h1 class="page-title"><?php the_title() ?></h1>
							
							<?php if(get_post_type() == 't_event') { //if event?>
								<div class="date-time">
									<h4 class="date-time">
										<span class="date">
											<?php echo get_post_meta(get_the_id(), '_event_date', true); ?>
										</span><br>
										<span class="time">
											<?php echo get_post_meta(get_the_id(), '_event_start_time', true) . ' - ' . get_post_meta(get_the_id(), '_event_end_time', true); ?>
										<span>
									</h4>
									<?php $link =  get_post_meta(get_the_id(), '_location_link', true); ?>
									<p>
										<span class="location-name">
											<?php echo get_post_meta(get_the_id(), '_location', true); ?>
										</span>
										<span class="address"><?php echo get_post_meta(get_the_id(), '_address', true); ?></span> 
										<?php if($link){echo " <a class='location' href='$link' target='_blank'>map</a>";} ?>
									</p>
								</div>
								<?php } //end if event ?>

							<?php the_content(); ?>
						<?php endwhile; // end of the loop. ?>
						<div class="comments">
							<a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>

							<div class="comments-container">
								<?php comments_template( '', true ); ?>
							</div>
							<?php  ?>

						</div>
					</div>
				</div><!--End #ContentTop -->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>