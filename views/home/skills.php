<section class="section skills" id="skills">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
				<h2><?php echo $title; ?></h2>
				<?php echo $content; ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 col-sm-offset-1">
				<?php if ( ! empty( $skills ) ) : ?>
					<ul class="skills__list list">
						<?php foreach ( $skills as $skill ) : ?>
							<li class="clearfix">
								<strong class="font-normal"><?php echo $skill[ 'label' ]; ?> <spam class="pull-right"><?php echo $skill[ 'value' ]; ?></spam></strong>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr( $skill[ 'label' ] ); ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
		<div class="row center-xs" role="list">
			<?php if ( ! empty( $experience ) ) : ?>
				<?php foreach ( $experience as $item ) : ?>
					<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
						<div class="skills__experience experience" role="listitem">
							<span class="value"><?php echo $item[ 'value' ]; ?></span>
							<span class="label"><?php echo $item[ 'label' ]; ?></span>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>