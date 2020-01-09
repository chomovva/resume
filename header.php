<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body <?php body_class(); ?> data-nav="inactive">
		<?php get_template_part( 'parts/nav' ); ?>
		<div class="wrapper" id="wrapper">
			<header class="wrapper__item wrapper__item--header header" id="header">
				<div class="container">
					<div class="row center-xs middle-xs">
						<div class="col-xs-12 col-sm-5 col-md-4 col-lg-5">
							<?php get_template_part( 'parts/bloginfo' ); ?>
						</div>
						<div class="col-xs-8 col-sm-6 col-md-6 col-lg-6">
							<?php echo render_links_list( get_theme_mod( RESUME_SLUG . '_contacts', array() ), 'contacts' ); ?>
						</div>
						<div class="col-xs-4 col-sm-1 col-md-2 col-lg-1 text-right">
							<button class="burger" id="burger">
								<span class="bar bar1"></span>
								<span class="bar bar2"></span>
								<span class="bar bar3"></span>
								<span class="bar bar4"></span>
								<span class="sr-only"><?php _e( 'Открыть меню', RESUME_TEXTDOMAIN ); ?></span>
							</button>
						</div>
					</div>
				</div>
			</header>
			<main class="wrapper__item wrapper__item--main main" id="main">