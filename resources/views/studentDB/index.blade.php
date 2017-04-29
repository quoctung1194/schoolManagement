@extends('studentDB.master')

@section('javascript')
<script src="{{ URL::asset('js/studentDB/index.js?q=1') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Xem kết quả</h1>
</section>

<input type="hidden" id="csrf-token" value="{{ csrf_token() }}" />
<input type="hidden" id="AC-005" value="{{ route('AC-005') }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Danh sách môn học</h3>
		</div>
		<div class="box-body">
			<form method="GET">
				MSSV: <input type="text" name="id_number" value="{{ $studentId }}" style="margin-bottom:10px; margin-left: 5px" />
				<button type="submit">Tìm</button>
			</form>
			<table id="marks_table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="5%">STT</th>
						<th width="35%">Môn Học</th>
						<th width="35%">Hoàn thành</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$stt = 0;
					?>
					@foreach($studentMark as $mark)
					<tr>
						<td>{{ ++$stt }}</td>
						<td>{{ $mark->subject->name }}</td>
						<td>{{ $mark->completedDate }}</td>
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
@endsection
