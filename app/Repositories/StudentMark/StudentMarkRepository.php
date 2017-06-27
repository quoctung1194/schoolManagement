<?php
namespace Repository\StudentMark;

use App\StudentMark;
use App\Student;
use App\Subject;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class StudentMarkRepository implements IStudentMarkRepository
{
	public function getUncompletedSubjects()
	{
		//Mảng chứa những môn không hoàn thành của toàn bộ sinh viên
		$unCompletedSubjects = array();
		
		$students = Student::all();
		foreach ($students as $student)
		{
			//Lấy tất cả các môn học bắt buộc của tất cả các môn bắt buộc
			$requirementSubjects = $student->classk->speciality->subjectSpecialities;
			
			//Lấy những môn mà sinh viên này đã hoàn thành
			$marks = $student->marks;
			foreach($marks as $mark)
			{
				$requirementSubjects = $requirementSubjects->where('subject_id', '<>', $mark->subject_id);
			}
			
			foreach($requirementSubjects as $requirementSubject)
			{
				if($requirementSubject->subject != null and $requirementSubject->speciality != null)
				{
					$requirementSubject->student = $student;
					$unCompletedSubjects[] = $requirementSubject;
				}
			}
		}
		
		return $unCompletedSubjects;
	}
	
	public function getRequirementSubjects($spe = null)
	{
		//Mảng chứa toàn bộ môn của sinh viên
		$requirementSubjects = array();
		$result = array();
		
		$students = Student::all();
		foreach ($students as $student)
		{
			if(!empty($spe)) {
				if($student->classk->speciality->id == $spe) {
					continue;
				}
			}
			
			//Lấy tất cả các môn học bắt buộc của sinh viên
			$requirementSubjects = $student->classk->speciality->subjectSpecialities;
			
			//Lấy những môn mà sinh viên này đã hoàn thành
			$marks = $student->marks;
			
			foreach($requirementSubjects as $requirementSubject)
			{
				if($requirementSubject->subject != null and $requirementSubject->speciality != null)
				{
					$requirementSubject->student = $student;
			
					//Xét xem môn này hoàn thành hay chưa
					foreach($marks as $mark)
					{
						if ($mark->subject_id == $requirementSubject->subject->id)
						{
							$requirementSubject->completedDate = $mark->completed_date;
							break;
						}
					}
					$result[] = $requirementSubject;
				}
			}
		}
		
		return $result;
	}
	
	public function saveCompletedSubjects($params)
	{
		try 
		{
			DB::beginTransaction();
			//Tách chuỗi mảng thành điểm
			$studentMarks = explode(",", $params['student_marks']);
			foreach ($studentMarks as $studentMark)
			{
				$informations = explode("-", $studentMark);
				$student_id =  $informations[0];
				$subject_id = $informations[1];
				
				$mark = new StudentMark();
				$mark->student_id = $student_id;
				$mark->subject_id = $subject_id;
				$mark->completed_date = \DateTime::createFromFormat('d/m/Y', $params['completedDate'])->format('Y/m/d');

				// Xác định thời hạn học lại
				if($params['relearn'] == 'true') {
					$currentSubject = Subject::find($subject_id);
					$mark->relearn_date =
						date('Y-m-d', strtotime($mark->completed_date . ' ' . $currentSubject->range_relearn));
				}

				$mark->save();
			}
		
			DB::commit();
		}
		catch (\Exception $e)
		{
			DB::rollBack();
		}
	}
	
	public function displayMarkByStudent($student)
	{
		//Lấy tất cả các môn học bắt buộc của sinh viên
		$requirementSubjects = $student->classk->speciality->subjectSpecialities;
		//Lấy những môn mà sinh viên này đã hoàn thành
		$marks = $student->marks;
		$result = array();

		foreach($requirementSubjects as $requirementSubject)
		{
			if($requirementSubject->subject != null and $requirementSubject->speciality != null)
			{
				//Xét xem môn này hoàn thành hay chưa
				foreach($marks as $mark)
				{
					if ($mark->subject_id == $requirementSubject->subject->id)
					{
						$requirementSubject->completedDate = $mark->completed_date;
						$requirementSubject->relearn_date = $mark->relearn_date;
						break;
					}
				}
				$result[] = $requirementSubject;
			}
		}

		return $result;
	}
	
}