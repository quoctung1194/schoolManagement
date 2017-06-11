@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/subject/edit.js') }}"></script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Quản lý môn học</h1>
</section>

<input type="hidden" id="current_route" value="{{ URL::route('ASU-003') }}" />
<input type="hidden" id="selectRangeDate" value="{{ $subject->range_relearn }}" />
<input type="hidden" id="selectRangeBegin" value="{{ $subject->range_begin }}" />

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<form id="editForm" action="{{ route('ASU-005') }}" onsubmit="return false">
			{{ csrf_field() }}
			<div class="box-header with-border">
				<h3 class="box-title">Chi tiết</h3>
			</div>
			
			<!-- Hidden field -->
			<input type="hidden" name="id" value="{{ $subject->id }}" />
			<input type="hidden" name='specialities' id='specialities' value='' />
			
			<div class="box-body">
				<table class="table table-bordered" style="width: 100%;">
					<tbody>
						<tr>
							<td width="15%">
								<label>Tên môn học</label>
							</td>
							<td>
								<input type="text" class="form-control" name="name" value="{{ $subject->name }}">
								<label name='validate' value='name_error' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td width="15%">
								<label>Khoảng thời gian yêu cầu học lại</label>
							</td>
							<td>
								<select name="range_relearn" id="range_relearn" class="form-control">
									<option value="+3 months">3 tháng</option>
									<option value="+6 months">6 tháng</option>
									<option value="+1 year">1 năm</option>
								</select>
								<label name='validate' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td width="15%">
								<label>Thời hạn yêu cầu hoàn thành môn (Sau khi nhập học)</label>
							</td>
							<td>
								<select name="range_begin" id="range_begin" class="form-control">
									<option>Không yêu cầu</option>
									<option value="+1 weeks">1 tuần</option>
									<option value="+2 weeks">2 tuần</option>
								</select>
								<label name='validate' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td>
								<label>Khoa</label>
							</td>
							<td class="2">
								<label name='validate' value='specialities_error' style="color: red"></label>
								<table id="tableSpec" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th width="5%"></th>
											<th width="auto">Khoa</th>
										</tr>
									</thead>
									<tbody>
										@foreach($specialities as $speciality)
											<tr>
												<td>
													<input type="checkbox" value="{{ $speciality->id }}" <?php
													foreach($selectedSpecialities as $selectedSpeciality) {
														if($selectedSpeciality->speciality_id == $speciality->id) {
															echo 'checked';
														}
													}
													?>/>
												</td>
												<td>
													{{ $speciality->name }}
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="2">
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