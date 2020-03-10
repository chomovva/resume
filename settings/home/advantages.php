<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_advantages",
	array(
		'title'            => __( 'Секция преимуществ', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #advantages. В секции так же отображаются скилы и опыт.', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_advantages_flag",
	array(
		'default'           => apply_filters( 'get_default_setting', 'advantages_flag' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'resume\sanitize_checkbox',
	)
);
$wp_customize->add_control(
	"{$slug}_advantages_flag",
	array(
		'section'           => "{$slug}_advantages",
		'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_advantages_page_id",
	array(
		'default'           => apply_filters( 'get_default_setting', 'advantages_page_id' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_advantages_page_id",
	array(
		'section'           => "{$slug}_advantages",
		'label'             => __( 'Выбор страницы', RESUME_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_advantages_title",
	array(
		'default'           => apply_filters( 'get_default_setting', 'advantages_title' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_advantages_title",
	array(
		'section'           => "{$slug}_advantages",
		'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/