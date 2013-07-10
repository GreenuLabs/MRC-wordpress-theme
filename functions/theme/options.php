<?php return array(


/* Theme Admin Menu */
"menu" => array(
    array("id"    => "1",
          "name"  => "General"),
    
    array("id"    => "2",
          "name"  => "Homepage"),

  	array("id"    => "5",
          "name"  => "Styling"),
),

/* Theme Admin Options */
"id1" => array(
    array("type"  => "preheader",
          "name"  => "Theme Settings"),

    array("name"  => "Color Style",
          "desc"  => "Choose the style that you would like to use.<br />",
          "id"    => "theme_style",
          "options" => array('White', 'Black', 'Blue', 'Green', 'Pink'),
          "std"   => "Default",
          "type"  => "select"),
          
	array("name"  => "Logo Image",
          "desc"  => "Upload a custom logo image for your site, or you can specify an image URL directly.",
          "id"    => "misc_logo_path",
          "std"   => "",
          "type"  => "upload"),

    array("name"  => "Favicon URL",
          "desc"  => "Upload a favicon image (16&times;16px).",
          "id"    => "misc_favicon",
          "std"   => "",
          "type"  => "upload"),
          
    array("name"  => "Custom Feed URL",
          "desc"  => "Example: <strong>http://feeds.feedburner.com/wpzoom</strong>",
          "id"    => "misc_feedburner",
          "std"   => "",
          "type"  => "text"),
  
	array("name"  => "Enable comments for static pages",
          "id"    => "comments_page",
          "std"   => "off",
          "type"  => "checkbox"),
  

 	array("type"  => "preheader",
          "name"  => "Portfolio Template"),
          
	array("name"  => "Number of works in Paginated Portfolio Template (per page) ",
          "desc"  => "Default: <strong>9</strong>",
          "id"    => "paginated_posts",
          "std"   => "9",
          "type"  => "text"),
          
	array("name"  => "Display Categories on the Top ?",
          "id"    => "portfolio_tags",
          "std"   => "on",
          "type"  => "checkbox"),
          
          
 	array("type"  => "preheader",
          "name"  => "Global Posts Options"),
	
	array("name"  => "Content",
          "desc"  => "The number of posts displayed on homepage can be changed <a href=\"options-reading.php\" target=\"_blank\">here</a>.",
          "id"    => "display_content",
          "options" => array('Excerpt', 'Full Content'),
          "std"   => "Excerpt",
          "type"  => "select"),
     
    array("name"  => "Excerpt length",
          "desc"  => "Default: <strong>50</strong> (words)",
          "id"    => "excerpt_length",
          "std"   => "50",
          "type"  => "text"),
          
    array("name"  => "Display thumbnail",
          "id"    => "index_thumb",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Thumbnail Width (in pixels)",
          "desc"  => "Default: <strong>200</strong> (pixels)",
          "id"    => "thumb_width",
          "std"   => "200",
          "type"  => "text"),
          
    array("name"  => "Thumbnail Height (in pixels)",
          "desc"  => "Default: <strong>130</strong> (pixels)",
          "id"    => "thumb_height",
          "std"   => "130",
          "type"  => "text"),
          
    array("name"  => "Display Date/Time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "display_date",
          "std"   => "on",
          "type"  => "checkbox"),  
          
    array("name"  => "Display Category",
          "id"    => "display_category",
          "std"   => "off",
          "type"  => "checkbox"),    
          
    array("name"  => "Display Comments Count",
          "id"    => "display_comments",
          "std"   => "off",
          "type"  => "checkbox"), 
           
          
	array("type"  => "preheader",
          "name"  => "Single Post Options"),

     array("type"  => "startsub",
          "name"  => "Display meta"),
      

	array("name"  => "Date/Time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "post_date",
          "std"   => "on",
          "type"  => "checkbox"),  
          
    array("name"  => "Author Name",
          "desc"  => "You can edit your profile on this <a href='profile.php' target='_blank'>page</a>.",
          "id"    => "post_author",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Comments",
          "id"    => "post_comments",
          "std"   => "on",
          "type"  => "checkbox"),
    
	array("name"  => "Trackbacks",
          "id"    => "post_trackbacks",
          "std"   => "off",
          "type"  => "checkbox"), 

     array("type"  => "endsub"),
          
          
	array("type"  => "preheader",
          "name"  => "Translations"),
          
	array("name"  => "Portfolio Link",
          "desc"  => "Default: <em>View all projects</em>",
          "id"    => "portfolio_url_title",
          "std"   => "View all projects",
          "type"  => "text"),
          
	array("name"  => "View Project",
          "desc"  => "Default: <em>View project</em>",
          "id"    => "portfolio_project_title",
          "std"   => "View project",
          "type"  => "text"),
          
	array("name"  => "Overview",
          "desc"  => "Default: <em>Overview</em>",
          "id"    => "overview",
          "std"   => "Overview",
          "type"  => "text"),
          
	array("name"  => "Client",
          "desc"  => "Default: <em>Client</em>",
          "id"    => "client",
          "std"   => "Client",
          "type"  => "text"),
          
	array("name"  => "Services",
          "desc"  => "Default: <em>Services</em>",
          "id"    => "services",
          "std"   => "Services",
          "type"  => "text"),

	array("name"  => "Skills",
          "desc"  => "Default: <em>Skills</em>",
          "id"    => "skills",
          "std"   => "Skills",
          "type"  => "text"),
          
 	array("name"  => "Previous project",
          "desc"  => "Default: <em>Previous project</em>",
          "id"    => "prev_project",
          "std"   => "Previous project",
          "type"  => "text"),
          
	array("name"  => "Next project",
          "desc"  => "Default: <em>Next project</em>",
          "id"    => "next_project",
          "std"   => "Next project",
          "type"  => "text"),
),

"id2" => array(
    
    array("type"  => "preheader",
          "name"  => "Homepage Slider"),   
              
    array("name"  => "Display the slider on homepage?",
          "desc"  => "Do you want to show a featured slider on the homepage?",
          "id"    => "featured_posts_show",
          "std"   => "on",
          "type"  => "checkbox"),
    
    array("name"  => "Autoplay Slider?",
          "desc"  => "Do you want to auto-scroll the slides?",
    	  "id"    => "slideshow_auto",
          "std"   => "on",
          "type"  => "checkbox"),
            
    array("name"  => "Slider Autoplay Interval",
          "desc"  => "Select the interval (in miliseconds) at which the Slider should change posts (<strong>if autoplay is enabled</strong>). Default: 3000 (3 seconds).",
          "id"    => "slideshow_speed",
          "std"   => "3000",
          "type"  => "text"),
            
    array("name"  => "Slider Effect",
          "desc"  => "Select the effect for slides transition.",
          "id"    => "slideshow_effect",
          "options" => array('Slide', 'Fade'),
          "std"   => "Slide",
          "type"  => "select"),
            
    array("name"  => "Number of Posts in Slider",
          "desc"  => "How many posts should appear in \"Featured Slider\" on the homepage? Default: 5.<br/><br/>To add posts in slider, go to <a href='edit.php?post_type=slideshow' target='_blank'>Slideshow section</a>",
          "id"    => "featured_posts_posts",
          "std"   => "5",
          "type"  => "text"),
          
    
    array("type"  => "preheader",
          "name"  => "Welcome Message"),
    
    array("name"  => "Show Welcome Message on Homepage?",
          "id"    => "intro",
          "std"   => "on",
          "type"  => "checkbox"),
            
    array("name"  => "Message Title",
          "desc"  => "For example: <em>Welcome to our website!</em>",
          "id"    => "intro_title",
          "std"   => "Welcome to our website!",
          "type"  => "text"),
            
    array("name"  => "Message Content",
          "desc"  => "Add a short description about your website or agency. ",
          "id"    => "intro_content",
          "type"  => "textarea"),
             
    array("name"  => "Call-to-action Button URL",
          "desc"  => "For example: <em>http://www.wpzoom.com</em>",
          "id"    => "intro_url",
          "std"   => "http://www.wpzoom.com",
          "type"  => "text"),
              
    array("name"  => "Call-to-action Button Title",
          "desc"  => "For example: <em>View our portfolio</em>",
          "id"    => "intro_btn",
          "std"   => "View our portfolio",
          "type"  => "text"),
  

    array("type"  => "preheader",
          "name"  => "Portfolio on Homepage"),
 
	array("name"  => "Show latest entries from Portfolio on Homepage?",
          "id"    => "portfolio",
          "std"   => "on",
          "type"  => "checkbox"),
            
    array("name"  => "Portfolio Title",
          "desc"  => "For example: <em>Recent Works</em>",
          "id"    => "portfolio_title",
          "std"   => "Recent Works",
          "type"  => "text"),
    
    array("name"  => "Number of items to show",
          "desc"  => "Default: <strong>6</strong>",
          "id"    => "portfolio_items",
          "std"   => "6",
          "type"  => "text"),
          
 	array("name" => "Portfolio Page",
		 "desc"  => "Choose the page to which should link <em>View all projects</em> button.",
		 "id"    => "portfolio_url",
		 "std"   => "",
		 "type"  => "select-page"),

),

"id5" => array(
    array("type"  => "preheader",
          "name"  => "Colors"),

    array("name"  => "Page Background Color",
           "id"   => "bg_color",
           "type" => "color",
           "selector" => "#wrapper",
           "attr" => "background-color"),

    array("name"  => "Logo Color",
           "id"   => "logo_color",
           "type" => "color",
           "selector" => "#logo h1 a",
           "attr" => "color"),

    array("name"  => "Welcome Message/Heading Background Color",
           "id"   => "msgbg_color",
           "type" => "color",
           "selector" => "#heading",
           "attr" => "background"),
   
    array("name"  => "Link Color",
           "id"   => "a_css_color",
           "type" => "color",
           "selector" => "a",
           "attr" => "color"),
           
    array("name"  => "Link Hover Color",
           "id"   => "ahover_css_color",
           "type" => "color",
           "selector" => "a:hover",
           "attr" => "color"),

    array("name"  => "Widget Title Color",
           "id"   => "widget_color",
           "type" => "color",
           "selector" => ".widget h3 span, #footer .widget h3",
           "attr" => "color"),

    array("type"  => "preheader",
          "name"  => "Fonts"),

    array("name" => "General Text Font Style", 
          "id" => "typo_body", 
          "type" => "typography", 
          "selector" => "body" ),

    array("name" => "Logo Text Style", 
          "id" => "typo_logo", 
          "type" => "typography", 
          "selector" => "#logo h1 a" ),

    array("name" => "Heading Font Style", 
          "id" => "typo_heading", 
          "type" => "typography", 
          "selector" => "#heading" ),

    array("name"  => "Post Title Style",
           "id"   => "typo_post_title",
           "type" => "typography",
           "selector" => ".posts h2 a"),

    array("name"  => "Individual Post Title Style",
           "id"   => "typo_individual_title",
           "type" => "typography",
           "selector" => ".single .post_content h1 a"),
 
     array("name"  => "Widget Title Style",
           "id"   => "typo_widget",
           "type" => "typography",
           "selector" => ".widget h3 span, #footer .widget h3"),

),

/* end return */);