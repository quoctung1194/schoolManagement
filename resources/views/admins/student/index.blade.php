@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/student/index.js?q=2') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý sinh viên</h1>
	<div style="margin-top: 10px">
		<a href="{{ route('AS-002') }}" type="button" class="btn btn-primary">Tạo mới</a>
	</div>
</section>

<input type="hidden" id="csrf-token" value="{{ csrf_token() }}" />
<input type="hidden" id="AS-004" value="{{ route('AS-004') }}" />
<input type="hidden" id="ASU-001" value="{{ route('ASU-001') }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Danh sách sinh viên</h3>
		</div>
		<div class="box-body">
			<table id="students" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="5%">STT</th>
						<th width="25%">Họ</th>
						<th width="25%">Tên</th>
						<th width="25%">Khoa</th>
						<th>MSSV</th>
						<th>Tùy chỉnh</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 0;?>
					@foreach($students as $student)
					<tr>
						<td>{{ ++$stt }}</td>
						<td>{{ $student->first_name }}</td>
						<td>{{ $student->last_name }}</td>
						<td><a style="cursor:pointer" onclick="loadRequiredSubjects('{{ $student->classk->speciality->id }}')">{{ $student->classk->speciality->name }}</a></td>
						<td>{{ $student->id_number }}</td>
						<td>
							<a href="{{ route('AS-002', ['id' => $student->id]) }}">
								<i class="icon ion-edit"></i>
							</a>
							&nbsp;&nbsp;
							<a style="cursor:pointer" onclick="remove( {{ $student->id }}, this)">
								<i class="icon ion-close"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

<!-- Modal -->
<div id="subject" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Môn học bắt buộc</h4>
      </div>
      <div class="modal-body">
        <table id="subjects" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="5%">STT</th>
					<th width="25%">Tên môn học</th>
				</tr>
			</thead>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
