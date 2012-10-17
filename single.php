<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="ContentTop" class="interior-page">
					<div class="container">
						<?php while ( have_posts() ) : the_post(); ?>
							<h1 class="page-title"><?php the_title() ?></h1>
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