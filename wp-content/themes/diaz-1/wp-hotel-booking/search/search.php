<?php

if ( !defined( 'ABSPATH' ) ) {
	exit();
}

$check_in_date  = hb_get_request( 'check_in_date' );
$check_out_date = hb_get_request( 'check_out_date' );
$adults         = hb_get_request( 'adults', 0 );
$max_child      = hb_get_request( 'max_child', 0 );
$uniqid         = uniqid();

if( empty( $check_in_date ) )
	$check_in_date = date('F d, Y');

if( empty( $check_out_date ) )
	$check_out_date = date("F d, Y", strtotime('+1 day'));

if( empty( $adults ) )
	$adults = 2;
?>

<div id="hotel-booking-search-<?php echo uniqid(); ?>" class="hotel-booking-search">
	<?php
	// display title widget or shortcode
	$atts = array();
	if ( $args && isset( $args['atts'] ) )
		$atts = $args['atts']; ?>
    <div class="column dt-sc-one-fifth first"><?php
		if ( !isset( $atts['show_title'] ) || strtolower( $atts['show_title'] ) === 'true' ): ?>
        	<div class="search-info">
                <h3><?php _e( 'Book Now', 'diaz' ); ?></h3>
                <p><?php _e('Best Price Guaranted', 'diaz'); ?></p>
            </div>
		<?php endif; ?>
    </div>

	<div class="column dt-sc-four-fifth">
        <form name="hb-search-form" action="<?php echo esc_attr( $search_page ); ?>" class="hb-search-form-<?php echo esc_attr( $uniqid ) ?>">
            <ul class="hb-form-table">
                <li class="hb-form-field">
                    <?php hb_render_label_shortcode( $atts, 'show_label', __( 'Check In', 'diaz' ), 'true' ); ?>
                    <div class="hb-form-field-input hb_input_field">
                    	<input type="text" class="day" value="">
						<input type="text" class="month" value="<?php echo date('M Y'); ?>">
                        <input type="text" name="check_in_date" id="check_in_date_<?php echo esc_attr( $uniqid ); ?>" class="hb_input_date_check" value="<?php echo esc_attr( $check_in_date ); ?>" placeholder="<?php _e( 'Check In', 'diaz' ); ?>" />
                    </div>
                </li>

                <li class="hb-form-field">
                    <?php hb_render_label_shortcode( $atts, 'show_label', __( 'Check Out', 'diaz' ), 'true' ); ?>
                    <div class="hb-form-field-input hb_input_field">
                    	<input type="text" class="day" value="">
                        <input type="text" class="month" value="<?php echo date('M Y', strtotime('+1 day')); ?>">
                        <input type="text" name="check_out_date" id="check_out_date_<?php echo esc_attr( $uniqid ) ?>" class="hb_input_date_check" value="<?php echo esc_attr( $check_out_date ); ?>" placeholder="<?php _e( 'Check Out', 'diaz' ); ?>" />
                    </div>
                </li>
    
                <li class="hb-form-field">
                    <?php hb_render_label_shortcode( $atts, 'show_label', __( 'Guests', 'diaz' ), 'true' ); ?>
                    <div class="hb-form-field-input">
                        <?php
                        hb_dropdown_numbers(
                            array(
                                'name'              => 'adults_capacity',
                                'min'               => 1,
                                'max'               => hb_get_max_capacity_of_rooms(),
                                'show_option_none'  => __( 'Guests', 'diaz' ),
                                'selected'          => $adults,
                                'option_none_value' => 0,
                                'options'           => hb_get_capacity_of_rooms()
                            )
                        );
                        ?>
                    </div>
                </li>
    
                <li class="hb-form-field hidden">
                    <?php hb_render_label_shortcode( $atts, 'show_label', __( 'Childs', 'diaz' ), 'true' ); ?>
                    <div class="hb-form-field-input">
                        <?php
                        hb_dropdown_numbers(
                            array(
                                'name'              => 'max_child',
                                'min'               => 1,
                                'max'               => hb_get_max_child_of_rooms(),
                                'show_option_none'  => __( 'Childs', 'diaz' ),
                                'option_none_value' => 0,
                                'selected'          => $max_child,
                            )
                        );
                        ?>
                    </div>
                </li>
            </ul>
            <?php wp_nonce_field( 'hb_search_nonce_action', 'nonce' ); ?>
            <input type="hidden" name="hotel-booking" value="results" />
            <input type="hidden" name="action" value="hotel_booking_parse_search_params" />
            <p class="hb-submit">
                <button type="submit" class="dt-sc-button small bordered"><?php _e( 'Check Availability', 'diaz' ); ?></button>
            </p>
        </form>
    </div>    
</div>