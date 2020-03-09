<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_error404",
    array(
        'title'            => __( 'Страница ошибки 404', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => '',
        'panel'            => "{$slug}_templates",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_error404_title",
    array(
        'default'           => apply_filters( 'get_default_setting', 'error404_title' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_error404_title",
    array(
        'section'           => "{$slug}_error404",
        'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_error404_description",
    array(
        'default'           => apply_filters( 'get_default_setting', 'error404_description' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_error404_description",
    array(
        'section'           => "{$slug}_error404",
        'label'             => __( 'Подзаголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/


