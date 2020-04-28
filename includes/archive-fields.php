<?php


namespace resume;


foreach ( array( 'category' ) as $taxonomy_name ) {
	add_action( "{$taxonomy_name}_add_form_fields", 'resume\add_new_custom_fields');
	add_action( "{$taxonomy_name}_edit_form_fields", 'resume\edit_new_custom_fields');
	add_action( "create_{$taxonomy_name}", 'resume\save_custom_taxonomy_meta');
	add_action( "edited_{$taxonomy_name}", 'resume\save_custom_taxonomy_meta');
}


function edit_new_custom_fields( $term ) {
	$hide_post_date = checked( true, ( bool ) get_term_meta( $term->term_id, 'hide_post_date', true ), false );
	?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="posts_template"><?php _e( 'Шаблон вывода записей', RESUME_TEXTDOMAIN ); ?></label>
			</th>
			<td>
				<select name="posts_template" class="resume-control">
					<?php
						$selected_posts_template = get_term_meta( $term->term_id, 'posts_template', true );
						if ( empty( $selected_posts_template ) ) {
							$selected_posts_template = 'default';
						}
						foreach ( [
							'default'   => __( 'Стандартный', RESUME_TEXTDOMAIN ),
							'portfolio' => __( 'Портфолио', RESUME_TEXTDOMAIN ),
						] as $value => $label ) {
							printf(
								'<option value="%1$s" %2$s>%3$s</option>',
								$value,
								selected( $selected_posts_template, $value, false ),
								$label
							);
						}
					?>
				</select>
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="hide_post_date"><?php _e( 'Скрыть дату', RESUME_TEXTDOMAIN ); ?></label>
			</th>
			<td>
				<label class="description">
					<input type="checkbox" name="hide_post_date" value="on" <?php echo $hide_post_date ?> >
					<?php _e( 'Скрывать дату публикации поста в записях этой категории', RESUME_TEXTDOMAIN ); ?>
				<label>
			</td>
		</tr>
	<?php
}

function add_new_custom_fields( $taxonomy_slug ) {
	?>
		<div class="form-field">
			<label for="posts_template"><?php _e( 'Шаблон вывода записей', RESUME_TEXTDOMAIN ); ?></label>
			<select name="posts_template" class="resume-control">
				<?php
					$selected_posts_template = 'default';
					foreach ( [
						'default'   => __( 'Стандартный', RESUME_TEXTDOMAIN ),
						'portfolio' => __( 'Портфолио', RESUME_TEXTDOMAIN ),
					] as $value => $label ) {
						printf(
							'<option value="%1$s" %2$s>%3$s</option>',
							$value,
							selected( $selected_posts_template, $value, false ),
							$label
						);
					}
				?>
			</select>
		</div>
		<div class="form-field">
			<label for="hide_post_date"><?php _e( 'Скрыть дату', RESUME_TEXTDOMAIN ); ?></label>
			<label>
				<input name="hide_post_date" id="hide_post_date" type="checkbox" value="on" />
				<?php _e( 'Скрывать дату публикации поста в записях этой категории', RESUME_TEXTDOMAIN ); ?>
			</label>
		</div>
	<?php
}

function save_custom_taxonomy_meta( $term_id ) {
	if ( ! current_user_can( 'edit_term', $term_id ) ) return;
	if (
		( isset( $_POST[ '_wpnonce' ] ) && ! wp_verify_nonce( $_POST[ '_wpnonce' ], "update-tag_$term_id" ) ) ||
		( isset( $_POST[ '_wpnonce_add-tag' ] ) && ! wp_verify_nonce( $_POST[ '_wpnonce_add-tag' ], "add-tag" ) )
	) return;
	// Скрыть дату публикации записи
	if ( isset( $_POST[ 'hide_post_date' ] ) && $_POST[ 'hide_post_date' ] == 'on' ) {
		update_term_meta( $term_id, 'hide_post_date', true );
	} else {
		delete_term_meta( $term_id, 'hide_post_date' );
	}
	// Шаблон вывода записей 
	if ( isset( $_POST[ 'posts_template' ] ) && in_array( $_POST[ 'posts_template' ], [ 'default', 'portfolio' ] ) ) {
		update_term_meta( $term_id, 'posts_template', sanitize_text_field( $_POST[ 'posts_template' ] ) );
	} else {
		delete_term_meta( $term_id, 'posts_template' );
	}
	return $term_id;
}
