<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_contacts",
    array(
        'title'            => __( 'Контакты', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Список контактов', RESUME_TEXTDOMAIN ),
        'panel'            => "{$slug}_lists",
    )
); /**/



foreach ( apply_filters( 'get_default_contact_list', 'contacts' ) as $key => $label ) {
	$wp_customize->add_setting(
	    "{$slug}_contacts[$key]",
	    array(
	        'default'           => '',
	        'transport'         => 'reset',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    "{$slug}_contacts[$key]",
	    array(
	        'section'           => "{$slug}_contacts",
	        'label'             => $label,
	        'type'              => 'text',
	    )
	); /**/
}