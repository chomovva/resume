<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	RESUME_SLUG . '_experience',
	array(
		'title'            => __( 'Опыт', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Отображаются в сеции преимуществ', RESUME_TEXTDOMAIN ),
		'panel'            => RESUME_SLUG
	)
); /**/



for ( $i = 0; $i < 4; $i++ ) {
	$wp_customize->add_setting(
		RESUME_SLUG . "_experience[{$i}][label]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		RESUME_SLUG . "_experience[{$i}][label]",
		array(
			'section'           => RESUME_SLUG . '_experience',
			'label'             => sprintf( __( 'Заголовок №%1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
  $wp_customize->add_setting(
	RESUME_SLUG . "_experience[{$i}][value]",
	array(
		'default'           => 50,
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
  );
  $wp_customize->add_control(
	  RESUME_SLUG . "_experience[{$i}][value]",
	  array(
		  'section'           => RESUME_SLUG . '_experience',
		  'label'             => sprintf( __( 'Значение %1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
		  'type'              => 'number',
		  'atts'              => array(
			'min'               => '1',
			'max'               => '100',
		  ),
	  )
  ); /**/
}