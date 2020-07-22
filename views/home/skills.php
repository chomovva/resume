<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section skills" id="skills">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm col-md col-lg">
				<h2><?php echo $title; ?></h2>
				<?php echo $content; ?>
			</div>
			<?php if ( ! empty( $skills ) ) : ?>
				<div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 col-sm-offset-1">
					<?php echo $skills; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php echo $experience; ?>
	</div>
</section>