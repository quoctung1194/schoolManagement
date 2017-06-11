<?php
namespace Repository\Subject;

use App\Speciality;
use App\Subject;
use Illuminate\Support\Facades\DB;
use App\SubjectSpeciality;

class SubjectRepository implements ISubjectRepository
{
	public function getSubjectsBySpeciality($specialityId) {
		$list =  Speciality::find($specialityId)
						->subjectSpecialities;
		
		$result = [];
		$count = 0;
		foreach($list as $item) {
			$obj = array();
			if($item->subject != null) {
				$obj[] = ++$count;
				$obj[] = $item->subject->name;
				
				$result[] = $obj;
			}
		}
		
		return $result;
	}
	
	public function getAll()
	{
		return Subject::orderBy('name', 'asc')->get();
	}
	
	public function remove($id)
	{
		$student = Subject::findOrFail($id);
		$student->delete();
	}
	
	public function save($params)
	{
		try {
			DB::beginTransaction();
				
			if(empty($params['id'])) {
				$id = null;
			} else {
				$id = $params['id'];
			}
				
			$subject = Subject::firstOrNew([
				'id' => $id,
			]);
				
			$subject->name = $params['name'];	
			$subject->range_relearn = $params['range_relearn'];
			$subject->range_begin = $params['range_begin'];
			$subject->save();
			
			$this->saveSpecialities($subject->id, explode(",", $params['specialities']));
			DB::commit();
			return $subject;
				
		} catch (\Exception $ex) {
			\Log::error("App\Repositories\Subject\SubjectRepository - save - " . $ex->getMessage());
			DB::rollBack();
			return null;
		}
	}
	
	private function saveSpecialities($subjectId, $specialityIds)
	{
		//Xóa tất cả các record của service Id trước đó
		$query = SubjectSpeciality::where('subject_id', $subjectId)->delete();
	
		//Insert các dòng record mới
		foreach($specialityIds as $id) {
			$item = new SubjectSpeciality();
			$item->subject_id = $subjectId;
			$item->speciality_id = $id;
			$item->save();
		}
	}
}