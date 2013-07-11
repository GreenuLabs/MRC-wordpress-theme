<?php
/*
Template Name: Portfolio (paginated)
*/
?>

<?php get_header(); ?>


<div id="heading">

	<h2><?php the_title(); ?></h2>

</div><!-- / #welcome -->

<?php if (option::get('portfolio_tags') == 'on') { ?>
	<ul id="portfolio-fixed">
		<li class="active"><a class="all" data-value="all" href="#"><?php _e('All', 'wpzoom'); ?></a></li>
 		<?php wp_list_categories(array('title_li' => '', 'hierarchical' => false,  'taxonomy' => 'skill-type')); ?>
	</ul>
<?php } ?>

<div class="clear"></div>

<div id="portfolio">
	<ul id="portfolio-items" >

		<?php
			global $wp_query;
			global $paged;

			wp_reset_query();
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$args = array(
				'post_type' => 'portfolio',
				'paged' => $paged,
				'posts_per_page' => option::get('paginated_posts'),
				);

			$wp_query = new WP_Query($args);

			while ( $wp_query->have_posts() ) : $wp_query->the_post();  $count = 1; $count++;

			$terms = get_the_terms( get_the_ID(), 'skill-type' );  ?>

		<li data-id="id-<?php echo $count; ?>" class="<?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } ?>" >

			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wpzoom'), get_the_title()); ?>">

				<?php get_the_image( array( 'size' => 'portfolio-thumb',  'width' => 285, 'height' => 190, 'link_to_post' => false  ) ); ?>

				<span class="ext">
					<span class="p"><?php echo option::get('portfolio_project_title'); ?></span>
				</span>
			</a>

			<div class="meta">
				<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wpzoom'), get_the_title()); ?>">  <?php the_title(); ?></a></h3>
				<?php
					if (is_array($terms)) {
						$count = count($terms);
						$i = 0;
						foreach ($terms as $term) {
							$i++;
							echo $term->name;
							if ($i < $count) {echo ', '; }
						}
					}

				?>
			</div>
		</li>
		<?php $count++; ?>
		<?php endwhile; ?>

 		<div class="clear"></div>
		<?php get_template_part( 'pagination'); ?>
		<?php wp_reset_query(); ?>
	</ul>
</div><!-- / #portfolio -->

<div class="clear"></div>

<?php get_footer(); ?>