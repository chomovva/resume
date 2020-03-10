<?php



namespace resume;



if ( ! defined( 'ABSPATH' ) ) { exit; };



function get_theme_setting( $name ) {
	$value = get_theme_mod( RESUME_TEXTDOMAIN . '_' . $name, apply_filters( 'get_default_setting', $name ) );
	return apply_filters( 'get_theme_setting', $value, $name );
}



function get_custom_logo_img() {
	$result = __return_empty_string();
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$result = sprintf(
			'<img class="custom-logo" src="%1$s" alt="%2$s">',
			wp_get_attachment_image_url( $custom_logo_id, 'thumbnail', false ),
			get_bloginfo( 'name', 'display' )
		);
	}
	return $result;
}



function sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}



function get_languages_list() {
	$result = __return_empty_array();
	if ( ( function_exists( 'pll_the_languages' ) ) && ( function_exists( 'pll_current_language' ) ) ) {
		$current = pll_current_language( 'slug' );
		$other = pll_the_languages( array(
			'dropdown'           => 0,
			'show_names'         => '',
			'display_names_as'   => 'slug',
			'show_flags'         => 0,
			'hide_if_empty'      => 0,
			'force_home'         => 0,
			'echo'               => 0,
			'hide_if_no_translation' => 0,
			'hide_current'       => 0,
			'post_id'            => ( is_singular() ) ? get_the_ID() : NULL,
			'raw'                => 1,
		) );
		if ( ( $other ) && ( ! empty( $other ) ) ) {
			foreach ( $other as $lang ) $result[] = sprintf(
				( $lang[ 'slug' ] == $current ) ? '<li class="current">%2$s</li>' : '<li><a href="%1$s">%2$s</a></li>',
				$lang[ 'url' ],
				$lang[ 'name' ]
			);
		}
	}
	if ( ! empty( $result ) ) echo '<ul class="languages">' . implode( "\r\n", $result ) . '</ul>';
}




function the_breadcrumbs() {
	ob_start();
	if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb();
	} else {
			if ( ! is_front_page() ) {
				echo '<a href="';
				echo home_url();
				echo '">'.__( 'Главная', RESUME_TEXTDOMAIN );
				echo "</a> » ";
				if ( is_category() || is_single() ) {
						the_category(' ');
						if ( is_single() ) {
								echo " » ";
								the_title();
						}
				} elseif ( is_page() ) {
						echo the_title();
				}
			}
			else {
				echo __( 'Домашняя страница', RESUME_TEXTDOMAIN );
			}
	}
	$result = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $result ) ) {
		echo '<div id="breadcrumbs" class="breadcrumbs">';
		echo $result;
		echo '</div>';
	}
}





function get_translate_id( $id, $type = 'post' ) {
	$result = '';
	if ( $id && ! empty( $id ) ) {
		if ( defined( 'POLYLANG_FILE' ) ) {
			switch ( $type ) {
				case 'category':
					$translate = ( function_exists( 'pll_get_term' ) ) ? pll_get_term( $id, pll_current_language( 'slug' ) ) : $translate;
					break;
				case 'post':
				case 'page':
				default:
					$translate = ( function_exists( 'pll_get_post' ) ) ? pll_get_post( $id, pll_current_language( 'slug' ) ) : $translate;
					break;
			} // switch
			$result = ( $translate ) ? $translate : '';
		} else {
			$result = $id;
		}
	}
	return $result;
}







function render_links_list( $contacts, $class_name ) {
	$result = __return_empty_array();
	if ( is_array( $contacts ) && ! empty( $contacts ) ) {
		foreach ( $contacts as $key => $value ) {
			if ( ! empty( $value ) ) {
				$result[] = sprintf(
					'<li><a class="%1$s" href="%2$s"><span class="sr-only">%1$s</span></a></li>',
					$key,
					$value
				);
			}
		}
	}
	return ( empty( $result ) ) ? '' : sprintf( '<ul class="%1$s">%2$s</ul>', $class_name, implode( "\r\n", $result ) );
}




function get_trim_excerpt( $content ) {
	$result = __return_empty_string();
	$content = strip_shortcodes( $content );
	$content = excerpt_remove_blocks( $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = strip_tags( $content );
	$result = wp_trim_words( $content );
	return $result;
}




function the_pager() {
	ob_start();
	foreach ( array(
		'previous'  => array(
			'entry'     => get_previous_post(),
			'label'     => __( 'Смотреть предыдущий пост', RESUME_TEXTDOMAIN ),
		),
		'next'      => array(
			'entry'     => get_next_post(),
			'label'     => __( 'Смотреть следующий пост', RESUME_TEXTDOMAIN ),
		),
	) as $key => $value ) {
		if ( $value[ 'entry' ] && ! is_wp_error( $value[ 'entry' ] ) ) {
			$title = apply_filters( 'the_title', $value[ 'entry' ]->post_title, $value[ 'entry' ]->ID );
			$label = $value[ 'label' ];
			$permalink = get_permalink( $value[ 'entry' ]->ID );
			$excerpt = ( empty( trim( $value[ 'entry' ]->post_excerpt ) ) ) ? get_trim_excerpt( $value[ 'entry' ]->post_content ) : $value[ 'entry' ]->post_excerpt;
			include get_theme_file_path( 'views/adjacent-post.php' );
		}
	}
	$content = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $content ) ) {
			echo '<nav class="pager">' . $content . '</nav>';
	}
}




