<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>
<section class="section portfolio" id="portfolio">
	<div class="container">
		<h2><?php echo $title; ?></h2>
		<div class="slider" id="portfolio-slider">
			<?php foreach ( $entries as $entry ) : setup_postdata( $entry ); ?>
				<a class="portfolio__entry entry" href="<?php echo get_permalink( $entry->ID ); ?>">
					<?php echo the_thumbnail_image( $entry->ID, 'thumbnail_medium', 'lazy', '' ); ?>
					<div class="overlay">
						<h3 class="title"><?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?></h3>
						<?php echo get_entry_categories( $entry->ID, $cat->term_id, false ); ?>
						<?php if ( ! empty( $entry->post_excerpt ) ) : ?><p class="excerpt"><?php echo $entry->post_excerpt; ?></p><?php endif; ?>
					</div>
				</a>
			<?php endforeach; wp_reset_postdata(); ?>
		</div>
		<button class="slider-arrow arrow-prev" id="portfolio-slider-prev">
			<span class="sr-only"><?php _e( 'Предыдущий слайд', RESUME_TEXTDOMAIN ); ?></span>
		</button>
		<button class="slider-arrow arrow-next" id="portfolio-slider-next">
			<span class="sr-only"><?php _e( 'Следующий слайд', RESUME_TEXTDOMAIN ); ?></span>
		</button>
	</div>
</section>