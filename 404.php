<?php


namespace resume;


get_header( '404' );


?>

	<div class="counter404" id="counter404"></div>

<?php

	$title = get_theme_setting( 'error404_title' );
	$description = get_theme_setting( 'error404_description' );

	if ( function_exists( 'pll__' ) ) {
		$title = pll__( $title );
		$description = pll__( $description );
	}

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

	<p>
		<a class="home-link" href="<?php echo home_url( '/' ); ?>">
			<?php _e( 'На главную', RESUME_TEXTDOMAIN ); ?>
		</a>
	</p>
	<?php get_search_form( true ); ?>

<?php

get_footer( '404' );