function get_thumbnail_image( $post_id, $size = 'thumbnail', $attribute = 'src', $class_name = 'lazy' ) {
	return sprintf(
		'<img class="%4$s wp-post-thumbnail" src="#" data-%3$s="%1$s" alt="%2$s"/>',
		( has_post_thumbnail( $post_id ) ) ? get_the_post_thumbnail_url( $post_id, $size ) : RESUME_URL . 'images/thumbnail.png',
		the_title_attribute( array(
			'before' => '',
			'after'  => '',
			'echo'   => false,
			'post'   => $post_id,
		) ),
		$attribute,
		$class_name
	);
}




function the_thumbnail_image( $post_id, $size = 'thumbnail', $attribute = 'src', $class_name = 'lazy' ) {
	echo get_thumbnail_image( $post_id, $size, $attribute, $class_name );
}




function the_pageheader() {
	if ( is_archive() ) {
		$title = get_the_archive_title();
		$excerpt = do_shortcode( get_the_archive_description() );
		$thumbnail = '';
		$date = '';
	} elseif ( is_search() ) {
		$title = __( 'Поиск по сайту', RESUME_TEXTDOMAIN );
		$excerpt = sprintf( '%1$s: <span class="bg-success">%2$s</span>', __( 'Вы искали', RESUME_TEXTDOMAIN ), get_search_query() );
		$thumbnail = sprintf(
			'<img class="lazy wp-post-thumbnail" src="#" data-src="%1$s" alt="%2$s"/>',
			RESUME_URL . 'images/document.svg',
			esc_attr__( 'Поиск по сайту', RESUME_TEXTDOMAIN )
		);
		$date = '';
	} else {
		$title = single_post_title( '', false );
		$excerpt = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : false;
		$thumbnail = get_thumbnail_image( get_the_ID(), 'thumbnail_medium' );
		$date = ( is_single() ) ? get_publish_date() : __return_empty_string();
	}
	include get_theme_file_path( 'views/pageheader.php' );
}





function get_categories_choices() {
	$result = __return_empty_array();
	$categories = get_categories( array(
		'taxonomy'     => 'category',
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 0,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	) );
	if ( is_array( $categories ) && ! empty( $categories ) ) {
		foreach ( $categories as $category ) {
			$result[ $category->term_id ] = esc_html( apply_filters( 'single_cat_title', $category->name ) );
		}
	}
	return $result;
}





function get_progress_bar( $value = '50' ) {
	ob_start();
	include get_theme_file_path( 'views/progress-bar.php' );
	$result = ob_get_contents();
	ob_end_clean();
	return $result;
}





function get_share( $post_id = false ) {
	if ( $post_id ) { $post_id = get_the_ID(); }
	$format = __return_empty_string();
	$result = __return_empty_array();
	$title = __return_empty_string();
	$permalink = __return_empty_string();
	$thumbnail_url = RESUME_URL . 'images/thumbnail.png';
	$blog_name = get_bloginfo( 'name' );
	if ( $post_id || is_singular() ) {
		$permalink = get_permalink( $post_id );
		$title = get_the_title( $post_id );
		$thumbnail_url = ( has_post_thumbnail( $post_id ) ) ? get_the_post_thumbnail_url( $post_id, 'medium' ) : $thumbnail_url;
	} elseif ( is_front_page() ) {
		$permalink = get_home_url();
		$title = get_bloginfo( 'name' );
		$thumbnail_url = ( has_header_image() ) ? get_header_image() : $thumbnail_url;
	} elseif ( is_search() ) {
		$permalink = get_search_link( get_search_query() );
		$title = sprintf( __( 'Результаты поиска %s', RESUME_TEXTDOMAIN ), get_search_query() );
	} elseif ( $term_id = get_queried_object()->term_id ) {
		$permalink = get_term_link( $term_id );
		$title = single_term_title( $term_id, 0 );
	}
	foreach ( array(
		'vk'       => __( 'Поделиться в VK', RESUME_TEXTDOMAIN ),
		'facebook' => __( 'Поделиться в Facebook', RESUME_TEXTDOMAIN ),
		'twitter'  => __( 'Поделиться в Twitter', RESUME_TEXTDOMAIN ),
		'linkedin' => __( 'Поделиться в LinkedIn', RESUME_TEXTDOMAIN ),
		'email'    => __( 'Отправить по email', RESUME_TEXTDOMAIN ),
	) as $key => $label ) {
		switch ( $key ) {
			case 'vk':
				$format = 'https://vk.com/share.php?url=%1$s&title=%2$s&image=%3$s';
				break;
			case 'facebook':
				$format = 'https://www.facebook.com/sharer.php?u=%1$s&amp;t=%2$s';
				break;
			case 'twitter':
				$format = 'https://twitter.com/share?url=%1$s&amp;text=%2$s';
				break;
			case 'linkedin':
				$format = 'https://www.linkedin.com/shareArticle?mini=true&url=%1$s&title=%2$s';
				break;
			case 'email':
				$format = 'mailto:info@example.com?&subject=%4$s&body=%2$s %1$s';
				break;
		}
		$link = sprintf(
			$format,
			$permalink,
			esc_attr( $title ),
			$thumbnail_url,
			esc_attr( $blog_name )
		);
		$result[] = sprintf(
			'<li><a class="%1$s" target="_blank" href="%2$s"><span class="sr-only">%3$s</span></a></li>',
			$key,
			$link,
			$label
		);
	}
	return ( empty( $result ) ) ? '' : '<ul class="share">' . implode( "\r\n", $result ) . '</ul>';
}





