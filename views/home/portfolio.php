<section class="section portfolio" id="portfolio">
	<div class="container">
		<h2><?php echo $title; ?></h2>
		<div class="slider" id="portfolio-slider">
			<?php foreach ( $entries as $entry ) : ?>
				<a class="portfolio__entry entry" href="#">
					<?php echo resume\the_thumbnail_image( $entry->ID, 'medinum', 'lazy' ); ?>
					<div class="overlay">
						<h3 class="title"><?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?></h3>
						<?php if ( has_category( '', $entry->ID ) ) : ?>
							<ul class="categories">
								<li><?php echo strip_tags( get_the_category( '</li><li>', 'single', $entry->ID ), '</li><li>' ); ?></li>
							</ul>
						<?php endif; ?>
						<p class="excerpt"></p>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		<button class="slider-arrow arrow-prev" id="portfolio-slider-prev">
			<span class="sr-only"><?php _e( 'Предыдущий слайд', RESUME_TEXTDOMAIN ); ?></span>
		</button>
		<button class="slider-arrow arrow-next" id="portfolio-slider-next">
			<span class="sr-only"><?php _e( 'Следующий слайд', RESUME_TEXTDOMAIN ); ?></span>
		</button>
	</div>
</section>