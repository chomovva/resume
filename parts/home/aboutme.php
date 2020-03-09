<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$page_id = get_theme_setting( 'aboutme_page_id' );
$page_id = get_translate_id( $page_id, 'page' );


if ( ! empty( $page_id ) ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {

		$title = get_theme_setting( 'aboutme_title' );
		$parts = get_extended( $page->post_content );
		$content = do_shortcode( $parts[ 'main' ], false );
		$foto_src = get_theme_setting( 'aboutme_foto' );
		$foto_alt = ( empty( $foto_src ) ) ? get_bloginfo( 'name', 'raw' ) : wp_get_attachment_caption( attachment_url_to_postid( $foto_src ) );
		$socials_links = render_links_list( get_theme_mod( RESUME_SLUG . '_links', array() ), 'socials' );
		$file = get_theme_setting( 'aboutme_file' );
		$more_label = get_theme_setting( 'aboutme_more_label' );
		$file_label = get_theme_setting( 'aboutme_file_label' );
		$permalink = get_permalink( $page->ID );

		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
			$more_label = pll__( $more_label );
			$file_label = pll__( $file_label );
		}

		if ( empty( trim( $title ) ) ) {
			$title = apply_filters( 'the_title', $page->post_title, $page->ID );
		}

		if ( empty( $foto_alt ) ) {
			$foto_alt = get_bloginfo( 'name' );
		}

		include get_theme_file_path( 'views/home/aboutme.php' );

	}

}