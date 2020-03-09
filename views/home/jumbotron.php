<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<div class="jumbotron" id="jumbotron">
	<div class="bg lazy" data-src="<?php echo esc_attr( $src ); ?>"></div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-offset-6 col-md-offset-6 col-lg-offset-6">
				<h1><?php echo $title; ?></h1>
			</div>
		</div>
	</div>
</div>