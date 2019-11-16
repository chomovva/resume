<!DOCTYPE html>
<html lang="ru">
	<?php get_template_part( 'parts/head' ); ?>
	<body class="error404" data-nav="inactive">
		<div class="wrap">
			<div class="counter404" id="counter404"></div>
			<?php
				$title = get_theme_mod( RESUME_SLUG . '_error404_title', __( 'Ошибка 404', RESUME_TEXTDOMAIN ) );
				$description = get_theme_mod( RESUME_SLUG . '_error404_description', '' );
				if ( empty( trim( $title ) ) ) { echo "<h1>" . $title . "</h1>"; }
				if ( has_nav_menu( 'error404' ) ) wp_nav_menu( array(
					'theme_location'  => 'error404',
					'menu'            => 'error404',
					'container'       => false,
					'menu_class'      => 'categories',
					'echo'            => true,
					'depth'           => 1,
				) );
				if ( ! empty( trim( $description ) ) ) { echo "<p class=\"description\">" . $description . "</p>"; }	
			?>
			<p><a class="home-link" href="<?php echo home_url( '/' ); ?>"><?php _e( 'На главную', RESUME_TEXTDOMAIN ); ?></a></p>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>