@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/speciality/edit.js?q=2') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý khoa</h1>
</section>

<input type="hidden" id="current_route" value="{{ URL::route('ASP-002') }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<form method="post" id="editForm" action="{{ route('ASP-003') }}" onsubmit="return false">
			{{ csrf_field() }}
			<input type="hidden" name="id" id="id" value="{{ $speciality->id }}" />
			<input type="hidden" name='subjects' id='subjects' value='' />
			
			<div class="box-header with-border">
				<h3 class="box-title">Chi tiết khoa</h3>
			</div>
			<div class="box-body">
				<table id="students" class="table table-bordered table-hover" style="width: 60%;">
					<tbody>
						<tr>
							<td width="15%">
								<label>Tên khoa</label>
							</td>
							<td>
								<input type="text" class="form-control" name="name" value="{{ $speciality->name }}">
								<label name='validate' value='name_error' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td>
								<label>Môn bắt buộc</label>
							</td>
							<td class="2">
								<label name='validate' value='subjects_error' style="color: red"></label>
								<table id="tableSubjects" class="table">
									<thead>
										<tr>
											<th width="10%"></th>
											<th width="auto">Tên môn học</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($subjects as $subject)
										<tr>
											<td>
												<input type="checkbox" value="{{ $subject->id }}"
													<?php
														foreach ($selectedSubjects as $selectedSubject) {
															if ($selectedSubject->subject_id == $subject->id) {
																echo 'checked';
															}
														}
													?>
											 	/>
											</td>
											<td>{{ $subject->name }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
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
