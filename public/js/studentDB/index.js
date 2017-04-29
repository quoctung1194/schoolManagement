var isSubmited = false;
var table = null;

$(document).ready(function() {
	table = $('#marks_table').DataTable({
		"ordering": false,
		"bLengthChange": false,
		"searching": false,
		"columnDefs": [
		               { "targets": [0,1,2], "searchable": false },
		           ]
	});
});
