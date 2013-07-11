<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="heading">

	<h2><?php the_title(); ?></h2>

</div><!-- / #welcome -->

<?php if (option::get('portfolio_tags') == 'on') { ?>
	<ul id="portfolio-tags" >
		<li class="active"><a class="all" data-value="all" href="#"><?php _e('All', 'wpzoom'); ?></a></li>
		<?php wp_list_categories(array('title_li' => '', 'hierarchical' => false, 'taxonomy' => 'skill-type', 'walker' => new Walker_Category_Filter())); ?>
	</ul>
<?php } ?>

<?php endwhile; endif; ?>

<div class="clear"></div>

<div id="portfolio">
	<ul id="portfolio-items" >
		<?php $query = new WP_Query(); $count = 1;
			$query->query('post_type=portfolio&posts_per_page=99'); ?>
			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
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
		<?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>
		<div class="clear"></div>
	</ul>
</div><!-- / #portfolio -->

<div class="clear"></div>

<?php get_footer(); ?>