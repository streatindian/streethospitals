$(function() {
	'use strict'
	// Fileupload
	$('.dropify').dropify({
		messages: {
			'default': 'Drag and drop a file here or click',
			'replace': 'Drag and drop or click to replace',
			'remove': 'Remove',
			'error': 'Ooops, something wrong appended.'
		},
		error: {
			'fileSize': 'The file size is too big (2M max).'
		}
	});
	
	// Input Mask
	$(":input").inputmask();
	
	// Toggles
	$('.toggle').toggles({
		on: true,
		height: 26
	});
	
	// Input Masks
	$('#dateMask').mask('99/99/9999');
	$('#phoneMask').mask('(999) 999-9999');
	$('#ssnMask').mask('999-99-9999');
	
	// Time Picker
	$('#tpBasic').timepicker();
	$('#tp2').timepicker({
		'scrollDefault': 'now'
	});
	$('#tp3').timepicker();
	$('#setTimeButton').on('click', function() {
		$('#tp3').timepicker('setTime', new Date());
	});
	
	// Color picker
	$('#colorpicker').spectrum({
		color: '#2b88ff'
	});
	$('#showAlpha').spectrum({
		color: 'rgba(0, 97, 218, 0.5)',
		showAlpha: true
	});
	$('#showPaletteOnly').spectrum({
		showPaletteOnly: true,
		showPalette: true,
		color: '#DC3545',
		palette: [
			['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
			['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
		]
	});
	
	// Select2
	$('.dataTables_length select').select2({
		minimumResultsForSearch: Infinity
	});
	
	// Datepicker
	$('.fc-datepicker').datepicker({
		showOtherMonths: true,
		selectOtherMonths: true
	});
	$('#datepickerNoOfMonths').datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		numberOfMonths: 2
	});
});