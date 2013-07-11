<?php

/* Register Thumbnails Size
================================== */

if ( function_exists( 'add_image_size' ) ) {

	/* Homepage Slider */
  	add_image_size( 'featured', 910, 350, false );

	/* Portfolio Thumbnails  */
	add_image_size( 'portfolio-thumb', 285, 190, true );

	/* Portfolio Slider */
	add_image_size( 'portfolio-slide', 630);

	/* Recent Posts Widget */
	add_image_size( 'recent-widget', 75, 50, true );

	/* Main loop */
	add_image_size( 'loop', option::get('thumb_width'), option::get('thumb_height'), true );

}
 

/* 	Register Custom Menu
==================================== */

register_nav_menu('primary', 'Main Menu');



/*  Add support for Custom Background
==================================== */

if ( ui::is_wp_version( '3.4' ) )
    add_theme_support( 'custom-background' );
else
    add_custom_background( $args );



/*  Reset [gallery] shortcode styles
==================================== */

add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));



/*  Add Support for Shortcodes in Excerpt
========================================== */

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');



/*  Custom Excerpt Length
==================================== */

function new_excerpt_length($length) {
	return (int) option::get("excerpt_length") ? (int) option::get("excerpt_length") : 50;
}
add_filter('excerpt_length', 'new_excerpt_length');



/*  Maximum width for images in posts
=========================================== */

 if ( ! isset( $content_width ) ) $content_width = 630;



/* Email validation
==================================== */

function simple_email_check($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }

    return true;
}



/* Show all thumbnails in attachment.php
=========================================== */

function show_all_thumbs() {
	global $post;

	$post = get_post($post);
	$images =& get_children( 'post_type=attachment&post_mime_type=image&output=ARRAY_N&orderby=menu_order&order=ASC&post_parent='.$post->post_parent);
	if($images){
		foreach( $images as $imageID => $imagePost ){
			if($imageID==$post->ID){

			unset($the_b_img);
			$the_b_img = wp_get_attachment_image($imageID, 'thumbnail', false);
			$thumblist .= '<a class="active" href="'.get_attachment_link($imageID).'">'.$the_b_img.'</a>';


			} else {
			unset($the_b_img);
			$the_b_img = wp_get_attachment_image($imageID, 'thumbnail', false);
			$thumblist .= '<a href="'.get_attachment_link($imageID).'">'.$the_b_img.'</a>';
			}
		}
	}
	return $thumblist;
}



/*  Limit Posts
/*
/*  Plugin URI: http://labitacora.net/comunBlog/limit-post.phps
/*	Usage: the_content_limit($max_charaters, $more_link)
===================================================== */

function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '', $echo = true) {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0 && $thisshouldnotapply) {
      echo $content;
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        if ($echo == true) { echo $content . "..."; } else {return $content; }
   }
   else {
      if ($echo == true) { echo $content . "..."; } else {return $content; }
   }
}