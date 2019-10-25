<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = resume\get_translate_id( get_theme_mod( RESUME_SLUG . '_aboutme_page_id', '' ), 'page' );


if ( ! empty( $page_id ) ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {

		$title = get_theme_mod( RESUME_SLUG . '_aboutme_title', __( 'Обо мне', RESUME_TEXTDOMAIN ) );
		$content = $page->post_content;
		$foto_src = get_theme_mod( RESUME_SLUG . '_aboutme_foto', RESUME_URL . 'images/user.png' );
		$foto_alt = ( empty( $foto_src ) ) ? get_bloginfo( 'name', 'raw' ) : wp_get_attachment_caption( attachment_url_to_postid( $foto_src ) );
		$socials_links = resume\render_links_list( get_theme_mod( RESUME_SLUG . '_links', array() ), 'socials' );
		$file = get_theme_mod( RESUME_SLUG . '_aboutme_file', '' );
		$label = get_theme_mod( RESUME_SLUG . '_aboutme_label', __( 'Скачать резюме', RESUME_TEXTDOMAIN ) );

		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
			$label = pll__( $label );
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