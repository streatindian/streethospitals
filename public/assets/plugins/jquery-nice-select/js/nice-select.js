(function($) {
    "use strict";	
	
	// ______________Nice Select	
	$('select.nice-select').niceSelect();
		
	$('#post-categories').change(function() {
		$('.post-content').hide();
		$('#' + $(this).val()).show();
	});
	
})(jQuery);