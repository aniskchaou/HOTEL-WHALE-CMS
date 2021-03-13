<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => constant('DIAZ_THEME_NAME').' '.esc_html__('Options', 'diaz'),
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => __('Designthemes Framework <small>by Designthemes</small>', 'diaz'),
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

$options[]      = array(
  'name'        => 'general',
  'title'       => esc_html__('General', 'diaz'),
  'icon'        => 'fa fa-gears',

  'fields'      => array(

	array(
	  'type'    => 'subheading',
	  'content' => esc_html__( 'General Options', 'diaz' ),
	),
	
	array(
		'id'	=> 'header',
		'type'	=> 'select',
		'title'	=> esc_html__('Site Header', 'diaz'),
		'class'	=> 'chosen',
		'options'	=> 'posts',
		'query_args'	=> array(
			'post_type'	=> 'dt_headers',
			'orderby'	=> 'title',
			'order'	=> 'ASC'
		),
		'default_option'	=> esc_attr__('Select Header', 'diaz'),
		'attributes'	=> array ( 'style'	=> 'width:50%'),
		'info'	=> esc_html__('Select default header.','diaz'),
	),
	
	array(
		'id'	=> 'footer',
		'type'	=> 'select',
		'title'	=> esc_html__('Site Footer', 'diaz'),
		'class'	=> 'chosen',
		'options'	=> 'posts',
		'query_args'	=> array(
			'post_type'	=> 'dt_footers',
			'orderby'	=> 'title',
			'order'	=> 'ASC'
		),
		'default_option'	=> esc_attr__('Select Footer', 'diaz'),
		'attributes'	=> array ( 'style'	=> 'width:50%'),
		'info'	=> esc_html__('Select defaultfooter.','diaz'),
	),

	array(
	  'id'  	 => 'use-site-loader',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Site Loader', 'diaz'),
	  'info'	 => esc_html__('YES! to use site loader.', 'diaz')
	),	

	array(
	  'id'  	 => 'enable-stylepicker',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Style Picker', 'diaz'),
	  'info'	 => esc_html__('YES! to show the style picker.', 'diaz')
	),		

	array(
	  'id'  	 => 'show-pagecomments',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Globally Show Page Comments', 'diaz'),
	  'info'	 => esc_html__('YES! to show comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings.', 'diaz'),
	  'default'  => true,
	),

	array(
	  'id'  	 => 'showall-pagination',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Show all pages in Pagination', 'diaz'),
	  'info'	 => esc_html__('YES! to show all the pages instead of dots near the current page.', 'diaz')
	),



	array(
	  'id'      => 'google-map-key',
	  'type'    => 'text',
	  'title'   => esc_html__('Google Map API Key', 'diaz'),
	  'after' 	=> '<p class="cs-text-info">'.esc_html__('Put a valid google account api key here', 'diaz').'</p>',
	),

	array(
	  'id'      => 'mailchimp-key',
	  'type'    => 'text',
	  'title'   => esc_html__('Mailchimp API Key', 'diaz'),
	  'after' 	=> '<p class="cs-text-info">'.esc_html__('Put a valid mailchimp account api key here', 'diaz').'</p>',
	),

  ),
);

$options[]      = array(
  'name'        => 'layout_options',
  'title'       => esc_html__('Layout Options', 'diaz'),
  'icon'        => 'dashicons dashicons-exerpt-view',
  'sections' => array(

	// -----------------------------------------
	// Header Options
	// -----------------------------------------
	array(
	  'name'      => 'breadcrumb_options',
	  'title'     => esc_html__('Breadcrumb Options', 'diaz'),
	  'icon'      => 'fa fa-sitemap',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Breadcrumb Options", 'diaz' ),
		  ),

		  array(
			'id'  		 => 'show-breadcrumb',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Breadcrumb', 'diaz'),
			'info'		 => esc_html__('YES! to display breadcrumb for all pages.', 'diaz'),
			'default' 	 => true,
		  ),

		  array(
			'id'           => 'breadcrumb-delimiter',
			'type'         => 'icon',
			'title'        => esc_html__('Breadcrumb Delimiter', 'diaz'),
			'info'         => esc_html__('Choose delimiter style to display on breadcrumb section.', 'diaz'),
		  ),

		  array(
			'id'           => 'breadcrumb-style',
			'type'         => 'select',
			'title'        => esc_html__('Breadcrumb Style', 'diaz'),
			'options'      => array(
			  'default' 							=> esc_html__('Default', 'diaz'),
			  'aligncenter'    						=> esc_html__('Align Center', 'diaz'),
			  'alignright'  						=> esc_html__('Align Right', 'diaz'),
			  'breadcrumb-left'    					=> esc_html__('Left Side Breadcrumb', 'diaz'),
			  'breadcrumb-right'     				=> esc_html__('Right Side Breadcrumb', 'diaz'),
			  'breadcrumb-top-right-title-center'  	=> esc_html__('Top Right Title Center', 'diaz'),
			  'breadcrumb-top-left-title-center'  	=> esc_html__('Top Left Title Center', 'diaz'),
			),
			'class'        => 'chosen',
			'default'      => 'default',
			'info'         => esc_html__('Choose alignment style to display on breadcrumb section.', 'diaz'),
		  ),

		  array(
			  'id'                 => 'breadcrumb-position',
			  'type'               => 'select',
			  'title'              => esc_html__('Position', 'diaz' ),
			  'options'            => array(
				  'header-top-absolute'    => esc_html__('Behind the Header','diaz'),
				  'header-top-relative'    => esc_html__('Default','diaz'),
			  ),
			  'class'        => 'chosen',
			  'default'      => 'header-top-relative',
			  'info'         => esc_html__('Choose position of breadcrumb section.', 'diaz'),
		  ),

		  array(
			'id'    => 'breadcrumb_background',
			'type'  => 'background',
			'title' => esc_html__('Background', 'diaz'),
			'desc'  => esc_html__('Choose background options for breadcrumb title section.', 'diaz')
		  ),

		),
	),

  ),
);

