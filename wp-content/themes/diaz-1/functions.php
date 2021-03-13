<?php
/**
 * Theme Functions
 *
 * @package DTtheme
 * @author DesignThemes
 * @link http://wedesignthemes.com
 */
define( 'DIAZ_THEME_DIR', get_template_directory() );
define( 'DIAZ_THEME_URI', get_template_directory_uri() );
define( 'DIAZ_CORE_PLUGIN', WP_PLUGIN_DIR.'/designthemes-core-features' );

if (function_exists ('wp_get_theme')) :
	$themeData = wp_get_theme();
	define( 'DIAZ_THEME_NAME', $themeData->get('Name'));
	define( 'DIAZ_THEME_VERSION', $themeData->get('Version'));
endif;

/* ---------------------------------------------------------------------------
 * Loads Kirki
 * ---------------------------------------------------------------------------*/
require_once( DIAZ_THEME_DIR .'/kirki/index.php' );

/* ---------------------------------------------------------------------------
 * Loads Codestar
 * ---------------------------------------------------------------------------*/
require_once DIAZ_THEME_DIR .'/cs-framework/cs-framework.php';

define( 'CS_ACTIVE_SHORTCODE',  false );
define( 'CS_ACTIVE_CUSTOMIZE',  false );

/* ---------------------------------------------------------------------------
 * Create function to get theme options
 * --------------------------------------------------------------------------- */
function diaz_cs_get_option($key, $value = '') {

	$v = cs_get_option( $key );

	if ( !empty( $v ) ) {
		return $v;
	} else {
		return $value;
	}
}

/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * ---------------------------------------------------------------------------*/ 
define( 'DIAZ_LANG_DIR', DIAZ_THEME_DIR. '/languages' );
load_theme_textdomain( 'diaz', DIAZ_LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads the Admin Panel Style
 * ---------------------------------------------------------------------------*/
function diaz_admin_scripts() {
	wp_enqueue_style('diaz-admin', DIAZ_THEME_URI .'/cs-framework-override/style.css');
}
add_action( 'admin_enqueue_scripts', 'diaz_admin_scripts' );

/* ---------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------*/

// Functions --------------------------------------------------------------------
require_once( DIAZ_THEME_DIR .'/framework/register-functions.php' );

// Header -----------------------------------------------------------------------
require_once( DIAZ_THEME_DIR .'/framework/register-head.php' );

// Hooks ------------------------------------------------------------------------
require_once( DIAZ_THEME_DIR .'/framework/register-hooks.php' );

// Likes ------------------------------------------------------------------------
require_once( DIAZ_THEME_DIR .'/framework/register-likes.php' );

// Post Functions ---------------------------------------------------------------
require_once( DIAZ_THEME_DIR .'/framework/register-post-functions.php' );
new diaz_post_functions;

// Widgets ----------------------------------------------------------------------
add_action( 'widgets_init', 'diaz_widgets_init' );
function diaz_widgets_init() {
	require_once( DIAZ_THEME_DIR .'/framework/register-widgets.php' );

	if(class_exists('DTCorePlugin')) {
		register_widget('Diaz_Twitter');
	}

	register_widget('Diaz_Flickr');
	register_widget('Diaz_Recent_Posts');
	register_widget('Diaz_Portfolio_Widget');
}
if(class_exists('DTCorePlugin')) {
	require_once( DIAZ_THEME_DIR .'/framework/widgets/widget-twitter.php' );
}
require_once( DIAZ_THEME_DIR .'/framework/widgets/widget-flickr.php' );
require_once( DIAZ_THEME_DIR .'/framework/widgets/widget-recent-posts.php' );
require_once( DIAZ_THEME_DIR .'/framework/widgets/widget-recent-portfolios.php' );

// Plugins ---------------------------------------------------------------------- 
require_once( DIAZ_THEME_DIR .'/framework/register-plugins.php' );

// WooCommerce ------------------------------------------------------------------
if( function_exists( 'is_woocommerce' ) && ! class_exists ( 'DTWooPlugin' ) ){
	require_once( DIAZ_THEME_DIR .'/framework/register-woocommerce.php' );
}

// WP Store Locator -------------------------------------------------------------
if( diaz_is_plugin_active( 'wp-store-locator/wp-store-locator.php' ) ){
	require_once( DIAZ_THEME_DIR .'/framework/register-storelocator.php' );
}
	
// Hotel Booking Module -----------------------------------------------------------
if(class_exists('WP_Hotel_Booking'))
	require_once( DIAZ_THEME_DIR .'/framework/register-hotel-booking.php' ); 
	
// Privacy & Cookies ------------------------------------------------------------
require_once( DIAZ_THEME_DIR .'/framework/register-privacy.php' );

// Register Gutenberg -----------------------------------------------------------
require_once( DIAZ_THEME_DIR .'/framework/register-gutenberg-editor.php' );