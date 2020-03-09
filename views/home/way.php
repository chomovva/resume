<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<div class="way lazy" id="way" data-src="<?php echo esc_attr( $bgi_src ); ?>">
	<?php if ( ! empty( $entries ) ) : ?>
		<?php foreach ( $entries as $entry ) : ?>
			<section class="section way__entry entry">
				<div class="container">
					<div class="row center-xs">
						<div class="col-xs-12 col-sm-10 col-md-9 col-lg-8">
							<h2 class="title"><?php echo $entry[ 'title' ]; ?></h2>
							<div class="content"><?php echo $entry[ 'content' ]; ?></div>
							<p class="text-center">
								<a class="btn btn-primary permalink" href="<?php echo esc_attr( $entry[ 'permalink' ] ); ?>">
									<?php _e( 'Подробней', RESUME_TEXTDOMAIN ); ?>
								</a>
							</p>
						</div>
					</div>
				</div>
			</section>
		<?php endforeach; ?>
	<?php endif; ?>
</div>