<?php


get_header();


get_template_part( "parts/home/jumbotron" );


foreach ( array(
    'aboutme',
    'services',
    'way',
    'skills',
    'portfolio',
) as $key ) {
    if ( get_theme_mod( RESUME_SLUG . "_{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}



get_footer();