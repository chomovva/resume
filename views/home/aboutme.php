<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>
<section class="section aboutme" id="aboutme">
  <div class="container">
    <div class="row center-xs">
      <div class="col-xs-10 col-sm-5 col-md-4 col-lg-4 col-sm-offset-1">
        <div class="aboutme__foto foto">
          <img class="lazy" src="#" data-src="<?php echo esc_attr( $foto_src ); ?>" alt="<?php echo esc_attr( $foto_alt ); ?>">
          <?php echo $socials_links; ?>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 first-sm">
        <h2><?php echo $title; ?></h2>
        <?php echo $content; ?>
        <?php if ( ! empty( $file ) ) : ?><a class="btn btn-primary permalink" role="button" href="<?php echo esc_attr( $file ); ?>"><?php echo $label; ?></a><?php endif; ?>
      </div>
    </div>
  </div>
</section>