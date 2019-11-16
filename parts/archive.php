<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


the_archive_title( '<h1 class="title">', '</h1>' );


$current_term_id = __return_empty_array();


if ( is_tax() || is_tag() || is_category() ) {
	$term = get_queried_object();
	$current_term_id = $term->term_id;
	if ( ! empty( trim( $term->description ) ) ) {
		echo '<div class="lead">' . $tems->description . '</div>';
	}
}




the_breadcrumbs();


if ( have_posts() ) {

	while( have_posts() ) {

		the_post();

		?>


			<div id="post-<?php the_ID(); ?>" class="archive__entry entry">
				<div class="row center-xs">
					<div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
						<a class="thumbnail" href="<?php the_permalink( get_the_ID() ); ?>">
							<?php
								the_thumbnail_image( get_the_ID(), 'medium' );
								echo get_publish_date();
							?>
						</a>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<?php
							the_title( '<h3 class="title">', '</h3>', true );
							echo get_entry_categories( get_the_ID(), $current_term_id );
						?>
						<p class="excerpt"><?php echo get_the_excerpt( get_the_ID() ); ?></p>
						<div class="row center-xs middle-xs">
							<div class="col-xs-6">
								<?php echo get_share( get_the_ID() ); ?>
							</div>
							<div class="col-xs-6">
								<p class="text-right">
									<a class="permalink btn btn-primary" href="<?php the_permalink( get_the_ID() ) ?>">
										<?php _e( 'Подробней', RESUME_TEXTDOMAIN ); ?>
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>



		<?php

	}

	the_posts_pagination();

}