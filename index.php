<?php get_header(); ?>
	
	<?php if (option::get('featured_posts_show') == 'on' && is_home() && $paged < 2) { // Show the Featured Slider
		get_template_part('wpzoom-slider'); 
	} ?>
		
	<?php if (option::get('intro') == 'on') { ?>
	
		<div id="heading">
			<?php if (option::get('intro_url') != '') : ?>
				<a href="<?php echo option::get('intro_url'); ?>" class="action"><span><?php echo option::get('intro_btn'); ?></span></a>
			<?php endif; ?>

			<h2><?php echo option::get('intro_title'); ?></h2>
			<p><?php echo stripslashes(option::get('intro_content')); ?></p>
			<div class="clear"></div>
		</div><!-- / #welcome -->
		 
	<?php } ?>
	  

	<?php if (option::get('portfolio') == 'on') {
		get_template_part('wpzoom-portfolio-all');	
	} ?>


	<div class="home_widgets">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widgets')) {} ?>
	</div>

<?php get_footer(); ?>
