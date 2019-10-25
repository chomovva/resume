<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( RESUME_SLUG . '_jumbotron_title', get_bloginfo( 'name' ) );
$src = get_theme_mod( RESUME_SLUG . '_jumbotron_bgi', RESUME_URL . 'images/jumbotron.jpg' );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
}


include get_theme_file_path( 'views/home/jumbotron.php' );