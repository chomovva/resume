<?php


namespace resume;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_template_part( 'parts/pageheader' );


?>

<div class="lead">
	<?php echo get_share( get_the_ID() ); ?>
</div>

<?php

the_breadcrumbs();
the_content();
the_pager();

comments_template();