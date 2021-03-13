<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

// -----------------------------------------
// Custom Widgets                    -
// -----------------------------------------
function diaz_custom_widgets() {
  $custom_widgets = array();
  $widgets = is_array( cs_get_option( 'widgetarea-custom' ) ) ? cs_get_option( 'widgetarea-custom' ) : array();
  $widgets = array_filter($widgets);

  if( isset( $widgets ) ):
    foreach ( $widgets as $widget ) :
      $id = mb_convert_case($widget['widgetarea-custom-name'], MB_CASE_LOWER, "UTF-8");
      $id = str_replace(" ", "-", $id);
      $custom_widgets[$id] = $widget['widgetarea-custom-name'];
    endforeach;
  endif;

  return $custom_widgets;
}

// -----------------------------------------
// Layer Sliders
// -----------------------------------------
function diaz_layersliders() {
  $layerslider = array(  esc_html__('Select a slider','diaz') );

  if( diaz_is_plugin_active('LayerSlider/layerslider.php') ) {

    $sliders = LS_Sliders::find(array('limit' => 50));

    if(!empty($sliders)) {
      foreach($sliders as $key => $item){
        $layerslider[ $item['id'] ] = $item['name'];
      }
    }
  }

  return $layerslider;
}

// -----------------------------------------
// Revolution Sliders
// -----------------------------------------
function diaz_revolutionsliders() {
  $revolutionslider = array( '' => esc_html__('Select a slider','diaz') );

  if(diaz_is_plugin_active('revslider/revslider.php')) {
    $sld = new RevSliderSlider();
    $sliders = $sld->getArrSliders();
    if(!empty($sliders)){
      foreach($sliders as $key => $item) {
        $revolutionslider[$item->getAlias()] = $item->getTitle();
      }
    }    
  }

  return $revolutionslider;  
}

