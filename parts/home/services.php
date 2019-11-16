<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = resume\get_translate_id( get_theme_mod( RESUME_SLUG . '_services_page_id', '' ), 'page' );


if ( ! empty( $page_id ) ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {

		$title = get_theme_mod( RESUME_SLUG . '_services_title', __( 'Чем я занимаюсь', RESUME_TEXTDOMAIN ) );
		$label = get_theme_mod( RESUME_SLUG . '_services_label', __( 'Подробней', RESUME_TEXTDOMAIN ) );
		$excerpt = get_theme_mod( RESUME_SLUG . '_services_excerpt', '' );
		$services = get_theme_mod( RESUME_SLUG . '_services', __return_empty_array() );
		$permalink = get_permalink( $page->ID );

		foreach ( get_theme_mod( RESUME_SLUG . '_services', array() ) as $value ) {
			if ( empty( trim( $value ) ) ) {
				$services[] = $value;
			}
		}

		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
			$label = pll__( $label );
			$excerpt = pll__( $excerpt );
			$services = array_map( 'pll__', $services );
		}

		if ( empty( trim( $title ) ) ) {
			$title = apply_filters( 'the_title', $page->post_title, $page->ID );
		}

		if ( empty( $excerpt ) ) {
			$excerpt = $page->post_excerpt;
		}

		include get_theme_file_path( 'views/home/services.php' );

	}

}