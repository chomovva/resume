<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_reviews",
	array(
		'title'            => __( 'Отзывы', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #reviews. Отзывы заполняются в панели кастомазера "Списки темы".', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_reviews_flag",
	array(
		'default'           => apply_filters( 'get_default_setting', 'reviews_flag' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'resume\sanitize_checkbox',
	)
);
$wp_customize->add_control(
	"{$slug}_reviews_flag",
	array(
		'section'           => "{$slug}_reviews",
		'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_reviews_type",
	array(
		'default'           => apply_filters( 'get_default_setting', 'reviews_type' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_reviews_type",
	array(
		'section'           => "{$slug}_reviews",
		'label'             => __( 'Тип содержимого секции', RESUME_TEXTDOMAIN ),
		'type'              => 'select',
		'choices'           => array(
			'list'            => esc_attr__( 'формализованный список', RESUME_TEXTDOMAIN ),
			'content'         => esc_attr__( 'содержимое страницы', RESUME_TEXTDOMAIN ),
		),
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_reviews_title",
	array(
		'default'           => apply_filters( 'get_default_setting', 'reviews_title' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_reviews_title",
	array(
		'section'           => "{$slug}_reviews",
		'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_reviews_description",
	array(
		'default'           => apply_filters( 'get_default_setting', 'reviews_description' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	"{$slug}_reviews_description",
	array(
		'section'           => "{$slug}_reviews",
		'label'             => __( 'Подзаголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'textarea',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_reviews_page_id",
	array(
		'default'           => apply_filters( 'get_default_setting', 'reviews_page_id' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_reviews_page_id",
	array(
		'section'           => "{$slug}_reviews",
		'label'             => __( 'Выбор страницы', RESUME_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_reviews_label",
	array(
		'default'           => apply_filters( 'get_default_setting', 'reviews_label' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_reviews_label",
	array(
		'section'           => "{$slug}_reviews",
		'label'             => __( 'Подпись кнопки', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/