$options[]      = array(
  'name'        => 'allpage_options',
  'title'       => esc_html__('All Page Options', 'diaz'),
  'icon'        => 'fa fa-files-o',
  'sections' => array(

	// -----------------------------------------
	// Post Options
	// -----------------------------------------
	array(
	  'name'      => 'post_options',
	  'title'     => esc_html__('Post Options', 'diaz'),
	  'icon'      => 'fa fa-file',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Single Post Options", 'diaz' ),
		  ),
		
		  array(
			'id'  		 => 'single-post-authorbox',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Author Box', 'diaz'),
			'info'		 => esc_html__('YES! to display author box in single blog posts.', 'diaz')
		  ),

		  array(
			'id'  		 => 'single-post-related',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Related Posts', 'diaz'),
			'info'		 => esc_html__('YES! to display related blog posts in single posts.', 'diaz')
		  ),

		  array(
			'id'  		 => 'single-post-navigation',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Post Navigation', 'diaz'),
			'info'		 => esc_html__('YES! to display post navigation in single posts.', 'diaz')
		  ),

		  array(
			'id'  		 => 'single-post-comments',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Posts Comments', 'diaz'),
			'info'		 => esc_html__('YES! to display single blog post comments.', 'diaz'),
			'default' 	 => true,
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Post Archives Page Layout", 'diaz' ),
		  ),

		  array(
			'id'      	 => 'post-archives-page-layout',
			'type'       => 'image_select',
			'title'      => esc_html__('Page Layout', 'diaz'),
			'options'    => array(
			  'content-full-width'   => DIAZ_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => DIAZ_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'post-archives-page-layout',
			),
		  ),

		  array(
			'id'  		 => 'show-standard-left-sidebar-for-post-archives',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Standard Left Sidebar', 'diaz'),
			'dependency' => array( 'post-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  		 => 'show-standard-right-sidebar-for-post-archives',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Standard Right Sidebar', 'diaz'),
			'dependency' => array( 'post-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Post Archives Post Layout", 'diaz' ),
		  ),

		  array(
			'id'      	   => 'post-archives-post-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Post Layout', 'diaz'),
			'options'      => array(
			  'one-column' 		  => DIAZ_THEME_URI . '/cs-framework-override/images/one-column.png',
			  'one-half-column'   => DIAZ_THEME_URI . '/cs-framework-override/images/one-half-column.png',
			  'one-third-column'  => DIAZ_THEME_URI . '/cs-framework-override/images/one-third-column.png',
			  '1-2-2'			  => DIAZ_THEME_URI . '/cs-framework-override/images/1-2-2.png',
			  '1-2-2-1-2-2' 	  => DIAZ_THEME_URI . '/cs-framework-override/images/1-2-2-1-2-2.png',
			  '1-3-3-3'			  => DIAZ_THEME_URI . '/cs-framework-override/images/1-3-3-3.png',
			  '1-3-3-3-1' 		  => DIAZ_THEME_URI . '/cs-framework-override/images/1-3-3-3-1.png',
			),
			'default'      => 'one-half-column',
		  ),

		  array(
			'id'           => 'post-style',
			'type'         => 'select',
			'title'        => esc_html__('Post Style', 'diaz'),
			'options'      => array(
			  'blog-default-style' 		=> esc_html__('Default', 'diaz'),
			  'entry-date-left'      	=> esc_html__('Date Left', 'diaz'),
			  'entry-date-author-left'  => esc_html__('Date and Author Left', 'diaz'),
			  'blog-medium-style'       => esc_html__('Medium', 'diaz'),
			  'blog-medium-style dt-blog-medium-highlight'     					 => esc_html__('Medium Hightlight', 'diaz'),
			  'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight'  => esc_html__('Medium Skin Highlight', 'diaz'),
			),
			'class'        => 'chosen',
			'default'      => 'blog-default-style',
			'info'         => esc_html__('Choose post style to display post archives pages.', 'diaz'),
		  ),

		  array(
			'id'  		 => 'post-archives-enable-excerpt',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Allow Excerpt', 'diaz'),
			'info'		 => esc_html__('YES! to allow excerpt', 'diaz'),
			'default'    => true,
		  ),

		  array(
			'id'  		 => 'post-archives-excerpt',
			'type'  	 => 'number',
			'title' 	 => esc_html__('Excerpt Length', 'diaz'),
			'after'		 => '<span class="cs-text-desc">&nbsp;'.esc_html__('Put Excerpt Length', 'diaz').'</span>',
			'default' 	 => 40,
		  ),

		  array(
			'id'  		 => 'post-archives-enable-readmore',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Read More', 'diaz'),
			'info'		 => esc_html__('YES! to enable read more button', 'diaz'),
			'default'	 => true,
		  ),

		  array(
			'id'  		 => 'post-archives-readmore',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Read More Shortcode', 'diaz'),
			'info'		 => esc_html__('Paste any button shortcode here', 'diaz'),
			'default'	 => '[dt_sc_button title="Read More" style="bordered" /]',
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Single Post & Post Archive options", 'diaz' ),
		  ),

		  array(
			'id'      => 'post-format-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Post Format Meta', 'diaz' ),
			'info'	  => esc_html__('YES! to show post format meta information', 'diaz'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-author-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Author Meta', 'diaz' ),
			'info'	  => esc_html__('YES! to show post author meta information', 'diaz'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-date-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Date Meta', 'diaz' ),
			'info'	  => esc_html__('YES! to show post date meta information', 'diaz'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-comment-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Comment Meta', 'diaz' ),
			'info'	  => esc_html__('YES! to show post comment meta information', 'diaz'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-category-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Category Meta', 'diaz' ),
			'info'	  => esc_html__('YES! to show post category information', 'diaz'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-tag-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Tag Meta', 'diaz' ),
			'info'	  => esc_html__('YES! to show post tag information', 'diaz'),
			'default' => true
			),
			
		array(
			'id'      => 'post-likes',
			'type'    => 'switcher',
			'title'   => esc_html__('Post Likes', 'diaz' ),
			'info'    => esc_html__('YES! to show post likes information', 'diaz'),
			'default' => true
		),

		array(
			'id'      => 'post-views',
			'type'    => 'switcher',
			'title'   => esc_html__('Post Views', 'diaz' ),
			'info'    => esc_html__('YES! to show post views information', 'diaz'),
			'default' => true
		),

		),
	),

	// -----------------------------------------
	// 404 Options
	// -----------------------------------------
	array(
	  'name'      => '404_options',
	  'title'     => esc_html__('404 Options', 'diaz'),
	  'icon'      => 'fa fa-warning',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "404 Message", 'diaz' ),
		  ),
		  
		  array(
			'id'      => 'enable-404message',
			'type'    => 'switcher',
			'title'   => esc_html__('Enable Message', 'diaz' ),
			'info'	  => esc_html__('YES! to enable not-found page message.', 'diaz'),
			'default' => true
		  ),

		  array(
			'id'           => 'notfound-style',
			'type'         => 'select',
			'title'        => esc_html__('Template Style', 'diaz'),
			'options'      => array(
			  'type1' 	   => esc_html__('Modern', 'diaz'),
			  'type2'      => esc_html__('Classic', 'diaz'),
			  'type4'  	   => esc_html__('Diamond', 'diaz'),
			  'type5'      => esc_html__('Shadow', 'diaz'),
			  'type6'      => esc_html__('Diamond Alt', 'diaz'),
			  'type7'  	   => esc_html__('Stack', 'diaz'),
			  'type8'  	   => esc_html__('Minimal', 'diaz'),
			),
			'class'        => 'chosen',
			'default'      => 'type1',
			'info'         => esc_html__('Choose the style of not-found template page.', 'diaz')
		  ),

		  array(
			'id'      => 'notfound-darkbg',
			'type'    => 'switcher',
			'title'   => esc_html__('404 Dark BG', 'diaz' ),
			'info'	  => esc_html__('YES! to use dark bg notfound page for this site.', 'diaz')
		  ),

		  array(
			'id'           => 'notfound-pageid',
			'type'         => 'select',
			'title'        => esc_html__('Custom Page', 'diaz'),
			'options'      => 'pages',
			'class'        => 'chosen',
			'default_option' => esc_html__('Choose the page', 'diaz'),
			'info'       	 => esc_html__('Choose the page for not-found content.', 'diaz')
		  ),
		  
		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Background Options", 'diaz' ),
		  ),

		  array(
			'id'    => 'notfound_background',
			'type'  => 'background',
			'title' => esc_html__('Background', 'diaz')
		  ),

		  array(
			'id'  		 => 'notfound-bg-style',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Custom Styles', 'diaz'),
			'info'		 => esc_html__('Paste custom CSS styles for not found page.', 'diaz')
		  ),

		),
	),

	// -----------------------------------------
	// Underconstruction Options
	// -----------------------------------------
	array(
	  'name'      => 'comingsoon_options',
	  'title'     => esc_html__('Under Construction Options', 'diaz'),
	  'icon'      => 'fa fa-thumbs-down',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Under Construction", 'diaz' ),
		  ),
	
		  array(
			'id'      => 'enable-comingsoon',
			'type'    => 'switcher',
			'title'   => esc_html__('Enable Coming Soon', 'diaz' ),
			'info'	  => esc_html__('YES! to check under construction page of your website.', 'diaz')
		  ),
	
		  array(
			'id'           => 'comingsoon-style',
			'type'         => 'select',
			'title'        => esc_html__('Template Style', 'diaz'),
			'options'      => array(
			  'type1' 	   => esc_html__('Diamond', 'diaz'),
			  'type2'      => esc_html__('Teaser', 'diaz'),
			  'type3'  	   => esc_html__('Minimal', 'diaz'),
			  'type4'      => esc_html__('Counter Only', 'diaz'),
			  'type5'      => esc_html__('Belt', 'diaz'),
			  'type6'  	   => esc_html__('Classic', 'diaz'),
			  'type7'  	   => esc_html__('Boxed', 'diaz')
			),
			'class'        => 'chosen',
			'default'      => 'type1',
			'info'         => esc_html__('Choose the style of coming soon template.', 'diaz'),
		  ),

		  array(
			'id'      => 'uc-darkbg',
			'type'    => 'switcher',
			'title'   => esc_html__('Coming Soon Dark BG', 'diaz' ),
			'info'	  => esc_html__('YES! to use dark bg coming soon page for this site.', 'diaz')
		  ),

		  array(
			'id'           => 'comingsoon-pageid',
			'type'         => 'select',
			'title'        => esc_html__('Custom Page', 'diaz'),
			'options'      => 'pages',
			'class'        => 'chosen',
			'default_option' => esc_html__('Choose the page', 'diaz'),
			'info'       	 => esc_html__('Choose the page for comingsoon content.', 'diaz')
		  ),

		  array(
			'id'      => 'show-launchdate',
			'type'    => 'switcher',
			'title'   => esc_html__('Show Launch Date', 'diaz' ),
			'info'	  => esc_html__('YES! to show launch date text.', 'diaz'),
		  ),

		  array(
			'id'      => 'comingsoon-launchdate',
			'type'    => 'text',
			'title'   => esc_html__('Launch Date', 'diaz'),
			'attributes' => array( 
			  'placeholder' => '10/30/2016 12:00:00'
			),
			'after' 	=> '<p class="cs-text-info">'.esc_html__('Put Format: 12/30/2016 12:00:00 month/day/year hour:minute:second', 'diaz').'</p>',
		  ),

		  array(
			'id'           => 'comingsoon-timezone',
			'type'         => 'select',
			'title'        => esc_html__('UTC Timezone', 'diaz'),
			'options'      => array(
			  '-12' => '-12', '-11' => '-11', '-10' => '-10', '-9' => '-9', '-8' => '-8', '-7' => '-7', '-6' => '-6', '-5' => '-5', 
			  '-4' => '-4', '-3' => '-3', '-2' => '-2', '-1' => '-1', '0' => '0', '+1' => '+1', '+2' => '+2', '+3' => '+3', '+4' => '+4',
			  '+5' => '+5', '+6' => '+6', '+7' => '+7', '+8' => '+8', '+9' => '+9', '+10' => '+10', '+11' => '+11', '+12' => '+12'
			),
			'class'        => 'chosen',
			'default'      => '0',
			'info'         => esc_html__('Choose utc timezone, by default UTC:00:00', 'diaz'),
		  ),

		  array(
			'id'    => 'comingsoon_background',
			'type'  => 'background',
			'title' => esc_html__('Background', 'diaz')
		  ),

		  array(
			'id'  		 => 'comingsoon-bg-style',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Custom Styles', 'diaz'),
			'info'		 => esc_html__('Paste custom CSS styles for under construction page.', 'diaz'),
		  ),

		),
	),

  ),
);

