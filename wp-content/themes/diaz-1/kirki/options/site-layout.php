<?php
$config = diaz_kirki_config();

DIAZ_Kirki::add_section( 'dt_site_layout_section', array(
	'title' => __( 'Site Layout', 'diaz' ),
	'priority' => 20
) );

	# site-layout
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'radio-image',
		'settings' => 'site-layout',
		'label'    => __( 'Site Layout', 'diaz' ),
		'section'  => 'dt_site_layout_section',
		'default'  => diaz_defaults('site-layout'),
		'choices' => array(
			'boxed' =>  DIAZ_THEME_URI.'/kirki/assets/images/site-layout/boxed.png',
			'wide' => DIAZ_THEME_URI.'/kirki/assets/images/site-layout/wide.png',
		)
	));

	# site-boxed-layout
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'site-boxed-layout',
		'label'    => __( 'Customize Boxed Layout?', 'diaz' ),
		'section'  => 'dt_site_layout_section',
		'default'  => '1',
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		),
		'active_callback' => array(
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
		)			
	));

	# body-bg-type
	DIAZ_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-type',
		'label'    => __( 'Background Type', 'diaz' ),
		'section'  => 'dt_site_layout_section',
		'multiple' => 1,
		'default'  => 'none',
		'choices'  => array(
			'pattern' => esc_attr__( 'Predefined Patterns', 'diaz' ),
			'upload' => esc_attr__( 'Set Pattern', 'diaz' ),
			'none' => esc_attr__( 'None', 'diaz' ),
		),
		'active_callback' => array(
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-pattern
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'radio-image',
		'settings' => 'body-bg-pattern',
		'label'    => __( 'Predefined Patterns', 'diaz' ),
		'description'    => __( 'Add Background for body', 'diaz' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-image' )
		),
		'choices' => array(
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern1.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern1.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern2.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern2.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern3.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern3.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern4.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern4.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern5.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern5.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern6.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern6.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern7.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern7.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern8.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern8.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern9.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern9.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern10.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern10.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern11.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern11.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern12.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern12.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern13.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern13.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern14.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern14.jpg',
			DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern15.jpg'=> DIAZ_THEME_URI.'/kirki/assets/images/site-layout/pattern15.jpg',
		),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => '==', 'value' => 'pattern' ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)						
	));

	# body-bg-image
	DIAZ_Kirki::add_field( $config, array(
		'type' => 'image',
		'settings' => 'body-bg-image',
		'label'    => __( 'Background Image', 'diaz' ),
		'description'    => __( 'Add Background Image for body', 'diaz' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-image' )
		),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => '==', 'value' => 'upload' ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-position
	DIAZ_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-position',
		'label'    => __( 'Background Position', 'diaz' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-position' )
		),
		'default' => 'center',
		'multiple' => 1,
		'choices' => diaz_image_positions(),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => 'contains', 'value' => array( 'pattern', 'upload') ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-repeat
	DIAZ_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-repeat',
		'label'    => __( 'Background Repeat', 'diaz' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-repeat' )
		),
		'default' => 'repeat',
		'multiple' => 1,
		'choices' => diaz_image_repeats(),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => 'contains', 'value' => array( 'pattern', 'upload' ) ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));	