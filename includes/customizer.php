<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


function resume_customize_register( $wp_customize ) {
	
	$slug = RESUME_SLUG;
	
	$wp_customize->add_panel(
		"{$slug}_home",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки домашней страницы', RESUME_TEXTDOMAIN ),
			'priority'        => 200
		)
	);
	foreach ( array(
		'jumbotron',    // "первый экран"
		'aboutme',      // обо мне
		'services',     // чем я занимаюсь
		'advantages',   // мои преимущества
		'skills',       // мои скилы
		'way',          // опыт работы и образование 
		'portfolio',    // моё портфолио
		'reviews',      // отзывы
		'myblog',       // блог
	) as $path_name ) {
		include get_theme_file_path( "settings/home/{$path_name}.php" );
	}

	$wp_customize->add_panel(
		"{$slug}_pages",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Шаблоны страниц', RESUME_TEXTDOMAIN ),
			'priority'        => 201
		)
	);
	foreach ( array(
		'error404',     // страница ошибки 404
	) as $path_name ) {
		include get_theme_file_path( "settings/pages/{$path_name}.php" );
	}

	$wp_customize->add_panel(
		"{$slug}_lists",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Списки темы', RESUME_TEXTDOMAIN ),
			'priority'        => 201
		)
	);
	foreach ( array(
		'experience',   // опыт работы (показатель - значение)
		'services',     // список услуг
		'contacts',     // список моих контактов
		'links',        // ссылки на профили социальных сетей
	) as $path_name ) {
		include get_theme_file_path( "settings/lists/{$path_name}.php" );
	}

}

add_action( 'customize_register', 'resume_customize_register' );