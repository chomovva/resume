<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };







/**
 * Перевод сблоков
 * */
foreach ( array(
    'error404_title',
    'error404_description',
    'aboutme_title',
    'aboutme_label',
    'jumbotron_title',
    'skills_title',
    'portfolio_title',
    'services_title',
    'services_excerpt',
) as $key ) {
    $value = wp_strip_all_tags( get_theme_mod( RESUME_SLUG . '_' . $key, '' ) );
    if ( ! empty( $value ) ) {
        pll_register_string( $key, $value, RESUME_TEXTDOMAIN, false );
    }
}




/**
 * Перевод контактов
 * */
if ( ! empty( $contacts = get_theme_mod( RESUME_SLUG . '_contacts', array() ) ) ) {
    foreach ( $contacts as $key => $value ) {
        pll_register_string( "contacts_{$key}", $value, RESUME_TEXTDOMAIN, false );
    }
}



/**
 * Ссылок на соц. сети
 * */
if ( ! empty( $links = get_theme_mod( RESUME_SLUG . '_links', array() ) ) ) {
    foreach ( $links as $key => $value ) {
        pll_register_string( "links_{$key}", $value, RESUME_TEXTDOMAIN, false );
    }
}




/**
 * Заголовки для наименований показателей опыта работы
 * */
$experience = get_theme_mod( RESUME_SLUG . '_experience', array() );
if ( is_array( $experience ) && ! empty( $experience ) ) {
    for ( $i = 0; $i < 4; $i++) { 
        if ( isset( $experience[ $i ][ 'label' ] ) && ! empty( $experience[ $i ][ 'label' ] ) )  {
            pll_register_string( "experience_{$i}", $experience[ $i ][ 'label' ], RESUME_TEXTDOMAIN, false );
        }
    }
}