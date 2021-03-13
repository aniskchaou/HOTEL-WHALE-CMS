<?php

require_once get_template_directory() . '/kirki/kirki-utils.php';
require_once get_template_directory() . '/kirki/include-kirki.php';
require_once get_template_directory() . '/kirki/kirki.php';

$config = diaz_kirki_config();

add_action('customize_register', 'diaz_customize_register');
function diaz_customize_register( $wp_customize ) {

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'static_front_page' );

	$wp_customize->remove_section('themes');
	$wp_customize->get_section('title_tagline')->priority = 10;
}

add_action( 'customize_controls_print_styles', 'diaz_enqueue_customizer_stylesheet' );
function diaz_enqueue_customizer_stylesheet() {
	wp_register_style( 'diaz-customizer-css', DIAZ_THEME_URI.'/kirki/assets/css/customizer.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'diaz-customizer-css' );	
}

add_action( 'customize_controls_print_footer_scripts', 'diaz_enqueue_customizer_script' );
function diaz_enqueue_customizer_script() {
	wp_register_script( 'diaz-customizer-js', DIAZ_THEME_URI.'/kirki/assets/js/customizer.js', array('jquery', 'customize-controls' ), false, true );
	wp_enqueue_script( 'diaz-customizer-js' );
}

# Theme Customizer Begins
DIAZ_Kirki::add_config( $config , array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

	# Site Identity	
		# use-custom-logo
		DIAZ_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'use-custom-logo',
			'label'    => __( 'Logo ?', 'diaz' ),
			'section'  => 'title_tagline',
			'priority' => 1,
			'default'  => diaz_defaults('use-custom-logo'),
			'description' => __('Switch to Site title or Logo','diaz'),
			'choices'  => array(
				'on'  => esc_attr__( 'Logo', 'diaz' ),
				'off' => esc_attr__( 'Site Title', 'diaz' )
			)			
		) );

		# custom-logo
		DIAZ_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'custom-logo',
			'label'    => __( 'Logo', 'diaz' ),
			'section'  => 'title_tagline',
			'priority' => 2,
			'default' => diaz_defaults( 'custom-logo' ),
			'active_callback' => array(
				array( 'setting' => 'use-custom-logo', 'operator' => '==', 'value' => '1' )
			)
		));

		# custom-light-logo
		DIAZ_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'custom-light-logo',
			'label'    => __( 'Light Logo', 'diaz' ),
			'section'  => 'title_tagline',
			'priority' => 3,
			'default' => diaz_defaults( 'custom-light-logo' ),
			'active_callback' => array(
				array( 'setting' => 'use-custom-logo', 'operator' => '==', 'value' => '1' )
			)
		));	
		
		# site-title-color
		DIAZ_Kirki::add_field( $config, array(
			'type' => 'color',
			'settings' => 'custom-title',
			'label'    => __( 'Site Title Color', 'diaz' ),
			'section'  => 'title_tagline',
			'priority' => 4,
			'active_callback' => array(
				array( 'setting' => 'use-custom-logo', 'operator' => '!=', 'value' => '1' )
			),
			'output' => array(
				array( 'element' => '#header .logo-title h1 a, #header .logo-title h2 a' , 'property' => 'color', 'suffix' => ' !important' )
			),
			'choices' => array( 'alpha' => true ),
		));	

	# Site Layout
	require_once get_template_directory() . '/kirki/options/site-layout.php';

	# Site Skin
	require_once get_template_directory() . '/kirki/options/site-skin.php';

	# Additional JS
	require_once get_template_directory() . '/kirki/options/custom-js.php';

	# Typography
	DIAZ_Kirki::add_panel( 'dt_site_typography_panel', array(
		'title' => __( 'Typography', 'diaz' ),
		'description' => __('Typography Settings','diaz'),
		'priority' => 220
	) );	
	require_once get_template_directory() . '/kirki/options/site-typography.php';	
# Theme Customizer Ends