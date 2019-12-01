<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    RESUME_SLUG . '_way',
    array(
        'title'            => __( 'Образование и опыт работы', RESUME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #way', RESUME_TEXTDOMAIN ),
        'panel'            => RESUME_SLUG
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_way_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_way_flag',
    array(
        'section'           => RESUME_SLUG . '_way',
        'label'             => __( 'Использовать секцию', RESUME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    RESUME_SLUG . '_way_bgi',
    array(
        'default'           => RESUME_URL . 'images/way.jpg',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_url',
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       RESUME_SLUG . '_way_bgi',
       array(
           'label'      => __( 'Фоновое изображение', RESUME_TEXTDOMAIN ),
           'section'    => RESUME_SLUG . '_way',
           'settings'   => RESUME_SLUG . '_way_bgi'
       )
   )
);



$wp_customize->add_setting(
    RESUME_SLUG . '_way_count',
    array(
        'default'           => 2,
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    RESUME_SLUG . '_way_count',
    array(
        'section'           => RESUME_SLUG . '_way',
        'label'             => __( 'Количество страниц', RESUME_TEXTDOMAIN ),
        'type'              => 'number',
        'atts'              => array(
          'min'               => '1',
          'max'               => '3',
        ),
    )
); /**/



for ( $i = 0; $i < get_theme_mod( RESUME_SLUG . '_way_count', 2 ); $i++ ) { 
  $wp_customize->add_setting(
      RESUME_SLUG . "_way_page_ids[{$i}]",
      array(
          'default'           => '',
          'transport'         => 'reset',
          'sanitize_callback' => 'absint',
      )
  );
  $wp_customize->add_control(
      RESUME_SLUG . "_way_page_ids[{$i}]",
      array(
          'section'           => RESUME_SLUG . '_way',
          'label'             => sprintf( __( 'Выбор страницы #%1$s', RESUME_TEXTDOMAIN ), ( $i + 1 ) ),
          'type'              => 'dropdown-pages',
      )
  ); /**/
}