<?php 
/*-----------------------------------------------------------------------------------*/
/* Initializing Widgetized Areas (Sidebars)																			 */
/*-----------------------------------------------------------------------------------*/


/*----------------------------------*/
/* Sidebar							*/
/*----------------------------------*/
 
 register_sidebar(array(
	'name'=>'Sidebar',
	'id' => 'sidebar',
	'before_widget' => '<div class="widget %2$s" id="%1$s">',
	'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
	'before_title' => '<h3 class="title"><span>',
	'after_title' => '</span></h3>',
));



/*----------------------------------*/
/* Homepage widgetized areas		*/
/*----------------------------------*/
 
register_sidebar(array(
	'name'=>'Homepage Widgets',
	'id' => 'home',
	'before_widget' => '<div class="widget %2$s" id="%1$s">',
	'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
	'before_title' => '<h3 class="title"><span>',
	'after_title' => '</span></h3>',
));

 
 
/*----------------------------------*/
/* Footer widgetized areas		*/
/*----------------------------------*/

register_sidebar(array('name'=>'Footer: Column 1',
	'before_widget' => '<div class="widget %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array('name'=>'Footer: Column 2',
	'before_widget' => '<div class="widget %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array('name'=>'Footer: Column 3',
	'before_widget' => '<div class="widget %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array('name'=>'Footer: Column 4',
	'before_widget' => '<div class="widget %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));
 
 
?>