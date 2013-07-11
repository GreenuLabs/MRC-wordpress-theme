<?php
$template = get_post_meta($post->ID, 'wpzoom_post_template', true);
?>

<?php get_header(); ?>

<div id="heading">
	
	<h1><?php _e('Blog', 'wpzoom'); ?></h1>

</div><!-- / #welcome -->
 

<div id="content" <?php 
  if ($template == 'side-left') { echo " class=\"side-left\""; }
  if ($template == 'full') { echo " class=\"full-width\""; } 
  ?>>
 
	<div class="post_content">
		<?php wp_reset_query(); if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

		<div class="meta">
			<?php if (option::get('post_date') == 'on') { ?> <?php printf( __('%s at %s', 'wpzoom'),  get_the_date(), get_the_time()); ?> <?php } ?> 
			
			<?php if (option::get('post_author') == 'on') { ?><span>/</span> by <?php the_author_posts_link(); ?><?php } ?>
			
 			<?php edit_post_link( __('Edit', 'wpzoom'), '<span>/</span> ', ''); ?>
		
		</div>

		<div class="entry">
		
 			<?php the_content(); ?>
		
			<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
			<?php the_tags('<p class="tags">Tags ', ' ', '</p>'); ?>

			<div class="cleaner">&nbsp;</div>
  
		</div><!-- / .entry -->
		
		<div id="comments">
			<?php comments_template(); ?>  
		</div>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria', 'wpzoom');?>.</p>
		<?php endif; ?>

		<div class="cleaner">&nbsp;</div>          
	</div><!-- / .post_content -->
	
 	<?php if ($template != 'full') {  get_sidebar(); } ?>

	<div class="cleaner">&nbsp;</div>
</div><!-- / #content -->
 
<?php get_footer(); ?>