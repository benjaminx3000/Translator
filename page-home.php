<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="ContentTop">
					<?php $items = wp_get_nav_menu_items( 'Home Page Feed' ); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="container">
						<?php the_content(); ?>
						</div>
						<?php get_template_part('nav', 'fun'); ?>
					<?php endwhile; // end of the loop. ?>
				</div><!--End #ContentTop -->

				<?php get_template_part('loop', 'custom'); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>