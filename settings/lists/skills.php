<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_list_of_skills",
	array(
		'title'            => __( 'Скилы', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #skills. При изменении количества зписей сохранитесь и перезагрузите страницу.', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists"
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_skills_count",
	array(
		'default'           => apply_filters( 'get_default_setting', 'skills_count' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_skills_count",
	array(
		'section'           => "{$slug}_list_of_skills",
		'label'             => __( 'Количество навыков', RESUME_TEXTDOMAIN ),
		'type'              => 'number',
		'atts'              => array(
		  'min'               => '1',
		  'max'               => '10',
		),
	)
); /**/



for ( $i = 0; $i < apply_filters( 'get_default_setting', 'skills_count' ); $i++ ) {
	$wp_customize->add_setting(
		RESUME_SLUG . "_skills[{$i}][label]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		RESUME_SLUG . "_skills[{$i}][label]",
		array(
			'section'           => "{$slug}_list_of_skills",
			'label'             => sprintf( __( 'заголовок %1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		RESUME_SLUG . "_skills[{$i}][value]",
		array(
			'default'           => 50,
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		RESUME_SLUG . "_skills[{$i}][value]",
		array(
			'section'           => "{$slug}_list_of_skills",
			'label'             => sprintf( __( 'оценка навыка %1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'number',
			'atts'              => array(
				'min'               => '1',
				'max'               => '100',
			),
		)
	); /**/
}