// -----------------------------------------
// Meta Layout Section
// -----------------------------------------
$meta_layout_section =array(
  'name'  => 'layout_section',
  'title' => esc_html__('Layout', 'diaz'),
  'icon'  => 'fa fa-columns',
  'fields' =>  array(
    array(
      'id'  => 'layout',
      'type' => 'image_select',
      'title' => esc_html__('Page Layout', 'diaz' ),
      'options'      => array(
          'content-full-width'   => DIAZ_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
          'with-left-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
          'with-right-sidebar'   => DIAZ_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
          'with-both-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
          'fullwidth'            => DIAZ_THEME_URI . '/cs-framework-override/images/fullwidth.png',
      ),
      'default'      => 'content-full-width',
	  'info'		 => esc_html__('Layout "fullwidth" only apply for portfolio template.', 'diaz'),
      'attributes'   => array( 'data-depend-id' => 'page-layout' )
    ),
    array(
      'id'        => 'show-standard-sidebar-left',
      'type'      => 'switcher',
      'title'     => esc_html__('Show Standard Left Sidebar', 'diaz' ),
      'dependency'  => array( 'page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
    ),
    array(
      'id'        => 'widget-area-left',
      'type'      => 'select',
      'title'     => esc_html__('Choose Left Widget Areas', 'diaz' ),
      'class'     => 'chosen',
      'options'   => diaz_custom_widgets(),
      'attributes'  => array( 
        'multiple'  => 'multiple',
        'data-placeholder' => esc_html__('Select Left Widget Areas','diaz'),
        'style' => 'width: 400px;'
      ),
      'dependency'  => array( 'page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
    ),
    array(
      'id'          => 'show-standard-sidebar-right',
      'type'        => 'switcher',
      'title'       => esc_html__('Show Standard Right Sidebar', 'diaz' ),
      'dependency'  => array( 'page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
    ),
    array(
      'id'        => 'widget-area-right',
      'type'      => 'select',
      'title'     => esc_html__('Choose Right Widget Areas', 'diaz' ),
      'class'     => 'chosen',
      'options'   => diaz_custom_widgets(),
      'attributes'    => array( 
        'multiple' => 'multiple',
        'data-placeholder' => esc_html__('Select Right Widget Areas','diaz'),
        'style' => 'width: 400px;'
      ),
      'dependency'  => array( 'page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
    )
  )
);

// -----------------------------------------
// Meta Breadcrumb Section
// -----------------------------------------
$meta_breadcrumb_section = array(
  'name'  => 'breadcrumb_section',
  'title' => esc_html__('Breadcrumb', 'diaz'),
  'icon'  => 'fa fa-arrows-h',
  'fields' =>  array(
    array(
      'id'      => 'enable-sub-title',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Breadcrumb', 'diaz' ),
      'default' => true
    ),
    array(
    	'id'                 => 'breadcrumb_position',
	'type'               => 'select',
      'title'              => esc_html__('Position', 'diaz' ),
      'options'            => array(
        'header-top-absolute'    => esc_html__('Behind the Header','diaz'),
        'header-top-relative' 	   => esc_html__('Default','diaz'),
		),
		'default'            => 'header-top-relative',	
      'dependency'         => array( 'enable-sub-title', '==', 'true' ),
    ),    
    array(
      'id'    => 'breadcrumb_background',
      'type'  => 'background',
      'title' => esc_html__('Background', 'diaz' ),
      'dependency'   => array( 'enable-sub-title', '==', 'true' ),
    ),
  )
);

// -----------------------------------------
// Meta Slider Section
// -----------------------------------------
$meta_slider_section = array(
  'name'  => 'slider_section',
  'title' => esc_html__('Slider', 'diaz'),
  'icon'  => 'fa fa-slideshare',
  'fields' =>  array(
    array(
      'id'           => 'slider-notice',
      'type'         => 'notice',
      'class'        => 'danger',
      'content'      => __('Slider tab works only if breadcrumb disabled.','diaz'),
      'class'        => 'margin-30 cs-danger',
      'dependency'   => array( 'enable-sub-title', '==', 'true' ),
    ),

    array(
      'id'           => 'show_slider',
      'type'         => 'switcher',
      'title'        => esc_html__('Show Slider', 'diaz' ),
      'dependency'   => array( 'enable-sub-title', '==', 'false' ),
    ),
    array(
    	'id'                 => 'slider_position',
	'type'               => 'select',
	'title'              => esc_html__('Position', 'diaz' ),
	'options'            => array(
		'header-top-relative'     => esc_html__('Top Header Relative','diaz'),
		'header-top-absolute'    => esc_html__('Top Header Absolute','diaz'),
		'bottom-header' 	   => esc_html__('Bottom Header','diaz'),
	),
	'default'            => 'bottom-header',
	'dependency'         => array( 'enable-sub-title|show_slider', '==|==', 'false|true' ),
   ),
   array(
      'id'                 => 'slider_type',
      'type'               => 'select',
      'title'              => esc_html__('Slider', 'diaz' ),
      'options'            => array(
        ''                 => esc_html__('Select a slider','diaz'),
        'layerslider'      => esc_html__('Layer slider','diaz'),
        'revolutionslider' => esc_html__('Revolution slider','diaz'),
        'customslider'     => esc_html__('Custom Slider Shortcode','diaz'),
      ),
      'validate' => 'required',
      'dependency'         => array( 'enable-sub-title|show_slider', '==|==', 'false|true' ),
    ),

    array(
      'id'          => 'layerslider_id',
      'type'        => 'select',
      'title'       => esc_html__('Layer Slider', 'diaz' ),
      'options'     => diaz_layersliders(),
      'validate'    => 'required',
      'dependency'  => array( 'enable-sub-title|show_slider|slider_type', '==|==|==', 'false|true|layerslider' )
    ),

    array(
      'id'          => 'revolutionslider_id',
      'type'        => 'select',
      'title'       => esc_html__('Revolution Slider', 'diaz' ),
      'options'     => diaz_revolutionsliders(),
      'validate'    => 'required',
      'dependency'  => array( 'enable-sub-title|show_slider|slider_type', '==|==|==', 'false|true|revolutionslider' )
    ),

    array(
      'id'          => 'customslider_sc',
      'type'        => 'textarea',
      'title'       => esc_html__('Custom Slider Code', 'diaz' ),
      'validate'    => 'required',
      'dependency'  => array( 'enable-sub-title|show_slider|slider_type', '==|==|==', 'false|true|customslider' )
    ),
  )  
);

// -----------------------------------------
// Blog Template Section
// -----------------------------------------
$blog_template_section = array(
  'name'  => 'blog_template_section',
  'title' => esc_html__('Blog Template', 'diaz'),
  'icon'  => 'fa fa-files-o',
  'fields' =>  array(
    array(
      'id'           => 'blog-tpl-notice',
      'type'         => 'notice',
      'class'        => 'success',
      'content'      => __('Blog Tab Works only if page template set to Blog Template in Page Attributes','diaz'),
      'class'        => 'margin-30 cs-success',      
    ),
    array(
      'id'                     => 'blog-post-layout',
      'type'                   => 'image_select',
      'title'                  => esc_html__('Post Layout', 'diaz' ),
      'options'                => array(
          'one-column'         => DIAZ_THEME_URI . '/cs-framework-override/images/one-column.png',
          'one-half-column'    => DIAZ_THEME_URI . '/cs-framework-override/images/one-half-column.png',
          'one-third-column'   => DIAZ_THEME_URI . '/cs-framework-override/images/one-third-column.png',
		  '1-2-2'			   => DIAZ_THEME_URI . '/cs-framework-override/images/1-2-2.png',
		  '1-2-2-1-2-2' 	   => DIAZ_THEME_URI . '/cs-framework-override/images/1-2-2-1-2-2.png',
		  '1-3-3-3'			   => DIAZ_THEME_URI . '/cs-framework-override/images/1-3-3-3.png',
		  '1-3-3-3-1' 		   => DIAZ_THEME_URI . '/cs-framework-override/images/1-3-3-3-1.png',
      ),
      'default'                => 'one-half-column'
    ),
    array(
      'id'                     => 'blog-post-style',
      'type'                   => 'select',
      'title'                  => esc_html__('Post Style', 'diaz' ),
      'options'                => array(
        'blog-default-style' => esc_html__('Default','diaz'),
        'entry-date-left'    => esc_html__('Date Left','diaz'),
        'entry-date-author-left' => esc_html__('Date and Author Left','diaz'),
        'blog-medium-style'  => esc_html__('Medium','diaz'),
        'blog-medium-style dt-blog-medium-highlight' => esc_html__('Medium Highlight','diaz'),
        'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight' => esc_html__('Medium Skin Highlight','diaz')
      ),
    ),
    array(
      'id'      => 'enable-blog-readmore',
      'type'    => 'switcher',
      'title'   => esc_html__('Read More', 'diaz' ),
      'default' => true
    ),
    array(
      'id'           => 'blog-readmore',
      'type'         => 'textarea',
      'title'        => esc_html__('Read More Shortcode', 'diaz' ),
      'default'      => '[dt_sc_button title="Read More" style="bordered" /]',
      'dependency'   => array( 'enable-blog-readmore', '==', 'true' ),
    ),
    array(
      'id'      => 'blog-post-excerpt',
      'type'    => 'switcher',
      'title'   => esc_html__('Allow Excerpt', 'diaz' ),
      'default' => true
    ),
    array(
      'id'           => 'blog-post-excerpt-length',
      'type'         => 'number',
      'title'        => esc_html__('Excerpt Length', 'diaz' ),
      'default'      => '45',
      'dependency'   => array( 'blog-post-excerpt', '==', 'true' ),
    ),
    array(
      'id'           => 'blog-post-per-page',
      'type'         => 'number',
      'title'        => esc_html__('Post Per Page', 'diaz' ),
      'default'      => '-1',      
    ),
    array(
      'id'             => 'blog-post-cats',
      'type'           => 'select',
      'title'          => esc_html__('Categories','diaz'),
      'options'        => 'categories',
      'default_option' => esc_html__('Select a categories','diaz'),
      'class'              => 'chosen',
      'attributes'         => array(
        'multiple'         => 'only-key',
        'style'            => 'width: 200px;'
      ),
      'info'           => esc_html__('Select categories to exclude from your blog page.','diaz'),
    ),
    array(
      'id'      => 'show-postformat-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Format Info', 'diaz' ),
      'default' => true
    ),
    array(
      'id'      => 'show-author-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Author Info', 'diaz' ),
      'default' => true,
    ),
    array(
      'id'      => 'show-date-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Date Info', 'diaz' ),
      'default' => true
    ),
    array(
      'id'      => 'show-comment-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Comment Info', 'diaz' ),
      'default' => true
    ),
    array(
      'id'      => 'show-category-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Category Info', 'diaz' ),
      'default' => true
    ),
    array(
      'id'      => 'show-tag-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Tag Info', 'diaz' ),
      'default' => true
    )    
  )
);

