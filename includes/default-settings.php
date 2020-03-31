<?php



namespace resume;



if ( ! defined( 'ABSPATH' ) ) { exit; };



function get_default_setting( $key ) {

	$settings = array(

		// главная страница - первый экран
		'jumbotron_flag'         => false,
		'jumbotron_title'        => get_bloginfo( 'name' ),
		'jumbotron_bgi'          => RESUME_URL . 'images/jumbotron.jpg',

		// главная страница - обо мне
		'aboutme_flag'           => false,
		'aboutme_page_id'        => '',
		'aboutme_title'          => __( 'Обо мне', RESUME_TEXTDOMAIN ),
		'aboutme_foto'           => RESUME_URL . 'images/user.png',
		'aboutme_more_label'     => __( 'Подробней обо мне', RESUME_TEXTDOMAIN ),
		'aboutme_file_label'     => __( 'Скачать резюме', RESUME_TEXTDOMAIN ),
		'aboutme_file'           => '',

		// главная страница - услуги
		'services_flag'          => false,
		'services_page_id'       => '',
		'services_title'         => __( 'Чем я занимаюсь', RESUME_TEXTDOMAIN ),
		'services_excerpt'       => '',
		'services_label'         => __( 'Подробней', RESUME_TEXTDOMAIN ),
		'number_of_services'     => 6,

		// главная страница - Образование и опыт работы
		'way_flag'               => false,
		'way_bgi'                => RESUME_URL . 'images/way.jpg',
		'way_count'              => 2,

		// главная страница - преимущества
		'advantages_flag'        => false,
		'advantages_page_id'     => '',
		'advantages_title'       => __( 'Мои скилы', RESUME_TEXTDOMAIN ),


		// главная страница - портфолио
		'portfolio_flag'         => false,
		'portfolio_cat_id'       => '',
		'portfolio_title'        => __( 'Портфолио', RESUME_TEXTDOMAIN ),
		'portfolio_description'  => '',

		// главная страница - отзывы
		'reviews_flag'           => false,
		'reviews_type'           => 'list',
		'reviews_title'          => __( 'Отзывы', RESUME_TEXTDOMAIN ),
		'reviews_description'    => '',
		'reviews_page_id'        => '',
		'reviews_label'          => __( 'Смотреть все отзывы', RESUME_TEXTDOMAIN ),
		'reviews_count'          => 5,

		// главная страница - блог
		'myblog_flag'            => false,
		'myblog_title'           => __( 'Блог', RESUME_TEXTDOMAIN ),
		'myblog_description'     => '',
		'myblog_cat_id'          => '',
		'myblog_numberposts'     => 3,
		'myblog_label'           => __( 'Смотреть все записи', RESUME_TEXTDOMAIN ),

		// страница ошибки 404
		'error404_title'         => __( 'Ошибка 404', RESUME_TEXTDOMAIN ),
		'error404_description'   => '',

		// страница архива
		'archive_hide_post_date' => false,

		// скилы
		'skills_count'           => 5,

		// форма поиска гугл
		'google_cse_flag'        => false,
		'google_cse'             => '',

		// списки
		'contacts'               => [],
		'experience'             => [],
		'links'                  => [],
		'reviews'                => [],
		'services'               => [],
		'skills'                 => [],

	);

	return ( array_key_exists( $key, $settings ) ) ? $settings[ $key ] : '';

}

add_filter( 'get_default_setting', 'resume\get_default_setting', 10, 1 );




function get_list_of_social_networks() {
	return array(
		'facebook'  => __( 'Facebook', RESUME_TEXTDOMAIN ),
		'Twitter'   => __( 'Twitter', RESUME_TEXTDOMAIN ),
		'linkedin'  => __( 'LinkedIn', RESUME_TEXTDOMAIN ),
		'vk'        => __( 'Вконтакте', RESUME_TEXTDOMAIN ),
		'github'    => __( 'GitHub', RESUME_TEXTDOMAIN ),
		'youtube'   => __( 'YouTube', RESUME_TEXTDOMAIN ),
	) ;
}

add_filter( 'get_list_of_social_networks', 'resume\get_list_of_social_networks', 10, 1 );



function get_default_contact_list() {
	return array(
		'viber'    => __( 'Viber', RESUME_TEXTDOMAIN ),
		'whatsapp' => __( 'WhatsApp', RESUME_TEXTDOMAIN ),
		'telegram' => __( 'Telegram', RESUME_TEXTDOMAIN ),
		'email'    => __( 'Email', RESUME_TEXTDOMAIN ),
	);
}

add_filter( 'get_default_contact_list', 'resume\get_default_contact_list', 10, 2 );