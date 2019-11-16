<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };




/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function resume_scripts() {
	wp_enqueue_script( 'resume-main', RESUME_URL . 'scripts/main.js', array( 'jquery', 'fancybox' ), RESUME_VERSION, true );
	wp_localize_script( 'resume-main', 'resumeTheme', array( 'toTopBtn' => 'Наверх' ) );
	wp_enqueue_script( 'lazyload', RESUME_URL . 'scripts/lazyload.min.js', array( 'jquery' ), '1.7.6', true );
	wp_enqueue_script( 'fancybox', RESUME_URL . 'scripts/fancybox.min.js', array( 'jquery' ), '3.3.5', true );
	wp_enqueue_script( 'superembed', RESUME_URL . 'scripts/superembed.min.js', array( 'jquery' ), '3.1', true );
	wp_register_script( 'slick', RESUME_URL . 'scripts/slick.min.js', array( 'jquery' ), '1.8.0', true );
}
add_action( 'wp_enqueue_scripts', 'resume_scripts' );






/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function resume_styles() {
	wp_enqueue_style( 'resume-main', RESUME_URL . 'styles/main.css', array(), RESUME_VERSION, 'all' );
	wp_enqueue_style( 'resume-font', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&amp;display=swap&amp;subset=cyrillic,cyrillic-ext', array(), '14', 'all' );
	wp_enqueue_style( 'fancybox', RESUME_URL . 'styles/fancybox.min.css', array(), '3.3.5', 'all' );
	wp_enqueue_style( 'slick', RESUME_URL . 'styles/slick.min.css', array(), '1.8.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'resume_styles', 10, 0 );







function resume_ctitical_styles() {
	if ( file_exists( RESUME_DIR . 'styles/critical.min.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( RESUME_DIR . 'styles/critical.min.css' ) . '</style>';
	}
}
add_action( 'wp_head', 'resume_ctitical_styles', 10, 0 );