<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_archive",
    array(
        'title'            => __( 'Страница архива / категории', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => '',
        'panel'            => "{$slug}_templates",
    )
); /**/



$wp_customize->add_setting(
	"{$slug}_archive_hide_post_date",
	array(
		'default'           => apply_filters( 'get_default_setting', 'archive_hide_post_date' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'resume\sanitize_checkbox',
	)
);
$wp_customize->add_control(
	"{$slug}_archive_hide_post_date",
	array(
		'section'           => "{$slug}_archive",
		'label'             => __( 'Скрывать дату публикации поста', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/