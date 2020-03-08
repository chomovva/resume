<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$page_id = get_theme_setting( 'advantages_page_id' );
$page_id = get_translate_id( $page_id, 'page' );


$experience = get_theme_setting( 'experience' );
$skills = get_theme_setting( 'skills' );
$title = get_theme_setting( 'advantages_title' );
$skills_count = get_theme_setting( 'skills_count' );
$content = __return_empty_string();


if ( ! empty( $page_id ) ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {
		$parts = get_extended( $page->post_content );
		$content = do_shortcode( $parts[ 'main' ], false );
	}

}



for ( $i = 0; $i < $skills_count; $i++ ) { 
	if ( empty( $skills[ $i ][ 'value' ] ) ) $skills[ $i ][ 'value' ] = 50;
}




if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	for ( $i = 0; $i < $skills_count; $i++ ) { 
		if ( ! empty( $skills[ $i ][ 'label' ] ) ) $skills[ $i ][ 'label' ] = pll__( $skills[ $i ][ 'label' ] );
	}
	for ( $i = 0; $i < 4; $i++ ) { 
		if ( ! empty( $experience[ $i ][ 'label' ] ) ) $experience[ $i ][ 'label' ] = pll__( $experience[ $i ][ 'label' ] );
	}
}



include get_theme_file_path( 'views/home/skills.php' );