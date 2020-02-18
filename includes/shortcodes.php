<?php



namespace resume;



if ( ! defined( 'ABSPATH' ) ) { exit; };




function the_resume_links( $atts ) {
	$atts = shortcode_atts( array(
		'type' => 'contacts',
	), $atts );
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
			<button type="submit"><?php _e( 'Отправить', RESUME_TEXTDOMAIN ); ?></button>
		</form>
	<?
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}

add_shortcode( 'defaut_contact_form', 'resume\get_defaut_contact_form' );