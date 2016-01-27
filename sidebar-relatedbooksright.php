				<div class="col-md-3" id="sidebar-right">


<?php if (is_active_sidebar('sidebar-relatedbooksright')) { ?> 
					<?php do_action('before_sidebar'); ?> 
					<?php dynamic_sidebar('sidebar-relatedbooksright'); ?> 
<?php } ?> 


								

						<?php
						$related = ci_get_related_posts( get_the_ID(), 4 );
						 
						if( $related->have_posts() ):
						    ?>

						            <?php while( $related->have_posts() ): $related->the_post(); ?>
						                

						<div class="media">
						  <div class="media-left">
						    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'everypraise'), the_title_attribute('echo=0')); ?>"><?php the_post_thumbnail( 'videos-rel-thumb' ); ?></a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('%s', 'everypraise'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h4>
						  </div>
						</div>


						            <?php endwhile; ?>
						    <?php
						endif;
						wp_reset_postdata();
						?>					

				</div>
