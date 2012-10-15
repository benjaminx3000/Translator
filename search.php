<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>
				<div id="ContentTop">
					<div class="container">
						<header class="page-header">
							<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>
					</div>
				</div>

			<?php get_template_part('loop', 'search'); ?>

			<?php else : ?>
				<!-- No Entries Found -->
				<div id="ContentTop">
					<div class="container">
						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'Translator' ); ?></h1>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'Translator' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->
					</div>
				</div>

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>