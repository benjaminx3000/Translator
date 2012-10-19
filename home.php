<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main" class="blog">

				<div id="ContentBottom" class="translator-feed">
					<div class="articles">
					<?php $count = 0; global $more; global $withcomments;?>
					<?php  while ( have_posts() ) : the_post() ; ?>
					<div id="<?php echo basename(get_permalink()); ?>" <?php post_class(); ?>>
						<div class="entry-content <?php echo(($count %2 == 1)? 'odd': 'even'); ?>">
							
							<div id="contetnt<?php the_ID(); ?>" class="collapsable expanded content">
								
								<?php get_template_part('content', 'post-preview'); ?>
								<?php $count ++; ?>
							</div>
						</div>
					</div>

					<?php endwhile; ?>

					</div>
					<div class="blog-nav">
						<div class="container">
							<div class="nav">
								<div class="newer"><?php previous_posts_link('Newer &gt;') ?></div>
								<div class="older"><?php next_posts_link('&lt; Older','') ?></div>
							</div>
						</div>
					</div>
				</div><!-- End #ContentBottom -->
				<div id="Sidebar"><?php get_sidebar(); ?></div>
				

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>