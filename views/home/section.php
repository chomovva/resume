<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="section <?php echo $section_name; ?>" id="<?php echo $section_name; ?>">
	<div class="container">
		<div class="row">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="col-xs-12 col-sm-12 col-md">
					<h2><?php echo $title; ?></h2>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $description ) ) : ?>
				<div class="col-xs-12 col-sm-12 col-md-10">
					<p><?php echo $description ?></p>
				</div>
			<?php endif; ?>
		</div>
		<?php echo $content; ?>
		<?php if ( ! empty( $morelink ) ) : ?>
			<p class="text-center">
				<a class="morelink" href="<?php echo esc_attr( $morelink ); ?>"><?php echo $label; ?></a>
			</p>
		<?php endif; ?>
	</div>
</section>