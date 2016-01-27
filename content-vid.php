<li class="item col-md-4 col-sm-6 col-xs-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



					<figure>

<?php
    if(has_post_thumbnail()) { ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'videos-thumb' ); ?></a>
    <?php } else { ?>
    <div class="staff-img">
<a href="<?php the_permalink(); ?>"><?php echo '<img src="' . get_stylesheet_directory_uri() . '/img/nophoto.jpg" />'; ?></a>


</div>
    <?php } ?>

						<figcaption>
							<h6><?php the_title(); ?></h6>
							<a href="<?php the_permalink(); ?>">Take a look</a>
						</figcaption>
					</figure>


</li><!-- #post-## -->
