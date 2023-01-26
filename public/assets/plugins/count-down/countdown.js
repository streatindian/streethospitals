(function($) {
    "use strict";

	var myDate = new Date();
	myDate.setDate(myDate.getDate() + 2);
	$("#countdown").countdown(myDate, function (event) {
		$(this).html(
			event.strftime(
				'<div class="timer-wrapper"><div class="time">%D</div><span class="text">Days</span></div><div class="timer-wrapper"><div class="time">%H</div><span class="text">Hours</span></div><div class="timer-wrapper"><div class="time">%M</div><span class="text">Min</span></div><div class="timer-wrapper"><div class="time">%S</div><span class="text">Sec</span></div>'
			)
		);
	});

})(jQuery);