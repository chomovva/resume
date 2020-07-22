<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<li class="clearfix">
	<strong class="font-normal">
		<?php echo $label; ?> 
		<span class="pull-right"><?php echo $value; ?></span>
	</strong>
	<?php echo get_progress_bar( $value ); ?>
</li>