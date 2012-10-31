<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main" class="blog">
				<div id="ContentTop" class="interior-page single-post">
					<div class="container">
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="article">
							<div class="post-head author-meta">
								<?php $twitter_handle = get_the_author_meta('twitter_handle'); ?>
								<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $twitter_handle; ?>&amp;size=bigger">
								<span class="info">
									<h1><?php the_title(); ?></h1>
									<?php the_date('F jS, Y'); ?><br>
									Written by <?php the_author_link(); ?><br>
									<a href="http://twitter.com/<?php echo $twitter_handle; ?>">@<?php echo $twitter_handle; ?></a>
								</span>
							</div>
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