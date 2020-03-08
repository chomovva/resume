<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_setting( 'jumbotron_title' );
$src = get_theme_setting( 'jumbotron_bgi' );


if ( empty( $src ) ) {
	$src = apply_filters( 'get_default_setting', 'jumbotron_bgi' );
}


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
}


include get_theme_file_path( 'views/home/jumbotron.php' );