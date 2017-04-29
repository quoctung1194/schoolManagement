@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/speciality/index.js?q=3') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý khoa</h1>
	<div style="margin-top: 10px">
		<a href="{{ route('ASP-002') }}" type="button" class="btn btn-primary">Tạo mới</a>
	</div>
</section>

<input type="hidden" id="csrf-token" value="{{ csrf_token() }}" />
<input type="hidden" id="ASP-004" value="{{ route('ASP-004') }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Danh sách khoa</h3>
		</div>
		<div class="box-body">
			<table id="specialities" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="5%">STT</th>
						<th width="50%">Khoa</th>
						<th>Tùy chỉnh</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 0;?>
					@foreach($specialities as $speciality)
					<tr>
						<td>{{ ++$stt }}</td>
						<td>{{ $speciality->name }}</td>
						<td>
							<a href="{{ route('ASP-002', ['id' => $speciality->id]) }}">
								<i class="icon ion-edit"></i>
							</a>
							&nbsp;&nbsp;
							<a style="cursor:pointer" onclick="remove( {{ $speciality->id }}, this)">
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
