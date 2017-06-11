@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/studentMark/index.js?v=1.3') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js" ></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Thêm kết quả</h1>
</section>

<link href="{{ URL::asset('frameworks/datatables/buttons.dataTables.min.css') }}" rel="stylesheet" />

<!-- Hidden field -->
<input type="hidden" value="" id="student_marks" />
<input type="hidden" value="{{ route('ASM-002') }}" id="ASM-002" />
<input type="hidden" value="{{ csrf_token() }}" id="csrf-token" />
<input type="hidden" value="{{ route('ASM-001') }}" id="current_route" />
<input type="hidden" value="{{ route('ASM-004') }}" id="ASM-004" />
<!-- ./Hidden field -->

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Các môn phải học</h3>
		</div>
		<div class="box-body">
			<table id="studentMarks" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="5%"></th>
						<th width="auto">Họ Tên</th>
						<th width="25%">MSSV</th>
						<th width="25%">Môn</th>
					</tr>
				</thead>
				<tbody>
					@foreach($unCompletedSubjects as $item)
					<tr>
						<td><input type="checkbox" value="{{ $item->student->id }}-{{ $item->subject->id }}" /></td>
						<td>{{ $item->student->first_name . ' ' . $item->student->last_name  }}</td>
						<td>{{ $item->student->id_number }}</td>
						<td>{{ $item->subject->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
			<button type="button" class="btn btn-primary" onclick="displayPopup();">Hoàn thành</button>
			<a href="{{ route('ASM-003') }}" class="btn btn-primary">Xuất Excel</a>
			<button type="button" class="btn btn-primary" onclick="displayPopupPdf();">Xuất PDF</button>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

<!-- Modal -->
<div id="popup_displayDate" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ngày hoàn thành môn</h4>
      </div>
      <div class="modal-body">
		<div class="box-body">
			<div class="form-group">
				<input type="text" class="form-control" name="completedDate" data-date-format="dd/mm/yyyy"
					id="completedDate" placeholder="Ngày hoàn thành môn">
                <label style="margin-top: 10px">
                    <input type="checkbox" value="1" name="relearn" id="relearn" /> Học lại
                </label>
			</div>
		</div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" onclick="submitForm();">Xác nhận</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="PdfPopup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Xuất Pdf</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
            <form id="pdfForm">
                <div class="form-group">
                    <input type="text" class="form-control" id="content" name="content"
                        placeholder="Nội dung đào tạo">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="date" name="date"
                        placeholder="Ngày">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="teacher" name="teacher"
                        placeholder="Giáo viên">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="location" name="location"
                        placeholder="Địa điểm">
                </div>
            <form/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="exportPDF();">Xác nhận</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
