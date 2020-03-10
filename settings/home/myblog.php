<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_myblog",
	array(
		'title'            => __( 'Блог', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #myblog. Выборка постов производится из категории.', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_myblog_flag",
	array(
		'default'           => apply_filters( 'get_default_setting', 'myblog_flag' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'resume\sanitize_checkbox',
	)
);
$wp_customize->add_control(
	"{$slug}_myblog_flag",
	array(
		'section'           => "{$slug}_myblog",
		'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_myblog_title",
	array(
		'default'           => apply_filters( 'get_default_setting', 'myblog_title' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_myblog_title",
	array(
		'section'           => "{$slug}_myblog",
		'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_myblog_description",
	array(
		'default'           => apply_filters( 'get_default_setting', 'myblog_description' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	"{$slug}_myblog_description",
	array(
		'section'           => "{$slug}_myblog",
		'label'             => __( 'Подзаголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'textarea',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_myblog_cat_id",
	array(
		'default'           => apply_filters( 'get_default_setting', 'myblog_cat_id' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_myblog_cat_id",
	array(
		'section'           => "{$slug}_myblog",
		'label'             => __( 'Выбор категории', RESUME_TEXTDOMAIN ),
		'type'              => 'select',
		'choices'           => resume\get_categories_choices(),
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_myblog_numberposts",
	array(
		'default'           => apply_filters( 'get_default_setting', 'myblog_numberposts' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_myblog_numberposts",
	array(
		'section'           => "{$slug}_myblog",
		'label'             => __( 'Количество постов', RESUME_TEXTDOMAIN ),
		'type'              => 'number',
		'input_atts'        => array(
			'min'             => 1,
			'max'             => 20,
		),
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_myblog_label",
	array(
		'default'           => apply_filters( 'get_default_setting', 'myblog_label' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_myblog_label",
	array(
		'section'           => "{$slug}_myblog",
		'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/