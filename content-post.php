<div class="article">
	<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
	<div class="post-head author-meta">
		<?php $twitter_handle = get_the_author_meta('twitter_handle', $post->post_author); ?>
		<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $twitter_handle; ?>&amp;size=bigger">
		<span class="info">
			<?php the_time('F jS, Y'); ?><br>
			Written by <?php echo get_the_author_meta('display_name', $post->post_author); ?><br>
			<a href="http://twitter.com/<?php echo $twitter_handle; ?>">@<?php echo $twitter_handle; ?></a>
		</span>
	</div>

	<h4></h4>
	<div class="post-preview">
		<?php echo apply_filters('the_excerpt', $post->post_excerpt); ?>
		<div>
			<a href="<?php the_permalink() ?>" class="more">more</a>
		</div>
	</div>
	<div class="post-footer">
		<div class="tags">
			<?php the_tags('Tagged with: '); ?>
		</div>
		<div class="comments">
			<a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
		</div>
	</div>
	

</div>