// -----------------------------------------
// Portfolio Template Section
// -----------------------------------------
$portfolio_template_section = array(
  'name'  => 'portfolio_template_section',
  'title' => esc_html__('Portfolio Template', 'diaz'),
  'icon'  => 'fa fa-picture-o',
  'fields' =>  array(

    array(
      'id'           => 'portfolio-tpl-notice',
      'type'         => 'notice',
      'class'        => 'success',
      'content'      => __('Portfolio Tab Works only if page template set to Portfolio Template in Page Attributes','diaz'),
      'class'        => 'margin-30 cs-success',      
    ),

    array(
      'id'                     => 'portfolio-post-layout',
      'type'                   => 'image_select',
      'title'                  => esc_html__('Post Layout', 'diaz' ),
      'options'                => array(
          'one-half-column'    => DIAZ_THEME_URI . '/cs-framework-override/images/one-half-column.png',
          'one-third-column'   => DIAZ_THEME_URI . '/cs-framework-override/images/one-third-column.png',
          'one-fourth-column'  => DIAZ_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
      ),
      'default'                => 'one-half-column'
    ),

    array(
      'id'      => 'portfolio-post-style',
      'type'    => 'select',
      'title'   => esc_html__('Post Style', 'diaz' ),
      'options' => array(
        'type1' => esc_html__('Modern Title','diaz'),
        'type2' => esc_html__('Title & Icons Overlay','diaz'),
        'type3' => esc_html__('Title Overlay','diaz'),
        'type4' => esc_html__('Icons Only','diaz'),
        'type5' => esc_html__('Classic','diaz'),
        'type6' => esc_html__('Minimal Icons','diaz'),
        'type7' => esc_html__('Presentation','diaz'),
        'type8' => esc_html__('Girly','diaz'),
        'type9' => esc_html__('Art','diaz'),
      ),
    ),

    array(
      'id'      => 'portfolio-grid-space',
      'type'    => 'switcher',
      'title'   => esc_html__('Allow Grid Space', 'diaz' ),
      'default' => true,
      'info'    => esc_html__('YES! to allow grid space in between portfolio item','diaz')
    ),

    array(
      'id'      => 'filter',
      'type'    => 'switcher',
      'title'   => esc_html__('Allow Filters', 'diaz' ),
      'default' => true,
      'info'    => esc_html__('YES! to allow filter options for portfolio items','diaz')
    ),

    array(
      'id'           => 'portfolio-post-per-page',
      'type'         => 'number',
      'title'        => esc_html__('Post Per Page', 'diaz' ),
      'default'      => '-1',      
    ),

    array(
      'id'             => 'portfolio-categories',
      'type'           => 'select',
      'title'          => esc_html__('Categories','diaz'),
      'options'        => 'categories',
      'class'          => 'chosen',
      'query_args'     => array(
        'type'         => 'dt_portfolios',
        'taxonomy'     => 'portfolio_entries',
        'orderby'      => 'post_date',
        'order'        => 'DESC',
      ),
      'attributes'         => array(
        'data-placeholder' => esc_html__('Select a categories','diaz'),
        'multiple'         => 'only-key',
        'style'            => 'width: 200px;'
      ),
      'info'           => esc_html__('Select categories to show in portfolio items.','diaz'),
    ),   
  )
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
array_push( $meta_layout_section['fields'], array(
  'id'        => 'enable-sticky-sidebar',
  'type'      => 'switcher',
  'title'     => esc_html__('Enable Sticky Sidebar', 'diaz' ),
  'dependency'  => array( 'page-layout', 'any', 'with-left-sidebar,with-right-sidebar,with-both-sidebar' )
) );

$options[] = array(
	'id'        => '_tpl_default_settings',
    'title'     => esc_html__('Page Settings','diaz'),
    'post_type' => 'page',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
		$meta_layout_section,
		$meta_breadcrumb_section,
		$meta_slider_section,

		$blog_template_section,
		$portfolio_template_section,
		array(
		  'name'  => 'sidenav_template_section',
		  'title' => esc_html__('Side Navigation Template', 'diaz'),
		  'icon'  => 'fa fa-th-list',
		  'fields' =>  array(

			array(
			  'id'           => 'sidenav-tpl-notice',
			  'type'         => 'notice',
			  'class'        => 'success',
			  'content'      => esc_html__('Side Navigation Tab Works only if page template set to Side Navigation Template in Page Attributes','diaz'),
			  'class'        => 'margin-30 cs-success',      
			),

			array(
			  'id'    		 => 'sidenav-align',
			  'type'    	 => 'switcher',
			  'title'   	 => esc_html__('Align Right', 'diaz' ),
			  'info'    	 => esc_html__('YES! to align right of side navigation.','diaz')
			),

			array(
			  'id'    		 => 'sidenav-sticky',
			  'type'    	 => 'switcher',
			  'title'   	 => esc_html__('Sticky Side Navigation', 'diaz' ),
			  'info'    	 => esc_html__('YES! to sticky side navigation content.','diaz')
			),

			array(
			  'id'    		 => 'enable-sidenav-content',
			  'type'    	 => 'switcher',
			  'title'   	 => esc_html__('Show Content', 'diaz' ),
			  'info'    	 => esc_html__('YES! to show content in below side navigation.','diaz')
			),

			array(
			  'id'	    	 => 'sidenav-content',
			  'type'	     => 'textarea',
			  'title'  		 => esc_html__('Side Navigation Content', 'diaz' ),
			  'info'    	 => esc_html__('Paste any shortcode content here','diaz'),
			  'attributes' 	 => array(
				  'rows'     => 6,
			  ),
			),

		  )
		),
    )
);

// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$post_meta_layout_section = $meta_layout_section;
$fields = $post_meta_layout_section['fields'];

	$fields[0]['title'] =  esc_html__('Post Layout', 'diaz' );
	unset( $fields[0]['options']['with-both-sidebar'] );
	unset( $fields[0]['info'] );
	unset( $fields[0]['options']['fullwidth'] );
	unset( $fields[5] );
	unset( $post_meta_layout_section['fields'] );
	$post_meta_layout_section['fields']  = $fields;  

	$post_format_section = array(
		'name'  => 'post_format_data_section',
		'title' => esc_html__('Post Format', 'diaz'),
		'icon'  => 'fa fa-cog',
		'fields' =>  array(

			array(
				'id'      => 'show-featured-image',
				'type'    => 'switcher',
				'title'   => esc_html__('Show Featured Image', 'diaz' ),
				'default' => true,
				'info'    => esc_html__('YES! to show featured image','diaz')
			),

			array(
				'id'           => 'single-post-style',
				'type'         => 'select',
				'title'        => esc_html__('Post Style', 'diaz'),
				'options'      => array(
				  'standard'      		=> esc_html__('Standard', 'diaz'),
				  'info-within-image'   => esc_html__('Info WithIn Image', 'diaz'),
				  'info-bottom-image'   => esc_html__('Info Over Image Bottom Left', 'diaz'),
				  'info-vertical-image' => esc_html__('Info Over Image Vertically Center', 'diaz'),
				  'info-above-image'    => esc_html__('Info Above Image', 'diaz'),
				),
				'class'        => 'chosen',
				'default'      => 'standard',
				'info'         => esc_html__('Choose post style to display single post.', 'diaz')
			),

			array(
			    'id'           => 'view_count',
			    'type'         => 'text',
			    'title'        => esc_html__('Views', 'diaz' ),
				'info'         => esc_html__('No.of views of this post.', 'diaz')
			),

			array(
			    'id'           => 'like_count',
			    'type'         => 'text',
			    'title'        => esc_html__('Likes', 'diaz' ),
				'info'         => esc_html__('No.of likes of this post.', 'diaz')
			),

			array(
				'id' => 'post-format-type',
				'title'   => esc_html__('Type', 'diaz' ),
				'type' => 'select',
				'default' => 'standard',
				'options' => array(
					'standard'  => esc_html__('Standard', 'diaz'),
					'status'	=> esc_html__('Status','diaz'),
					'quote'		=> esc_html__('Quote','diaz'),
					'gallery'	=> esc_html__('Gallery','diaz'),
					'image'		=> esc_html__('Image','diaz'),
					'video'		=> esc_html__('Video','diaz'),
					'audio'		=> esc_html__('Audio','diaz'),
					'link'		=> esc_html__('Link','diaz'),
					'aside'		=> esc_html__('Aside','diaz'),
					'chat'		=> esc_html__('Chat','diaz')
				)
			),

			array(
				'id' 	  => 'post-gallery-items',
				'type'	  => 'gallery',
				'title'   => esc_html__('Add Images', 'diaz' ),
				'add_title'   => esc_html__('Add Images', 'diaz' ),
				'edit_title'  => esc_html__('Edit Images', 'diaz' ),
				'clear_title' => esc_html__('Remove Images', 'diaz' ),
				'dependency' => array( 'post-format-type', '==', 'gallery' ),
			),

			array(
				'id' 	  => 'media-type',
				'type'	  => 'select',
				'title'   => esc_html__('Select Type', 'diaz' ),
				'dependency' => array( 'post-format-type', 'any', 'video,audio' ),
		      	'options'	=> array(
					'oembed' => esc_html__('Oembed','diaz'),
					'self' => esc_html__('Self Hosted','diaz'),
				)
			),

			array(
				'id' 	  => 'media-url',
				'type'	  => 'textarea',
				'title'   => esc_html__('Media URL', 'diaz' ),
				'dependency' => array( 'post-format-type', 'any', 'video,audio' ),
			),
		)
	);

	$options[] = array(
		'id'        => '_dt_post_settings',
		'title'     => esc_html__('Post Settings','diaz'),
		'post_type' => 'post',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			$post_meta_layout_section,
			$meta_breadcrumb_section,
			$post_format_section			
		)
	);

