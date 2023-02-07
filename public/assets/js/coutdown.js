(function($) {
	"use strict";
	// ______________Countdown
	$('#count-down').countDown({
		targetDate: {
			'day': 15,
			'month': 10,
			'year': 2027,
			'hour': 0,
			'min': 0,
			'sec': 0
		},
		omitWeeks: true
	});

	
})(jQuery);