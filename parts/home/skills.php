<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$page_id = get_theme_setting( 'skills_page_id' );
$page_id = get_translate_id( $page_id, 'page' );


if ( ! empty( $page_id ) ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {

		$title = get_theme_setting( 'skills_title' );
		$parts = get_extended( $page->post_content );
		$content = do_shortcode( $parts[ 'main' ], false );

		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
		}

		if ( empty( trim( $title ) ) ) {
			$title = apply_filters( 'the_title', $page->post_title, $page->ID );
		}

		$experience = get_experience_list();
		$skills = get_skills_list();

		include get_theme_file_path( 'views/home/skills.php' );

	}

}