<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<div id="post-<?php echo $post_id; ?>" class="<?php echo $classes; ?>">
	<div class="row center-xs">
		<div class="col-xs-8 col-sm-4 col-md-4 col-lg-3">
			<a class="thumbnail" href="<?php echo $permalink; ?>">
				<?php
					echo $thumbnail_image;
					echo $publish_date;
				?>
			</a>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
			<h3 class="title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
			<?php echo $categories; ?>
			<p class="excerpt"><?php echo $excerpt; ?></p>
			<div class="row center-xs middle-xs">
				<div class="col-xs-6">
					<?php echo $share; ?>
				</div>
				<div class="col-xs-6">
					<p class="text-right">
						<a class="permalink btn btn-primary" href="<?php echo $permalink; ?>">
							<?php echo $label; ?>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>