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
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
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
		'default'           => __( 'Блог', RESUME_TEXTDOMAIN ),
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
		'default'           => '',
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
		'default'           => '',
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
		'default'           => 3,
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
		'default'           => __( 'Смотреть все записи', RESUME_TEXTDOMAIN ),
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