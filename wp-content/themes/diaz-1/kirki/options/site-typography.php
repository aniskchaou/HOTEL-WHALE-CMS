<?php
$config = diaz_kirki_config();

# Breadcrumb Settings
DIAZ_Kirki::add_section( 'dt_site_breadcrumb_section', array(
	'title' => __( 'Breadcrumb', 'diaz' ),
	'panel' => 'dt_site_typography_panel',
	'priority' => 5
) );

	# customize-breadcrumb-title-typo
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'customize-breadcrumb-title-typo',
		'label'    => __( 'Customize Title ?', 'diaz' ),
		'section'  => 'dt_site_breadcrumb_section',
		'default'  => diaz_defaults('customize-breadcrumb-title-typo'),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)			
	));
	
	# breadcrumb-title-typo
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'typography',
		'settings' => 'breadcrumb-title-typo',
		'label'    => __( 'Title Typography', 'diaz' ),
		'section'  => 'dt_site_breadcrumb_section',
		'output' => array(
			array( 'element' => '.main-title-section h1, h1.simple-title' )
		),
		'default' => diaz_defaults( 'breadcrumb-title-typo' ),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),		
		'active_callback' => array(
			array( 'setting' => 'customize-breadcrumb-title-typo', 'operator' => '==', 'value' => '1' )
		)		
	));		
	
	# customize-breadcrumb-typo
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'customize-breadcrumb-typo',
		'label'    => __( 'Customize Link ?', 'diaz' ),
		'section'  => 'dt_site_breadcrumb_section',
		'default'  => diaz_defaults('customize-breadcrumb-typo'),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)			
	));
	
	# breadcrumb-typo
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'typography',
		'settings' => 'breadcrumb-typo',
		'label'    => __( 'Link Typography', 'diaz' ),
		'section'  => 'dt_site_breadcrumb_section',
		'output' => array(
			array( 'element' => 'div.breadcrumb a' )
		),
		'default' => diaz_defaults( 'breadcrumb-typo' ),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),
		'active_callback' => array(
			array( 'setting' => 'customize-breadcrumb-typo', 'operator' => '==', 'value' => '1' )
		)		
	));
# Breadcrumb Settings

# Body Content
DIAZ_Kirki::add_section( 'dt_body_content_typo_section', array(
	'title' => __( 'Body', 'diaz' ),
	'panel' => 'dt_site_typography_panel',
	'priority' => 15
) );

	# customize-body-content-typo
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'customize-body-content-typo',
		'label'    => __( 'Customize Content Typo', 'diaz' ),
		'section'  => 'dt_body_content_typo_section',
		'default'  => diaz_defaults( 'customize-body-content-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)
	));

	# body-content-typo
	DIAZ_Kirki::add_field( $config ,array(
		'type' => 'typography',
		'settings' => 'body-content-typo',
		'label'    => __('Settings', 'diaz'),
		'section'  => 'dt_body_content_typo_section',
		'output' => array( 
			array( 'element' => 'body:not(.block-editor-page):not(.wp-core-ui), body:not(.block-editor-page):not(.wp-core-ui) pre' ),
			array(
				'element'  => '.editor-block-list__block, .editor-styles-wrapper .editor-rich-text p[role="textbox"],  .wp-block-code, .wp-block-preformatted pre, pre',
				'context'  => array( 'editor' ),
			),
		),
		'default' => diaz_defaults('body-content-typo'),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),
		'active_callback' => array(
			array( 'setting' => 'customize-body-content-typo', 'operator' => '==', 'value' => '1' )
		)
	));	

