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
    RESUME_SLUG . '_jumbotron_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_jumbotron_flag',
    array(
        'section'           => RESUME_SLUG . '_jumbotron',
        'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    RESUME_SLUG . '_jumbotron_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'intval',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_jumbotron_page_id',
    array(
        'section'           => RESUME_SLUG . '_jumbotron',
        'label'             => __( 'Выбор страницы', RESUME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
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
    RESUME_SLUG . '_jumbotron_excerpt',
    array(
        'default'           => get_bloginfo( 'description' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_jumbotron_excerpt',
    array(
        'section'           => RESUME_SLUG . '_jumbotron',
        'label'             => __( 'Описание', RESUME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




$wp_customize->add_setting(
    RESUME_SLUG . '_jumbotron_label',
    array(
        'default'           => __( 'Подробней', RESUME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_jumbotron_label',
    array(
        'section'           => RESUME_SLUG . '_jumbotron',
        'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_jumbotron_bgi',
    array(
        'default'           => '',
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


$wp_customize->add_setting(
    RESUME_SLUG . '_jumbotron_timestamp',
    array(
        'default'           => '',
        'transport'         => 'reset',
    )
);
$wp_customize->add_control(
   new WP_Customize_Date_Time_Control(
       $wp_customize,
       RESUME_SLUG . '_jumbotron_timestamp',
       array(
           'label'      => __( 'Дата и время проведения мероприятия', RESUME_TEXTDOMAIN ),
           'section'    => RESUME_SLUG . '_jumbotron',
           'settings'   => RESUME_SLUG . '_jumbotron_timestamp'
       )
   )
);
