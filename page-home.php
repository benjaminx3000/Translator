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

					$args = array( 'post_type' => array('t_client', 't_lab', 't_product_studio', 't_xsmke', 't_event', 'post'),
						'posts_per_page' => 10,
						'orderby' => 'date' );
					$loop = new WP_Query( $args );

				?>
					<?php  while ( $loop->have_posts() ) : $loop->the_post() ; ?>
					<div id="<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title();?></a></h2>
							<div class="collapsable">
								<?php the_content(); ?>
								<?php edit_post_link( __( 'Edit', 'translator' ), '<span class="edit-link">', '</span>' ); ?>
								<?php the_taxonomies(); ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				 

			</div><!-- #content -->
		</div><!-- #primary -->
<!-- array_implode($glue, $separator, $array) {
       if (!is_array($array))
               return $array;
       $string = array();
       foreach ($array as $key => $val) {
               if (is_array($val))
                       $val = implode(',', $val);
               $string[] = "{$key}{$glue}{$val}"; -->
<?php get_footer(); ?>