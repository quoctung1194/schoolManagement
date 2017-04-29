@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/subject/index.js?q=2') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý môn học</h1>
	<div style="margin-top: 10px">
		<a href="{{ route('ASU-003') }}" type="button" class="btn btn-primary">Tạo mới</a>
	</div>
</section>

<input type="hidden" id="csrf-token" value="{{ csrf_token() }}" />
<input type="hidden" id="ASU-004" value="{{ route('ASU-004') }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Danh sách môn học</h3>
		</div>
		<div class="box-body">
			<table id="students" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="5%">STT</th>
						<th width="auto">Môn Học</th>
						<th>Tùy Chỉnh</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 0;?>
					@foreach($subjects as $subject)
					<tr>
						<td>{{ ++$stt }}</td>
						<td>{{ $subject->name }}</td>
						<td width="20%">
							<a href="{{ route('ASU-003', ['id' => $subject->id]) }}">
								<i class="icon ion-edit"></i>
							</a>
							&nbsp;&nbsp;
							<a style="cursor:pointer" onclick="remove( {{ $subject->id }}, this)">
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
        <h4 class="modal-title">MÃ´n há»�c báº¯t buá»™c</h4>
      </div>
      <div class="modal-body">
        <table id="subjects" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th width="5%">STT</th>
					<th width="25%">TÃªn mÃ´n há»�c</th>
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
