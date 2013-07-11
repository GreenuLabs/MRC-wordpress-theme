<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <title><?php ui::title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:bold' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    
    <?php wp_head(); ?>
    <?php if (is_home() && option::get('featured_posts_show') == 'on' || get_post_type() == 'portfolio') { ui::js("slides"); } ?>

</head>

<body <?php body_class() ?>>

<div id="wrapper">
    <div id="inner-wrap">
        <div id="header">
            <div id="logo">
				<?php if (!option::get('misc_logo_path')) { echo "<h1>"; } ?>
				
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
					<?php if (!option::get('misc_logo_path')) { bloginfo('name'); } else { ?>
						<img src="<?php echo ui::logo(); ?>" alt="<?php bloginfo('name'); ?>" />
					<?php } ?>
				</a>
				
				<?php if (!option::get('misc_logo_path')) { echo "</h1>"; } ?>
			</div><!-- / #logo -->
			
            
            <div id="menu">
				<?php if (has_nav_menu( 'primary' )) {  
					wp_nav_menu( array(
						'container' => 'menu', 
						'container_class' => '', 
						'menu_class' => 'dropdown', 
						'menu_id' => 'mainmenu', 
						'sort_column' => 'menu_order', 
						'theme_location' => 'primary' 
						)); 
 					} else {
						echo '<p>Please set your Main navigation menu on the <strong><a href="'.get_admin_url().'nav-menus.php">Appearance > Menus</a></strong> page.</p>
						 ';
					} ?>
             </div>
             
             <div class="clear"></div>
             
        </div><!-- / #header-->
		
	   <div id="main">