<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while( have_posts() ) {

		the_post();

		?>


			<div <?php body_class( 'search__entry entry' ); ?> id="post-<?php the_ID(); ?>">
				<h3 class="title">
					<a href="<?php the_permalink( get_the_ID() ); ?>">
						<?php echo search_backlight( get_the_title( get_the_ID() ) ); ?>
					</a>
				</h3>
				<div class="small"><?php the_date( get_option( 'date_format' ), '', '',  true ) ?></div>
				<p class="excerpt"><?php echo search_backlight( get_the_excerpt( get_the_ID() ) ); ?></p>
				<p class="text-right">
					<a class="btn btn-sm btn-primary" href="<?php the_permalink( get_the_ID() ); ?>"><?php _e( 'Подробней', RESUME_TEXTDOMAIN ); ?></a>
				</p>
			</div>



		<?php

	}

	the_posts_pagination();

} else {
	echo '<p class="lead font-bold">' . __( 'К сожалению ничего не найдено. Попробуйте изменить поисковый запрос.', RESUME_TEXTDOMAIN ) . '<p>';
}