<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function edit_category_custom_columns( $term ) {
	$custom_columns = get_term_meta( $term->term_id, '_custom_columns', true );
	$register_columns = get_theme_mod( 'register_columns', [] );
	?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="custom_columns"><?php _e( 'Выбрать сайдбар', RESUME_TEXTDOMAIN ); ?></label>
			</th>
			<td>
				<select class="resume-control" id="custom_columns" name="custom_columns">
					<option value=""><?php _e( 'Стандартная колонка', RESUME_TEXTDOMAIN ); ?></option>
					<?php foreach ( $register_columns as $column ) : ?>
						<option value="<?php echo $column[ 'id' ]; ?>" <?php selected( $custom_columns, $column[ 'id' ], true ); ?> ><?php echo $column[ 'name' ]; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'resume\edit_category_custom_columns' );


function add_category_custom_columns( $taxonomy_slug ) {
	$register_columns = get_theme_mod( 'register_columns', [] );
	?>
		<div class="form-field">
			<label for="custom_columns"><?php _e( 'Выбрать сайдбар', RESUME_TEXTDOMAIN ); ?></label>
			<select class="resume-control" id="custom_columns" name="custom_columns">
				<option value=""><?php _e( 'Стандартная колонка', RESUME_TEXTDOMAIN ); ?></option>
				<?php foreach ( $register_columns as $column ) : ?>
					<option value="<?php echo $column[ 'id' ]; ?>" ><?php echo $column[ 'name' ]; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<?php
}
add_action( 'category_add_form_fields', 'resume\add_category_custom_columns' );


function save_category_custom_columns( $term_id ) {
	if ( ! current_user_can( 'edit_term', $term_id ) ) return;
	if (
		( isset( $_POST[ '_wpnonce' ] ) && ! wp_verify_nonce( $_POST[ '_wpnonce' ], "update-tag_$term_id" ) ) ||
		( isset( $_POST[ '_wpnonce_add-tag' ] ) && ! wp_verify_nonce( $_POST[ '_wpnonce_add-tag' ], "add-tag" ) )
	) return;
	$custom_columns = ( isset( $_POST[ 'custom_columns' ] ) ) ? sanitize_text_field( wp_unslash( $_POST[ 'custom_columns' ] ) ) : '';
	if ( empty( $custom_columns ) ) {
		delete_term_meta( $term_id, '_custom_columns' );
	} else {
		update_term_meta( $term_id, '_custom_columns', $custom_columns );
	}
	return $term_id;
}
add_action( 'create_category', 'resume\save_category_custom_columns' );
add_action( 'edited_category', 'resume\save_category_custom_columns' );




function add_custom_columns_meta_box() {
	if ( ! in_array( get_post_meta( get_the_ID(), '_wp_page_template', true ), array( 'singular-fluid.php' ) ) ) {
		add_meta_box(
			RESUME_SLUG . '_custom_columns',
			__( 'Пользовательские колонки', RESUME_TEXTDOMAIN ),
			'resume\render_custom_columns_meta_box',
			array( 'page' ),
			'side'
		);
	}
}
add_action( 'add_meta_boxes', 'resume\add_custom_columns_meta_box' );


function render_custom_columns_meta_box( $post, $meta ) {
	global $wp_registered_sidebars;
	wp_nonce_field( plugin_basename( __FILE__ ), 'custom_columns_noncename' );
	$custom_columns = get_post_meta( $post->ID, '_custom_columns', true );
	$register_columns = get_theme_mod( 'register_columns', [] );
	if ( ! empty( $register_columns ) ) : ?>
		<name class="resume-name" for="custom_columns"><?php _e( 'Выбрать сайдбар', RESUME_TEXTDOMAIN ); ?></name>
		<select class="resume-control" id="custom_columns" name="custom_columns">
			<option value=""><?php _e( 'Стандартная колонка', RESUME_TEXTDOMAIN ); ?></option>
			<?php foreach ( $register_columns as $column ) : ?>
				<option value="<?php echo $column[ 'id' ]; ?>" <?php selected( $custom_columns, $column[ 'id' ], true ); ?> ><?php echo $column[ 'name' ]; ?></option>
			<?php endforeach; ?>
		</select>
	<?php endif;
}


