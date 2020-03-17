<form class="form searchform" role="search" method="get" action="<?php echo home_url( '/' ); ?>" >
	<?php do_action( 'resume_searchform_before' ); ?>
	<input class="form-control" type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Поиск', RESUME_TEXTDOMAIN ); ?>">
	<button type="submit" class="searchsubmit">
		<?php _e( 'Найти', RESUME_TEXTDOMAIN ); ?>
	</button>
	<?php do_action( 'resume_searchform_after' ); ?>
</form>