<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = resume\get_translate_id( get_theme_mod( RESUME_SLUG . '_aboutme_page_id', '' ), 'page' );


if ( ! empty( $page_id ) ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {

		$title = get_theme_mod( RESUME_SLUG . '_aboutme_title', __( 'Обо мне', RESUME_TEXTDOMAIN ) );
		$parts = get_extended( $page->post_content );
		$content = do_shortcode( $parts[ 'main' ], false );
		$foto_src = get_theme_mod( RESUME_SLUG . '_aboutme_foto', RESUME_URL . 'images/user.png' );
		$foto_alt = ( empty( $foto_src ) ) ? get_bloginfo( 'name', 'raw' ) : wp_get_attachment_caption( attachment_url_to_postid( $foto_src ) );
		$socials_links = resume\render_links_list( get_theme_mod( RESUME_SLUG . '_links', array() ), 'socials' );
		$file = get_theme_mod( RESUME_SLUG . '_aboutme_file', '' );
		$more_label = get_theme_mod( RESUME_SLUG . '_aboutme_more_label', __( 'Подробней обо мне', RESUME_TEXTDOMAIN ) );
		$file_label = get_theme_mod( RESUME_SLUG . '_aboutme_file_label', __( 'Скачать резюме', RESUME_TEXTDOMAIN ) );
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