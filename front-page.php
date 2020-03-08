<?php


namespace resume;


get_header();


foreach ( apply_filters( 'resume_front_page_sections', array(
	'jumbotron',
    'aboutme',
    'services',
    'way',
    'advantages',
    'portfolio',
    'reviews',
    'myblog',
) ) as $key ) {
    if ( get_theme_setting( "{$key}_flag" ) ) {
        get_template_part( "parts/home/$key" );
    }
}


get_footer();