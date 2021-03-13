<?php
/**
 * The Template for displaying all single products
 *
 * Override this template by copying it to yourtheme/tp-hotel-booking/single-room.php
 *
 * @author        ThimPress
 * @package       wp-hotel-booking/templates
 * @version       1.6
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
$settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
$settings = is_array ( $settings ) ? $settings : array ();

$global_breadcrumb = cs_get_option( 'show-breadcrumb' );

$header_class = '';
if( !$settings['enable-sub-title'] || !isset( $settings['enable-sub-title'] ) ) {
	if( isset( $settings['show_slider'] ) && $settings['show_slider'] ) {
		if( isset( $settings['slider_type'] ) ) {
			$header_class =  $settings['slider_position'];
		}
	}
}

if( !empty( $global_breadcrumb ) ) {
	if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
		$header_class = $settings['breadcrumb_position'];
	}
}?>

<!-- ** Header Wrapper ** -->
<div id="header-wrapper">
    <!-- **Header** -->
    <header id="header" class="<?php echo esc_attr($header_class); ?>">

        <div class="container"><?php
            /**
             * diaz_header hook.
             * 
             * @hooked diaz_vc_header_template - 10
             *
             */
            do_action( 'diaz_header' ); ?>
        </div>
    </header><!-- **Header - End ** -->

    <!-- ** Breadcrumb ** -->
    <?php
        # Global Breadcrumb
        if( !empty( $global_breadcrumb ) ) {
            if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
                $breadcrumbs = array();
                $bstyle = diaz_cs_get_option( 'breadcrumb-style', 'default' );

                $cat = get_the_term_list( $post->ID, 'hb_room_type', '', '$$$', '');
                $cats = array_filter(explode('$$$', $cat));
                if (!empty($cats))
                	$breadcrumbs[] = $cats[0];

                $breadcrumbs[] = the_title( '<span class="current">', '</span>', false );
                $style = diaz_breadcrumb_css( $settings );

                diaz_breadcrumb_output ( the_title( '<h1>', '</h1>',false ), $breadcrumbs, $bstyle, $style );
            }
        }
    ?><!-- ** Breadcrumb End ** -->                
</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main">

    <!-- ** Container ** -->
    <div class="container"><?php
        $page_layout  = array_key_exists( "layout", $settings ) ? $settings['layout'] : "content-full-width";
        $layout = diaz_page_layout( $page_layout );
        extract( $layout );

        if ( $show_sidebar ) {
            if ( $show_left_sidebar ) {
                $sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>
                
                <!-- Secondary Left -->
                <section id="secondary-left" class="secondary-sidebar hb-room-single-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class );?>"><?php
                	 diaz_show_sidebar( 'hb_room', $post->ID, 'left' ); ?>
                </section><!-- Secondary Left End --><?php
            }
        }?>

        <!-- Primary -->
        <section id="primary" class="hb-room-single-primary <?php echo esc_attr( $page_layout );?>"><?php
            if( have_posts() ) :

				while ( have_posts() ) : the_post();

					hb_get_template_part( 'content', 'single-room' );

				endwhile;

			endif; ?>
        </section><!-- Primary End --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {
                $sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>

                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar hb-room-single-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class );?>"><?php
                	 diaz_show_sidebar( 'hb_room', $post->ID, 'right' ); ?>
                </section><!-- Secondary Right End --><?php
            }
        }?>
    </div>
    <!-- ** Container End ** -->

</div><!-- **Main - End ** -->
<?php get_footer(); ?>