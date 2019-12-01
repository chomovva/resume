<?php


/*
Template Name: По ширине страницы (без сайдбара)
Template Post Type: post, page, product
*/


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


?>

	<div class="container">

		<?php

			the_pageheader();

			?>

				<div class="row middle-xs">
					<div class="col-xs-7">
						<div class="lead">
							<?php echo get_share( get_the_ID() ); ?>
						</div>
					</div>
					<div class="col-xs-5">
						<div class="text-right">
							<?php echo get_languages_list(); ?>
						</div>
					</div>
				</div>

			<?php

			the_breadcrumbs();

			get_template_part( 'parts/singular' );
			
		?>

	</div>

<?php

get_footer();