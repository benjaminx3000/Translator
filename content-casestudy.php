<div class="article case-study <?php echo($has_attachments ? 'image' : 'no-image'); ?>">
	<h2 class="post-title"><?php the_title(); ?></h2>
	<div class="summary">
		<?php 
			$content = apply_filters('the_content', $post->post_content);
		?>
		<?php echo $content; ?>
		<?php edit_post_link( __( 'Edit', 'Translator' ), '<span class="edit-link">', '</span>' ); ?>
		
	</div>
	<div class="image-gallery">
		<?php 
			$args = array(
			   'post_type' => 'attachment',
			   'numberposts' => -1,
			   'post_status' => null,
			   'post_parent' => $post->ID
			  );
		  	$attachments = get_posts( $args );
		  	
	        foreach ( $attachments as $attachment ) {
	          echo wp_get_attachment_image( $attachment->ID, 'post-image' );
	      	}
		?>
	</div>
	<div class="related">
	<?php 
		$args = array(
		   'post_type' 		=> 't_client',
		   'numberposts' 	=> -1,
		   'orderby'		=> 'menu_order',
		   'order'		=> 'ASC',
		   'post_status' 	=> null,
		   'post_parent' 	=> $post->ID
		  );
	  	$post_updates = get_posts( $args );
	  	
        foreach ( $post_updates as $post_update ) {
			echo('<hr>');
			echo ("<h3>$post_update->post_title</h3>");
         	$_post =  get_post( $post_update->ID );
         	echo( apply_filters('the_content', $_post->post_content) );
      	}
	?>
	</div>
	


</div>