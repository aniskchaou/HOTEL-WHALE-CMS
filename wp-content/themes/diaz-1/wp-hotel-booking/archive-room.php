<?php
/**
 * The Template for displaying all archive products
 *
 * Override this template by copying it to yourtheme/tp-hotel-booking/archive-room.php
 *
 * @author        ThimPress
 * @package       wp-hotel-booking/templates
 * @version       1.6
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
$global_breadcrumb = cs_get_option( 'show-breadcrumb' );
$header_class	   = cs_get_option( 'breadcrumb-position' );
$wtstyle = cs_get_option( 'wtitle-style' ); ?>

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
        if( !empty( $global_breadcrumb ) ) {

            $bstyle = diaz_cs_get_option( 'breadcrumb-style', 'default' );
            $style = diaz_breadcrumb_css();

            $title = get_the_archive_title();
            $breadcrumbs[] = __('Rooms','diaz');

            diaz_breadcrumb_output ( '<h1>'.$title.'</h1>', 'dt-breadcrumb-for-archive '.$breadcrumbs, $bstyle, $style );
        }
    ?><!-- ** Breadcrumb End ** -->                
</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main">
    <!-- ** Container ** -->
    <div class="container"><?php
        $page_layout = cs_get_option( 'room-archives-page-layout' );
        $page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";

        $layout = diaz_page_layout( $page_layout );
        extract( $layout );

        if ( $show_sidebar ) {
            if ( $show_left_sidebar ) {?>
                <!-- Secondary Left -->
                <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php
                    echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';

                    if( is_active_sidebar('custom-post-room-archives-sidebar-left') ):
                        dynamic_sidebar('custom-post-room-archives-sidebar-left');
                    endif;

                    $enable = cs_get_option( 'show-standard-left-sidebar-for-room-archives' );
                    if( $enable ):
                        if( is_active_sidebar('standard-sidebar-left') ):
                            dynamic_sidebar('standard-sidebar-left');
                        endif;
                    endif;

                    echo !empty( $wtstyle ) ? '</div>' : ''; ?>
                </section><!-- Secondary Left End --><?php
            }
        }?>

    	<!-- Primary -->
        <section id="primary" class="<?php echo esc_attr( $page_layout );?>">

			<?php if ( have_posts() ) : ?>
            
                <?php
                /**
                 * hotel_booking_before_room_loop hook
                 *
                 * @hooked hotel_booking_result_count - 20
                 * @hooked hotel_booking_catalog_ordering - 30
                 */
                do_action( 'hotel_booking_before_room_loop' );
                ?>
            
                <?php hotel_booking_room_loop_start(); ?>
            
                <?php hotel_booking_room_subcategories(); ?>
            
                <?php while ( have_posts() ) : the_post(); ?>
            
                    <?php hb_get_template_part( 'content', 'room' ); ?>
            
                <?php endwhile; // end of the loop. ?>
            
                <?php hotel_booking_room_loop_end(); ?>
            
                <?php
                /**
                 * hotel_booking_after_room_loop hook
                 *
                 * @hooked hotel_booking_pagination - 10
                 */
                do_action( 'hotel_booking_after_room_loop' );
                ?>
            
            <?php endif; ?>

            <!-- **Pagination** -->
            <div class="pagination blog-pagination">
                <?php echo diaz_pagination(); ?>
            </div><!-- **Pagination** -->
    
        </section><!-- Primary End --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {?>
                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php
                    echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';

                    if( is_active_sidebar('custom-post-room-archives-sidebar-right') ):
                        dynamic_sidebar('custom-post-room-archives-sidebar-right');
                    endif;

                    $enable = cs_get_option( 'show-standard-right-sidebar-for-room-archives' );
                    if( $enable ):
                        if( is_active_sidebar('standard-sidebar-right') ):
                            dynamic_sidebar('standard-sidebar-right');
                        endif;
                    endif;

                    echo !empty( $wtstyle ) ? '</div>' : ''; ?>
                </section><!-- Secondary Right End --><?php
            }
        }?>
    </div>
    <!-- ** Container End ** -->
</div><!-- **Main - End ** -->    
<?php get_footer(); ?>