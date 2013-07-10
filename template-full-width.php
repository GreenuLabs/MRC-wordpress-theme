<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>

<div id="heading">
	
	<h1><?php the_title(); ?></h1>

</div><!-- / #welcome -->

<div id="content" class="full-width">
 
	<div class="post_content">
		<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php edit_post_link( __('Edit', 'wpzoom'), '<div class="meta"> ', '</div>'); ?>

		<div class="entry">
		
			<?php the_content(); ?>
		
			<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			<div class="cleaner">&nbsp;</div>

		</div><!-- / .entry -->

		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria', 'wpzoom');?>.</p>
		<?php endif; ?>

		<div class="cleaner">&nbsp;</div>          
	</div><!-- / .post_content -->
 
	<div class="cleaner">&nbsp;</div>
</div><!-- / #content -->
 
<?php get_footer(); ?>