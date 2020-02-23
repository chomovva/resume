<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div>
	<article class="reviews__item item">
		<img class="foto" src="#" data-lazy="<?php echo esc_attr( $foto ); ?>" alt="<?php echo esc_attr( $author ); ?>">
		<blockquote class="overlay">
			<div class="content"><?php echo $content; ?></div>
			<cite class="author"><?php echo $author ?></cite>
		</blockquote>
		<?php if ( ! empty( $link ) ) : ?>
			<a class="link" href="<?php echo esc_attr( $link ); ?>"><?php echo $label; ?></a>
		<?php endif; ?>
	</article>
</div>