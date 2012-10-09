<div id="ContentBottom" class="translator-feed">
	
	<?php
		$count = 0;
		global $more;
		
		$post_ids = array();
		$menu_items = wp_get_nav_menu_items( 'Events Feed' );
		foreach ( (array) $menu_items as $key => $menu_item ) {
		    $post = wp_get_single_post($menu_item->object_id);
	?>
	
	<div id="<?php echo basename(get_permalink()); ?>"  <?php post_class(); ?>>
		<div class="entry-content">
			<div class="preview <?php echo (($count % 2 == 0)? 'odd' : 'even'); ?>">
				<?php $post_type = get_post_type();
					$special_title = $post_title = get_post_meta(get_the_id(), '_stream_title', true);
					$post_title = get_the_title();
					switch ($post_type) {
						case 'post':
							$post_title = get_the_title() .  " <span class='author'>by " . get_the_author_meta('user_nicename',($post->post_author)) . "</span>";
							break;
						default:
							($special_title == '')? $post_title = get_the_title() : $post_title = $special_title;
							break;
					}
				?>
								
				<?php if($count % 2 == 0) { ?>
				<div class="svg-container plus left">
					<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
					<polygon class="plust" fill="#D71921" points="35,13 22,13 22,0 13,0 13,13 0,13 0,22 13,22 13,35 22,35 22,22 35,22 "/>
					<polygon class="minus" fill="#D71921" points="35,13 0,13 0,22 35,22 "/>
					</svg>
				</div>
				<?php } ?>

				<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Translator' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $post_title; ?></a></h2>

				<?php if($count % 2 == 1) { ?>
				<div class="svg-container plus">
					<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
					<polygon class="plust" fill="#D71921" points="35,13 22,13 22,0 13,0 13,13 0,13 0,22 13,22 13,35 22,35 22,22 35,22 "/>
					<polygon class="minus" fill="#D71921" points="35,13 0,13 0,22 35,22 "/>
					</svg>
				</div>
				<?php } ?>

			</div>
			<div id="contetnt<?php the_ID(); ?>" class="collapsable content">
				<?php $more = 0; ?>
				<?php get_template_part('home', 'eventPost');?>
			</div>
		</div>
	</div>
	<?php $count ++; ?>
	<?php } ?>
</div><!-- End #ContentBottom -->