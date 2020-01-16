<form class="form searchform" role="search" method="get" action="<?php echo home_url( '/' ); ?>" >
	<input class="form-control" type="search" value="<?php echo get_search_query(); ?>" name="s">
	<button type="submit" class="searchsubmit"><?php _e( 'Найти', RESUME_TEXTDOMAIN ); ?></button>
</form>