<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	RESUME_SLUG . '_aboutme',
	array(
		'title'            => __( 'Обо мне', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #aboutme', RESUME_TEXTDOMAIN ),
		'panel'            => RESUME_SLUG
	)
); /**/



$wp_customize->add_setting(
	RESUME_SLUG . '_aboutme_flag',
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	RESUME_SLUG . '_aboutme_flag',
	array(
		'section'           => RESUME_SLUG . '_aboutme',
		'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/


$wp_customize->add_setting(
	RESUME_SLUG . '_aboutme_page_id',
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	RESUME_SLUG . '_aboutme_page_id',
	array(
		'section'           => RESUME_SLUG . '_aboutme',
		'label'             => __( 'Выбор страницы', RESUME_TEXTDOMAIN ),
		'type'              => 'dropdown-pages',
	)
); /**/



$wp_customize->add_setting(
	RESUME_SLUG . '_aboutme_title',
	array(
		'default'           => __( 'Обо мне', RESUME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	RESUME_SLUG . '_aboutme_title',
	array(
		'section'           => RESUME_SLUG . '_aboutme',
		'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	RESUME_SLUG . '_aboutme_foto',
	array(
		'default'           => RESUME_URL . 'images/user.png',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
	   $wp_customize,
	   RESUME_SLUG . '_aboutme_foto',
	   array(
		   'label'      => __( 'Фото', RESUME_TEXTDOMAIN ),
		   'section'    => RESUME_SLUG . '_aboutme',
		   'settings'   => RESUME_SLUG . '_aboutme_foto'
	   )
   )
);


$wp_customize->add_setting(
	RESUME_SLUG . '_aboutme_more_label',
	array(
		'default'           => __( 'Подробней обо мне', RESUME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	RESUME_SLUG . '_aboutme_more_label',
	array(
		'section'           => RESUME_SLUG . '_aboutme',
		'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/


$wp_customize->add_setting(
	RESUME_SLUG . '_aboutme_file_label',
	array(
		'default'           => __( 'Скачать резюме', RESUME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	RESUME_SLUG . '_aboutme_file_label',
	array(
		'section'           => RESUME_SLUG . '_aboutme',
		'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	RESUME_SLUG . '_aboutme_file',
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new WP_Customize_Upload_Control(
	   $wp_customize,
	   RESUME_SLUG . '_aboutme_file',
	   array(
		   'label'      => __( 'Файл', RESUME_TEXTDOMAIN ),
		   'section'    => RESUME_SLUG . '_aboutme',
		   'settings'   => RESUME_SLUG . '_aboutme_file'
	   )
   )
);