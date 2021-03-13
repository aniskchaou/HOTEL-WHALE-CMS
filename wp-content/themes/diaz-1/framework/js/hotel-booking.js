function isInteger(a) {
	return Number(a) || ( a % 1 === 0 );
}

jQuery.noConflict();
jQuery(document).ready(function($){
    "use strict";

	var a = new Date();
	var n = new Date();

	var i = $(document).triggerHandler('hotel_booking_min_check_in_date', [1, a, n]);
	i = parseInt(i);
	if (!isInteger(i)) {
		i = 1;
	}

	n.setDate(a.getDate() + i);

	$('input[id^="check_in_date"]').datepicker("option", {
		showOn: "button",
		buttonText: '<i class="fa fa-calendar"></i>',
		altField: $('input[id^="check_in_date"]').parent().find(".day"),
		altFormat: "dd",
		onSelect: function() {
			var t = $(this).attr("id");
			t = t.replace("check_in_date_", "");
			var a = $(this).datepicker("getDate"),
			n = hotel_booking_i18n.monthNamesShort[a.getMonth()]+' '+a.getFullYear();
			$('input[id^="check_in_date"]').parent().find(".month").val(n);
			var s = $("#check_out_date_" + t);
			a.setDate(a.getDate() + i), s.datepicker("option", "minDate", a)
		},
		onClose: function() {
			var t = $(this).attr("id");
			t = t.replace("check_in_date_", ""), $("#check_out_date_" + t).datepicker("show")
		}
	});
	$('input[id^="check_in_date"]').datepicker("refresh");

	$('input[id^="check_out_date"]').datepicker("option", {
		showOn: "button",
		buttonText: '<i class="fa fa-calendar"></i>',
		altField: $('input[id^="check_out_date"]').parent().find(".day"),
		altFormat: "dd",
		onSelect: function() {
			var t = $(this).attr("id");
			t = t.replace("check_out_date_", "");
			var a = $(this).datepicker("getDate"),
			n = hotel_booking_i18n.monthNamesShort[a.getMonth()]+' '+a.getFullYear();
			$('input[id^="check_out_date"]').parent().find(".month").val(n)
		}
    });
	$('input[id^="check_out_date"]').datepicker("refresh");

	//Related Items...
	if($(".hb_related_other_room ul.rooms").length) {
		$(".hb_related_other_room ul.rooms").each(function(){

		  var $min = 3;
		  if($(window).width() <= 767) { $min = 1; }

		  var prv = $(this).parent('.hb_related_other_room').find('.navigation .prev'); var nxt = $(this).parent('.hb_related_other_room').find('.navigation .next');

		  $(this).carouFredSel({
			responsive: true,
			auto: false,
			width: '100%',
			prev: prv,
			next: nxt,
			height: 'variable',
			scroll: { items: 1 },
			items: { width: parseInt( 1230 / $min ),  height: 'variable', visible: { min: 1, max: 3 } },
			onCreate: function () {
				$(window).bind("resize", function() {
					$(this).trigger('configuration', ['debug', false, true]);
				}).trigger('resize');
			},
			swipe: {
				onMouse: true,
				onTouch: true
			}
		  });
		});
	}

    if($('aside.widget_hb_widget_search').length){
        $('aside.widget_hb_widget_search').theiaStickySidebar({
            additionalMarginTop: 40,
            containerSelector: $('#primary')
        });
    }
});