<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_services",
	array(
		'title'            => __( 'Услуги', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #services', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_flag",
	array(
		'default'           => apply_filters( 'get_default_setting', 'services_flag' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'resume\sanitize_checkbox',
	)
);
$wp_customize->add_control(
	"{$slug}_services_flag",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_page_id",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_services_page_id",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Выбор страницы', RESUME_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_title",
	array(
		'default'           => __( 'Чем я занимаюсь', RESUME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_services_title",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_excerpt",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	"{$slug}_services_excerpt",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Описание', RESUME_TEXTDOMAIN ),
		'type'              => 'textarea',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_services_label",
	array(
		'default'           => __( 'Подробней', RESUME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_services_label",
	array(
		'section'           => "{$slug}_services",
		'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/