<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="pageheader">
	<div class="row center-xs middle-xs">
		<?php if ( ! empty( $thumbnail ) ) : ?>
			<div class="col-xs-4 col-sm-3 col-md-3 col-lg-2">
				<div class="thumbnail">
					<?php
						echo $thumbnail;
						echo $date;
					?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-xs col-sm col-md col-lg">
			<h1 class="title"><?php echo $title; ?></h1>
		</div>
	</div>
	<?php if ( ! empty( $excerpt ) ) : ?>
		<div class="excerpt">
			<?php echo $excerpt; ?>
		</div>
	<?php endif; ?>
</div>