<?php



namespace resume;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = get_translate_id( get_theme_setting( 'services_page_id' ), 'page' );


if ( ! empty( $page_id ) ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {

		$title = get_theme_setting( 'services_title' );
		$label = get_theme_setting( 'services_label' );
		$excerpt = get_theme_setting( 'services_excerpt' );
		$services = get_theme_setting( 'services' );
		$permalink = get_permalink( $page->ID );

		foreach ( get_theme_setting( 'services' ) as $value ) {
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