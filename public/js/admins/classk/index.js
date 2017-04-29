var isSubmited = false;

$(document).ready(function() {
	var table = $('#classks').DataTable({
		"ordering": false,
		"bLengthChange": false,
		"columnDefs": [
		               { "targets": [0,1,2,3], "searchable": false },
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
		url: $('#AC-005').val(),
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
