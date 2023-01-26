$(function(e) {
	$('#example').DataTable();
	$('#example2').DataTable();

	// DataTable
	$('#datatable1').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		}
	});
	$('#datatable2').DataTable({
	});

} );
