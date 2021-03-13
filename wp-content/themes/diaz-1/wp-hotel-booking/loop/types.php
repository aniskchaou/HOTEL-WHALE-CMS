<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$room    = WPHB_Room::instance( get_the_ID() );
echo get_the_term_list(get_the_ID(), 'hb_room_type', '<div class="room-type">', ' ', '</div> ');