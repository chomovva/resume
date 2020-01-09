<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    RESUME_SLUG . '_contacts',
    array(
        'title'            => __( 'Контакты', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Список контактов', RESUME_TEXTDOMAIN ),
        'panel'            => RESUME_SLUG
    )
); /**/



foreach ( array(
	'viber'    => __( 'Viber', RESUME_TEXTDOMAIN ),
	'whatsapp' => __( 'WhatsApp', RESUME_TEXTDOMAIN ),
	'telegram' => __( 'Telegram', RESUME_TEXTDOMAIN ),
	'email'    => __( 'Email', RESUME_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
	    RESUME_SLUG . "_contacts[$key]",
	    array(
	        'default'           => '',
	        'transport'         => 'reset',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    RESUME_SLUG . "_contacts[$key]",
	    array(
	        'section'           => RESUME_SLUG . '_contacts',
	        'label'             => $label,
	        'type'              => 'text',
	    )
	); /**/
}