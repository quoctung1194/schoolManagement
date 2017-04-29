@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/student/edit.js?v=2') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý sinh viên</h1>
</section>

<input type="hidden" id="current_route" value="{{ URL::route('AS-002') }}" />
<input type="hidden" id="CS-001" value="{{ route('CS-001') }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<form id="editForm" action="{{ route('AS-003') }}" onsubmit="return false">
			{{ csrf_field() }}
			<input type="hidden" name="id" id="id" value="{{ $student->id }}" />
			
			<div class="box-header with-border">
				<h3 class="box-title">Chi tiết sinh viên</h3>
			</div>
			<div class="box-body">
				<table id="students" class="table table-bordered table-hover" style="width: 60%;">
					<tbody>
						<tr>
							<td width="15%">
								<label>Họ</label>
							</td>
							<td>
								<input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}">
								<label name='validate' value='last_name_error' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td>
								<label>Tên</label>
							</td>
							<td>
								<input type="text" class="form-control" name="first_name" value="{{ $student->first_name }}">
								<label name='validate' value='first_name_error' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td>
								<label>MSSV</label>
							</td>
							<td>
								<input type="text" class="form-control" name="id_number" value="{{ $student->id_number }}">
								<label name='validate' value='id_number_error' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td>
								<label>Khoa</label>
							</td>
							<td>
								<select id="specialityId" onChange="loadCombobox()" name="speciality_id" class="form-control">
									@foreach($specilities as $specility)
									<option value='{{ $specility->id }}'
									<?php
									if($student->id != null and $student->classk->speciality->id == $specility->id)
									{
										echo 'selected';
									}
									?>
									>
										{{ $specility->name }}
									</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label>Lớp</label>
							</td>
							<td>
								<select id="classkId" name="classk_id" class="form-control">
								@foreach($classks as $classk)
									<option value='{{ $classk->id }}'
									<?php
									if($student->id != null and $student->classk_id == $classk->id)
									{
										echo 'selected';
									}
									?>
									>
										{{ $classk->name }}
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
