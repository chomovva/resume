<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_aboutme",
	array(
		'title'            => __( 'Обо мне', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #aboutme', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_aboutme_flag",
	array(
		'default'           => apply_filters( 'get_default_setting', 'aboutme_flag' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'is_bool',
	)
);
$wp_customize->add_control(
	"{$slug}_aboutme_flag",
	array(
		'section'           => "{$slug}_aboutme",
		'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_aboutme_page_id",
	array(
		'default'           => apply_filters( 'get_default_setting', 'aboutme_page_id' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_aboutme_page_id",
	array(
		'section'           => "{$slug}_aboutme",
		'label'             => __( 'Выбор страницы', RESUME_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_aboutme_title",
	array(
		'default'           => apply_filters( 'get_default_setting', 'aboutme_title' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_aboutme_title",
	array(
		'section'           => "{$slug}_aboutme",
		'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_aboutme_foto",
	array(
		'default'           => apply_filters( 'get_default_setting', 'aboutme_foto' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
	   $wp_customize,
	   "{$slug}_aboutme_foto",
	   array(
		   'label'      => __( 'Фото', RESUME_TEXTDOMAIN ),
		   'section'    => "{$slug}_aboutme",
		   'settings'   => "{$slug}_aboutme_foto"
	   )
   )
);



$wp_customize->add_setting(
	"{$slug}_aboutme_more_label",
	array(
		'default'           => apply_filters( 'get_default_setting', 'aboutme_more_label' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_aboutme_more_label",
	array(
		'section'           => "{$slug}_aboutme",
		'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_aboutme_file_label",
	array(
		'default'           => apply_filters( 'get_default_setting', 'aboutme_file_label' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_aboutme_file_label",
	array(
		'section'           => "{$slug}_aboutme",
		'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_aboutme_file",
	array(
		'default'           => apply_filters( 'get_default_setting', 'aboutme_file' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new WP_Customize_Upload_Control(
	   $wp_customize,
	   "{$slug}_aboutme_file",
	   array(
		   'label'      => __( 'Файл', RESUME_TEXTDOMAIN ),
		   'section'    => "{$slug}_aboutme",
		   'settings'   => "{$slug}_aboutme_file"
	   )
   )
);
