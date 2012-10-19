<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main" class="blog">
				<div id="ContentTop" class="interior-page">
					<div class="container">
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="article">
							<h1 class="page-title"><?php the_title() ?></h1>
							<?php the_content(); ?>
						<div class="comments">
							<a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>

							<div class="comments-container">
								<?php comments_template( '', true ); ?>
							</div>
							
						</div>
						<?php endwhile; // end of the loop. ?>

						</div>
					</div>
				</div><!--End #ContentTop -->
				<div id="Sidebar"><?php get_sidebar(); ?></div>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>