<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="pageheader">
  <div class="row center-xs middle-xs">
    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2">
    	<div class="thumbnail">
    		<?php
          echo the_thumbnail_image( get_the_ID(), 'medium' );
          if ( is_single() ) echo get_publish_date();
        ?>
      </div>
    </div>
    <div class="col-xs col-sm col-md col-lg">
      <h1 class="title"><?php single_post_title( '', true ); ?></h1>
      <?php if ( has_excerpt( get_the_ID() ) ) : ?><p class="lead"><?php echo get_the_excerpt( get_the_ID() ); ?></p><?php endif; ?>
    </div>
  </div>
</div>