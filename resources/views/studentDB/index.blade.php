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
						<th width="25%">Môn Học</th>
						<th width="25%">Hoàn thành</th>
						<th width="auto">Thời hạn học lại</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$stt = 0;
					?>
					@foreach($studentMark as $mark)
						@if(!empty($mark->relearn_date))
							<tr style="background-color: yellow; color: black">
						@elseif (empty($mark->completedDate) and
								!empty($mark->subject->range_begin) and
								!empty($begin_term))
							@php
								$termDate = date(
									'Y-m-d',
									strtotime($begin_term . ' ' . $mark->range_begin)
								);
								$currentDate = date('Y-m-d');

								if($currentDate > $termDate) {
									echo '<tr style="background-color: red; color: white">';
								} else {
									echo '<tr/>';
								}
							@endphp
						@else
							<tr>
						@endif
							<td>{{ ++$stt }}</td>
							<td>{{ $mark->subject->name }}</td>
							<td>{{ $mark->completedDate }}</td>
							<td>{{ $mark->relearn_date }}</td>
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
