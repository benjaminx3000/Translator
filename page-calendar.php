<?php
/**
 * The template for displaying the calendar page.
 *
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php 

					$args = array( 'post_type' => 't_event', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );

				?>
					<?php  while ( $loop->have_posts() ) : $loop->the_post() ; ?>
					<div id="<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content event">
							<h1><?php the_title();?></h1>
							<?php the_content(); ?>
							<?php edit_post_link( __( 'Edit', 'translator' ), '<span class="edit-link">', '</span>' ); ?>
							<?php the_taxonomies(); ?>
						</div>
					</div>
					<?php endwhile; ?>
				 

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>