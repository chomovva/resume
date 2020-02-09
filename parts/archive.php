<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$current_term_id = __return_empty_array();


if ( is_tax() || is_tag() || is_category() ) {
	$term = get_queried_object();
	$current_term_id = $term->term_id;
	if ( ! empty( trim( $term->description ) ) ) {
		echo '<div class="lead">' . $tems->description . '</div>';
	}
}



if ( have_posts() ) {

	while( have_posts() ) {
		the_post();
		render_entry( null, 'archive__entry', $current_term_id );
	}

	the_posts_pagination();

}