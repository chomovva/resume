<?php get_template_part( 'parts/pageheader' ); ?>
<div class="lead">
	<ul class="share">
		<li><a class="facebook" href="#"><span class="sr-only">Поделиться в facebook</span></a></li>
		<li><a class="twitter" href="#"><span class="sr-only">Поделиться в twitter</span></a></li>
		<li><a class="linkedin" href="#"><span class="sr-only">Поделиться в linkedin</span></a></li>
		<li><a class="email" href="#"><span class="sr-only">Поделиться в email</span></a></li>
	</ul>
</div>
<?php echo resume\the_breadcrumbs(); ?>
<?php the_content(); ?>
<?php echo resume\the_pager(); ?>