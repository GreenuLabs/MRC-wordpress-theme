<?php 
	$overview = get_post_meta(get_the_ID(), 'wpzoom_portfolio_overview', true);
	$client = get_post_meta(get_the_ID(), 'wpzoom_portfolio_client', true);
	$services = get_post_meta(get_the_ID(), 'wpzoom_portfolio_services', true);
	$slides = get_post_meta(get_the_ID(), 'wpzoom_slider', true);
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="heading">
	
	<h1><?php the_title(); ?></h1>

</div><!-- /#welcome -->

<div id="content">
	<div class="post_content">

		<?php if (count($slides) > 1) { ?>
		
		<div id="portfolio-slider">
	 		<ul class="slides">
			 
				<?php  
					foreach ( $slides as $slide ) {
						unset($image, $height, $caption);

						if ( is_numeric($slide['imageId']) ) {
							$image = wp_get_attachment_image_src($slide['imageId'], 'portfolio-slide');
							$height = $image[2];
							$image = $image[0];
						} else {
							$image = $slide['imageId'];
							$height = false !== ( $size = @getimagesize($image) ) ? $size[1] : 300;
							unset($size);
						}
						$caption = trim($slide['caption']);

						echo '<li><img src="' . $image . '" width="630" height="' . $height . '" />';
						if ( !empty($caption) ) echo '<p class="caption">' . esc_html($caption) . '</p>';
						echo '</li>';
					}
				?>
					 
			</ul>

		</div><!-- /#portfolio-slider -->

		<?php } ?>
 		
		<div class="entry">
			<?php the_content(); ?>
			
			<?php edit_post_link( __('Edit', 'wpzoom'), '', ''); ?>
		 
		</div><!-- /.entry -->
		
	</div><!-- /.post_content -->

	<div class="aside">
		<h3 class="title">
			<?php if ($overview) { ?><span><?php echo option::get('overview'); ?></span><?php } ?>
			
			<div class="single-nav">
				<?php
				    $previous_post = get_previous_post();
				    $next_post = get_next_post();
				?>
 				<?php if ($next_post) { ?> <a href="<?php echo get_permalink($next_post->ID); ?>" class="prev_project" title="<?php echo option::get('next_project'); ?>"></a> <?php } ?>
				<?php if ($previous_post) { ?> <a href="<?php echo get_permalink($previous_post->ID); ?>" class="next_project" title="<?php echo option::get('prev_project'); ?>"></a> <?php } ?>

					 
			</div>
			<div class="clear"></div>
		</h3>
			
		<?php if ($overview) { echo nl2br($overview); } ?>
					
		<?php if ($client) { ?>
			<h4><?php echo option::get('client'); ?></h4>
			<?php echo $client; ?>
		<?php } ?>
		
		<?php if ($services) { ?>
			<h4><?php echo option::get('services'); ?></h4>
			<?php echo nl2br($services); ?> 
		<?php } ?>
		
		<?php $tax_menu_items = get_the_terms( get_the_ID(), 'skill-type' );
			if ($tax_menu_items ) { ?>
			
			<h4><?php echo option::get('skills'); ?></h4>
			
			<?php			
				foreach ( $tax_menu_items as $tax_menu_item ): ?>
				<a href="<?php echo get_term_link($tax_menu_item,$tax_menu_item->taxonomy); ?>">
					<?php echo $tax_menu_item->name; ?>
				</a><br />
			<?php endforeach; 
		} ?>
			
	</div><!-- /.aside-->

	<div class="clear"></div>
</div><!-- /#content -->

<?php endwhile; endif; ?>
            
<?php get_footer(); ?>