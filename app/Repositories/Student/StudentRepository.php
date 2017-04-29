<?php
namespace Repository\Student;

use App\Student;
use Illuminate\Support\Facades\DB;

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
			$student->classk_id = $params['classk_id'];
			
			$student->save();
			
			DB::commit();
			return $student;
			
		} catch (\Exception $ex) {
			\Log::error("App\Repositories\Student\StudentRepository - save - " . $ex->getMessage());
			DB::rollBack();
			return null;
		}
		
	}
	
	public function remove($id) {
		$student = Student::findOrFail($id);
		$student->delete();
	}
}