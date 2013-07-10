<?php get_header(); ?>

<div id="heading">
 	<h1><?php _e('Search Results for','wpzoom');?> <strong>"<?php the_search_query(); ?>"</strong></h1>
</div>
 
<div id="content">
	<div class="post_content">
	
		<?php get_template_part('loop'); ?>

	</div><!-- / .post_content -->
 
	<?php get_sidebar(); ?>

</div><!-- /#content -->
 
<?php get_footer(); ?>