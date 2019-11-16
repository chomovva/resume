<?php





define( 'RESUME_URL', get_template_directory_uri() . '/' );
define( 'RESUME_DIR', get_template_directory() . '/' );
define( 'RESUME_TEXTDOMAIN', 'resume' );
define( 'RESUME_VERSION', '0.0.5' );
define( 'RESUME_SLUG', 'resume' );





get_template_part( 'includes/enqueue' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/shortcodes' );
get_template_part( 'includes/gutenberg' );



if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}




if ( is_customize_preview() ) {
	add_action( 'customize_register', function ( $wp_customize ) {
		$wp_customize->add_panel(
			RESUME_SLUG,
			array(
				'capability'      => 'edit_theme_options',
				'title'           => __( 'Настройки темы "Резюме"', RESUME_TEXTDOMAIN ),
				'priority'        => 200
			)
		);
		include get_theme_file_path( 'customizer/jumbotron.php' );
		include get_theme_file_path( 'customizer/aboutme.php' );
		include get_theme_file_path( 'customizer/services.php' );
		include get_theme_file_path( 'customizer/advantages.php' );
		include get_theme_file_path( 'customizer/skills.php' );
		include get_theme_file_path( 'customizer/way.php' );
		include get_theme_file_path( 'customizer/experience.php' );
		include get_theme_file_path( 'customizer/portfolio.php' );
		include get_theme_file_path( 'customizer/404.php' );
		include get_theme_file_path( 'customizer/contacts.php' );
		include get_theme_file_path( 'customizer/links.php' );
	} );
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







function resume_load_textdomain() {
	load_theme_textdomain( RESUME_TEXTDOMAIN, RESUME_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'resume_load_textdomain' );






function resume_register_nav_menus() {
	register_nav_menus( array(
		'main'      => __( 'Главное меню', RESUME_TEXTDOMAIN ),
		'error404'  => __( 'Меню страницы 404', RESUME_TEXTDOMAIN ),
	) );
}
add_action( 'after_setup_theme', 'resume_register_nav_menus' );






function resume_register_sidebars() {
	register_sidebar( array(
		'name'             => __( 'Сайдбар подвала', RESUME_TEXTDOMAIN ),
		'id'               => 'footer',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
	register_sidebar( array(
		'name'             => __( 'Колонка', RESUME_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
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