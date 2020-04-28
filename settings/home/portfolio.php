<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_portfolio",
    array(
        'title'            => __( 'Портфолио', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #portfolio. Работы (посты) берутся из категории.', RESUME_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_portfolio_flag",
    array(
        'default'           => apply_filters( 'get_default_setting', 'portfolio_flag' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'resume\sanitize_checkbox',
    )
);
$wp_customize->add_control(
    "{$slug}_portfolio_flag",
    array(
        'section'           => "{$slug}_portfolio",
        'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_portfolio_cat_id",
    array(
        'default'           => apply_filters( 'get_default_setting', 'portfolio_cat_id' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_portfolio_cat_id",
    array(
        'section'           => "{$slug}_portfolio",
        'label'             => __( 'Выбор категории', RESUME_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => resume\get_categories_choices(),
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_portfolio_title",
    array(
        'default'           => apply_filters( 'get_default_setting', 'portfolio_title' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_portfolio_title",
    array(
        'section'           => "{$slug}_portfolio",
        'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_portfolio_description",
    array(
        'default'           => apply_filters( 'get_default_setting', 'portfolio_description' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_portfolio_description",
    array(
        'section'           => "{$slug}_portfolio",
        'label'             => __( 'Подзаголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/