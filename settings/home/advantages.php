<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_skills",
	array(
		'title'            => __( 'Секция преимуществ', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #skills. В секции так же отображаются скилы и опыт.', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_skills_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_skills_flag",
	array(
		'section'           => "{$slug}_skills",
		'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_skills_page_id",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_skills_page_id",
	array(
		'section'           => "{$slug}_skills",
		'label'             => __( 'Выбор страницы', RESUME_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_skills_title",
	array(
		'default'           => __( 'Мои скилы', RESUME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_skills_title",
	array(
		'section'           => "{$slug}_skills",
		'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/