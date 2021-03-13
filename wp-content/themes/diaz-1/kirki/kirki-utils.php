<?php
function diaz_kirki_config() {
	return 'diaz_kirki_config';
}

function diaz_defaults( $key = '' ) {
	$defaults = array();

	# site identify
	$defaults['use-custom-logo'] = '1';
	$defaults['custom-logo'] = DIAZ_THEME_URI.'/images/logo.png';
	$defaults['custom-light-logo'] = DIAZ_THEME_URI.'/images/light-logo.png';
	$defaults['site_icon'] = DIAZ_THEME_URI.'/images/favicon.ico';

	# site layout
	$defaults['site-layout'] = 'wide';

	# site skin
	$defaults['use-predefined-skin'] = '0';
	$defaults['predefined-skin'] = 'brown';
	$defaults['primary-color'] = '#d69d5a';
	$defaults['secondary-color'] = '#cc975b';
	$defaults['tertiary-color'] = '#e2af7d';
	
	$defaults['custom-title-color'] = '#ffffff';

	# site breadcrumb
	$defaults['customize-breadcrumb-title-typo'] = '0';
	$defaults['breadcrumb-title-typo'] = array( 'font-family' => 'Cormorant',
		'variant' => 'regular',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '30px',
		'line-height' => '',
		'letter-spacing' => '0.5px',
		'color' => '#ffffff',
		'text-align' => 'unset',
		'text-transform' => 'none' );
	$defaults['customize-breadcrumb-typo'] = '0';
	$defaults['breadcrumb-typo'] = array( 'font-family' => 'Open Sans',
		'variant' => 'regular',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '15px',
		'line-height' => '',
		'letter-spacing' => '0',
		'color' => '#ffffff',
		'text-align' => 'unset',
		'text-transform' => 'none' );

	# site footer
	$defaults['customize-footer-title-typo'] = '0';
	$defaults['footer-title-typo'] = array( 'font-family' => 'Cormorant',
		'variant' => '700',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '20px',
		'line-height' => '36px',
		'letter-spacing' => '0',
		'color' => '#2B2B2B',
		'text-align' => 'left',
		'text-transform' => 'none' );
	$defaults['customize-footer-content-typo'] = '0';
	$defaults['footer-content-typo'] = array( 'font-family' => 'Open Sans',
		'variant' => 'regular',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '14px',
		'line-height' => '24px',
		'letter-spacing' => '0',
		'color' => '#333333',
		'text-align' => 'left',
		'text-transform' => 'none' );

	# site typography
	$defaults['customize-body-h1-typo'] = '1';
	$defaults['h1'] = array(
		'font-family' => 'Cormorant',
		'variant' => '700',
		'font-size' => '32px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#3e3014',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h2-typo'] = '1';
	$defaults['h2'] = array(
		'font-family' => 'Cormorant',
		'variant' => '700',
		'font-size' => '30px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#3e3014',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h3-typo'] = '1';
	$defaults['h3'] = array(
		'font-family' => 'Cormorant',
		'variant' => '700',
		'font-size' => '26px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#3e3014',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h4-typo'] = '1';
	$defaults['h4'] = array(
		'font-family' => 'Cormorant',
		'variant' => '700',
		'font-size' => '22px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#3e3014',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h5-typo'] = '1';
	$defaults['h5'] = array(
		'font-family' => 'Cormorant',
		'variant' => '700',
		'font-size' => '18px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#3e3014',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h6-typo'] = '1';
	$defaults['h6'] = array(
		'font-family' => 'Cormorant',
		'variant' => '700',
		'font-size' => '16px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#3e3014',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-content-typo'] = '1';
	$defaults['body-content-typo'] = array(
		'font-family' => 'Poppins',
		'variant' => 'normal',
		'font-size' => '16px',
		'line-height' => '26px',
		'letter-spacing' => '',
		'color' => '#5f5643',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-other-elements-typo'] = '1';
	$defaults['other-elements-typo'] = array(
		'font-family' => 'Gilda Display',
		'text-transform' => 'none'
	);

	if( !empty( $key ) && array_key_exists( $key, $defaults) ) {
		return $defaults[$key];
	}

	return '';
}

function diaz_image_positions() {

	$positions = array( "top left" => esc_attr__('Top Left','diaz'),
		"top center"    => esc_attr__('Top Center','diaz'),
		"top right"     => esc_attr__('Top Right','diaz'),
		"center left"   => esc_attr__('Center Left','diaz'),
		"center center" => esc_attr__('Center Center','diaz'),
		"center right"  => esc_attr__('Center Right','diaz'),
		"bottom left"   => esc_attr__('Bottom Left','diaz'),
		"bottom center" => esc_attr__('Bottom Center','diaz'),
		"bottom right"  => esc_attr__('Bottom Right','diaz'),
	);

	return $positions;
}

function diaz_image_repeats() {

	$image_repeats = array( "repeat" => esc_attr__('Repeat','diaz'),
		"repeat-x"  => esc_attr__('Repeat in X-axis','diaz'),
		"repeat-y"  => esc_attr__('Repeat in Y-axis','diaz'),
		"no-repeat" => esc_attr__('No Repeat','diaz')
	);

	return $image_repeats;
}

function diaz_border_styles() {

	$image_repeats = array(
		"none"	 => esc_attr__('None','diaz'),
		"dotted" => esc_attr__('Dotted','diaz'),
		"dashed" => esc_attr__('Dashed','diaz'),
		"solid"	 => esc_attr__('Solid','diaz'),
		"double" => esc_attr__('Double','diaz'),
		"groove" => esc_attr__('Groove','diaz'),
		"ridge"	 => esc_attr__('Ridge','diaz'),
	);

	return $image_repeats;
}

function diaz_animations() {

	$animations = array(
		'' 					 => esc_html__('Default','diaz'),	
		"bigEntrance"        =>  esc_attr__("bigEntrance",'diaz'),
        "bounce"             =>  esc_attr__("bounce",'diaz'),
        "bounceIn"           =>  esc_attr__("bounceIn",'diaz'),
        "bounceInDown"       =>  esc_attr__("bounceInDown",'diaz'),
        "bounceInLeft"       =>  esc_attr__("bounceInLeft",'diaz'),
        "bounceInRight"      =>  esc_attr__("bounceInRight",'diaz'),
        "bounceInUp"         =>  esc_attr__("bounceInUp",'diaz'),
        "bounceOut"          =>  esc_attr__("bounceOut",'diaz'),
        "bounceOutDown"      =>  esc_attr__("bounceOutDown",'diaz'),
        "bounceOutLeft"      =>  esc_attr__("bounceOutLeft",'diaz'),
        "bounceOutRight"     =>  esc_attr__("bounceOutRight",'diaz'),
        "bounceOutUp"        =>  esc_attr__("bounceOutUp",'diaz'),
        "expandOpen"         =>  esc_attr__("expandOpen",'diaz'),
        "expandUp"           =>  esc_attr__("expandUp",'diaz'),
        "fadeIn"             =>  esc_attr__("fadeIn",'diaz'),
        "fadeInDown"         =>  esc_attr__("fadeInDown",'diaz'),
        "fadeInDownBig"      =>  esc_attr__("fadeInDownBig",'diaz'),
        "fadeInLeft"         =>  esc_attr__("fadeInLeft",'diaz'),
        "fadeInLeftBig"      =>  esc_attr__("fadeInLeftBig",'diaz'),
        "fadeInRight"        =>  esc_attr__("fadeInRight",'diaz'),
        "fadeInRightBig"     =>  esc_attr__("fadeInRightBig",'diaz'),
        "fadeInUp"           =>  esc_attr__("fadeInUp",'diaz'),
        "fadeInUpBig"        =>  esc_attr__("fadeInUpBig",'diaz'),
        "fadeOut"            =>  esc_attr__("fadeOut",'diaz'),
        "fadeOutDownBig"     =>  esc_attr__("fadeOutDownBig",'diaz'),
        "fadeOutLeft"        =>  esc_attr__("fadeOutLeft",'diaz'),
        "fadeOutLeftBig"     =>  esc_attr__("fadeOutLeftBig",'diaz'),
        "fadeOutRight"       =>  esc_attr__("fadeOutRight",'diaz'),
        "fadeOutUp"          =>  esc_attr__("fadeOutUp",'diaz'),
        "fadeOutUpBig"       =>  esc_attr__("fadeOutUpBig",'diaz'),
        "flash"              =>  esc_attr__("flash",'diaz'),
        "flip"               =>  esc_attr__("flip",'diaz'),
        "flipInX"            =>  esc_attr__("flipInX",'diaz'),
        "flipInY"            =>  esc_attr__("flipInY",'diaz'),
        "flipOutX"           =>  esc_attr__("flipOutX",'diaz'),
        "flipOutY"           =>  esc_attr__("flipOutY",'diaz'),
        "floating"           =>  esc_attr__("floating",'diaz'),
        "hatch"              =>  esc_attr__("hatch",'diaz'),
        "hinge"              =>  esc_attr__("hinge",'diaz'),
        "lightSpeedIn"       =>  esc_attr__("lightSpeedIn",'diaz'),
        "lightSpeedOut"      =>  esc_attr__("lightSpeedOut",'diaz'),
        "pullDown"           =>  esc_attr__("pullDown",'diaz'),
        "pullUp"             =>  esc_attr__("pullUp",'diaz'),
        "pulse"              =>  esc_attr__("pulse",'diaz'),
        "rollIn"             =>  esc_attr__("rollIn",'diaz'),
        "rollOut"            =>  esc_attr__("rollOut",'diaz'),
        "rotateIn"           =>  esc_attr__("rotateIn",'diaz'),
        "rotateInDownLeft"   =>  esc_attr__("rotateInDownLeft",'diaz'),
        "rotateInDownRight"  =>  esc_attr__("rotateInDownRight",'diaz'),
        "rotateInUpLeft"     =>  esc_attr__("rotateInUpLeft",'diaz'),
        "rotateInUpRight"    =>  esc_attr__("rotateInUpRight",'diaz'),
        "rotateOut"          =>  esc_attr__("rotateOut",'diaz'),
        "rotateOutDownRight" =>  esc_attr__("rotateOutDownRight",'diaz'),
        "rotateOutUpLeft"    =>  esc_attr__("rotateOutUpLeft",'diaz'),
        "rotateOutUpRight"   =>  esc_attr__("rotateOutUpRight",'diaz'),
        "shake"              =>  esc_attr__("shake",'diaz'),
        "slideDown"          =>  esc_attr__("slideDown",'diaz'),
        "slideExpandUp"      =>  esc_attr__("slideExpandUp",'diaz'),
        "slideLeft"          =>  esc_attr__("slideLeft",'diaz'),
        "slideRight"         =>  esc_attr__("slideRight",'diaz'),
        "slideUp"            =>  esc_attr__("slideUp",'diaz'),
        "stretchLeft"        =>  esc_attr__("stretchLeft",'diaz'),
        "stretchRight"       =>  esc_attr__("stretchRight",'diaz'),
        "swing"              =>  esc_attr__("swing",'diaz'),
        "tada"               =>  esc_attr__("tada",'diaz'),
        "tossing"            =>  esc_attr__("tossing",'diaz'),
        "wobble"             =>  esc_attr__("wobble",'diaz'),
        "fadeOutDown"        =>  esc_attr__("fadeOutDown",'diaz'),
        "fadeOutRightBig"    =>  esc_attr__("fadeOutRightBig",'diaz'),
        "rotateOutDownLeft"  =>  esc_attr__("rotateOutDownLeft",'diaz')
    );

	return $animations;
}