# Heading
DIAZ_Kirki::add_section( 'dt_headings_typo_section', array(
	'title' => __( 'Headings', 'diaz' ),
	'panel' => 'dt_site_typography_panel',
	'priority' => 20
) );

	# H1
	# customize-body-h1-typo
	DIAZ_Kirki::add_field( 'diaz_kirki_config', array(
		'type'     => 'switch',
		'settings' => 'customize-body-h1-typo',
		'label'    => __( 'Customize H1 Tag', 'diaz' ),
		'section'  => 'dt_headings_typo_section',
		'default'  => diaz_defaults( 'customize-body-h1-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)
	));

	# h1 tag typography	
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type' => 'typography',
		'settings' => 'h1',
		'label'    =>__('H1 Tag Settings', 'diaz'),
		'section'  => 'dt_headings_typo_section',
		'output' => array( 
			array( 'element' => 'h1' ),
			array(
				'element'  => '.wp-block-heading h1, .editor-styles-wrapper .editor-post-title__block .editor-post-title__input',
				'context'  => array( 'editor' ),
			),
		),
		'default' => diaz_defaults('h1'),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),					
		'active_callback' => array(
			array( 'setting' => 'customize-body-h1-typo', 'operator' => '==', 'value' => '1' )
		)
	));

	# H1 Divider
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type'=> 'custom',
		'settings' => 'customize-body-h1-typo-divider',
		'section'  => 'dt_headings_typo_section',
		'default'  => '<div class="customize-control-divider"></div>'
	));

	# H2
	# customize-body-h2-typo
	DIAZ_Kirki::add_field( 'diaz_kirki_config', array(
		'type'     => 'switch',
		'settings' => 'customize-body-h2-typo',
		'label'    => __( 'Customize H2 Tag', 'diaz' ),
		'section'  => 'dt_headings_typo_section',
		'default'  => diaz_defaults( 'customize-body-h2-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)
	));

	# h2 tag typography	
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type' => 'typography',
		'settings' => 'h2',
		'label'    =>__('H2 Tag Settings', 'diaz'),
		'section'  => 'dt_headings_typo_section',
		'output' => array( 
			array( 'element' => 'h2' ),
			array(
				'element'  => '.wp-block-heading h2',
				'context'  => array( 'editor' ),
			),
		),
		'default' => diaz_defaults('h2'),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),									
		'active_callback' => array(
			array( 'setting' => 'customize-body-h2-typo', 'operator' => '==', 'value' => '1' )
		)
	));

	# H2 Divider
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type'=> 'custom',
		'settings' => 'customize-body-h2-typo-divider',
		'section'  => 'dt_headings_typo_section',
		'default'  => '<div class="customize-control-divider"></div>'
	));

	# H3
	# customize-body-h3-typo
	DIAZ_Kirki::add_field( 'diaz_kirki_config', array(
		'type'     => 'switch',
		'settings' => 'customize-body-h3-typo',
		'label'    => __( 'Customize H3 Tag', 'diaz' ),
		'section'  => 'dt_headings_typo_section',
		'default'  => diaz_defaults( 'customize-body-h3-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)
	));

	# h3 tag typography	
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type' => 'typography',
		'settings' => 'h3',
		'label'    =>__('H3 Tag Settings', 'diaz'),
		'section'  => 'dt_headings_typo_section',
		'output' => array( 
			array( 'element' => 'h3' ),
			array(
				'element'  => '.wp-block-heading h3',
				'context'  => array( 'editor' ),
			),
		),
		'default' => diaz_defaults('h3'),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),									
		'active_callback' => array(
			array( 'setting' => 'customize-body-h3-typo', 'operator' => '==', 'value' => '1' )
		)
	));

	# H3 Divider
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type'=> 'custom',
		'settings' => 'customize-body-h3-typo-divider',
		'section'  => 'dt_headings_typo_section',
		'default'  => '<div class="customize-control-divider"></div>'
	));

	# H4
	# customize-body-h4-typo
	DIAZ_Kirki::add_field( 'diaz_kirki_config', array(
		'type'     => 'switch',
		'settings' => 'customize-body-h4-typo',
		'label'    => __( 'Customize H4 Tag', 'diaz' ),
		'section'  => 'dt_headings_typo_section',
		'default'  => diaz_defaults( 'customize-body-h4-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)
	));

	# h4 tag typography	
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type' => 'typography',
		'settings' => 'h4',
		'label'    =>__('H4 Tag Settings', 'diaz'),
		'section'  => 'dt_headings_typo_section',
		'output' => array( 
			array( 'element' => 'h4' ),
			array(
				'element'  => '.wp-block-heading h4',
				'context'  => array( 'editor' ),
			),
		),
		'default' => diaz_defaults('h4'),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),									
		'active_callback' => array(
			array( 'setting' => 'customize-body-h4-typo', 'operator' => '==', 'value' => '1' )
		)
	));

	# H4 Divider
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type'=> 'custom',
		'settings' => 'customize-body-h4-typo-divider',
		'section'  => 'dt_headings_typo_section',
		'default'  => '<div class="customize-control-divider"></div>'
	));

	# H5
	# customize-body-h5-typo
	DIAZ_Kirki::add_field( 'diaz_kirki_config', array(
		'type'     => 'switch',
		'settings' => 'customize-body-h5-typo',
		'label'    => __( 'Customize H5 Tag', 'diaz' ),
		'section'  => 'dt_headings_typo_section',
		'default'  => diaz_defaults( 'customize-body-h5-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)
	));

	# h5 tag typography	
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type' => 'typography',
		'settings' => 'h5',
		'label'    =>__('H5 Tag Settings', 'diaz'),
		'section'  => 'dt_headings_typo_section',
		'output' => array( 
			array( 'element' => 'h5' ),
			array(
				'element'  => '.wp-block-heading h5',
				'context'  => array( 'editor' ),
			),
		),
		'default' => diaz_defaults('h5'),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),									
		'active_callback' => array(
			array( 'setting' => 'customize-body-h5-typo', 'operator' => '==', 'value' => '1' )
		)
	));

	# H5 Divider
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type'=> 'custom',
		'settings' => 'customize-body-h5-typo-divider',
		'section'  => 'dt_headings_typo_section',
		'default'  => '<div class="customize-control-divider"></div>'
	));

	# H6
	# customize-body-h6-typo
	DIAZ_Kirki::add_field( 'diaz_kirki_config', array(
		'type'     => 'switch',
		'settings' => 'customize-body-h6-typo',
		'label'    => __( 'Customize H6 Tag', 'diaz' ),
		'section'  => 'dt_headings_typo_section',
		'default'  => diaz_defaults( 'customize-body-h6-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)
	));

	# h6 tag typography	
	DIAZ_Kirki::add_field( 'diaz_kirki_config' ,array(
		'type' => 'typography',
		'settings' => 'h6',
		'label'    =>__('H6 Tag Settings', 'diaz'),
		'section'  => 'dt_headings_typo_section',
		'output' => array( 
			array( 'element' => 'h6' ),
			array(
				'element'  => '.wp-block-heading h6',
				'context'  => array( 'editor' ),
			),
		),
		'default' => diaz_defaults('h6'),
		'choices'  => array(
			'variant' => array(
				'100',
				'100italic',
				'200',
				'200italic',
				'300',
				'300italic',
				'regular',
				'italic',
				'500',
				'500italic',
				'600',
				'600italic',
				'700',
				'700italic',
				'800',
				'800italic',
				'900',
				'900italic'
			),
		),									
		'active_callback' => array(
			array( 'setting' => 'customize-body-h6-typo', 'operator' => '==', 'value' => '1' )
		)
	));
	
# Footer Typography
	DIAZ_Kirki::add_section( 'dt_footer_typo', array(
		'title'	=> __( 'Footer', 'diaz' ),
		'panel' => 'dt_site_typography_panel',
		'priority' => 100,
	) );

		# customize-footer-title-typo
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-footer-title-typo',
			'label'    => __( 'Customize Title ?', 'diaz' ),
			'section'  => 'dt_footer_typo',
			'default'  => diaz_defaults('customize-footer-title-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'diaz' ),
				'off' => esc_attr__( 'No', 'diaz' )
			),
		));

		# footer-title-typo
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'footer-title-typo',
			'label'    => __( 'Title Typography', 'diaz' ),
			'section'  => 'dt_footer_typo',
			'output' => array(
				array( 'element' => 'div.footer-widgets h3.widgettitle' )
			),
			'default' => diaz_defaults( 'footer-title-typo' ),
			'active_callback' => array(
				array( 'setting' => 'customize-footer-title-typo', 'operator' => '==', 'value' => '1' )
			)		
		));

		# Divider
		DIAZ_Kirki::add_field( $config ,array(
			'type'=> 'custom',
			'settings' => 'footer-title-typo-divider',
			'section'  => 'dt_footer_typo',
			'default'  => '<div class="customize-control-divider"></div>',
			'active_callback' => array(
				array( 'setting' => 'customize-footer-title-typo', 'operator' => '==', 'value' => '1' )
			)			
		));

		# customize-footer-content-typo
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-footer-content-typo',
			'label'    => __( 'Customize Content ?', 'diaz' ),
			'section'  => 'dt_footer_typo',
			'default'  => diaz_defaults('customize-footer-content-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'diaz' ),
				'off' => esc_attr__( 'No', 'diaz' )
			),
		));

		# footer-content-typo
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'footer-content-typo',
			'label'    => __( 'Content Typography', 'diaz' ),
			'section'  => 'dt_footer_typo',
			'output' => array(
				array( 'element' => 'div.footer-widgets .widget' )
			),
			'default' => diaz_defaults( 'footer-content-typo' ),
			'active_callback' => array(
				array( 'setting' => 'customize-footer-content-typo', 'operator' => '==', 'value' => '1' )
			)		
		));

		# footer-content-a-color		
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'color',
			'settings' => 'footer-content-a-color',
			'label'    => __( 'Anchor Color', 'diaz' ),
			'section'  => 'dt_footer_typo',
			'choices' => array( 'alpha' => true ),
			'output' => array(
				array( 'element' => '.footer-widgets a, #footer a' )
			),
			'default' => diaz_defaults( 'footer-content-a-color' ),
			'active_callback' => array(
				array( 'setting' => 'customize-footer-content-typo', 'operator' => '==', 'value' => '1' )
			)		
		));

		# footer-content-a-hover-color
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'color',
			'settings' => 'footer-content-a-hover-color',
			'label'    => __( 'Anchor Hover Color', 'diaz' ),
			'section'  => 'dt_footer_typo',
			'choices' => array( 'alpha' => true ),			
			'output' => array(
				array( 'element' => '.footer-widgets a:hover, #footer a:hover' )
			),
			'default' => diaz_defaults( 'footer-content-a-hover-color' ),
			'active_callback' => array(
				array( 'setting' => 'customize-footer-content-typo', 'operator' => '==', 'value' => '1' )
			)
		));