// -----------------------------------------
// Widget area Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'widgetarea_options',
  'title'       => esc_html__('Widget Area', 'diaz'),
  'icon'        => 'fa fa-trello',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Custom Widget Area for Sidebar", 'diaz' ),
	  ),

	  array(
		'id'           => 'wtitle-style',
		'type'         => 'select',
		'title'        => esc_html__('Sidebar widget Title Style', 'diaz'),
		'options'      => array(
		  'type1' 	   => esc_html__('Double Border', 'diaz'),
		  'type2'      => esc_html__('Tooltip', 'diaz'),
		  'type3'  	   => esc_html__('Title Top Border', 'diaz'),
		  'type4'      => esc_html__('Left Border & Pattren', 'diaz'),
		  'type5'      => esc_html__('Bottom Border', 'diaz'),
		  'type6'  	   => esc_html__('Tooltip Border', 'diaz'),
		  'type7'  	   => esc_html__('Boxed Modern', 'diaz'),
		  'type8'  	   => esc_html__('Elegant Border', 'diaz'),
		  'type9' 	   => esc_html__('Needle', 'diaz'),
		  'type10' 	   => esc_html__('Ribbon', 'diaz'),
		  'type11' 	   => esc_html__('Content Background', 'diaz'),
		  'type12' 	   => esc_html__('Classic BG', 'diaz'),
		  'type13' 	   => esc_html__('Tiny Boders', 'diaz'),
		  'type14' 	   => esc_html__('BG & Border', 'diaz'),
		  'type15' 	   => esc_html__('Classic BG Alt', 'diaz'),
		  'type16' 	   => esc_html__('Left Border & BG', 'diaz'),
		  'type17' 	   => esc_html__('Basic', 'diaz'),
		  'type18' 	   => esc_html__('BG & Pattern', 'diaz'),
		),
		'class'          => 'chosen',
		'default_option' => esc_html__('Choose any type', 'diaz'),
		'info'           => esc_html__('Choose the style of sidebar widget title.', 'diaz')
	  ),

	  array(
		'id'              => 'widgetarea-custom',
		'type'            => 'group',
		'title'           => esc_html__('Custom Widget Area', 'diaz'),
		'button_title'    => esc_html__('Add New', 'diaz'),
		'accordion_title' => esc_html__('Add New Widget Area', 'diaz'),
		'fields'          => array(

		  array(
			'id'          => 'widgetarea-custom-name',
			'type'        => 'text',
			'title'       => esc_html__('Name', 'diaz'),
		  ),

		)
	  ),

	),
);

