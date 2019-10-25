<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    RESUME_SLUG . '_services',
    array(
        'title'            => __( 'Услуги', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #services', RESUME_TEXTDOMAIN ),
        'panel'            => RESUME_SLUG
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_services_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_services_flag',
    array(
        'section'           => RESUME_SLUG . '_services',
        'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    RESUME_SLUG . '_services_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_services_page_id',
    array(
        'section'           => RESUME_SLUG . '_services',
        'label'             => __( 'Выбор страницы', RESUME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_services_title',
    array(
        'default'           => __( 'Чем я занимаюсь', RESUME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_services_title',
    array(
        'section'           => RESUME_SLUG . '_services',
        'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_services_description',
    array(
        'default'           => __( 'Чем я занимаюсь', RESUME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_services_description',
    array(
        'section'           => RESUME_SLUG . '_services',
        'label'             => __( 'Заголовок', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_services_label',
    array(
        'default'           => __( 'Подробней', RESUME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_services_label',
    array(
        'section'           => RESUME_SLUG . '_services',
        'label'             => __( 'Текст кнопки', RESUME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_services_count',
    array(
        'default'           => 6,
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_services_count',
    array(
        'section'           => RESUME_SLUG . '_services',
        'label'             => __( 'Количество услуг', RESUME_TEXTDOMAIN ),
        'type'              => 'number',
        'atts'              => array(
          'min'               => '1',
          'max'               => '10',
        ),
    )
); /**/


for ( $i = 0; $i < get_theme_mod( RESUME_SLUG . '_services_count', 6 ); $i++ ) { 
  $wp_customize->add_setting(
      RESUME_SLUG . "_services[{$i}]",
      array(
          'default'           => '',
          'transport'         => 'reset',
          'sanitize_callback' => 'sanitize_text_field',
      )
  );
  $wp_customize->add_control(
      RESUME_SLUG . "_services[{$i}]",
      array(
          'section'           => RESUME_SLUG . '_services',
          'label'             => sprintf( __( 'слуга %1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
          'type'              => 'text',
      )
  ); /**/
}