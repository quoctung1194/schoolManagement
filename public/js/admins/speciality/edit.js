var isSubmited = false;
var table = null;

$(document).ready(function() {
	table = $('#tableSubjects').dataTable({
		"ordering": false,
		"bLengthChange": false,
		"searching": false,
	});
});

function submitForm() {
	
	if (isSubmited) {
		return;
	}
	
	var validates = document.getElementsByName('validate');
	validates.forEach(function(label){
		label.innerHTML = '';
	});
	isSubmited = true;
	
	//Convert các giá trị checkbox được check vào hidden field
	convertCheckboxs();
	
	var formData = new FormData($("#editForm")[0]);
	$.ajax({
		url: $("#editForm").attr('action'),
		type: 'POST',
		contentType: false,
		cache: false,
		data: formData,
		processData: false,
		dataType: "json",
		success: function(data){
			
			if (data.success == false) {
				for (error in data.message) {
					for (var i = 0; i < validates.length; i++) {
						var labelValue = validates[i].getAttribute('value');
						if (labelValue == error + '_error') {
							validates[i].innerHTML = data.message[error][0];
							break;
						}
					}
				}
			} else {
				window.location=$("#current_route").val() + "/" + data.id;
			}
		},
		error: function(data){
			alert(data.statusText);
		},
		complete: function(data) {
			isSubmited = false;
		}
	});
}

/**
 * Convert các checkbox vào hidden field
 */
function convertCheckboxs() {
	//Lấy ra mảng các checkbox được check
	var checkboxs = $(table.fnGetNodes()).find('input:checked');
	//Biến chứa các id của các checkbox được check
	var ids = '';
	
	for(var i = 0; i < checkboxs.length; i++) {
		ids += checkboxs[i].value+',';
	}
	
	//Gán giá trị vào hidden field và loại bỏ dấu ' tại cuối chuỗi
	if(ids.length > 0) {
		$('#subjects').val(ids.slice(0, -1));
	}
}