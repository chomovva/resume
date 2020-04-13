<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_setting( 'jumbotron_title' );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
}


include get_theme_file_path( 'views/home/jumbotron.php' );