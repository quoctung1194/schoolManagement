 var isSubmited = false;
 var table = null;
 var completedDate = null;
 
$(document).ready(function() {
	table = $('#studentMarks').dataTable({
		"ordering": false,
		"bLengthChange": false,
		"columnDefs": [
		               { "targets": [0, 3], "searchable": false },
		],
	});
	
	//Date picker
	completedDate = $('#completedDate').datepicker({
		autoclose: true,
		setDate: new Date(),
	});
});

function displayPopup()
{
	if(isSubmited){
		return;
	}

	$('#popup_displayDate').modal('show');
}

function exportPDF() {
	var checkboxs = $(table.fnGetNodes()).find('input:checked');
	if (checkboxs.length == 0)
	{
		alert('Vui lòng chọn ít nhất một môn học');
		return;
	}
	
	isSubmited = true;
	
	//Convert các giá trị checkbox được check vào hidden field
	convertCheckboxs();	
	window.open($("#ASM-004").val() + "/" + $('#student_marks').val(), "_blank");
}

function submitForm() {
	
	if (isSubmited) {
		return;
	}
	else
	{
		var checkboxs = $(table.fnGetNodes()).find('input:checked');
		if (checkboxs.length == 0)
		{
			alert('Vui lòng chọn ít nhất một môn học');
			return;
		}
		else if ($('#completedDate').val() == '')
		{
			alert('Vui lòng chọn ngày hoàn thành');
			return;
		}
	}
	
	isSubmited = true;
	
	//Convert các giá trị checkbox được check vào hidden field
	convertCheckboxs();
	//Tạo formData
	var formData = new FormData();
	formData.append('student_marks', $('#student_marks').val());
	formData.append('completedDate', $('#completedDate').val());
	formData.append('_token', $('#csrf-token').val());
	
	$.ajax({
		url: $("#ASM-002").val(),
		type: 'POST',
		contentType: false,
		cache: false,
		data: formData,
		processData: false,
		dataType: "json",
		success: function(data) { 
			window.location = $("#current_route").val();
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
		$('#student_marks').val(ids.slice(0, -1));
	}
}