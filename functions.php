<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



define( 'RESUME_URL', get_template_directory_uri() . '/' );
define( 'RESUME_DIR', get_template_directory() . '/' );
define( 'RESUME_TEXTDOMAIN', 'resume' );
define( 'RESUME_VERSION', '1.0.0' );
define( 'RESUME_SLUG', 'resume' );




get_template_part( 'includes/default-settings' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/enqueue' );
get_template_part( 'includes/shortcodes' );
get_template_part( 'includes/gutenberg' );
get_template_part( 'includes/brand' );


if ( is_admin() ) {
	get_template_part( 'includes/archive-fields' );
	get_template_part( 'includes/custom-columns' );
}


/**
 * Регистрация переводов текстовых настроек темы
 */
if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}


/**
 * Регистрация настроек темы
 */
if ( is_customize_preview() ) {
	include get_theme_file_path( 'includes/customizer.php' );
}


function resume_theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
	add_image_size( 'thumbnail_medium', 300, 200, true );
}

add_action( 'after_setup_theme', 'resume_theme_supports' );


/**
 * Загрузка переводов темы
 */
function resume_load_textdomain() {
	load_theme_textdomain( RESUME_TEXTDOMAIN, RESUME_DIR . 'languages/' );
}

add_action( 'after_setup_theme', 'resume_load_textdomain' );


/**
 * Регистрация меню
 */
function resume_register_nav_menus() {
	register_nav_menus( array(
		'main'      => __( 'Главное меню', RESUME_TEXTDOMAIN ),
		'error404'  => __( 'Меню страницы 404', RESUME_TEXTDOMAIN ),
	) );
}

add_action( 'after_setup_theme', 'resume_register_nav_menus' );


/**
 * Регистрация сайдбаров (колонок)
 */
function resume_register_sidebars() {
	register_sidebar( array(
		'name'             => __( 'Сайдбар подвала', RESUME_TEXTDOMAIN ),
		'id'               => 'footer',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	) );
	$columns = array_merge( [ [
		'name'          => __( 'Колонка', RESUME_TEXTDOMAIN ),
		'id'            => 'column',
		'description'   => '',
		'class'         => '',
	] ], get_theme_mod( 'register_columns', [] ) );
	foreach ( $columns as $column ) {
		register_sidebar( array(
			'name'             => $column[ 'name' ],
			'id'               => $column[ 'id' ],
			'description'      => $column[ 'description' ],
			'class'            => $column[ 'class' ],
			'before_widget'    => '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
			'after_widget'     => '</div></div>',
			'before_title'     => '<h3 class="widget__title title">',
			'after_title'      => '</h3>',
		) );
	}
}

add_action( 'widgets_init', 'resume_register_sidebars' );


/**
 * Редирект на запись со страницы поиска, если найдена всего одна запись
 */
function resume_single_result(){  
	if( ! is_search() ) return;
	global $wp_query;
	if( $wp_query->post_count == 1 ) {  
		wp_redirect( get_permalink( reset( $wp_query->posts )->ID ) );
		die;
	}  
}

add_action( 'template_redirect', 'resume_single_result' );


/**
 * AJAX загрузка постов
 */
function resume_ajax_portfolio_load_posts() {
	get_template_part( 'parts/home/portfolio' );
	wp_die();
}
add_action( 'wp_ajax_portfolio_pagination', 'resume_ajax_portfolio_load_posts' );
add_action( 'wp_ajax_nopriv_portfolio_pagination', 'resume_ajax_portfolio_load_posts' );


/**
 * Добавление ленивой загрузки для изображений контента
 */
