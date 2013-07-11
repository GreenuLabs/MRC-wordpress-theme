<?php

/*
/* Custom Posts Types for Homepage Slider
============================================*/

add_action('init', 'slideshow_register');

function slideshow_register() {
	$labels = array(
		'name' => _x('Slideshow', 'post type general name'),
		'singular_name' => _x('Slideshow Item', 'post type singular name'),
		'add_new' => _x('Add New', 'slideshow item'),
		'add_new_item' => __('Add New Slideshow Item'),
		'edit_item' => __('Edit Slideshow Item'),
		'new_item' => __('New Slideshow Item'),
		'view_item' => __('View Slideshow Item'),
		'search_items' => __('Search Slideshow'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
 		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail')
	  ); 
 
	register_post_type( 'slideshow' , $args );
}
 
 
/*
/*	Create a new post type called Portfolio
============================================*/

function wpzoom_create_post_type_portfolios() 
{
	$labels = array(
		'name' => __( 'Portfolio'),
		'singular_name' => __( 'Portfolio' ),
		'rewrite' => array('slug' => __( 'portfolios' )),
		'add_new' => _x('Add New', 'slide'),
		'add_new_item' => __('Add New Portfolio'),
		'edit_item' => __('Edit Portfolio'),
		'new_item' => __('New Portfolio'),
		'view_item' => __('View Portfolio'),
		'search_items' => __('Search Portfolio'),
		'not_found' =>  __('No portfolios found'),
		'not_found_in_trash' => __('No portfolios found in Trash'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array(	"slug" => "project" ), 
		'menu_position' => null,
		'show_in_nav_menus'	=> true ,
		'supports' => array('title','editor','thumbnail'),
		'taxonomies' => array( 'skill-type')
	  ); 
	  
	  register_post_type(__( 'portfolio' ),$args);
}


  
/*
/*	Create custom taxonomies for the portfolio post type
==============================================================*/

function wpzoom_build_taxonomies(){
	register_taxonomy(__( "skill-type" ), 
		array(__( "portfolio" )), 
		array(  "hierarchical"		=> true, 
				"label" 			=> __( "Portfolio Categories" ), 
				"singular_label" 	=> __( "Portfolio Category" ), 
				'public' 			=> true,
				'show_ui' 			=> true,
				"rewrite" 			=> array(
										'slug' => 'skill-type', 
										'hierarchical' => true
										))); 
}
  
function wpzoom_slide_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Slide Title' )
        );  
  
        return $columns;  
}  
 

/*
/*	Edit the portfolio columns
============================================*/

function wpzoom_portfolio_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Title' ),
            "type" => __( 'Type' )
        );  
  
        return $columns;  
}  

/*
/*	Show the taxonomies within the columns
============================================*/

function wpzoom_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case __( 'type' ):  
                echo get_the_term_list($post->ID, __( 'skill-type' ), '', ', ','');  
                break;
        }  
}  

add_action( 'init', 'wpzoom_create_post_type_portfolios' );
add_action( 'init', 'wpzoom_build_taxonomies', 0 );
add_filter("manage_edit-slide_columns", "wpzoom_slide_edit_columns");  
add_filter("manage_edit-portfolio_columns", "wpzoom_portfolio_edit_columns");  
add_action("manage_posts_custom_column",  "wpzoom_portfolio_custom_columns");  




/*
/*	New category walker for portfolio filter
================================================*/

class Walker_Category_Filter extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {

      extract($args);
      $cat_name = esc_attr( $category->name);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
      $link = '<a href="#" data-value="'.strtolower(preg_replace('/\s+/', '-', $cat_name)).'" ';
      if ( $use_desc_for_title == 0 || empty($category->description) )
         $link .= 'title="' . sprintf(__( 'View all posts filed under %s' ), $cat_name) . '"';
      else
         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name;
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
      $link .= '</a>';
      if ( (! empty($feed_image)) || (! empty($feed)) ) {
         $link .= ' ';
         if ( empty($feed_image) )
            $link .= '(';
         $link .= '<a href="' . get_category_feed_link($category->term_id, $feed_type) . '"';
         if ( empty($feed) )
            $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
         else {
            $title = ' title="' . $feed . '"';
            $alt = ' alt="' . $feed . '"';
            $name = $feed;
            $link .= $title;
         }
         $link .= '>';
         if ( empty($feed_image) )
            $link .= $name;
         else
            $link .= "<img src='$feed_image'$alt$title" . ' />';
         $link .= '</a>';
         if ( empty($feed_image) )
            $link .= ')';
      }
      if ( isset($show_count) && $show_count )
         $link .= ' (' . intval($category->count) . ')';
      if ( isset($show_date) && $show_date ) {
         $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
      }
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= '<li class="segment-'.rand(2, 99).'"';
          $class = 'cat-item cat-item-'.$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
             $class .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
             $class .=  ' current-cat-parent';
          $output .=  '';
          $output .= ">$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}

 