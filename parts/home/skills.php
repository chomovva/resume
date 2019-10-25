<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = resume\get_translate_id( get_theme_mod( RESUME_SLUG . '_skills_page_id', '' ), 'page' );
$experience = get_theme_mod( RESUME_SLUG . '_experience', array() );
$skills = get_theme_mod( RESUME_SLUG . '_skills', array() );
$title = get_theme_mod( RESUME_SLUG . '_skills_title', __( 'Мои скилы', RESUME_TEXTDOMAIN ) );

if ( ! empty( $page_id ) ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {
		$content = do_shortcode( $page->post_content, false );
	}

	$skills = get_theme_mod( RESUME_SLUG . '_skills', array() );

}


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	for ( $i = 0; $i < get_theme_mod( RESUME_SLUG . '_skills_count', 10 ); $i++ ) { 
		if ( ! empty( $skills[ $i ][ 'label' ] ) ) = pll__( $skills[ $i ][ 'label' ] );
	}
	for ( $i = 0; $i < 4; $i++ ) { 
		if ( ! empty( $experience[ $i ][ 'label' ] ) ) = pll__( $experience[ $i ][ 'label' ] );
	}
}


include get_theme_file_path( 'views/home/skills.php' );