<?php 
	$args = array(
	   'post_type' => 'attachment',
	   'numberposts' => -1,
	   'post_status' => null,
	   'post_parent' => $post->ID
	  );
	  $attachments = get_posts( $args );
	print_r($attachments);
	     if ( $attachments ) {
	        foreach ( $attachments as $attachment ) {
	           echo '<li>';
	           echo wp_get_attachment_image( $attachment->ID, 'post-image' );
	           echo '<p>';
	           echo apply_filters( 'the_title', $attachment->post_title );
	           echo '</p></li>';
	          }
	     }
 ?>