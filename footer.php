			</main>
			<div class="wrapper__item wrapper__item--footer footer lazy" data-src="<?php echo RESUME_URL; ?>images/footer.jpg">
				<?php get_sidebar(); ?>
				<footer>
					<div class="container">
						<div class="row middle-xs">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<?php get_template_part( 'parts/bloginfo' ); ?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<?php echo resume\render_links_list( get_theme_mod( RESUME_SLUG . '_contacts', array() ), 'contacts' ); ?>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>