<?php
namespace Repository\Student;

use App\Student;
use Illuminate\Support\Facades\DB;
use App\StudentClassk;

class StudentRepository implements IStudentRepository
{
	public function getAll()
	{
		return Student::orderBy('id', 'desc')->get();
	}
	
	public function save($params) {
		try {
			DB::beginTransaction();
			
			if(empty($params['id'])) {
				$id = null;
			} else {
				$id = $params['id'];
			}
			
			$student = Student::firstOrNew([
				'id' => $id,
			]);
			
			$student->id_number = $params['id_number'];
			$student->last_name = $params['last_name'];
			$student->first_name = $params['first_name'];
			$student->begin_term = $params['begin_term'];
			$student->end_term = $params['end_term'];
			$student->classk_id = $params['classk_id'][0];
			
			$student->save();
			
			$this->saveStudentClassk($student->id, $params['classk_id']);
			
			DB::commit();
			
			return $student;
			
		} catch (\Exception $ex) {
			\Log::error("App\Repositories\Student\StudentRepository - save - " . $ex->getMessage());
			DB::rollBack();
			return null;
		}
		
	}
	
	public function saveStudentClassk($studentId, $classkIds) {
		$query = StudentClassk::where('student_id', $studentId)->delete();
		
		foreach($classkIds as $id) {
			$item = new StudentClassk();
			$item->student_id = $studentId;
			$item->classk_id = $id;
			$item->save();
		}
	}
	
	public function remove($id) {
		$student = Student::findOrFail($id);
		$student->delete();
	}
}