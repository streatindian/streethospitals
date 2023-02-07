(function($) {
	"use strict";
	
	timeline(document.querySelectorAll('.timeline'), {
		forceVerticalMode: 700,
		mode: 'vertical',
		verticalStartPosition: 'left',
		visibleItems: 4
	});
	
})(jQuery);