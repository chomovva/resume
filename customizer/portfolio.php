<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    RESUME_SLUG . '_portfolio',
    array(
        'title'            => __( 'Новости', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #portfolio. Работы (посты) берутся из категории.', RESUME_TEXTDOMAIN ),
        'panel'            => RESUME_SLUG
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_portfolio_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_portfolio_flag',
    array(
        'section'           => RESUME_SLUG . '_portfolio',
        'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    RESUME_SLUG . '_portfolio_cat_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_portfolio_cat_id',
    array(
        'section'           => RESUME_SLUG . '_portfolio',
        'label'             => __( 'Выбор категории', RESUME_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => resume\get_categories_choices(),
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_portfolio_title',
    array(
        'default'           => __( 'Новости', RESUME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_portfolio_title',
    array(
        'section'           => RESUME_SLUG . '_portfolio',
        'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_portfolio_description',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_portfolio_description',
    array(
        'section'           => RESUME_SLUG . '_portfolio',
        'label'             => __( 'Подзаголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




$wp_customize->add_setting(
    RESUME_SLUG . '_portfolio_label',
    array(
        'default'           => __( 'Смотреть все новости', RESUME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_portfolio_label',
    array(
        'section'           => RESUME_SLUG . '_portfolio',
        'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/