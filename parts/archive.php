<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$current_term_id = __return_empty_array();
$posts_template = '';

if ( is_tax() || is_tag() || is_category() ) {
	$term = get_queried_object();
	if ( is_object( $term ) ) {
		$current_term_id = $term->term_id;
		if ( ! empty( trim( $term->description ) ) ) {
			echo '<div class="lead">' . $term->description . '</div>';
		}
		$posts_template = get_term_meta( $term->term_id, 'posts_template', true );
	}
}

if ( empty( $posts_template ) ) {
	$posts_template = 'default';
}

if ( have_posts() ) {

	$before_entry = '<div class="col-xs-12">';
	$after_entry = '</div>';

	if ( 'portfolio' == $posts_template ) {
		$before_entry = '<div class="col-xs-12 col-sm-6">';
		$after_entry = '</div>';
	}

	?>

		<div class="row <?php echo $posts_template; ?>">

	<?php

		while( have_posts() ) {
			the_post();
			echo $before_entry;
			include get_theme_file_path( "views/entry-{$posts_template}.php" );
			echo $after_entry;
		}

	?>

		</div>

	<?php

	the_posts_pagination();

}