var isSubmited = false;

$(document).ready(function() {
	var table = $('#students').DataTable({
		"ordering": false,
		"bLengthChange": false,
		"columnDefs": [
		               { "targets": [0,1,2,3], "searchable": false },
		               { "targets": [ 4 ], "visible": false},
		           ]
	});
});

function remove(id, button) {
	if(isSubmited){
		return;
	}
	
	var accepted = confirm("Bạn có chắc muốn xóa không ?");
	
	if(!accepted) {
		return;
	}
	
	var formData = new FormData();
	formData.append('_token', $('#csrf-token').val());
	formData.append('id', id);
	
	isSubmited = true;
	
	$.ajax({
		url: $('#AS-004').val(),
		type: 'POST',
		contentType: false,
		cache: false,
		data: formData,
		processData: false,
		success: function(data) {
			if(data.success) {
				//Lay dòng data hiện hành
				var currentRow = button.parentNode.parentNode;
				//Xóa dòng data hiện hành
				currentRow.parentNode.removeChild(currentRow);
			}
		},
		error: function(data) {
			alert(data.statusText);
		},
		complete: function( data ) {
			isSubmited = false;
		}
	});
}

function loadRequiredSubjects(idSpeciality) {
	if(isSubmited){
		return;
	}

	$('#subject').modal('show');
	//Load datatable
	$('#subjects').DataTable({
		destroy: true,
		"ordering": false,
		"bLengthChange": false,
		"ajax": $('#ASU-001').val() + '/' + idSpeciality,
		"columnDefs": [
		               { "targets": [0], "searchable": false },
		]
	});
}