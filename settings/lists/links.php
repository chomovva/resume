<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_links",
	array(
		'title'            => __( 'Профили', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Ссылки на профили в в социальных сетях и прочее', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/


foreach ( array(
	'facebook'  => __( 'Facebook', RESUME_TEXTDOMAIN ),
	'Twitter'   => __( 'Twitter', RESUME_TEXTDOMAIN ),
	'linkedin'  => __( 'LinkedIn', RESUME_TEXTDOMAIN ),
	'vk'        => __( 'Вконтакте', RESUME_TEXTDOMAIN ),
	'github'    => __( 'GitHub', RESUME_TEXTDOMAIN ),
	'youtube'   => __( 'YouTube', RESUME_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
		"{$slug}_links[$key]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url',
		)
	);
	$wp_customize->add_control(
		"{$slug}_links[$key]",
		array(
			'section'           => "{$slug}_links",
			'label'             => $label,
			'type'              => 'text',
		)
	); /**/
}