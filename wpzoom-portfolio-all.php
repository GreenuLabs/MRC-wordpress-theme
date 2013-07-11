<div id="portfolio">
	<?php if (option::get('portfolio_title') != '') : ?>
	    <h3 class="title">
	        <a href="<?php echo get_page_link(option::get('portfolio_url')); ?>"><?php echo option::get('portfolio_url_title'); ?> &rarr;</a>
	        <span><?php echo option::get('portfolio_title'); ?></span>
	    </h3>
	<?php endif; ?>

	<ul>
        <?php
            $query = new WP_Query();
			$query->query('post_type=portfolio&posts_per_page='.option::get('portfolio_items').'');
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		        $terms = get_the_terms( get_the_ID(), 'skill-type' );
		        unset($cropLocation);
		        ?>

                <li>
		            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wpzoom'), get_the_title()); ?>">

                        <?php get_the_image( array( 'size' => 'portfolio-thumb',  'width' => 285, 'height' => 190, 'link_to_post' => false  ) ); ?>

        				<span class="ext">
        					<span class="p"><?php echo option::get('portfolio_project_title'); ?></span>
        				</span>
        			</a>

        			<div class="meta">
        				<h3>
        				    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wpzoom'), get_the_title()); ?>">  <?php the_title(); ?></a>
        				</h3>
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
            <?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>
	</ul>
</div><!-- / #portfolio -->
<div class="clear"></div>