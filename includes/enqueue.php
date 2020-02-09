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
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'resume-main', RESUME_URL . 'scripts/main.min.js', array( 'jquery', 'slick', 'fancybox' ), RESUME_VERSION, true );
	wp_localize_script( 'resume-main', 'resumeTheme', array( 'toTopBtn' => 'Наверх' ) );
	wp_enqueue_script( 'lazyload', RESUME_URL . 'scripts/lazyload.min.js', array( 'jquery' ), '1.7.6', true );
	wp_add_inline_script( 'lazyload', 'jQuery( ".lazy" ).lazy();', 'after' );
	wp_enqueue_script( 'fancybox', RESUME_URL . 'scripts/fancybox.min.js', array( 'jquery' ), '3.3.5', true );
	wp_enqueue_script( 'superembed', RESUME_URL . 'scripts/superembed.min.js', array( 'jquery' ), '3.1', true );
	wp_register_script( 'slick', RESUME_URL . 'scripts/slick.min.js', array( 'jquery' ), '1.8.0', true );
	wp_localize_script( 'jquery', 'resume', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'resume_scripts' );




function resume_print_styles() {
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'mkaz-code-syntax-css' );
	wp_dequeue_style( 'mkaz-code-syntax-prism-css' );
	wp_dequeue_style( 'wpdiscuz-font-awesome' );
	wp_dequeue_style( 'wpdiscuz-frontend-css' );
	wp_dequeue_style( 'wpdiscuz-user-content-css' );
}
add_action( 'wp_print_styles', 'resume_print_styles' );




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
	wp_enqueue_style( 'resume-main', RESUME_URL . 'styles/main.min.css', array(), RESUME_VERSION, 'all' );
	wp_enqueue_style( 'resume-font', RESUME_URL . 'styles/fonts.min.css', array(), RESUME_VERSION, 'all' );
	wp_enqueue_style( 'fancybox', RESUME_URL . 'styles/fancybox.min.css', array(), '3.3.5', 'all' );
	wp_enqueue_style( 'slick', RESUME_URL . 'styles/slick.min.css', array(), '1.8.0', 'all' );
	wp_enqueue_style( 'contact-form-7' );
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'mkaz-code-syntax-css' );
	wp_enqueue_style( 'mkaz-code-syntax-prism-css' );
	wp_enqueue_style( 'wpdiscuz-font-awesome' );
	wp_enqueue_style( 'wpdiscuz-frontend-css' );
	wp_enqueue_style( 'wpdiscuz-user-content-css' );
	if ( is_front_page() && ! get_theme_mod( RESUME_SLUG . '_jumbotron_flag', false ) ) {
		wp_add_inline_style( 'resume-main', resume\css_array_to_css( array(
			'.home .header' => array(
				'background-color'  => '#3598db',
			),
		), array( 'container' => false ) ) );
	}
}
add_action( 'get_footer', 'resume_styles', 10, 0 );







function resume_ctitical_styles() {
	if ( file_exists( RESUME_DIR . 'styles/critical.min.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( RESUME_DIR . 'styles/critical.min.css' ) . '</style>';
	}
}
add_action( 'wp_head', 'resume_ctitical_styles', 10, 0 );