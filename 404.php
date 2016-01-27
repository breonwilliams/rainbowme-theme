<?php get_header('404'); ?> 
<section class="container">
				<div class="col-md-12 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<section class="error-404 not-found">
							<div class="page-content">
								<p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bootstrap-basic'); ?></p>

								<!--search form-->
								<?php get_search_form(); ?>

								
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
					</main>
				</div>
			</section>

<?php get_footer(); ?> 