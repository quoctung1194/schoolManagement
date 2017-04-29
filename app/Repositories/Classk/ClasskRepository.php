<?php
namespace Repository\Classk;

use App\Classk;
use Illuminate\Support\Facades\DB;

class ClasskRepository implements IClasskRepository
{
	public function getClasskBySpecialiy($specialityId) {
		return Classk::where('speciality_id', '=', $specialityId)->get();
	}
	
	public function getAll()
	{
		return Classk::orderBy('id', 'asc')->get();
	}
	
	public function save($params) {
		try {
			DB::beginTransaction();
				
			if(empty($params['id'])) {
				$id = null;
			} else {
				$id = $params['id'];
			}
				
			$classk = Classk::firstOrNew([
					'id' => $id,
					]);
				
			$classk->name = $params['name'];
			$classk->speciality_id = $params['speciality_id'];
				
			$classk->save();
				
			DB::commit();
			return $classk;
				
		} catch (\Exception $ex) {
			\Log::error("App\Repositories\Classk\ClasskRepository - save - " . $ex->getMessage());
			DB::rollBack();
			return null;
		}
	
	}
	
	public function remove($id) {
		$classk = Classk::findOrFail($id);
		$classk->delete();
	}
}