<?php



namespace resume;



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
	"{$slug}_reviews_list",
	array(
		'title'            => __( 'Отзывы', RESUME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Отображаются в сеции преимуществ', RESUME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_reviews_count",
	array(
		'default'           => apply_filters( 'get_default_setting', 'reviews_count' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	"{$slug}_reviews_count",
	array(
		'section'           => "{$slug}_reviews_list",
		'label'             => __( 'Количесство отзывов', RESUME_TEXTDOMAIN ),
		'type'              => 'number',
	)
); /**/

$reviews_page_id = get_theme_setting( 'reviews_page_id' );

$wp_customize->add_setting(
	"{$slug}_reviews_morelink",
	array(
		'default'           => ( empty( $reviews_page_id ) ) ? '' : get_permalink( $reviews_page_id ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_reviews_morelink",
	array(
		'section'           => "{$slug}_reviews_list",
		'label'             => __( 'Ссылка на все отзывы', RESUME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



for ( $i = 0; $i < get_theme_mod( "{$slug}_reviews_count", apply_filters( 'get_default_setting', 'reviews_count' ) ); $i++ ) {
	$wp_customize->add_setting(
        "{$slug}_reviews[{$i}][foto]",
            array(
                'default'           => '',
                'transport'         => 'reset',
                'sanitize_callback' => 'absint',
            )
        );
    $wp_customize->add_control(
        new \WP_Customize_Cropped_Image_Control(
            $wp_customize,
            "{$slug}_reviews[{$i}][foto]",
            array(
                'label'      => sprintf( __( 'фото №%d', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
                'section'    => "{$slug}_reviews_list",
                'settings'   => "{$slug}_reviews[{$i}][foto]",
                'flex_width' => false,
                'flex_height'=> false,
                'width'      => 300,
    			'height'     => 300,
            )
        )
    ); /**/
	$wp_customize->add_setting(
		"{$slug}_reviews[{$i}][author]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_reviews[{$i}][author]",
		array(
			'section'           => "{$slug}_reviews_list",
			'label'             => sprintf( __( 'имя №%1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_reviews[{$i}][content]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_reviews[{$i}][content]",
		array(
			'section'           => "{$slug}_reviews_list",
			'label'             => sprintf( __( 'текст №%1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'textarea',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_reviews[{$i}][link]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_reviews[{$i}][link]",
		array(
			'section'           => "{$slug}_reviews_list",
			'label'             => sprintf( __( 'ссылка №%1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_reviews[{$i}][label]",
		array(
			'default'           => __( 'Подробней о проекте', RESUME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_reviews[{$i}][label]",
		array(
			'section'           => "{$slug}_reviews_list",
			'label'             => sprintf( __( 'текст кнопки №%1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
}