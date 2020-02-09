<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_way",
	array(
		'title'            => __( 'Образование и опыт работы', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #way', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_way_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_way_flag",
	array(
		'section'           => "{$slug}_way",
		'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_way_bgi",
	array(
		'default'           => RESUME_URL . 'images/way.jpg',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
	   $wp_customize,
	   "{$slug}_way_bgi",
	   array(
		   'label'      => __( 'Фоновое изображение', RESUME_TEXTDOMAIN ),
		   'section'    => "{$slug}_way",
		   'settings'   => "{$slug}_way_bgi"
	   )
   )
);



$wp_customize->add_setting(
	"{$slug}_way_count",
	array(
		'default'           => 2,
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_way_count",
	array(
		'section'           => "{$slug}_way",
		'label'             => __( 'Количество страниц', RESUME_TEXTDOMAIN ),
		'type'              => 'number',
		'atts'              => array(
		  'min'               => '1',
		  'max'               => '3',
		),
	)
); /**/



for ( $i = 0; $i < get_theme_mod( "{$slug}_way_count", 2 ); $i++ ) { 
	$wp_customize->add_setting(
		"{$slug}_way_page_ids[{$i}]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		"{$slug}_way_page_ids[{$i}]",
		array(
			'section'           => "{$slug}_way",
			'label'             => sprintf( __( 'Выбор страницы #%1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'dropdown-pages',
		)
	); /**/
}