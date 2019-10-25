<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	RESUME_SLUG . '_items',
	array(
		'title'            => __( 'Скилы', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #skills', RESUME_TEXTDOMAIN ),
		'panel'            => RESUME_SLUG
	)
); /**/



$wp_customize->add_setting(
	RESUME_SLUG . '_skills_count',
	array(
		'default'           => 10,
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	RESUME_SLUG . '_skills_count',
	array(
		'section'           => RESUME_SLUG . '_items',
		'label'             => __( 'Количество услуг', RESUME_TEXTDOMAIN ),
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
			'section'           => RESUME_SLUG . '_items',
			'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
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
		  'section'           => RESUME_SLUG . '_items',
		  'label'             => __( 'Количество услуг', RESUME_TEXTDOMAIN ),
		  'type'              => 'number',
		  'atts'              => array(
			'min'               => '1',
			'max'               => '100',
		  ),
	  )
  ); /**/
}