// -----------------------------------------
// Tribe Events Post Metabox Options
// -----------------------------------------
  array_push( $post_meta_layout_section['fields'], array(
    'id' => 'event-post-style',
    'title'   => esc_html__('Post Style', 'diaz' ),
    'type' => 'select',
    'default' => 'type1',
    'options' => array(
      'type1'  => esc_html__('Classic', 'diaz'),
      'type2'  => esc_html__('Full Width','diaz'),
      'type3'  => esc_html__('Minimal Tab','diaz'),
      'type4'  => esc_html__('Clean','diaz'),
      'type5'  => esc_html__('Modern','diaz'),
    ),
	'class'    => 'chosen',
	'info'     => esc_html__('Your event post page show at most selected style.', 'diaz')
  ) );

  $options[] = array(
    'id'        => '_custom_settings',
    'title'     => esc_html__('Settings','diaz'),
    'post_type' => 'tribe_events',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
      $post_meta_layout_section,
      $meta_breadcrumb_section
    )
  );

// -----------------------------------------
// WP Hotel Booking Room Metabox Options
// -----------------------------------------
if( class_exists ( 'WP_Hotel_Booking' ) ){
  array_pop( $post_meta_layout_section['fields'] );

  $options[] = array(
    'id'        => '_custom_settings',
    'title'     => esc_html__('Custom Room Options','diaz'),
    'post_type' => 'hb_room',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
      $post_meta_layout_section,
      $meta_breadcrumb_section
    )
  );
}

