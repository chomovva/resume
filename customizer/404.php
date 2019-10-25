<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    RESUME_SLUG . '_error404',
    array(
        'title'            => __( 'Страница ошибки 404', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => '',
        'panel'            => RESUME_SLUG
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_error404_title',
    array(
        'default'           => __( 'Ошибка 404', RESUME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_error404_title',
    array(
        'section'           => RESUME_SLUG . '_error404',
        'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_error404_description',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_error404_description',
    array(
        'section'           => RESUME_SLUG . '_error404',
        'label'             => __( 'Подзаголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/


