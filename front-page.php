<?php


get_header();


foreach ( array(
	'jumbotron',
    'aboutme',
    'services',
    'way',
    'skills',
    'portfolio',
    'reviews',
    'myblog',
) as $key ) {
    if ( get_theme_mod( RESUME_SLUG . "_{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}



get_footer();