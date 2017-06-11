@extends('admins.master')

@section('javascript')
<script src="{{ URL::asset('js/admins/student/edit.js?v=4') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".datepicker").datepicker({
			"dateFormat": "yy-mm-dd" 
		});
		
		$("#addMore").click(function () {
			var ar = new Array();
			$('tr[id^="choice"]').each(
	            function() {
	                ar.push(
	                    parseInt( $(this).attr('id').replace('choice','') )
	                );
            });
			var maxIdx = Math.max.apply( Math, ar );
			var tr = $('#choice' + maxIdx);
			var index = maxIdx + 1;
			
		    var clone = tr.clone().attr('id', 'choice' + index).insertAfter(tr);
		    clone.children().eq(0).find('select').attr('id', 'specialityId' + index);
		    clone.children().eq(0).find('select').attr('onChange', 'loadCombobox(' + index + ')');
		    clone.children().eq(0).find('select').attr('name', 'speciality_id[' + index + ']');
		    clone.children().eq(1).find('select').attr('id', 'classkId' + index);
		    clone.children().eq(1).find('select').attr('name', 'classk_id[' + index + ']');
		});
	});
</script>
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
								<label>Ngày nhập học</label>
							</td>
							<td>
								<input type="text" class="form-control datepicker"
									name="begin_term" value="{{ $student->begin_term }}" />
								<label name='validate' value='' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td>
								<label>Ngày kết thúc</label>
							</td>
							<td>
								<input type="text" class="form-control datepicker"
									name="end_term" value="{{ $student->end_term }}" />
								<label name='validate' value='' style="color: red"></label>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th width="50%">
												<label>Khoa</label>
											</th>
											<th>
												<label>Lớp</label>
											</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									@if ($student->id == null)
										<tr id="choice0">
											<td>
												<select id="specialityId0" onChange="loadCombobox(0)" name="speciality_id[0]" class="form-control">
													@foreach($specilities as $specility)
													<option value='{{ $specility->id }}'
													<?php
													if($student->id != null and $stdCls->classk->speciality->id == $specility->id)
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
											<td>
												<select id="classkId0" name="classk_id[0]" class="form-control">
												@foreach($classks as $classk)
													<option value='{{ $classk->id }}'
													<?php
													if($student->id != null and $stdCls->classk_id == $classk->id)
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
									@else
										<?php $cnt = 0; ?>
										@foreach($studentClassks as $stdCls)	
										<tr id="choice{{ $cnt }}">
											<td>
												<select id="specialityId{{ $cnt }}" onChange="loadCombobox({{ $cnt }})" name="speciality_id[{{ $cnt }}]" class="form-control">
													@foreach($specilities as $specility)
													<option value='{{ $specility->id }}'
													<?php
													if($student->id != null and $stdCls->classk->speciality->id == $specility->id)
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
											<td>
												<select id="classkId{{ $cnt }}" name="classk_id[{{ $cnt }}]" class="form-control">
												@foreach($classks as $classk)
													<option value='{{ $classk->id }}'
													<?php
													if($student->id != null and $stdCls->classk_id == $classk->id)
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
											<td>
												<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-md">Delete</button>
												<script>
													function deleteRow(ref)
													{
														$(ref).closest("tr").remove();
													}	
												</script>
											</td>
										</tr>
										<?php $cnt++; ?>
										@endforeach
									@endif
									</tbody>
									<tfoot>
									<tr>
										<td colspan="2" align="right">
											<button id="addMore" name="addMore" class="btn btn-default">Add more</button>
										</td>
									</tr>
									</tfoot>
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
