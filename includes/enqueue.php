<?php


namespace resume;


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
function scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'resume-main', RESUME_URL . 'scripts/main.min.js', array( 'jquery', 'slick', 'fancybox' ), filemtime( get_theme_file_path( 'styles/main.css' ) ), true );
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
add_action( 'wp_enqueue_scripts', 'resume\scripts' );




function print_styles() {
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'mkaz-code-syntax-css' );
	wp_dequeue_style( 'mkaz-code-syntax-prism-css' );
	wp_dequeue_style( 'wpdiscuz-font-awesome' );
	wp_dequeue_style( 'wpdiscuz-frontend-css' );
	wp_dequeue_style( 'wpdiscuz-user-content-css' );
}

add_action( 'wp_print_styles', 'resume\print_styles' );



/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function styles() {
	wp_enqueue_style( 'resume-main', RESUME_URL . 'styles/main.min.css', array(), filemtime( get_theme_file_path( 'styles/main.css' ) ), 'all' );
	wp_enqueue_style( 'resume-font', RESUME_URL . 'styles/fonts.min.css', array(), filemtime( get_theme_file_path( 'styles/fonts.css' ) ), 'all' );
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
		wp_add_inline_style( 'resume-main', css_array_to_css( array(
			'.home .header' => array(
				'background-color'  => '#3598db',
			),
		), array( 'container' => false ) ) );
	}
}
add_action( 'get_footer', 'resume\styles', 10, 0 );






/**
 * Подключение "критических" стилей необходимых для оптимизации загрузки страницы
 */
function ctitical_styles() {
	if ( file_exists( RESUME_DIR . 'styles/critical.min.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( RESUME_DIR . 'styles/critical.min.css' ) . '</style>';
	}
	echo css_array_to_css( [
		'#jumbotron .bg' => [
			'background-color' => get_theme_setting( 'jumbotron_bgc' ),
			'background-image' => get_theme_setting( 'jumbotron_bgi' ),
		],
	], [ 'container' => true ] );
}
add_action( 'wp_head', 'resume\ctitical_styles', 10, 0 );



/**
 * Подключение скриптов административной части сайта
 */
function admin_scripts() {
	wp_enqueue_style( 'resume-admin', RESUME_URL . 'styles/admin.css', array(), filemtime( get_theme_file_path( 'styles/admin.css' ) ), 'all' );
}
add_action( 'admin_enqueue_scripts', 'resume\admin_scripts', 10, 1 );