# Others Typography
	DIAZ_Kirki::add_section( 'dt_others_typo', array(
		'title'	=> __( 'Others', 'diaz' ),
		'panel' => 'dt_site_typography_panel',
		'priority' => 100,
	) );

		# customize-other-elements-typo
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-other-elements-typo',
			'label'    => __( 'Customize Misc Elements ?', 'diaz' ),
			'section'  => 'dt_others_typo',
			'default'  => diaz_defaults('customize-other-elements-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'diaz' ),
				'off' => esc_attr__( 'No', 'diaz' )
			),
		));

		# other-elements-typo
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'other-elements-typo',
			'label'    => __( 'Misc Elements Typography', 'diaz' ),
			'section'  => 'dt_others_typo',
			'output' => array(
				array( 'element' => '.dt-sc-icon-box.type11 .dt-sc-icon-content h5, .hb_single_room .hb_single_room_details .hb_single_room_tabs > li a .comment-count, .dt-sc-pr-tb-col .dt-sc-price h6, .dt-sc-pr-tb-col.type2 .dt-sc-tb-title h5, input[type="text"], input[type="password"], input[type="email"], input[type="url"], input[type="tel"], input[type="number"], input[type="range"], input[type="date"], textarea, input.text, input[type="search"], select, textarea, .dt-sc-counter.type1 .dt-sc-counter-number, .dt-sc-images-wrapper .carousel-arrows #pagenumber, .dt-sc-icon-box.type13 .dt-sc-icon-content h4, .dt-sc-progress .dt-sc-bar-text > span' )
			),
			'default' => diaz_defaults( 'other-elements-typo' ),
			'active_callback' => array(
				array( 'setting' => 'customize-other-elements-typo', 'operator' => '==', 'value' => '1' )
			)		
		));