// -----------------------------------------
// Woocommerce Options
// -----------------------------------------
if( function_exists( 'is_woocommerce' ) && ! class_exists ( 'DTWooPlugin' ) ){

	$options[]      = array(
	  'name'        => 'woocommerce_options',
	  'title'       => esc_html__('Woocommerce', 'diaz'),
	  'icon'        => 'fa fa-shopping-cart',

	  'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Woocommerce Shop Page Options", 'diaz' ),
		  ),

		  array(
			'id'  		 => 'shop-product-per-page',
			'type'  	 => 'number',
			'title' 	 => esc_html__('Products Per Page', 'diaz'),
			'after'		 => '<span class="cs-text-desc">&nbsp;'.esc_html__('Number of products to show in catalog / shop page', 'diaz').'</span>',
			'default' 	 => 12,
		  ),

		  array(
			'id'           => 'product-style',
			'type'         => 'select',
			'title'        => esc_html__('Product Style', 'diaz'),
			'options'      => array(
			  'woo-type1' 	   => esc_html__('Thick Border', 'diaz'),
			  'woo-type4'      => esc_html__('Diamond Icons', 'diaz'),
			  'woo-type8' 	   => esc_html__('Modern', 'diaz'),
			  'woo-type10' 	   => esc_html__('Easing', 'diaz'),
			  'woo-type11' 	   => esc_html__('Boxed', 'diaz'),
			  'woo-type12' 	   => esc_html__('Easing Alt', 'diaz'),
			  'woo-type13' 	   => esc_html__('Parallel', 'diaz'),
			  'woo-type14' 	   => esc_html__('Pointer', 'diaz'),
			  'woo-type16' 	   => esc_html__('Stack', 'diaz'),
			  'woo-type17' 	   => esc_html__('Bouncy', 'diaz'),
			  'woo-type20' 	   => esc_html__('Masked Circle', 'diaz'),
			  'woo-type21' 	   => esc_html__('Classic', 'diaz')
			),
			'class'        => 'chosen',
			'default' 	   => 'woo-type1',
			'info'         => esc_html__('Choose products style to display shop & archive pages.', 'diaz')
		  ),

		  array(
			'id'      	 => 'shop-page-product-layout',
			'type'       => 'image_select',
			'title'      => esc_html__('Product Layout', 'diaz'),
			'options'    => array(
				  1   => DIAZ_THEME_URI . '/cs-framework-override/images/one-column.png',
				  2   => DIAZ_THEME_URI . '/cs-framework-override/images/one-half-column.png',
				  3   => DIAZ_THEME_URI . '/cs-framework-override/images/one-third-column.png',
				  4   => DIAZ_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
			),
			'default'      => 4,
			'attributes'   => array(
			  'data-depend-id' => 'shop-page-product-layout',
			),
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Detail Page Options", 'diaz' ),
		  ),

		  array(
			'id'      	   => 'product-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'diaz'),
			'options'      => array(
			  'content-full-width'   => DIAZ_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => DIAZ_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'diaz'),
			'dependency'   	 => array( 'product-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'diaz'),
			'dependency' 	 => array( 'product-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  		 	 => 'enable-related',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Related Products', 'diaz'),
			'info'	  		 => esc_html__("YES! to display related products on single product's page.", 'diaz')
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Category Page Options", 'diaz' ),
		  ),

		  array(
			'id'      	   => 'product-category-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'diaz'),
			'options'      => array(
			  'content-full-width'   => DIAZ_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => DIAZ_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-category-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-category-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'diaz'),
			'dependency'   	 => array( 'product-category-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-category-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'diaz'),
			'dependency' 	 => array( 'product-category-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),
		  
		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Tag Page Options", 'diaz' ),
		  ),

		  array(
			'id'      	   => 'product-tag-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'diaz'),
			'options'      => array(
			  'content-full-width'   => DIAZ_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => DIAZ_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-tag-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-tag-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'diaz'),
			'dependency'   	 => array( 'product-tag-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-tag-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'diaz'),
			'dependency' 	 => array( 'product-tag-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

	  ),
	);
}

// -----------------------------------------
// Sociable Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'sociable_options',
  'title'       => esc_html__('Sociable', 'diaz'),
  'icon'        => 'fa fa-share-alt-square',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Sociable", 'diaz' ),
	  ),

	  array(
		'id'              => 'sociable_fields',
		'type'            => 'group',
		'title'           => esc_html__('Sociable', 'diaz'),
		'info'            => esc_html__('Click button to add type of social & url.', 'diaz'),
		'button_title'    => esc_html__('Add New Social', 'diaz'),
		'accordion_title' => esc_html__('Adding New Social Field', 'diaz'),
		'fields'          => array(
		  array(
			'id'          => 'sociable_fields_type',
			'type'        => 'select',
			'title'       => esc_html__('Select Social', 'diaz'),
			'options'      => array(
			  'delicious' 	 => esc_html__('Delicious', 'diaz'),
			  'deviantart' 	 => esc_html__('Deviantart', 'diaz'),
			  'digg' 	  	 => esc_html__('Digg', 'diaz'),
			  'dribbble' 	 => esc_html__('Dribbble', 'diaz'),
			  'envelope' 	 => esc_html__('Envelope', 'diaz'),
			  'facebook' 	 => esc_html__('Facebook', 'diaz'),
			  'flickr' 		 => esc_html__('Flickr', 'diaz'),
			  'google-plus'  => esc_html__('Google Plus', 'diaz'),
			  'gtalk'  		 => esc_html__('GTalk', 'diaz'),
			  'instagram'	 => esc_html__('Instagram', 'diaz'),
			  'lastfm'	 	 => esc_html__('Lastfm', 'diaz'),
			  'linkedin'	 => esc_html__('Linkedin', 'diaz'),
			  'myspace'		 => esc_html__('Myspace', 'diaz'),
			  'picasa'		 => esc_html__('Picasa', 'diaz'),
			  'pinterest'	 => esc_html__('Pinterest', 'diaz'),
			  'reddit'		 => esc_html__('Reddit', 'diaz'),
			  'rss'		 	 => esc_html__('RSS', 'diaz'),
			  'skype'		 => esc_html__('Skype', 'diaz'),
			  'stumbleupon'	 => esc_html__('Stumbleupon', 'diaz'),
			  'technorati'	 => esc_html__('Technorati', 'diaz'),
			  'tumblr'		 => esc_html__('Tumblr', 'diaz'),
			  'twitter'		 => esc_html__('Twitter', 'diaz'),
			  'viadeo'		 => esc_html__('Viadeo', 'diaz'),
			  'vimeo'		 => esc_html__('Vimeo', 'diaz'),
			  'yahoo'		 => esc_html__('Yahoo', 'diaz'),
			  'youtube'		 => esc_html__('Youtube', 'diaz'),
			),
			'class'        => 'chosen',
			'default'      => 'delicious',
		  ),

		  array(
			'id'          => 'sociable_fields_url',
			'type'        => 'text',
			'title'       => esc_html__('Enter URL', 'diaz')
		  ),
		)
	  ),

   ),
);

// -----------------------------------------
// Hook Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'hook_options',
  'title'       => esc_html__('Hooks', 'diaz'),
  'icon'        => 'fa fa-paperclip',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Top Hook", 'diaz' ),
	  ),

	  array(
		'id'  	=> 'enable-top-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Top Hook', 'diaz'),
		'info'	=> esc_html__("YES! to enable top hook.", 'diaz')
	  ),

	  array(
		'id'  		 => 'top-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Top Hook', 'diaz'),
		'info'		 => esc_html__('Paste your top hook, Executes after the opening &lt;body&gt; tag.', 'diaz')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Content Before Hook", 'diaz' ),
	  ),

	  array(
		'id'  	=> 'enable-content-before-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Content Before Hook', 'diaz'),
		'info'	=> esc_html__("YES! to enable content before hook.", 'diaz')
	  ),

	  array(
		'id'  		 => 'content-before-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Content Before Hook', 'diaz'),
		'info'		 => esc_html__('Paste your content before hook, Executes before the opening &lt;#primary&gt; tag.', 'diaz')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Content After Hook", 'diaz' ),
	  ),

	  array(
		'id'  	=> 'enable-content-after-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Content After Hook', 'diaz'),
		'info'	=> esc_html__("YES! to enable content after hook.", 'diaz')
	  ),

	  array(
		'id'  		 => 'content-after-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Content After Hook', 'diaz'),
		'info'		 => esc_html__('Paste your content after hook, Executes after the closing &lt;/#main&gt; tag.', 'diaz')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Bottom Hook", 'diaz' ),
	  ),

	  array(
		'id'  	=> 'enable-bottom-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Bottom Hook', 'diaz'),
		'info'	=> esc_html__("YES! to enable bottom hook.", 'diaz')
	  ),

	  array(
		'id'  		 => 'bottom-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Bottom Hook', 'diaz'),
		'info'		 => esc_html__('Paste your bottom hook, Executes after the closing &lt;/body&gt; tag.', 'diaz')
	  ),
	  
	  array(
		'id'  	=> 'enable-analytics-code',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Tracking Code', 'diaz'),
		'info'	=> esc_html__("YES! to enable site tracking code.", 'diaz')
	  ),

	  array(
		'id'  		 => 'analytics-code',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Google Analytics Tracking Code', 'diaz'),
		'info'		 => esc_html__('Enter your Google tracking id (UA-XXXXX-X) here. If you want to offer your visitors the option to stop being tracked you can place the shortcode [dt_sc_privacy_google_tracking] somewhere on your site', 'diaz')
	  ),

   ),
);

