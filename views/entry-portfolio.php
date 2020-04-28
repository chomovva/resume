<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! isset( $lazy_attr ) ) {
	$lazy_attr = 'src';
}

if ( ! isset( $lazy_class ) ) {
	$lazy_class = 'lazy';
}

?>

<a class="portfolio__entry entry" href="<?php the_permalink( get_the_ID() ); ?>">
	<svg class="bg" viewBox="0 0 600 400"><rect style="fill:#8686bf;fill-opacity:1;stroke-width:0.26458332;opacity:0.25" width="600" height="400" x="0" y="0" /></svg>
	<?php echo get_thumbnail_image( get_the_ID(), 'thumbnail_medium', $lazy_attr, $lazy_class ); ?>
	<div class="overlay">
		<h3 class="title"><?php the_title( '', '', true ); ?></h3>
		<?php echo get_entry_categories( get_the_ID(), $current_term_id, false ); ?>
		<?php if ( has_excerpt( get_the_ID() ) ) : ?><p class="excerpt"><?php echo get_the_excerpt(); ?></p><?php endif; ?>
	</div>
</a>