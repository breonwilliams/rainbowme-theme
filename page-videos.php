<?php
/*
Template Name: Videos Page
*/
?>
<?php 
/**
 * Displaying archive page (category, tag, archives post, author's post)
 * 
 * @package bootstrap-basic
 */

get_header(''); 

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<section class="container">
	<div class="row">
<?php get_sidebar('videoleft'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main row" role="main">
						<ul class="grid cs-style-3">
						<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'paged' => $paged,
				'posts_per_page' => -1,
				'post_type' => 'videos',
				'orderby'=>'menu_order',
				'order'=>'ASC'
			);
			query_posts($args);
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	  $do_not_duplicate[] = $post->ID; //This is the magic line
 	if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
            
            
            
				<?php get_template_part('content', 'vid'); ?>          
            
		<?php endwhile; ?>

					</ul>


	<?php endif; ?>
					</main>
				</div>
<?php get_sidebar('videoright'); ?> 
</div>
</section>
<?php get_footer(); ?> 