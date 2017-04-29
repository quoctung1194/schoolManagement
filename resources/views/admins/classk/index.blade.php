@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/classk/index.js?q=2') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý lớp học</h1>
	<div style="margin-top: 10px">
		<a href="{{ route('AC-003') }}" type="button" class="btn btn-primary">Tạo mới</a>
	</div>
</section>

<input type="hidden" id="csrf-token" value="{{ csrf_token() }}" />
<input type="hidden" id="AC-005" value="{{ route('AC-005') }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Danh sách lớp học</h3>
		</div>
		<div class="box-body">
			<table id="classks" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="5%">STT</th>
						<th width="35%">Lớp</th>
						<th width="35%">Khoa</th>
						<th>Tùy chỉnh</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 0;?>
					@foreach($classks as $classk)
					<tr>
						<td>{{ ++$stt }}</td>
						<td>{{ $classk->name }}</td>
						<td>{{ $classk->speciality->name }}</td>
						<td>
							<a href="{{ route('AC-003', ['id' => $classk->id]) }}">
								<i class="icon ion-edit"></i>
							</a>
							&nbsp;&nbsp;
							<a style="cursor:pointer" onclick="remove( {{ $classk->id }}, this)">
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
@endsection
