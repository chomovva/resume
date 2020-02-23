<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };







/**
 * Перевод сблоков
 */
foreach ( array(
    'error404_title'        => __( 'Ошибка 404', RESUME_TEXTDOMAIN ),
    'error404_description'  => '',
    'aboutme_title'         => __( 'Обо мне', RESUME_TEXTDOMAIN ),
    'aboutme_more_label'    => __( 'Подробней обо мне', RESUME_TEXTDOMAIN ),
    'aboutme_file_label'    => __( 'Скачать резюме', RESUME_TEXTDOMAIN ),
    'jumbotron_title'       => '',
    'skills_title'          => __( '', RESUME_TEXTDOMAIN ),
    'portfolio_title'       => __( 'Портфолио', RESUME_TEXTDOMAIN ),
    'portfolio_description' => '',
    'reviews_title'         => __( 'Отзывы', RESUME_TEXTDOMAIN ),
    'reviews_description'   => '',
    'reviews_label'         => __( 'Смотреть все отзывы', RESUME_TEXTDOMAIN ),
    'services_title'        => __( '', RESUME_TEXTDOMAIN ),
    'services_excerpt'      => __( '', RESUME_TEXTDOMAIN ),
) as $key ) {
    $value = wp_strip_all_tags( get_theme_mod( RESUME_SLUG . '_' . $key, '' ) );
    if ( ! empty( trim( $value ) ) ) {
        pll_register_string( $key, $value, RESUME_TEXTDOMAIN, false );
    }
}




/**
 * Перевод контактов
 */
if ( ! empty( $contacts = get_theme_mod( RESUME_SLUG . '_contacts', array() ) ) ) {
    foreach ( $contacts as $key => $value ) {
        if ( ! empty( trim( $value ) ) ) {
            pll_register_string( "contacts_{$key}", $value, RESUME_TEXTDOMAIN, false );
        }
    }
}



/**
 * Ссылок на соц. сети
 */
if ( ! empty( $links = get_theme_mod( RESUME_SLUG . '_links', array() ) ) ) {
    foreach ( $links as $key => $value ) {
        if ( ! empty( trim( $value ) ) ) {
            pll_register_string( "links_{$key}", $value, RESUME_TEXTDOMAIN, false );
        }
    }
}




/**
 * Заголовки для наименований показателей опыта работы
 */
$experience = get_theme_mod( RESUME_SLUG . '_experience', array() );
if ( is_array( $experience ) && ! empty( $experience ) ) {
    for ( $i = 0; $i < 4; $i++) { 
        if ( isset( $experience[ $i ][ 'label' ] ) && ! empty( trim( $experience[ $i ][ 'label' ] ) ) )  {
            pll_register_string( "experience_{$i}", $experience[ $i ][ 'label' ], RESUME_TEXTDOMAIN, false );
        }
    }
}




/**
 * Регистрация переводов строк для списка услуг
 */
$services = get_theme_mod( RESUME_SLUG . '_services', array() );
if ( is_array( $services ) && ! empty( $services ) ) {
    for ( $i = 0; $i < get_theme_mod( RESUME_SLUG . '_services_count', 6 ); $i++ ) { 
        if ( isset( $services[ $i ] ) && ! empty( trim( $services[ $i ] ) ) )  {
            pll_register_string( "services_{$i}", $services[ $i ], RESUME_TEXTDOMAIN, false );
        }
    }
}




/**
 * Регистрация переводов отзывов об оказанных услугах
 */
$reviews = get_theme_mod( RESUME_SLUG . '_reviews', array() );
if ( is_array( $reviews ) && ! empty( $reviews ) ) {
    for ( $i = 0;  $i < get_theme_mod( RESUME_SLUG . '_reviews_count', 5 );  $i++ ) {
        if ( isset( $reviews[ $i ] ) && is_array( $reviews[ $i ] ) ) {
            foreach ( array( 'author', 'content', 'link', 'label' ) as $key ) {
                if ( isset( $reviews[ $i ][ $key ] ) && ! empty( trim( $reviews[ $i ][ $key ] ) ) ) {
                    pll_register_string( "reviews_{$i}_{$key}", $reviews[ $i ][ $key ], RESUME_TEXTDOMAIN, false );
                }
            }
        }
    }
}