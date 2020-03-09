<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$cat_id = get_translate_id( get_theme_setting( 'portfolio_cat_id' ), 'category' );


$cat = get_category( $cat_id, OBJECT, 'raw' );


if ( $cat && ! is_wp_error( $cat ) ) {

	$entries = get_posts( array(
		'numberposts' => 5,
		'category'    => $cat->term_id,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'offset'      => ( isset( $_POST[ 'offset' ] ) && ! empty( $_POST[ 'offset' ] ) ) ? $_POST[ 'offset' ] : 0,
		'suppress_filters' => true,
	), OBJECT, 'raw' );


	if ( is_array( $entries ) && ! empty( $entries ) ) {

		ob_start();
		foreach ( $entries as $entry ) {
			setup_postdata( $entry );
			include get_theme_file_path( 'views/home/portfolio-entry.php' );
		}
		wp_reset_postdata();
		$slides = ob_get_contents();
		ob_end_clean();

		if ( wp_doing_ajax() ) {
			echo $slides;
		} else {
			$title = get_theme_setting( 'portfolio_title' );
			$description = get_theme_setting( 'portfolio_description' );
			if ( function_exists( 'pll__' ) ) {
				$title = pll__( $title );
				$description = pll__( $description );
			}
			if ( empty( $title ) ) $title = strip_tags( apply_filters( 'single_cat_title', $cat->name ) );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'slick' );
			wp_enqueue_style( 'slick' );
			?>
				<section class="section portfolio" id="portfolio">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md">
								<h2><?php echo $title; ?></h2>
							</div>
							<?php if ( ! empty( $description ) ) : ?>
								<div class="col-xs-12 col-sm-12 col-md-10">
									<p><?php echo $description; ?></p>
								</div>
							<?php endif; ?>
						</div>
						<div class="slider">
							<div id="portfolio-items">
								<?php echo $slides; ?>
							</div>
							<div class="controls">
								<button class="slider-arrow arrow-prev" id="portfolio-slider-prev">
									<span class="sr-only"><?php _e( 'Предыдущий слайд', RESUME_TEXTDOMAIN ); ?></span>
								</button>
								<button class="slider-arrow arrow-next" id="portfolio-slider-next">
									<span class="sr-only"><?php _e( 'Следующий слайд', RESUME_TEXTDOMAIN ); ?></span>
								</button>
								<div class="preloader" id="portfolio-preloader" style="display: none;">
									<div class="bar bar--1"></div>
									<div class="bar bar--2"></div>
									<div class="bar bar--3"></div>
									<div class="bar bar--4"></div>
									<div class="bar bar--5"></div>
									<div class="bar bar--6"></div>
									<div class="bar bar--7"></div>
									<div class="bar bar--8"></div>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php
		}
	}

}