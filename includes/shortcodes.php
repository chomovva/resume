<?php



namespace resume;



if ( ! defined( 'ABSPATH' ) ) { exit; };




function the_resume_links( $atts ) {
	$atts = shortcode_atts( array(
		'type' => 'contacts',
	), $atts, 'the_resume_links' );
	$reuslt = __return_empty_array();
	if ( in_array( $atts[ 'type' ], array( 'contacts', 'links' ) ) ) {
		$contacts = get_theme_mod( RESUME_SLUG . "_{$atts[ 'type' ]}", array() );
		if ( ! empty( $contacts ) ) {
			$result[] = '<ul>';
			foreach ( $contacts as $key => $value ) {
				$result[] = sprintf(
					'<li>%1$s: <a href="%2$s">%2$s</a></li>',
					$key,
					$value
				);
			}
			$result[] = '</ul>';
		}
	}
	return implode( "\r\n", $result );
}

add_shortcode( 'the_resume_links', 'resume\the_resume_links' );





add_shortcode( 'languages_list', 'resume\get_languages_list' );




function get_defaut_contact_form() {
	$check = md5( date( 'Y-m-d' ) );
	$fields = array( 'email' => '', 'author' => '', 'message' => '', 'check' => '' );
	$result = __return_empty_string();
	if ( isset( $_POST[ 'check' ] ) && isset( $_POST[ 'resume_contact_form_data' ] ) ) {
		if ( isset( $_POST[ 'email' ] ) && empty( $_POST[ 'email' ] ) && $_POST[ 'check' ] == $check ) {
			if ( isset( $_POST[ 'resume_contact_form_data' ][ 'author' ] ) ) {
				$fields[ 'author' ] = sanitize_text_field( $_POST[ 'resume_contact_form_data' ][ 'author' ] );
			} else {
				$fields[ 'author' ] = '';
			}
			if ( empty( trim( $fields[ 'author' ] ) ) ) {
				$fields[ 'author' ] = __( 'Аноним', RESUME_TEXTDOMAIN );
			}
			$fields[ 'email' ] = sanitize_email( $_POST[ 'resume_contact_form_data' ][ 'email' ] );
			$fields[ 'message' ] = sanitize_textarea_field( $_POST[ 'resume_contact_form_data' ][ 'message' ] );
			if ( is_email( $fields[ 'email' ] ) ) {
				$user_ip = __return_empty_string();
				if ( ! empty( $_SERVER[ 'HTTP_CLIENT_IP' ] ) ) {
					$user_ip = $_SERVER[ 'HTTP_CLIENT_IP' ];
				} elseif ( ! empty( $_SERVER[ 'HTTP_X_FORWARDED_FOR' ] ) ) {
					$user_ip = $_SERVER[ 'HTTP_X_FORWARDED_FOR' ];
				} else {
					$user_ip = $_SERVER[ 'REMOTE_ADDR' ];
				}
				if ( ! wp_blacklist_check( $fields[ 'author' ], $fields[ 'email' ], '', $fields[ 'message' ], $user_ip, '' ) ) {
					ob_start();
					?>
						<table cellspacing="0" style="border: 1px solid #bbbbbb; width: 100%;">
							<tbody>
								<tr>
									<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;">
										<?php _e( 'IP пользователя', RESUME_TEXTDOMAIN ); ?>
									</td>
									<td style="border: 1px solid #bbbbbb; padding: 2px 5px;">
										<?php echo $user_ip; ?>
									</td>
								</tr>
								<tr>
									<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;">
										<?php _e( 'Имя пользователя', RESUME_TEXTDOMAIN ); ?>
									</td>
									<td style="border: 1px solid #bbbbbb; padding: 2px 5px;">
										<?php echo $fields[ 'author' ] ?>
									</td>
								</tr>
								<tr>
									<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;">
										<?php _e( 'Email пользователя', RESUME_TEXTDOMAIN ); ?></td>
									<td style="border: 1px solid #bbbbbb; padding: 2px 5px;">
										<a href="mailto:<?php echo esc_attr( $fields[ 'email' ] ); ?>"><?php echo $fields[ 'email' ]; ?></a>
									</td>
								</tr>
								<tr>
									<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;">
										<?php _e( 'Сообщение', RESUME_TEXTDOMAIN ); ?>
									</td>
									<td style="border: 1px solid #bbbbbb; padding: 2px 5px;">
										<?php echo $fields[ 'message' ]; ?>
									</td>
								</tr>
							</tbody>
						</table>
					<?php
					$content = ob_get_contents();
					ob_end_clean();
					$headers = sprintf( 'From: %1$s <%2$s>%3$sContent-type: text/html%3$scharset=utf-8%3$s', $fields[ 'author' ], $fields[ 'email' ], "\r\n" );
					$subject = sprintf( '%1$s %2$s', __( 'Сообщение с сайта', RESUME_TEXTDOMAIN ), get_bloginfo( 'name', 'raw' ) );
					if ( wp_mail( get_bloginfo( 'admin_email', 'raw' ), $subject, $content, $headers ) ) {
						$fields = array_map( '__return_empty_string', $fields );
						$result = '<div class="text-primary">' . __( 'Сообщение отправлено, мы с Вами обяжательно свяжемся.', RESUME_TEXTDOMAIN ) . '</div>';
					} else {
						$result = '<div class="text-warning">' . __( 'Произошла ошибка. Попробуйте позже или свяжитесь с администратором', RESUME_TEXTDOMAIN ) . '</div>';
					}
				} else {
					$result = '<div class="text-warning">' . __( 'Вы в черном списке. Попробуйте позже или свяжитесь с администратором', RESUME_TEXTDOMAIN ) . '</div>';
				}
			} else {
				$result = '<div class="text-warning">' . __( 'Введён некорректный email', RESUME_TEXTDOMAIN ) . '</div>';
			}
		} else {
			$result = '<div class="text-warning">' . __( 'Подозрение на спам. Попробуйте ещё раз.', RESUME_TEXTDOMAIN ) . '</div>';
		}
	}
	ob_start();
	?>
		<form method="post">
			<?php echo $result; ?>
			<div class="form-group">
				<label for="resume_contact_form_author"><?php _e( 'Ваше имя', RESUME_TEXTDOMAIN ); ?></label>
				<input id="resume_contact_form_author" type="text" name="resume_contact_form_data[author]" value="<?php echo esc_attr( $fields[ 'author' ] ); ?>" required="required">
			</div>
			<div class="form-group">
				<label for="resume_contact_form_email"><?php _e( 'Ваш email', RESUME_TEXTDOMAIN ); ?></label>
				<input id="resume_contact_form_email" type="email" name="resume_contact_form_data[email]" value="<?php echo esc_attr( $fields[ 'email' ] ); ?>" required="required">
			</div>
			<div class="form-group">
				<label for="resume_contact_form_message"><?php _e( 'Сообщение', RESUME_TEXTDOMAIN ); ?></label>
				<textarea id="resume_contact_form_message" name="resume_contact_form_data[message]" required="required"><?php echo $fields[ 'message' ]; ?></textarea>
			</div>
			<input type="hidden" name="check" value="<?php echo esc_attr( $check ); ?>">
			<input type="email" name="email" value="" style="visibility: hidden;">
			<div class="form-group">
				<button type="submit"><?php _e( 'Отправить', RESUME_TEXTDOMAIN ); ?></button>
			</div>
			<br>
		</form>
	<?
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}