function get_publish_date( $date = '' ) {
	$timestamp = ( empty( $date ) ) ? strtotime( get_the_date( '', get_the_ID() ) ) : strtotime( $date );
	return ( $timestamp ) ? sprintf(
		'<div class="publish"><span class="day">%1$s</span> <span class="month">%2$s</span> <span class="year">%3$s</span></div>',
		date( 'd', $timestamp ),
		date_i18n( 'M', $timestamp ),
		date( 'Y', $timestamp )
	) : '';
}




function get_entry_categories( $post_id, $exclude = '', $link = true ) {
	$result = __return_empty_array();
	$terms = get_terms( array(
		'taxonomy'    => 'category',
		'object_ids'  => $post_id,
		'exclude'     => $exclude,
		'fields'      => 'id=>name',
	) );
	$format = ( $link ) ? '<li><a href="%1$s">%2$s</a></li>' : '<li>%2$s</li>';
	if ( is_array( $terms ) && ! empty( $terms ) ) {
		foreach ( $terms as $term_id => $name ) {
			$result[] = sprintf(
				$format,
				get_category_link( $term_id ),
				$name
			);
		}
	}
	return ( empty( $result ) ) ? '' : '<ul class="categories">' . implode( "\r\n", $result ) . '</ul>';
}






/**
 * Подсветка результатов поиска
 **/
function search_backlight( $text ) {
	if ( is_search() ) {
		$query_terms = get_query_var( 'search_terms' );
		if ( empty( $query_terms ) ) $query_terms = array( get_query_var( 's' ) );
		if ( empty( $query_terms ) ) return $text;
		foreach( $query_terms as $term ) {
			$term = preg_quote( $term, '/' );
			$text = preg_replace_callback( "/$term/iu", function( $match ) {
				return '<span class="bg-success">'. $match[ 0 ] .'</span>';
			}, $text );
		}
	}
	return $text;
}



/**
 * Конвертер ассоциативного массива в css правила
 **/
function css_array_to_css( $rules, $args = array() ) {
	$args = array_merge( array(
		'indent'     => 0,
		'container'  => false,
	), $args );
	$css = __return_empty_string();
	$prefix = str_repeat( '  ', $args[ 'indent' ] );
	foreach ($rules as $key => $value ) {
		if ( is_array( $value ) ) {
			$selector = $key;
			$properties = $value;
			$css .= $prefix . "$selector {\n";
			$css .= $prefix . css_array_to_css( $properties, array(
				'indent'     => $args[ 'indent' ] + 1,
				'container'  => false,
			) );
			$css .= $prefix . "}\n";
		} else {
			$property = $key;
			$css .= $prefix . "$property: $value;\n";
		}
	}
	return ( $args[ 'container' ] ) ? "\n<style>\n" . $css . "\n</style>\n" : $css;
}




function render_entry( $entry, $classes, $current_term_id ) {
	$entry = get_post( $entry );
	$post_id = $entry->ID;
	$classes = implode( " ", get_post_class( $classes . ' entry', $entry->ID ) );
	$title = $entry->post_title;
	$excerpt = ( empty( $entry->post_excerpt ) ) ? wp_trim_excerpt( $entry->post_excerpt, $entry ) : $entry->post_excerpt;
	$permalink = get_the_permalink( $entry->ID );
	$thumbnail_image = get_thumbnail_image( $entry->ID, 'thumbnail_medium' );
	$publish_date = get_publish_date( $entry->post_date );
	$label = __( 'Подробней', RESUME_TEXTDOMAIN );
	$share = get_share( $entry->ID );
	$categories = get_entry_categories( $entry->ID, $current_term_id );
	include get_theme_file_path( 'views/entry.php' );
}



function parse_only_allowed_args( $default, $args ) {
	$args = ( array ) $args;
	$result  = array();
	foreach ( $default as $key => $value ) {
		if ( array_key_exists( $key, $args ) ) {
			$result[ $key ] = $args[ $key ];
		} else {
			$result[ $key ] = $value;
		}
	}
	return $result;
}