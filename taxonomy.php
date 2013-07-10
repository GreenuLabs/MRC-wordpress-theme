<?php get_header(); ?>

<?php
$taxonomy_obj = $wp_query->get_queried_object();
$taxonomy_nice_name = $taxonomy_obj->name;

if (have_posts()) : ?>

<div id="heading">

	<h2><?php echo $taxonomy_nice_name;?></h2>

</div><!-- / #welcome -->

<?php if (option::get('portfolio_tags') == 'on') { ?>
	<ul id="portfolio-fixed" >
		<li><a class="all" data-value="all" href="<?php echo get_page_link(option::get('portfolio_url')); ?>"><?php _e('All', 'wpzoom'); ?></a></li>
		<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'skill-type')); ?>
	</ul>
<?php } ?>

<div class="clear"></div>

<div id="portfolio">
	<ul id="portfolio-items" >
		<?php while ( have_posts() ) : the_post();  ?>
		<li data-id="id-<?php echo $count; ?>" class="<?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } ?>" >

			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wpzoom'), get_the_title()); ?>">
				<?php get_the_image( array( 'size' => 'portfolio-thumb',  'width' => 285, 'height' => 190, 'link_to_post' => false  ) ); ?>

				<span class="ext">
					<span class="p"><?php echo option::get('portfolio_project_title'); ?></span>
				</span>
			</a>

			<div class="meta">
				<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wpzoom'), get_the_title()); ?>">  <?php the_title(); ?></a></h3>
 			</div>
		</li>
		<?php $count++; ?>
		<?php endwhile; endif; ?>
		<?php get_template_part( 'pagination'); ?>
		<?php wp_reset_query(); ?>
		<div class="clear"></div>
	</ul>
</div><!-- / #portfolio -->

<div class="clear"></div>

<?php get_footer(); ?>