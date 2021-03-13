<?php
$config = diaz_kirki_config();

DIAZ_Kirki::add_section( 'dt_custom_js_section', array(
	'title' => __( 'Additional JS', 'diaz' ),
	'priority' => 210
) );

	# custom-js
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'enable-custom-js',
		'section'  => 'dt_custom_js_section',
		'label'    => __( 'Enable Custom JS?', 'diaz' ),
		'default'  => diaz_defaults('enable-custom-js'),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'diaz' ),
			'off' => esc_attr__( 'No', 'diaz' )
		)		
	));

	# custom-js
	DIAZ_Kirki::add_field( $config, array(
		'type'     => 'code',
		'settings' => 'custom-js',
		'section'  => 'dt_custom_js_section',
		'transport' => 'postMessage',
		'label'    => __( 'Add Custom JS', 'diaz' ),
		'choices'     => array(
			'language' => 'javascript',
			'theme'    => 'dark',
		),
		'active_callback' => array(
			array( 'setting' => 'enable-custom-js' , 'operator' => '==', 'value' =>'1')
		)
	));