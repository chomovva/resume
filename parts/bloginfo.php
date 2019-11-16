<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<a class="bloginfo" href="<?php echo home_url( '/' ); ?>">
  <?php echo get_custom_logo_img(); ?>
  <div class="name"><?php bloginfo( 'name' ); ?></div>
</a>