<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    RESUME_SLUG . '_jumbotron',
    array(
        'title'            => __( 'Первый экран', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #jumbotron', RESUME_TEXTDOMAIN ),
        'panel'            => RESUME_SLUG
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_jumbotron_title',
    array(
        'default'           => get_bloginfo( 'name' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_jumbotron_title',
    array(
        'section'           => RESUME_SLUG . '_jumbotron',
        'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_jumbotron_bgi',
    array(
        'default'           => RESUME_URL . 'images/jumbotron.jpg',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_url',
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       RESUME_SLUG . '_jumbotron_bgi',
       array(
           'label'      => __( 'Фон', RESUME_TEXTDOMAIN ),
           'section'    => RESUME_SLUG . '_jumbotron',
           'settings'   => RESUME_SLUG . '_jumbotron_bgi'
       )
   )
);

