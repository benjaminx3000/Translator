<div class="article no-gallery">
	<h2 class="post-title"><?php the_title(); ?></h2>
	<div class="summary">
		<?php 
			$content = $post->post_content;
			echo apply_filters('the_content', $content);
			
		?>
		<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
		
	</div>
	<div class="comments">
		<?php // comments_template( '', true ); ?>
	</div>
</div>