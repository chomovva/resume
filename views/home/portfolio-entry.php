<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<a class="portfolio__entry entry" href="<?php echo get_permalink( $entry->ID ); ?>">
	<?php echo get_thumbnail_image( $entry->ID, 'thumbnail_medium', 'lazy', '' ); ?>
	<div class="overlay">
		<h3 class="title"><?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?></h3>
		<?php echo get_entry_categories( $entry->ID, $cat->term_id, false ); ?>
		<?php if ( ! empty( $entry->post_excerpt ) ) : ?><p class="excerpt"><?php echo $entry->post_excerpt; ?></p><?php endif; ?>
	</div>
</a>