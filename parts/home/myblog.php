<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$cat_id = get_translate_id( get_theme_mod( RESUME_SLUG . '_blog_cat_id', '' ), 'category' );


$cat = get_category( $cat_id, OBJECT, 'raw' );



if ( $cat && ! is_wp_error( $cat ) ) {

	$entries = get_posts( array(
		'numberposts' => get_theme_mod( RESUME_SLUG . '_myblog_numberposts', 3 ),
		'category'    => $cat->term_id,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'offset'      => 0,
		'suppress_filters' => true,
	), OBJECT, 'raw' );

	if ( is_array( $entries ) && ! empty( $entries ) ) {

		ob_start();

		foreach ( $entries as $entry ) {
			setup_postdata( $entry );
			render_entry( $entry, 'myblog__entry', $cat_id );
		}

		wp_reset_postdata();

		$content = ob_get_contents();
		ob_end_clean();

		if ( ! empty( $content ) ) {
			$section_name = 'myblog';
			$title = get_theme_mod( RESUME_SLUG . '_myblog_title', __( 'Блог', RESUME_TEXTDOMAIN ) );
			$description = get_theme_mod( RESUME_SLUG . '_myblog_description', '' );
			$label = get_theme_mod( RESUME_SLUG . '_myblog_label', __( 'Подробней', RESUME_TEXTDOMAIN ) );
			$morelink = get_category_link( $cat );
			include get_theme_file_path( 'views/home/section.php' );
		}

	}


}