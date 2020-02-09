<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_list_of_services",
	array(
		'title'            => __( 'Услуги', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #services', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_number_of_services",
	array(
		'default'           => 6,
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_number_of_services",
	array(
		'section'           => "{$slug}_list_of_services",
		'label'             => __( 'Количество услуг', RESUME_TEXTDOMAIN ),
		'type'              => 'number',
		'atts'              => array(
			'min'               => '1',
			'max'               => '10',
		),
	)
); /**/



for ( $i = 0; $i < get_theme_mod( "{$slug}_services_count", 6 ); $i++ ) { 
	$wp_customize->add_setting(
		"{$slug}_services[{$i}]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_services[{$i}]",
		array(
			'section'           => "{$slug}_list_of_services",
			'label'             => sprintf( __( 'услуга %1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
}