<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$cat_id = resume\get_translate_id( get_theme_mod( RESUME_SLUG . '_portfolio_cat_id', '' ), 'category' );


$cat = get_category( $cat_id, OBJECT, 'raw' );



if ( $cat && ! is_wp_error( $cat ) ) {

	$entries = get_posts( array(
		'numberposts' => get_theme_mod( RESUME_SLUG . '_portfolio_numberposts', '10' ),
		'category'    => $cat->term_id,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'suppress_filters' => true,
	), OBJECT, 'raw' );


	if ( is_array( $entries ) && ! empty( $entries ) ) {
		$title = get_theme_mod( RESUME_SLUG . '_portfolio_title', __( 'Портфолио', RESUME_TEXTDOMAIN ) );
		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
		}
		if ( empty( $title ) ) $title = strip_tags( apply_filters( 'single_cat_title', $cat->name ) );
		wp_enqueue_script( 'slick' );
		wp_enqueue_style( 'slick' );
		wp_add_inline_script( 'slick', file_get_contents( RESUME_DIR . 'scripts/portfolio-init.min.js' ), 'after' );
		include get_theme_file_path( 'views/home/portfolio.php' );
	}

}