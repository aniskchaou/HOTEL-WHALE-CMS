<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$room    = WPHB_Room::instance( get_the_ID() );
$related = $room->get_related_rooms();
?>
<?php if ( $related->posts ): ?>
    <div class="hb_related_other_room has_slider">
    	<div class="dt-sc-special-heading aligncenter">
        	<h2><?php _e( 'Other Rooms', 'diaz' ); ?></h2>
            <p><?php _e('The Best Oriental hotel', 'diaz'); ?></p>
            <h5 style="font-family:Kaushan Script;"><?php _e('Feel your home', 'diaz'); ?></h5>
        </div>
		<?php hotel_booking_room_loop_start(); ?>

		<?php while ( $related->have_posts() ) : $related->the_post(); ?>

			<?php hb_get_template_part( 'content', 'room' ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php hotel_booking_room_loop_end(); ?>

		<?php if ( count( $related->posts ) > 1 ) : ?>
            <div class="navigation">
                <div class="prev"><span class="pe-7s-angle-left"></span></div>
                <div class="next"><span class="pe-7s-angle-right"></span></div>
            </div>
		<?php endif; ?>
    </div>
<?php endif; ?>
