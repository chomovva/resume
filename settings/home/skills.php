<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	RESUME_SLUG . '_skills',
	array(
		'title'            => __( 'Скилы', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #skills. При изменении количества зписей сохранитесь и перезагрузите страницу.', RESUME_TEXTDOMAIN ),
		'panel'            => RESUME_SLUG
	)
); /**/



$wp_customize->add_setting(
	RESUME_SLUG . '_skills_count',
	array(
		'default'           => 5,
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	RESUME_SLUG . '_skills_count',
	array(
		'section'           => RESUME_SLUG . '_skills',
		'label'             => __( 'Количество навыков', RESUME_TEXTDOMAIN ),
		'type'              => 'number',
		'atts'              => array(
		  'min'               => '1',
		  'max'               => '10',
		),
	)
); /**/



for ( $i = 0; $i < get_theme_mod( RESUME_SLUG . '_skills_count', 5 ); $i++ ) {
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
			'section'           => RESUME_SLUG . '_skills',
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
			'section'           => RESUME_SLUG . '_skills',
			'label'             => sprintf( __( 'оценка навыка %1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'number',
			'atts'              => array(
				'min'               => '1',
				'max'               => '100',
			),
		)
	); /**/
}