add_shortcode( 'defaut_contact_form', 'resume\get_defaut_contact_form' );




function get_reviews_list( $atts ) {
	$atts = shortcode_atts( array(
		'section' => true,
	), $atts, 'the_reviews_list' );
	$html = __return_empty_string();
	$items = get_theme_mod( RESUME_SLUG . '_reviews', array() );
	if ( is_array( $items ) && ! empty( $items ) ) {
		ob_start();
		for ( $i = 0;  $i < get_theme_mod( RESUME_SLUG . '_reviews_count', 5 );  $i++ ) {
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = parse_only_allowed_args( array(
					'author'  => '',
					'foto'    => RESUME_URL . 'images/user.png',
					'content' => '',
					'link'    => '',
					'label'   => __( 'Подробней о проекте', RESUME_TEXTDOMAIN ),
				), $items[ $i ] );
				if ( ! empty( $items[ $i ][ 'author' ] ) && ! empty( $items[ $i ][ 'content' ] ) ) {
					if ( is_int( $items[ $i ][ 'foto' ] ) ) {
						$items[ $i ][ 'foto' ] = wp_get_attachment_image_url( $items[ $i ][ 'foto' ], 'thumbnail', false );
					}
					if ( ! filter_var( $items[ $i ][ 'foto' ], FILTER_VALIDATE_URL ) ) {
						$items[ $i ][ 'foto' ] = RESUME_URL . 'images/user.png';
					}
					if ( function_exists( 'pll__' ) ) {
						$items[ $i ][ 'author' ] = pll__( $items[ $i ][ 'author' ] );
						$items[ $i ][ 'content' ] = pll__( $items[ $i ][ 'content' ] );
						$items[ $i ][ 'link' ] = pll__( $items[ $i ][ 'link' ] );
						$items[ $i ][ 'label' ] = pll__( $items[ $i ][ 'label' ] );
					}
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/review.php' );
				}
			}
		}
		$html = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $html ) ) {
		$morelink = get_theme_mod( RESUME_SLUG . '_reviews_morelink', '' );
		wp_enqueue_script( 'slick' );
		wp_enqueue_style( 'slick' );
		ob_start();
		?>
			<div class="slider">
				<div id="reviews-items">
					<?php echo $html; ?>	
				</div>
				<div class="controls">
					<button class="slider-arrow arrow-prev" id="reviews-slider-prev">
						<span class="sr-only"><?php _e( 'Предыдущий слайд' ); ?></span>
					</button>
					<button class="slider-arrow arrow-next" id="reviews-slider-next">
						<span class="sr-only"><?php _e( 'Следующий слайд' ); ?></span>
					</button>
					<?php if ( ! empty( $morelink ) ) : ?>
						<a class="morelink" href="<?php echo esc_attr( $morelink ); ?>">
							<?php _e( 'Смотреть все', RESUME_TEXTDOMAIN ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?
		$html = ob_get_contents();
		ob_end_clean();
		if ( $atts[ 'section' ] ) {
			$html = '<section class="section reviews" id="reviews">' . $html . '</section>';
		}
	}
	return $html;
}

add_shortcode( 'the_reviews_list', 'resume\get_reviews_list' );