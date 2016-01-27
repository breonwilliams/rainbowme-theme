<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header('fluid');

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<section class="container">
	<div class="row">
	<div id="sidebar-left" class="col-md-3">
		<?php get_sidebar('woocommerce'); ?>
	</div>
				<div class="col-md-9 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						
						<?php woocommerce_content(); ?>
						
					</main>
				</div>
			</div>
</section>
<?php get_footer(); ?> 