<?php
add_filter( 'cs_framework_options', 'diaz_cs_framework_options' );
if ( !function_exists( 'diaz_cs_framework_options' ) ) {
	function diaz_cs_framework_options( $options ) {

		$options[]      = array(
		  'name'        => 'wp-hotel-booking',
		  'title'       => esc_html__('WP Hotel Booking', 'diaz'),
		  'icon'        => 'fa fa-calendar',

		  'fields'      => array(

			array(
			  'type'    => 'subheading',
			  'content' => esc_html__( 'Room Archives Page Layout', 'diaz' ),
			),
	
			array(
			  'id'      	 => 'room-archives-page-layout',
			  'type'         => 'image_select',
			  'title'        => esc_html__('Page Layout', 'diaz'),
			  'options'      => array(
				'content-full-width'   => DIAZ_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
				'with-left-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
				'with-right-sidebar'   => DIAZ_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
				'with-both-sidebar'    => DIAZ_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			  ),
			  'default'      => 'content-full-width',
			  'attributes'   => array(
				'data-depend-id' => 'room-archives-page-layout',
			  ),
			),
	
			array(
			  'id'  		 => 'show-standard-left-sidebar-for-room-archives',
			  'type'  		 => 'switcher',
			  'title' 		 => esc_html__('Show Standard Left Sidebar', 'diaz'),
			  'dependency'   => array( 'room-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
			),
	
			array(
			  'id'  		 => 'show-standard-right-sidebar-for-room-archives',
			  'type'  		 => 'switcher',
			  'title' 		 => esc_html__('Show Standard Right Sidebar', 'diaz'),
			  'dependency'   => array( 'room-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
			)
	
		  ),
		);
	
		return $options;
	}
}

add_action( 'hotel_booking_loop_room_types', 'hotel_booking_loop_room_types' );
if ( !function_exists( 'hotel_booking_loop_room_types' ) ) {

	function hotel_booking_loop_room_types() {
		hb_get_template( 'loop/types.php' );
	}

}

add_action( 'hotel_booking_loop_room_description', 'hotel_booking_loop_room_description' );
if ( !function_exists( 'hotel_booking_loop_room_description' ) ) {

	function hotel_booking_loop_room_description() {
		hb_get_template( 'loop/description.php' );
	}

}

add_action( 'template_include', 'diaz_wphb_booking_received_template' );
if ( ! function_exists( 'diaz_wphb_booking_received_template' ) ) {

	function diaz_wphb_booking_received_template( $template ) {

		if ( false !== get_query_var( 'thank-you', false ) ) {
			return DIAZ_THEME_DIR . '/wp-hotel-booking/checkout/thank-you.php';
		}

		return $template;
	}
}