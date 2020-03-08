<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_google_cse",
    array(
        'title'            => __( 'Пользовательский поиск Google', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Скопируйте код google и вставьте его в поле textarea ниже. Форма и результаты поиска будут отображаться в модальном окне.', RESUME_TEXTDOMAIN ),
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_google_cse_flag",
    array(
        'default'           => apply_filters( 'get_default_setting', 'google_cse_flag' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'is_bool',
    )
);
$wp_customize->add_control(
    "{$slug}_google_cse_flag",
    array(
        'section'           => "{$slug}_google_cse",
        'label'             => __( 'Использовать Пользовательский поиск', RESUME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_google_cse_code",
    array(
        'default'           => apply_filters( 'get_default_setting', 'google_cse_code' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'esc_textarea',
    )
);
$wp_customize->add_control(
    "{$slug}_google_cse_code",
    array(
        'section'           => "{$slug}_google_cse",
        'label'             => __( 'Код', RESUME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/