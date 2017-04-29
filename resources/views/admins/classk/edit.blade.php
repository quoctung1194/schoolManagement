@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/classk/edit.js') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý lớp học</h1>
</section>

<input type="hidden" id="current_route" value="{{ URL::route('AC-003') }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<form method="post" id="editForm" action="{{ route('AC-004') }}" onsubmit="return false">
			{{ csrf_field() }}
			<input type="hidden" name="id" id="id" value="{{ $classk->id }}" />
			<div class="box-header with-border">
				<h3 class="box-title">Chi tiết lớp học</h3>
			</div>
			<div class="box-body">
				<table id="students" class="table table-bordered table-hover" style="width: 60%;">
					<tbody>
						<tr>
							<td width="15%">
								<label>Tên lớp</label>
							</td>
							<td>
								<input type="text" class="form-control" name="name" value="{{ $classk->name }}">
								<label name='validate' value='name_error' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td>
								<label>Khoa</label>
							</td>
							<td>
								<select id="specialityId" name="speciality_id" class="form-control">
									@foreach($specilities as $specility)
									<option value='{{ $specility->id }}' 
										<?php if($classk->id != null && $classk->speciality_id == $specility->id) { echo 'selected'; } ?>>
										{{ $specility->name }}
									</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<button class="btn btn-default" onclick="submitForm()">Hoàn thành</button>
							</td>
						</tr>
					</tbody>
				</table>
	
			</div>
		<!-- /.box-body -->
		</form>
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->
@endsection