function resume_add_content_lazyload_images( $content ) {
	$result = __return_empty_array();
	$elements = preg_split( get_html_split_regex(), $content, -1, PREG_SPLIT_DELIM_CAPTURE );;
	if ( is_array( $elements ) ) {
		foreach ( $elements as $element ) {
			if ( 'img' === substr( $element, 1, 3 ) ) {
				$attrs = wp_kses_hair( $element, array( 'http', 'https' ) );
				if ( ! array_key_exists( 'data-src', $attrs ) || ! array_key_exists( 'data-lazy', $attrs ) ) {
					$attrs[ 'class' ][ 'value' ] = ' lazy';
					$attrs[ 'data-src' ][ 'value' ] = $attrs[ 'src' ][ 'value' ];
					$attrs[ 'src' ][ 'value' ] = '#';
					if ( array_key_exists( 'srcset', $attrs ) ) {
						$attrs[ 'data-srcset' ][ 'value' ] = $attrs[ 'srcset' ][ 'value' ];
						$attrs[ 'srcset' ][ 'value' ] = '#';
					}
					$element = '<img';
					foreach ( $attrs as $attr => $value ) {
						$element .= sprintf( ' %1$s="%2$s"', $attr, $value[ 'value' ] );
					}
					$element .= ' />';
				}
			} elseif ( empty( trim( $element ) ) ) {
				continue;
			}
			$result[] = $element;
		}
	} else {
		$result[] = $content;
	}
	return implode( "", $result );
}

add_filter( 'the_content', 'resume_add_content_lazyload_images', 10, 1 );


/**
 * Добавляем кнопку открытия пользовательского поиска гугл в стандартной форме поиска
 */
function resume_add_google_cse_button() {
	?>
		<a class="google-search-fancybox-button fancybox" href="#google-search-fancybox-container">
			<?php _e( 'Поиск Google', RESUME_TEXTDOMAIN ); ?>
		</a>
	<?php
}


/**
 * Добавляет код пользовательского поиска гугл
 */
function resume_add_google_cse_code() {
	$code = get_theme_mod( RESUME_SLUG . '_google_cse_code', apply_filters( 'get_default_setting', 'google_cse_code' ) );
	$code = ( empty( trim( $code ) ) ) ? __( 'Получите код пользовательского поиска Google', RESUME_TEXTDOMAIN ) : htmlspecialchars_decode( $code );
	echo '<div id="google-search-fancybox-container" class="google-search-fancybox-container">' . $code . '</div>';
}

if ( get_theme_mod( RESUME_SLUG . '_google_cse_flag', apply_filters( 'get_default_setting', 'google_cse_flag' ) ) ) {
	add_action( 'resume_searchform_after', 'resume_add_google_cse_button', 10, 0 );
	add_action( 'wp_enqueue_scripts', 'resume_add_google_cse_code', 10, 0 );
}



/**
 * Проверяем есть нужна ли замена колонки у страницы и если есть,
 * то регистрируем соответствующий фильтр
 */
function resume_replace_default_column() {
	$custom_columns = '';
	if ( is_singular( 'page' ) ) {
		$custom_columns = get_post_meta( get_the_ID(), '_custom_columns', true );
	} elseif ( is_singular( 'post' ) ) {
		$categories = get_terms( [
			'taxonomy'   => 'category',
			'object_ids' => get_the_ID(),
			'fields'     => 'ids',
			'meta_key'   => '_custom_columns',
		] );
		if ( is_array( $categories ) && ! empty( $categories ) ) {
			$custom_columns = get_term_meta( $categories[ 0 ], '_custom_columns', true );
		}
	} elseif ( is_category() ) {
		$custom_columns = get_term_meta( get_queried_object()->term_id, '_custom_columns', true );
	}
	if ( ! empty( $custom_columns ) ) {
		add_filter( 'sidebars_widgets', function( $sidebars ) use ( $custom_columns ) {
			if ( array_key_exists( $custom_columns, $sidebars ) ) {
				$sidebars[ 'column' ] = $sidebars[ $custom_columns ];
			}
			return $sidebars;
		}, 5, 1 );
	}
}

add_action( 'wp', 'resume_replace_default_column' );