<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_experience",
	array(
		'title'            => __( 'Опыт', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Отображаются в сеции преимуществ', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



for ( $i = 0; $i < 4; $i++ ) {
	$wp_customize->add_setting(
		"{$slug}_experience[{$i}][label]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_experience[{$i}][label]",
		array(
			'section'           => "{$slug}_experience",
			'label'             => sprintf( __( 'Заголовок №%1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
  $wp_customize->add_setting(
	"{$slug}_experience[{$i}][value]",
	array(
		'default'           => 50,
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
  );
  $wp_customize->add_control(
	  "{$slug}_experience[{$i}][value]",
	  array(
		 	'section'           => "{$slug}_experience",
		 	'label'             => sprintf( __( 'Значение %1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
		 	'type'              => 'number',
		 	'atts'              => array(
				'min'               => '1',
				'max'               => '100',
			),
		)
	); /**/
}