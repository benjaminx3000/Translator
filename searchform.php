<form role="search" method="get" id="searchform" action="<?php echo( home_url( '/' ) ); ?>" >
	<label class="assistive-text" for="s">Search</label>
	<input class="field" type="text" value="<?php the_search_query();?>" name="s" id="s" />
	<input type="submit" name="submit" id="searchsubmit" value="Search" />
</form>