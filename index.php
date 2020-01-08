<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };



get_header();



?>

	<div class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-12 <?php echo ( is_dynamic_sidebar( 'column' ) ) ? 'col-md-8 col-lg-8' : 'col-md-12 col-lg-12'; ?>">

				<?php

					the_pageheader();

					?>

						<div class="lead">
							<?php echo get_share( get_the_ID() ); ?>
						</div>

					<?php

					the_breadcrumbs();

					if ( is_singular() ) {
						get_template_part( 'parts/singular' );
					} else {
						get_template_part( 'parts/archive' );
					}
				?>

			</div>

			<?php if ( is_dynamic_sidebar( 'column' ) ) : ?>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<?php get_sidebar( 'column' ); ?>
				</div>
			<?php endif; ?>

		</div>

	</div>

<?php get_footer(); ?>