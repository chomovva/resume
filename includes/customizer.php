<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customize_register( $wp_customize ) {
	
	$slug = RESUME_SLUG;
	
	$wp_customize->add_panel(
		"{$slug}_home",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Домашняя страница', RESUME_TEXTDOMAIN ),
			'priority'        => 200
		)
	);
	foreach ( apply_filters( 'resume_front_page_customizer_sections', array(
		'jumbotron',    // "первый экран"
		'aboutme',      // обо мне
		'services',     // чем я занимаюсь
		'advantages',   // мои преимущества
		'way',          // опыт работы и образование 
		'portfolio',    // моё портфолио
		'reviews',      // отзывы
		'myblog',       // блог
	) ) as $path_name ) {
		include get_theme_file_path( "settings/home/{$path_name}.php" );
	}

	$wp_customize->add_panel(
		"{$slug}_templates",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Шаблоны страниц', RESUME_TEXTDOMAIN ),
			'priority'        => 201
		)
	);
	foreach ( apply_filters( 'resume_templates_customizer_sections', array(
		'home',         // шаблон главной страницы
		'archive',      // шаблон архива
		'error404',     // шаблон страницы ошибки 404
	) ) as $path_name ) {
		include get_theme_file_path( "settings/templates/{$path_name}.php" );
	}

	$wp_customize->add_panel(
		"{$slug}_lists",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Списки темы', RESUME_TEXTDOMAIN ),
			'priority'        => 201
		)
	);
	foreach ( apply_filters( 'resume_customizer_lists', array(
		'experience',   // опыт работы (показатель - значение)
		'services',     // список услуг
		'skills',       // список моих скилов
		'reviews',      // отзывы
		'contacts',     // список моих контактов
		'links',        // ссылки на профили социальных сетей
	) ) as $path_name ) {
		include get_theme_file_path( "settings/lists/{$path_name}.php" );
	}

	// форма поиска гугл
	include get_theme_file_path( "settings/google-cse.php" );

	$wp_customize->add_panel(
		"{$slug}_blocks",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки темы', RESUME_TEXTDOMAIN ),
			'priority'        => 201
		)
	);
	foreach ( apply_filters( 'resume_customizer_blocks', array(
		'aside_footer',   // сайдбар подвала
	) ) as $path_name ) {
		include get_theme_file_path( "settings/blocks/{$path_name}.php" );
	}

}

add_action( 'customize_register', 'resume\customize_register' );