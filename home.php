<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main" class="blog">

				<div id="ContentBottom" class="translator-feed">
					<?php $count = 0; global $more; global $withcomments;?>
					<?php  while ( have_posts() ) : the_post() ; ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<div class="preview">
								<div class="container">

								<?php 
									$post_title = get_the_title();
								 ?>

								

								<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Translator' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $post_title; ?></a></h2>

								<div class="svg-container plus">
									<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
									<polygon class="plust" fill="#D71921" points="35,13 22,13 22,0 13,0 13,13 0,13 0,22 13,22 13,35 22,35 22,22 35,22 "/>
									<polygon class="minus" fill="#D71921" points="35,13 0,13 0,22 35,22 "/>
									</svg>
								</div>
								</div>
							</div>
							<div id="contetnt<?php the_ID(); ?>" class="collapsable expanded content">
								<?php
									$more = 1;
									$withcomments = 1;
								?>
						
								<?php get_template_part('content', 'post') ?>
								<?php $count ++; ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<div class="preview">
						<div class="container">
							<div class="blog-nav">
								<div class="newer"><?php previous_posts_link('Newer &gt;') ?></div>
								<div class="older"><?php next_posts_link('&lt; Older','') ?></div>
								<!--<?php posts_nav_link(' ','Newer &gt;','&lt; Older'); ?>-->
							</div>
							<!-- <a href="#older" class="older">&lt; Older</a><a href="#newer" class="newer">Newer &gt;</a> -->
						</div>
					</div>
				</div><!-- End #ContentBottom -->
				<div id="Sidebar"><?php get_sidebar(); ?></div>
				<div class="bg-left"></div>
				<div class="bg-right"></div>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>