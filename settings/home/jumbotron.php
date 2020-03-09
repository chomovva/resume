<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_jumbotron",
	array(
		'title'            => __( 'Первый экран', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #jumbotron', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
    "{$slug}_jumbotron_flag",
    array(
        'default'           => apply_filters( 'get_default_setting', 'jumbotron_flag' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'is_bool',
    )
);
$wp_customize->add_control(
    "{$slug}_jumbotron_flag",
    array(
        'section'           => "{$slug}_jumbotron",
        'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
	"{$slug}_jumbotron_title",
	array(
		'default'           => apply_filters( 'get_default_setting', 'jumbotron_title' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_jumbotron_title",
	array(
		'section'           => "{$slug}_jumbotron",
		'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_jumbotron_bgi",
	array(
		'default'           => apply_filters( 'get_default_setting', 'jumbotron_bgi' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
	   $wp_customize,
	   "{$slug}_jumbotron_bgi",
	   array(
		   'label'      => __( 'Фон', RESUME_TEXTDOMAIN ),
		   'section'    => "{$slug}_jumbotron",
		   'settings'   => "{$slug}_jumbotron_bgi",
	   )
   )
);