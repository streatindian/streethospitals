(function($) {
	//fancyfileuplod
	$('.upload').FancyFileUpload({
	params : {
		 action : 'fileuploader'
		},
		maxfilesize : 1000000
	});
})(jQuery);