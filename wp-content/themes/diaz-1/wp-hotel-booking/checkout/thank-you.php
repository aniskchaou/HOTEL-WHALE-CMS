<?php
/**
 * The template for displaying booking thank you page.
 *
 * This template can be overridden by copying it to yourtheme/wp-hotel-booking/checkout/thank-you.php.
 *
 * @version     2.0
 * @package     WP_Hotel_Booking/Templates
 * @category    Templates
 * @author      Thimpress, leehld
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit;

get_header();

$settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
$settings = is_array( $settings ) ?  array_filter( $settings )  : array();

$global_breadcrumb = cs_get_option( 'show-breadcrumb' );

$header_class = '';
if( !isset( $settings['enable-sub-title'] ) || !$settings['enable-sub-title']  ) {
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

    <!-- ** Slider ** -->
    <?php
        if( !isset( $settings['enable-sub-title'] ) || !$settings['enable-sub-title'] ) {
            if( isset( $settings['show_slider'] ) && $settings['show_slider'] ) {
                if( isset( $settings['slider_type'] ) ) {
                    if( $settings['slider_type'] == 'layerslider' && !empty( $settings['layerslider_id'] ) ) {
                        echo '<div id="slider">';
                        echo '  <div id="dt-sc-layer-slider" class="dt-sc-main-slider">';
                        echo    do_shortcode('[layerslider id="'.$settings['layerslider_id'].'"/]');
                        echo '  </div>';
                        echo '</div>';
					} elseif( $settings['slider_type'] == 'revolutionslider' && !empty( $settings['revolutionslider_id'] ) ) {
                        echo '<div id="slider">';
                        echo '  <div id="dt-sc-rev-slider" class="dt-sc-main-slider">';
                        echo    do_shortcode('[rev_slider '.$settings['revolutionslider_id'].'/]');
                        echo '  </div>';
                        echo '</div>';
					} elseif( $settings['slider_type'] == 'customslider' && !empty( $settings['customslider_sc'] ) ) {
                        echo '<div id="slider">';
                        echo '  <div id="dt-sc-custom-slider" class="dt-sc-main-slider">';
                        echo    do_shortcode( $settings['customslider_sc'] );
                        echo '  </div>';
                        echo '</div>';
					}
                }
            }
        }
    ?><!-- ** Slider End ** -->

    <!-- ** Breadcrumb ** -->
    <?php 
        # Global Breadcrumb
        if( !empty( $global_breadcrumb ) ) {

			if(empty($settings)) { $settings['enable-sub-title'] = true; }

            if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
                $breadcrumbs = array();
                $bstyle = diaz_cs_get_option( 'breadcrumb-style', 'default' );

                if( $post->post_parent ) {
                    $parent_id  = $post->post_parent;
                    $parents = array();

                    while( $parent_id ) {
                        $page = get_page( $parent_id );
                        $parents[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
                        $parent_id  = $page->post_parent;
                    }

                    $parents = array_reverse( $parents );
                    $breadcrumbs = array_merge_recursive($breadcrumbs, $parents);
                }

                $breadcrumbs[] = the_title( '<span class="current">', '</span>', false );
				$settings = isset( $settings['breadcrumb_background'] ) ? $settings : array();
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
                <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class );?>"><?php
                    diaz_show_sidebar( 'page', $post->ID, 'left' ); ?>
                </section><!-- Secondary Left End --><?php
            }
        }?>

        <!-- Primary -->
        <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php
            if( have_posts() ) {
                while( have_posts() ) {
                    the_post();

					$booking_id = isset( $_GET['booking'] ) ? $_GET['booking'] : '';
					$key        = isset( $_GET['key'] ) ? $_GET['key'] : '';

					if ( $booking_id && get_post_type( $booking_id ) == 'hb_booking' ) {
						$booking = WPHB_Booking::instance( $booking_id );
	
						if ( $booking->booking_key === $key ) {
	
							$rooms = hb_get_order_items( $booking_id ); ?>
							<div class="hb-message message">
								<div class="hb-message-content">
									<?php echo __( 'Thank you! Your booking has been placed. We will contact you to confirm about the booking soon.', 'diaz' ); ?>
								</div>
							</div>
					
							<div id="booking-details">
								<div class="booking-data">
									<h3 class="booking-data-number"><?php echo sprintf( esc_attr__( 'Booking %s', 'diaz' ), hb_format_order_number( $booking_id ) ); ?></h3>
									<div class="booking-date">
										<?php echo sprintf( __( 'Date %s', 'diaz' ), get_the_date( '', $booking_id ) ); ?>
									</div>
								</div>
							</div>
					
							<div id="booking-items">
					
								<h3><?php echo __( 'Booking Items', 'diaz' ); ?></h3>
					
								<table cellpadding="0" cellspacing="0" class="booking_item_table">
									<thead>
									<tr>
										<th><?php _e( 'Item', 'diaz' ); ?></th>
										<th><?php _e( 'Check in - Checkout', 'diaz' ) ?></th>
										<th><?php _e( 'Night', 'diaz' ); ?></th>
										<th><?php _e( 'Qty', 'diaz' ); ?></th>
										<th><?php _e( 'Total', 'diaz' ); ?></th>
									</tr>
									</thead>
									<tbody>
					
									<?php foreach ( $rooms as $k => $room ) { ?>
					
										<tr>
											<td>
												<?php printf( '<a href="%s">%s</a>', get_permalink( hb_get_order_item_meta( $room->order_item_id, 'product_id', true ) ), $room->order_item_name ) ?>
											</td>
											<td>
												<?php printf( '%s - %s', date_i18n( hb_get_date_format(), hb_get_order_item_meta( $room->order_item_id, 'check_in_date', true ) ), date_i18n( hb_get_date_format(), hb_get_order_item_meta( $room->order_item_id, 'check_out_date', true ) ) ) ?>
											</td>
											<td>
												<?php printf( '%d', hb_count_nights_two_dates( hb_get_order_item_meta( $room->order_item_id, 'check_out_date', true ), hb_get_order_item_meta( $room->order_item_id, 'check_in_date', true ) ) ) ?>
											</td>
											<td>
												<?php printf( '%s', hb_get_order_item_meta( $room->order_item_id, 'qty', true ) ) ?>
											</td>
											<td>
												<?php printf( '%s', hb_format_price( hb_get_order_item_meta( $room->order_item_id, 'subtotal', true ), hb_get_currency_symbol( $booking->currency ) ) ); ?>
											</td>
										</tr>
					
										<?php $packages = hb_get_order_items( $booking->id, 'sub_item', $room->order_item_id ); ?>
										<?php if ( $packages ) { ?>
											<?php foreach ( $packages as $package ) { ?>
												<?php $extra = hotel_booking_get_product_class( hb_get_order_item_meta( $package->order_item_id, 'product_id', true ) ); ?>
												<tr data-order-parent="<?php echo esc_attr( $room->order_item_id ); ?>">
													<td colspan="3">
														<?php echo esc_html( $package->order_item_name ); ?>
													</td>
													<td>
														<?php echo esc_html( hb_get_order_item_meta( $package->order_item_id, 'qty', true ) ); ?>
													</td>
													<td>
														<?php echo esc_html( hb_format_price( hb_get_order_item_meta( $package->order_item_id, 'subtotal', true ), hb_get_currency_symbol( $booking->currency ) ) ); ?>
													</td>
												</tr>
											<?php } ?>
										<?php } ?>
									<?php } ?>
					
									<tr>
										<td colspan="4"><?php _e( 'Sub Total', 'diaz' ) ?></td>
										<td>
											<?php printf( '%s', hb_format_price( hb_booking_subtotal( $booking->id ), hb_get_currency_symbol( $booking->currency ) ) ); ?>
										</td>
									</tr>
									<tr>
										<td colspan="4"><?php _e( 'Tax', 'diaz' ) ?></td>
										<td>
											<?php printf( '%s', apply_filters( 'hotel_booking_admin_booking_details', hb_format_price( hb_booking_tax_total( $booking->id ), hb_get_currency_symbol( $booking->currency ) ), $booking ) ); ?>
										</td>
									</tr>
									<tr>
										<td colspan="4"><?php _e( 'Grand Total', 'diaz' ) ?></td>
										<td>
											<?php printf( '%s', hb_format_price( hb_booking_total( $booking->id ), hb_get_currency_symbol( $booking->currency ) ) ) ?>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
					
							<div id="booking-customer">
					
								<div class="customer-details">
									<ul class="hb-form-table">
					
										<li>
											<label for="_hb_customer_title"><?php echo __( 'Title:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_title ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_first_name"><?php echo __( 'First Name:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_first_name ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_last_name"><?php echo __( 'Last Name:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_last_name ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_address"><?php echo __( 'Address:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_address ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_city"><?php echo __( 'City:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_city ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_state"><?php echo __( 'State:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_state ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_postal_code"><?php echo __( 'Postal Code:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_postal_code ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_country"><?php echo __( 'Country:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_country ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_phone"><?php echo __( 'Phone:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_phone ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_email"><?php echo __( 'Email:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_email ); ?>
										</li>
					
										<li>
											<label for="_hb_customer_fax"><?php echo __( 'Fax:', 'diaz' ); ?></label>
											<?php echo esc_html( $booking->customer_tax ); ?>
										</li>
					
									</ul>
								</div>
					
								<div class="booking-notes">
									<label for="_hb_customer_notes"><?php echo __( 'Booking Notes:', 'diaz' ); ?></label>
									<?php echo esc_html( $booking->post->post_content ); ?>
								</div>
					
							</div>
						<?php } else { ?>
							<p><?php echo esc_html__( 'Booking invalid', 'diaz' ) ?></p>
						<?php }
					} else { ?>
						<p><?php echo esc_html__( 'Booking invalid', 'diaz' ) ?></p>
					<?php }
                }
            }?>
        </section><!-- Primary End --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {
                $sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>

                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class );?>"><?php
                    diaz_show_sidebar( 'page', $post->ID, 'right' ); ?>
                </section><!-- Secondary Right End --><?php
            }
        }?>
    </div>
    <!-- ** Container End ** -->
    
</div><!-- **Main - End ** -->    
<?php get_footer(); ?>