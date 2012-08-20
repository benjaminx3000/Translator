<div class="article">
	<div class="post-head author-meta">
		<?php $twitter_handle = get_the_author_meta('twitter_handle'); ?>
		<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $twitter_handle; ?>&amp;size=bigger">
		<span class="info">
			<?php the_date('F jS, Y'); ?><br>
			Written by <?php the_author_link(); ?><br>
			<a href="http://twitter.com/<?php echo $twitter_handle; ?>">@<?php echo $twitter_handle; ?></a>
		</span>
	</div>

	<h4></h4>
	<div class="post-preview">
		<?php the_content('More'); ?>
		<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<div class="post-footer">
		<div class="tags">
			<?php the_tags('Tagged with: '); ?>
		</div>
		<div class="comments">
			<a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>

			<div class="comments-container">
				<?php comments_template( '', true ); ?>
			</div>
			<?php  ?>

		</div>
	</div>
	

</div>