<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


$current_term_id = get_translate_id( get_theme_setting( 'blog_cat_id' ), 'category' );


$current_term = get_category( $current_term_id, OBJECT, 'raw' );



if ( $current_term && ! is_wp_error( $current_term ) ) {

	$entries = get_posts( array(
		'numberposts' => get_theme_setting( 'myblog_numberposts' ),
		'category'    => $current_term->term_id,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'offset'      => 0,
		'suppress_filters' => true,
	), OBJECT, 'raw' );

	if ( is_array( $entries ) && ! empty( $entries ) ) {

		ob_start();

		foreach ( $entries as &$entry ) {
			$post = $entry;
			setup_postdata( $post );
			$additional_classes = 'myblog__entry';
			include get_theme_file_path( 'views/entry-default.php' );
		}

		wp_reset_postdata();

		$content = ob_get_contents();
		ob_end_clean();

		if ( ! empty( $content ) ) {
			$section_name = 'myblog';
			$title = get_theme_setting( 'myblog_title' );
			$description = get_theme_setting( 'myblog_description' );
			$label = get_theme_setting( 'myblog_label' );
			$morelink = get_category_link( $current_term );
			include get_theme_file_path( 'views/home/section.php' );
		}

	}


}