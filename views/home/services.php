<section class="section services" id="services">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
        <h2><?php echo $title; ?></h2>
        <?php echo $content; ?>
      </div>
      <?php if ( ! empty( $services ) ) : ?>
        <div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 col-sm-offset-1">
          <ol class="services__list list">
            <?php foreach ( $services as $service ) : ?>
              <li><strong><?php echo strip_tags( $service ); ?></strong></li>
            <?php endif; ?>
          </ol>
        </div>
      <?php endif; ?>
    </div>
    <?php if ( ! empty( $permalink ) ) : ?>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <a class="btn btn-primary permalink" href="<?php echo  esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>