<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_ids = get_theme_setting( 'way_page_ids' );
$entries = __return_empty_array();
$bgi_src = get_theme_setting( 'way_bgi' );


if ( empty( $bgi_src ) ) {
	$bgi_src = apply_filters( 'get_default_setting', way_bgi );
}



if ( is_array( $page_ids ) && ! empty( $page_ids ) ) {

	foreach ( $page_ids as $page_id ) {

		$page_id = get_translate_id( $page_id, 'page' );
		
		if ( ! empty( $page_id ) ) {
			$page = get_page( $page_id, OBJECT, 'raw' );
			$parts = get_extended( $page->post_content );
			if ( ! empty( trim( $parts[ 'main' ] ) ) ) $entries[] = array(
				'title'     => apply_filters( 'the_title', $page->post_title, $page->ID ),
				'content'   => do_shortcode( $parts[ 'main' ], false ),
				'permalink' => get_permalink( $page->ID ),
			);			
		}

	}

}


if ( ! empty( $entries ) ) {

	include get_theme_file_path( 'views/home/way.php' );

}