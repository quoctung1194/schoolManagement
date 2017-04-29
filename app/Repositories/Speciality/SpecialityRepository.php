<?php
namespace Repository\Speciality;

use App\Speciality;
use App\Subject;
use Illuminate\Support\Facades\DB;
use App\SubjectSpeciality;

class SpecialityRepository implements ISpecialityRepository
{
	public function getAll()
	{
		return Speciality::all();
	}
	
	public function getSpeciality($id) {
		$query = DB::table('specialities')
		->whereNull('deleted_at')
		->where('id', '=', $id);
		
		return $query->get();
	}
	
	public function getSpecialitiesBySubject($subjectId)
	{
		return Subject::find($subjectId)->subjectSpecialities;		
	}
	
	public function save($params) {
		try {
			DB::beginTransaction();
	
			if (empty($params['id'])) {
				$id = null;
			} else {
				$id = $params['id'];
			}
	
			$spec = Speciality::firstOrNew([
				'id' => $id,
			]);
	
			$spec->name = $params['name'];
			$spec->save();
				
			$this->saveSubjects($spec->id, explode(",", $params['subjects']));
			DB::commit();
			return $spec;
	
		} catch (\Exception $ex) {
			\Log::error("App\Repositories\Speciality\SpecialityRepository - save - " . $ex->getMessage());
			DB::rollBack();
			return null;
		}
	}
	
	private function saveSubjects($specialityId, $subjectIds) {
		//Xóa tất cả các record trước đó
		$query = SubjectSpeciality::where('speciality_id', $specialityId)->delete();
	
		//Insert các dòng record mới
		foreach($subjectIds as $id) {
			$item = new SubjectSpeciality();
			$item->subject_id = $id;
			$item->speciality_id = $specialityId;
			$item->save();
		}
	}
	
	public function remove($id) {
		$spec = Speciality::findOrFail($id);
		$spec->delete();
	}
}