// -----------------------------------------
// Header And Footer Options Metabox
// -----------------------------------------
$post_types = apply_filters( 'diaz_header_footer_default_cpt' , array ( 'post', 'page' )  );
$options[] = array(
	'id'	=> '_dt_custom_settings',
	'title'	=> esc_html('Header & Footer','diaz'),
	'post_type' => $post_types,
	'priority'  => 'high',
	'context'   => 'side', 
	'sections'  => array(
	
		# Header Settings
		array(
			'name'  => 'header_section',
			'title' => esc_html__('Header', 'diaz'),
			'icon'  => 'fa fa-angle-double-right',
			'fields' =>  array(
			
				# Header Show / Hide
				array(
					'id'		=> 'show-header',
					'type'		=> 'switcher',
					'title'		=> esc_html__('Show Header', 'diaz'),
					'default'	=>  true,
				),
				
				# Header
				array(
					'id'  		 => 'header',
					'type'  	 => 'select',
					'title' 	 => esc_html__('Choose Header', 'diaz'),
					'class'		 => 'chosen',
					'options'	 => 'posts',
					'query_args' => array(
						'post_type'	 => 'dt_headers',
						'orderby'	 => 'ID',
						'order'		 => 'ASC',
						'posts_per_page' => -1,
					),
					'default_option' => esc_attr__('Select Header', 'diaz'),
					'attributes' => array( 'style'	=> 'width:50%' ),
					'info'		 => esc_html__('Select custom header for this page.','diaz'),
					'dependency'	=> array( 'show-header', '==', 'true' )
				),							
			)			
		),
		# Header Settings

		# Footer Settings
		array(
			'name'  => 'footer_settings',
			'title' => esc_html__('Footer', 'diaz'),
			'icon'  => 'fa fa-angle-double-right',
			'fields' =>  array(
			
				# Footer Show / Hide
				array(
					'id'		=> 'show-footer',
					'type'		=> 'switcher',
					'title'		=> esc_html__('Show Footer', 'diaz'),
					'default'	=>  true,
				),
				
				# Footer
		        array(
					'id'         => 'footer',
					'type'       => 'select',
					'title'      => esc_html__('Choose Footer', 'diaz'),
					'class'      => 'chosen',
					'options'    => 'posts',
					'query_args' => array(
						'post_type'  => 'dt_footers',
						'orderby'    => 'ID',
						'order'      => 'ASC',
						'posts_per_page' => -1,
					),
					'default_option' => esc_attr__('Select Footer', 'diaz'),
					'attributes' => array( 'style'  => 'width:50%' ),
					'info'       => esc_html__('Select custom footer for this page.','diaz'),
					'dependency'    => array( 'show-footer', '==', 'true' )
				),			
			)			
		),
		# Footer Settings
		
	)	
);



	
CSFramework_Metabox::instance( $options );