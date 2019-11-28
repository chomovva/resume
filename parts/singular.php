<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		the_content();
		the_pager();

		comments_template();

	}

}