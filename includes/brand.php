<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



/**
 * Замена логотипа на странице входа
 **/
function resume_custom_login_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( ( bool ) $custom_logo_id ) {
		$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'thumbnail', false );
		if ( $custom_logo_url ) {
			$blog_name = get_bloginfo( 'name' );
			echo resume\css_array_to_css( array(
				'body.login h1 a' => array(
					'background-image'   => 'url( ' . $custom_logo_url . ' )',
					'background-repeat'  => 'no-repeat',
					'width'              => '128px',
					'height'             => '128px',
					'background-size'    => '100px 100px',
					'background-position'=> 'center center',
					'margin'             => '0 auto'
				),
				'body.login h1::after' => array(
					'content'            => "'{$blog_name}'",
					'display'            => 'block',
					'margin-bottom'      => '25px',
				),
			), array( 'container' => true ) );
		}
	}
}
add_action( 'login_enqueue_scripts', 'resume_custom_login_logo' );



/**
 * Замена ссылки на логотипе
 **/
function resume_change_admin_logo_url( $url ) {
	return home_url('/');
}
add_filter( 'login_headerurl', 'resume_change_admin_logo_url', 10, 1 );