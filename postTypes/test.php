<?php

	function favicon_link() {
	    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
	}
	add_action('wp_head', 'favicon_link');
?>