<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="ContentTop" class="interior-page">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<?php $page_name = $post->post_name; ?>
					<?php endwhile; // end of the loop. ?>
				</div><!--End #ContentTop -->


			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>