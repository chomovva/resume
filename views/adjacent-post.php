<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<a class="<?php echo $key; ?> pager__item item" href="<?php echo $permalink; ?>" title="<?php echo esc_attr( $label ); ?>">
  <div class="arrow">
    <div class="sr-only"><?php echo $label; ?></div>
  </div>
  <div class="wrap">
  	<h4 class="title"><?php echo $title; ?></h4>
  	<p class="excerpt"><?php echo $excerpt; ?></p>
  </div>
</a>