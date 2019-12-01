<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<nav class="nav" id="nav">
	<div class="bg" id="bg"></div>
	<div class="overlay">
		<button class="close" id="close">
			<span class="sr-only"><?php _e( 'Закрыть меню', RESUME_TEXTDOMAIN ); ?></span>
		</button>
		<?php
			echo get_languages_list();
			if ( has_nav_menu( 'main' ) ) {
				echo "<h3>" . __( 'Меню', RESUME_TEXTDOMAIN ) . "</h3>";
				wp_nav_menu( array(
					'theme_location'  => 'main',
					'menu'            => 'main',
					'container'       => false,
					'menu_class'      => '',
					'echo'            => true,
					'depth'           => 2,
				) );
			}
		?>
		<h3><?php _e( 'Поделиться', RESUME_TEXTDOMAIN ); ?></h3>
		<div class="lead"><?php echo get_share( false ); ?></div>
		<h3><?php _e( 'Поиск по сайту', RESUME_TEXTDOMAIN ); ?></h3>
		<?php get_search_form( true ); ?>
	</div>
</nav>