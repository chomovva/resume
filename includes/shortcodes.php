<?php



namespace resume;



if ( ! defined( 'ABSPATH' ) ) { exit; };




function the_resume_links( $atts ) {
	$atts = shortcode_atts( array(
		'type' => 'contacts',
	), $atts );
	$reuslt = __return_empty_array();
	if ( in_array( $atts[ 'type' ], array( 'contacts', 'links' ) ) ) {
		$contacts = get_theme_mod( RESUME_SLUG . "_{$atts[ 'type' ]}", array() );
		if ( ! empty( $contacts ) ) {
			$result[] = '<ul>';
			foreach ( $contacts as $key => $value ) {
				$result[] = sprintf(
					'<li>%1$s: <a href="%2$s">%2$s</a></li>',
					$key,
					$value
				);
			}
			$result[] = '</ul>';
		}
	}
	return implode( "\r\n", $result );
}

add_shortcode( 'the_resume_links', 'resume\the_resume_links' );





add_shortcode( 'languages_list', 'resume\get_languages_list' );