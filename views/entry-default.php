<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! isset( $additional_classes ) ) {
	$additional_classes = '';
}

if ( ! isset( $current_term_id ) ) {
	$current_term_id = '';
}


?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $additional_classes . ' entry', get_the_ID() ); ?>>
	<div class="row center-xs">
		<div class="col-xs-8 col-sm-4 col-md-4 col-lg-3">
			<a class="thumbnail" href="<?php the_permalink(); ?>">
				<?php
					the_thumbnail_image( get_the_ID(), 'thumbnail_medium' );
					if ( ! get_theme_setting( 'archive_hide_post_date' ) && ! get_term_meta( $current_term_id, 'hide_post_date', true ) ) {
						get_publish_date( get_the_date() );
					}
				?>
			</a>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
			<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title( '', '', true ); ?></a></h3>
			<?php echo get_entry_categories( get_the_ID(), $current_term_id ); ?>
			<p class="excerpt"><?php the_excerpt(); ?></p>
			<div class="row center-xs middle-xs">
				<div class="col-xs-6">
					<?php echo get_share( get_the_ID() ); ?>
				</div>
				<div class="col-xs-6">
					<p class="text-right">
						<a class="permalink btn btn-primary" href="<?php the_permalink(); ?>">
							<?php _e( 'Подробней', RESUME_TEXTDOMAIN ); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>