function save_custom_columns_metadata( $post_id ) {
	if ( ! isset( $_POST[ 'custom_columns_noncename' ] ) ) return;
	if ( ! wp_verify_nonce( $_POST[ 'custom_columns_noncename' ], plugin_basename( __FILE__ ) ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	$custom_columns = sanitize_text_field( $_POST[ 'custom_columns' ] );
	if ( empty( $custom_columns ) ) {
		delete_post_meta( $post_id, '_custom_columns' );
	} else {
		update_post_meta( $post_id, '_custom_columns', $custom_columns );
	}
}
add_action( 'save_post', 'resume\save_custom_columns_metadata' );


function register_custom_columns_submenu() {
	add_theme_page(
		__( 'Пользовательские колонки', RESUME_TEXTDOMAIN ),
		__( 'Пользовательские колонки', RESUME_TEXTDOMAIN ),
		'manage_options',
		RESUME_SLUG . '_custom_columns',
		'resume\render_custom_columns_submenu'
	);
}
add_action( 'admin_menu', 'resume\register_custom_columns_submenu' );


function action_for_custom_columns( $current_screen ) {
	if ( 'appearance_page_' . RESUME_SLUG . '_custom_columns' == $current_screen->id ) {
		if (
			current_user_can( 'manage_options' )
			 && isset( $_REQUEST[ 'action' ] )
			 && in_array( $_REQUEST[ 'action' ], [ 'add', 'edit', 'delete' ] )
			 && isset( $_REQUEST[ 'nonce' ] )
			 && wp_verify_nonce( $_REQUEST[ 'nonce' ], plugin_basename( __FILE__ ) )
		) {
			$register_columns = get_theme_mod( 'register_columns', [] );
			switch ( $_REQUEST[ 'action' ] ) {

				case 'add':
					if ( isset( $_REQUEST[ 'new_column' ] ) ) {
						$new_column = parse_only_allowed_args(
							[ 'name' => '', 'description' => '', 'class' => '' ],
							$_REQUEST[ 'new_column' ],
							[ 'sanitize_text_field', 'sanitize_text_field', 'sanitize_text_field' ],
							[ 'name' ]
						);
						if ( null !== $new_column ) {
							$new_column[ 'id' ] = 'column_' . md5( $new_column[ 'name' ] );
							if ( empty( count( wp_list_filter( $register_columns, [ 'id' => $new_column[ 'id' ] ], 'AND' ) ) ) ) {
								$register_columns[] = $new_column;
							}
						}
					}
					break;

				case 'edit':
					if ( isset( $_REQUEST[ 'new_value' ] ) ) {
						$new_value = parse_only_allowed_args(
							[ 'name' => '', 'id' => '', 'description' => '', 'class' => '' ],
							$_REQUEST[ 'new_value' ],
							[ 'sanitize_text_field', 'sanitize_text_field', 'sanitize_text_field', 'sanitize_text_field' ],
							[ 'name', 'id', 'description', 'class' ]
						);
						if ( null !== $new_value ) {
							foreach ( $register_columns as &$register_column ) {
								if ( $new_value[ 'id' ] == $register_column[ 'id' ] ) {
									$register_column = $new_value;
									break;
								}
							}
						}
					}
					break;

				case 'delete':
					if ( isset( $_REQUEST[ 'id' ] ) ) {
						$id = sanitize_text_field( $_REQUEST[ 'id' ] );
						if ( ! empty( $id ) ) {
							for ( $i = 0; $i < count( $register_columns ); $i++ ) { 
								if ( $id == $register_columns[ $i ][ 'id' ] ) {
									$pages = get_pages( [
										'number'     => -1,
										'meta_key'   => '_custom_columns',
										'meta_value' => $id,
									] );
									if ( is_array( $pages ) && ! empty( $pages ) ) {
										foreach ( $pages as $page ) {
											delete_post_meta( $page->ID, '_custom_columns' );
										}
									}
									array_splice( $register_columns, $i, 1 );
									break;
								}
							}
						}
					}
					break;

			}
			set_theme_mod( 'register_columns', $register_columns );
			wp_safe_redirect( get_admin_url( null, 'themes.php?page=' . RESUME_SLUG . '_custom_columns', null ), 302 );
			exit();
		}
	}
}
add_action( 'current_screen', 'resume\action_for_custom_columns', 10, 1 );




function render_custom_columns_submenu() {
	$current_tab = ( isset( $_REQUEST[ 'tab' ] ) && in_array( $_REQUEST[ 'tab' ], [ 'table', 'add', 'edit' ] ) ) ? $_REQUEST[ 'tab' ] : 'table';
	$register_columns = get_theme_mod( 'register_columns', [] );
	$nonce = wp_create_nonce( plugin_basename( __FILE__ ) );
	$page_url = 'themes.php?page=' . RESUME_SLUG . '_custom_columns';
	$page_content = ( isset( $_REQUEST[ 'notice' ] ) ) ? $_REQUEST[ 'notice' ] : '';
	$page_title = get_admin_page_title();
	ob_start();
	if ( 'add' == $current_tab || empty( $register_columns ) ) : ?>
		<h3><?php _e( 'Добавление', RESUME_TEXTDOMAIN ); ?></h3>
		<form method="post">
			<input type="hidden" name="nonce" required="required" value="<?php echo $nonce; ?>">
			<input type="hidden" name="action" required="required" value="add">
			<p>
				<input type="text" name="new_column[name]" required="required" placeholder="<?php esc_attr_e( 'Название', RESUME_TEXTDOMAIN ); ?>">
				<input type="text" name="new_column[description]" placeholder="<?php esc_attr_e( 'Описание', RESUME_TEXTDOMAIN ); ?>">
				<input type="text" name="new_column[class]" placeholder="<?php esc_attr_e( 'CSS-класс', RESUME_TEXTDOMAIN ); ?>">
				<button class="button button-primary" type="submit"><?php _e( 'Добавить', RESUME_TEXTDOMAIN ); ?></button>
				<a class="button" href="<?php echo $page_url; ?>"><?php _e( 'Отмена', RESUME_TEXTDOMAIN ); ?></a>
			</p>
		</form>
	<?php elseif ( 'edit' == $current_tab && isset( $_REQUEST[ 'id' ] ) ) : ?>
		<h3><?php _e( 'Редактирование', RESUME_TEXTDOMAIN ); ?></h3>
		<?php
			$old_value = [ 'name' => '', 'id' => '', 'description' => '', 'class' => '' ];
			for ( $i = 0;  $i < count( $register_columns );  $i++ ) { 
				if ( $_REQUEST[ 'id' ] == $register_columns[ $i ][ 'id' ] ) {
					$old_value = $register_columns[ $i ];
					break;
				}
			}
		?>
		<form method="post">
			<p>
				<input type="hidden" name="nonce" required="required" value="<?php echo $nonce; ?>">
				<input type="hidden" name="action" required="required" value="edit">
				<input type="hidden" name="new_value[id]" required="required" value="<?php echo esc_attr( $old_value[ 'id' ] ); ?>">
				<input type="text" name="new_value[name]" required="required" value="<?php echo esc_attr( $old_value[ 'name' ] ); ?>" placeholder="<?php esc_attr_e( 'Название', RESUME_TEXTDOMAIN ); ?>">
				<input type="text" name="new_value[description]" value="<?php echo esc_attr( $old_value[ 'description' ] ); ?>" placeholder="<?php esc_attr_e( 'Описание', RESUME_TEXTDOMAIN ); ?>">
				<input type="text" name="new_value[class]" value="<?php echo esc_attr( $old_value[ 'class' ] ); ?>" placeholder="<?php esc_attr_e( 'CSS-класс', RESUME_TEXTDOMAIN ); ?>">
			</p>
			<p>
				<a class="button" href="<?php echo $page_url; ?>"><?php _e( 'Отмена', RESUME_TEXTDOMAIN ); ?></a>
				<button class="button button-primary" type="submit"><?php _e( 'Сохранить', RESUME_TEXTDOMAIN ); ?></button>
			</p>
		</form>
	<?php else : ?>
		<?php
			add_thickbox();
			$count = 0;
			$page_title = $page_title . ' <a class="button button-primary" href="' . $page_url . '&tab=add">' . __( 'Добавить', RESUME_TEXTDOMAIN ) . '</a>';
			$registered_sidebars = wp_get_sidebars_widgets();
		?>
		<table class="custom-column-table">
			<thead>
				<th><?php _e( '№', RESUME_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'Название', RESUME_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'Описание', RESUME_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'CSS-класс', RESUME_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'Страницы', RESUME_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'Виджеты', RESUME_TEXTDOMAIN ); ?></th>
			</thead>
			<tbody>
				<?php foreach ( $register_columns as $register_column ) : ?>
					<?php
						$count = $count + 1;
						$pages = get_pages( [
							'meta_key'    => '_custom_columns',
							'meta_value'  => $register_column[ 'id' ],
							'sort_order'  => 'ASC',
							'sort_column' => 'post_title'
						] );
						$categories = get_categories( [
							'taxonomy'    => 'category',
							'orderby'     => 'name',
							'order'       => 'ASC',
							'hide_empty'  => false,
							'fields'      => 'all',
							'meta_key'    => '_custom_columns',
							'meta_value'  => $register_column[ 'id' ],
						] );
						$usage = 0;
						$widgets_count = ( array_key_exists( $register_column[ 'id' ], $registered_sidebars ) ) ? count( $registered_sidebars[ $register_column[ 'id' ] ] ) : 0;
						$action_url = $page_url . '&nonce=' . $nonce . '&id=' . $register_column[ 'id' ];
					?>
					<tr>
						<td class="count"><?php echo $count; ?></td>
						<td class="name"><?php echo $register_column[ 'name' ]; ?></td>
						<td class="description"><?php echo $register_column[ 'description' ]; ?></td>
						<td class="class"><?php echo $register_column[ 'class' ]; ?></td>
						<td class="posts">
							<div id="usage-<?php echo $register_column[ 'id' ]; ?>" style="display:none;">
								<?php if ( is_array( $pages ) && ! empty( $pages ) ) : $usage = $usage + count( $pages ); ?>
									<h4><?php _e( 'Страницы', RESUME_TEXTDOMAIN ); ?></h4>
									<ul class="list-disc">
										<?php foreach ( $pages as $page ) : ?>
											<li><a target="_blank" href="<?php echo get_permalink( $page ); ?>"><?php echo apply_filters( 'the_title', $page->post_title, $page->ID ); ?></a></li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<p><?php _e( 'Колонка не используется на постоянных страницах.', RESUME_TEXTDOMAIN ); ?></p>
								<?php endif; ?>
								<?php if ( is_array( $categories ) && ! empty( $categories ) ) : $usage = $usage + count( $categories ); ?>
									<h4><?php _e( 'Категории', RESUME_TEXTDOMAIN ); ?></h4>
									<ul class="list-disc">
										<?php foreach ( $categories as $category ) : ?>
											<li><a target="_blank" href="<?php echo get_category_link( $category ); ?>"><?php echo apply_filters( 'single_cat_title', $category->name ); ?></a></li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<p><?php _e( 'Колонка не используется на страницах категорий.', RESUME_TEXTDOMAIN ); ?></p>
								<?php endif; ?>
							</div>
							<a class="thickbox" href="/?TB_inline&inlineId=usage-<?php echo $register_column[ 'id' ]; ?>&width=300&height=200"><?php echo $usage; ?></a>
						</td>
						<td class="widgets"><?php echo $widgets_count; ?></td>
						<td class="text-right">
							<a class="action-button delete-button" onclick="return confirm( '<?php esc_attr_e( 'Вы уверены?', RESUME_TEXTDOMAIN ); ?>' );" href="<?php echo $action_url . '&action=delete'; ?>"><?php _e( 'Удалить', RESUME_TEXTDOMAIN ); ?></a>
							<a class="action-button edit-button" href="<?php echo $action_url . '&tab=edit'; ?>"><?php _e( 'Редактировать', RESUME_TEXTDOMAIN ); ?></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif;
	$page_content = $page_content . ob_get_contents();
	ob_end_clean();
	include get_theme_file_path( 'views/admin/menu-page.php' );
}