// -----------------------------------------
// Privacy & Cookie Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'privacy_options',
  'title'       => esc_html__('Privacy and Cookies', 'diaz'),
  'icon'        => 'fa fa-low-vision',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Privacy Policy", 'diaz' ),
	  ),

	  array(
		'type'    => 'notice',
		'class'   => 'warning',
		'content' => esc_html__('In case you deal with any EU customers/visitors these options allow you to make your site GDPR compliant.', 'diaz')
	  ),

	  array(
		'id'      => 'privacy-commentform',
		'type'    => 'checkbox',
		'title'   => esc_html__('Append a privacy policy message to your comment form?', 'diaz'),
		'label'   => esc_html__('Check to append a message to the comment form for unregistered users. Commenting without consent is no longer possible', 'diaz')
	  ),

	  array(
		'id'  	  => 'privacy-commentform-msg',
		'type'    => 'textarea',
		'title'   => esc_html__('Message below comment form', 'diaz'),
		'info'	  => esc_html__('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'diaz'),
		'default' => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'diaz'),
		'dependency' => array( 'privacy-commentform', '==', 'true' )
	  ),

	  array(
		'id'      => 'privacy-subscribeform',
		'type'    => 'checkbox',
		'title'   => esc_html__('Append a privacy policy message to mailchimp contact forms?', 'diaz'),
		'label'   => esc_html__('Check to append a message to all of your mailchimp forms.', 'diaz')
	  ),

	  array(
		'id'  	  => 'privacy-subscribeform-msg',
		'type'    => 'textarea',
		'title'   => esc_html__('Message below mailchimp subscription forms', 'diaz'),
		'info'	  => esc_html__('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'diaz'),
		'default' => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'diaz'),
		'dependency' => array( 'privacy-subscribeform', '==', 'true' )
	  ),

	  array(
		'id'      => 'privacy-loginform',
		'type'    => 'checkbox',
		'title'   => esc_html__('Append a privacy policy message to your login forms?', 'diaz'),
		'label'   => esc_html__('Check to append a message to the default login and registrations forms.', 'diaz')
	  ),

	  array(
		'id'  	  => 'privacy-loginform-msg',
		'type'    => 'textarea',
		'title'   => esc_html__('Message below login forms', 'diaz'),
		'info'	  => esc_html__('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'diaz'),
		'default' => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'diaz'),
		'dependency' => array( 'privacy-loginform', '==', 'true' )
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Cookie Consent Message", 'diaz' ),
	  ),

	  array(
		'type'    => 'notice',
		'class'   => 'warning',
		'content' => __("Make your site comply with the <a target='_blank' href='http://ec.europa.eu/ipg/basics/legal/cookies/index_en.htm'>EU cookie law</a> by informing users that your site uses cookies. <br><br> You can also use the field to display a one time message not related to cookies if you are using a plugin for this purpose or do not need to inform your customers about the use of cookies.",'diaz'),
	  ),

	  array(
		'id'      => 'enable-cookie-consent',
		'type'    => 'checkbox',
		'title'   => esc_html__('Cookie Message Bar', 'diaz'),
		'label'   => esc_html__('Enable cookie consent message bar', 'diaz'),
	  ),

	  array(
		'id'  	  => 'cookie-consent-msg',
		'type'    => 'textarea',
		'title'   => esc_html__('Message', 'diaz'),
		'info'	  => esc_html__('Provide a message which indicates that your site uses cookies.', 'diaz'),
		'default' => esc_html__('This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies.', 'diaz'),
		'dependency' => array( 'enable-cookie-consent', '==', 'true' )
	  ),

	  array(
		'id'           => 'cookie-bar-position',
		'type'         => 'select',
		'title'        => esc_html__('Message Bar Position', 'diaz'),
		'options'      => array(
		  'top' 	     => esc_html__('Top', 'diaz'),
		  'bottom'       => esc_html__('Bottom', 'diaz'),
		  'top-left' 	 => esc_html__('Top Left Corner', 'diaz'),
		  'top-right' 	 => esc_html__('Top Right Corner', 'diaz'),
		  'bottom-left'	 => esc_html__('Bottom Left Corner', 'diaz'),
		  'bottom-right' => esc_html__('Bottom Right Corner', 'diaz'),
		),
		'class'        => 'chosen',
		'default' 	   => 'bottom',
		'dependency'   => array( 'enable-cookie-consent', '==', 'true' ),
		'info'         => esc_html__('Where on the page should the message bar appear?', 'diaz')
	  ),

	  array(
		'type'         => 'subheading',
		'content'      => esc_html__( "Buttons", 'diaz' ),
		'dependency'   => array( 'enable-cookie-consent', '==', 'true' ),
	  ),

	  array(
		'id'              => 'cookie-bar-buttons',
		'type'            => 'group',
		'title'           => esc_html__('Buttons', 'diaz'),
		'desc'            => esc_html__('You can create any number of buttons/links for your message bar here:', 'diaz'),
		'button_title'    => esc_html__('Add New Button', 'diaz'),
		'accordion_title' => esc_html__('Adding New Button', 'diaz'),
		'dependency'      => array( 'enable-cookie-consent', '==', 'true' ),
		'fields'          => array(
		  array(
			'id'          => 'cookie-bar-button-label',
			'type'        => 'text',
			'title'       => esc_html__('Button Label', 'diaz')
		  ),
		  array(
			'id'           => 'cookie-button-action',
			'type'         => 'select',
			'title'        => esc_html__('Button Action', 'diaz'),
			'options'      => array(
			  '' 	       => esc_html__('Dismiss the notification', 'diaz'),
			  'link'       => esc_html__('Link to another page', 'diaz'),
			  'info_modal' => esc_html__('Open info modal on privacy and cookies', 'diaz')
			),
			'class'        => 'chosen',
			'default' 	   => ''
		  ),
		  array(
			'id'         => 'cookie-bar-button-link',
			'type'       => 'text',
			'title'      => esc_html__('Button Link', 'diaz'),
			'dependency' => array( 'cookie-button-action', '==', 'link' )
		  ),
		)
	  ),

	  array(
		'type'       => 'subheading',
		'content'    => esc_html__( "Modal Window with privacy and cookie info", 'diaz' ),
		'dependency' => array( 'enable-cookie-consent', '==', 'true' ),
	  ),

	  array(
		'id'         => 'enable-custom-model-content',
		'type'       => 'checkbox',
		'title'		 => esc_html__('Model Window Custom Content', 'diaz'),
		'label'      => esc_html__('Instead of displaying the default content set custom content yourself', 'diaz'),
		'dependency' => array( 'enable-cookie-consent', '==', 'true' )
	  ),

	  array(
		'id'         => 'custom-model-heading',
		'type'       => 'text',
		'title'      => esc_html__('Main Heading', 'diaz'),
		'default'    => esc_html__('Cookie and Privacy Settings', 'diaz'),
		'dependency' => array( 'enable-custom-model-content', '==', 'true' )
	  ),

	  array(
		'id'              => 'custom-model-tabs',
		'type'            => 'group',
		'title'           => esc_html__('Model Window Tabs', 'diaz'),
		'desc'            => esc_html__('You can create any number of tabs for your model window here:', 'diaz'),
		'button_title'    => esc_html__('Add New Tab', 'diaz'),
		'accordion_title' => esc_html__('Adding New Tab', 'diaz'),
		'dependency'      => array( 'enable-custom-model-content', '==', 'true' ),
		'fields'          => array(
		  array(
			'id'          => 'label',
			'type'        => 'text',
			'title'       => esc_html__('Tab Label', 'diaz')
		  ),
		  array(
			'id'  	 	  => 'content',
			'type'    	  => 'textarea',
			'title'  	  => esc_html__('Tab Content', 'diaz'),
		  ),
		)
	  ),

   ),
);

