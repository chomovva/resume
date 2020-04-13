<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$section_name = 'reviews';
$title = get_theme_setting( 'reviews_title' );
$description = get_theme_setting( 'reviews_description' );
$content = __return_empty_string();
$morelink = __return_empty_string();
$label = get_theme_setting( 'reviews_label' );
$page_id = get_translate_id( get_theme_setting( 'reviews_page_id' ), 'page' );
$page = ( empty( $page_id ) ) ? __return_false() : get_post( $page_id, OBJECT );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$description = pll__( $description );
	$label = pll__( $label );
}

if ( $page instanceof \WP_Post ) {
	if ( empty( $title ) ) {
		$title = apply_filters( 'the_title', $page->post_title, $page->ID );
	}
	if ( empty( $description ) ) {
		$description = $page->post_excerpt;
	}
	$morelink = get_permalink( $page );
}


switch ( get_theme_setting( 'reviews_type' ) ) {
	case 'content':
		if ( $page instanceof \WP_Post ) {
			$parts = get_extended( $page->post_content );
			$content = do_shortcode( $parts[ 'main' ], false );
		}
		break;
	case 'list':
	default:
		$content = get_reviews_list( array(
			'section' => false,
		) );
		break;
}


if ( ! empty( $content ) ) {
	include get_theme_file_path( 'views/home/section.php' );
}