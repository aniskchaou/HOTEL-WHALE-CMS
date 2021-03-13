<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$room    = WPHB_Room::instance( get_the_ID() ); ?>

<div class="room-description"><?php
	$limit = !empty($limit) ? $limit : 15;

	$excerpt = explode(' ', $room->addition_information, $limit);
	$excerpt = array_filter($excerpt);

	if (!empty($excerpt)) {
		if (count($excerpt) >= $limit) {
			array_pop($excerpt);
			$excerpt = implode(" ", $excerpt).'...';
		} else {
			$excerpt = implode(" ", $excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
		$excerpt = str_replace('&nbsp;', '', $excerpt);
		if(!empty ($excerpt))
			echo "<p>{$excerpt}</p>";
	} ?>
</div>