// ------------------------------
// backup                       
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => esc_html__('Backup', 'diaz'),
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'diaz')
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

// ------------------------------
// license
// ------------------------------
$options[]   = array(
  'name'     => 'theme_version',
  'title'    => constant('DIAZ_THEME_NAME').esc_html__(' Log', 'diaz'),
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => constant('DIAZ_THEME_NAME').esc_html__(' Theme Change Log', 'diaz')
    ),
    array(
      'type'    => 'content',
			'content' => '<pre>
2019.07.25- version 1.7

* Compatible with wordpress 5.2.2
* Updated: All premium plugins
* Updated: Revisions added to all custom post types
* Updated: Gutenberg editor support for custom post types
* Updated: Link for phone number module
* Updated: Online documentation link, check readme file

* Fixed: Customizer logo option
* Fixed: Google Analytics issue
* Fixed: Mailchimp email client issue
* Fixed: Gutenberg check for old wordpress version
* Fixed: Edit with Visual Composer for portfolio
* Fixed: Header & Footer wpml option
* Fixed: Site title color
* Fixed: Privacy popup bg color
* Fixed: 404 page scrolling issue

* Improved: Single product breadcrumb section
* Improved: Tags taxonomy added for portfolio
* Improved: Woocommerce cart module added with custom class option

2019.05.20 - version 1.6
* Gutenberg Latest fixes
* Updated Visual Composer and Layerslider plugins
			
2019.05.10 - version 1.5
 * Gutenberg Latest update compatible
 * Portfolio Video option
 * Coming Soon page fix
 * Portfolio archive page breadcrumb fix
 * Mega menu image fix
 * GDPR product single page fix
 * Codestar framework update
 * Wpml xml file updated
 * disable options for likes and views in single post page
 * Updated latest version of all third party plugins

2019.02.05 - version 1.4
 * Gutenberg compatible
 * Latest WordPress version 5.0.3 compatible
 * Updated latest version of all third party plugins
 * Some design tweaks
       
2018.11.09 - version 1.3
 * Gutenberg plugin compatible
 * Latest wordpress version 4.9.8 compatible
 * Updated latest version of all third party plugins
 * Updated documentation
 
2018.07.27 - version 1.2
 * GDPR Compliant update in comment form, mailchimp form etc.
 * Packed with - Layer Slider 6.7.6
 * Packed with - Revolution Slider 5.4.8
 * Packed with - WPBakery Page Builder 5.5.2
 * Packed with - Ultimate Addons for Visual Composer 3.16.24
 * Packed with - Envato Market 2.0.0
 * Fix - Option for change the site title color
 * Fix - Add target attribute for social media
 * Fix - Bulk plugins install issue
 * Fix - Unyson Page Builder Conflict
 * Fix - Twitter feeds links issue
 * Fix - Iphone sidebar issue
 * Fix - Buddypress issue
 * Fix - Youtube and Vimeo video issue in https
 * Updated designthemes core features plugin
 * Updated language files

2017.12.29 - version 1.1
 * Optimized Dummy Content Updated

2017.12.25 - version 1.0
 * First release!  </pre>',
    ),

  )
);

// ------------------------------
// Seperator
// ------------------------------
$options[] = array(
  'name'   => 'seperator_1',
  'title'  => esc_html__('Plugin Options', 'diaz'),
  'icon'   => 'fa fa-plug'
);


CSFramework::instance( $settings, $options );