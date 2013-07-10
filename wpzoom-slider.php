<div id="slider">
	<ul class="slides">
 
		<?php $loop = new WP_Query(array('post_type' => 'slideshow', 'posts_per_page' => option::get('featured_posts_posts'))); ?>

 		<?php while ( $loop->have_posts() ) : $loop->the_post();  ?>

			<li>
				<?php
					$url = get_post_meta(get_the_ID(), 'wpzoom_slideshow_url', true);
                 ?>
				<?php if ($url != '') { ?><a href="<?php echo $url; ?>" rel="bookmark" title="<?php the_title(); ?>"><?php } ?>
					<?php get_the_image( array( 'size' => 'featured',  'width' => 910, 'height' => 350, 'link_to_post' => false  ) ); ?>
				<?php if ($url != '') { ?></a><?php } ?>
 			</li>
		<?php endwhile; ?>
		 
	</ul>

 </div>

<?php wp_reset_query(); ?>