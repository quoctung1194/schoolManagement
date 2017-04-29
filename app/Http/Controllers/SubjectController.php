<?php
namespace App\Http\Controllers;

use Repository\Subject\ISubjectRepository;
use App\Subject;
use Illuminate\Http\Request;
use Repository\Speciality\ISpecialityRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
	
	public function __construct(ISubjectRepository $repository)
	{
		$this->repository = $repository;
		$this->view_url = 'admins.subject';
	}
	
	public function json($speciality_id)
	{
		$list = $this->repository->getSubjectsBySpeciality($speciality_id);

		return response()->json([
			'data' => $list,
		]);
	}
	
	public function index()
	{
		$param = [];
		$param['subjects'] = $this->repository->getAll();
		return $this->view('index', $param);
	}
	
	public function edit($id = -1, ISpecialityRepository $specialityRepository)
	{
		if ($id == -1) {
			$subject = new Subject();
		} else {
			$subject = Subject::findOrFail($id);
		}
		
		$param = [];
		
		$param['subject'] = $subject;
		$param['specialities'] = $specialityRepository->getAll();
		
		if($id == -1) {
			$param['selectedSpecialities'] = array();
		} else {
			$param['selectedSpecialities'] = $specialityRepository->getSpecialitiesBySubject($subject->id);
		}
		
		return $this->view('edit', $param);
	}
	
	public function remove(Request $request)
	{
		$this->repository->remove($request['id']);
	
		return response()->json([
				'success' => true,
		]);
	}
	
	public function save(Request $request)
	{
		$validates = [];
		$validates['name'] = 'required|max:45';
		$validates['specialities'] = 'required|max:45';
		
		$validator = Validator::make($request->all(), $validates);
		
		//Kiểm tra trùng tên môn học
		$name = '';
		if (!empty($request->id)) {
			$temp = DB::table('subjects')
			->where('id', '=', $request->id)
			->whereNull('deleted_at')
			->get();
			$name = $temp[0]->name;
		}
		
		if ($request->name <> $name) {
			$validator->after(function($validator) {
				$params = $validator->getData();
				if (Subject::where('name', '=', $params['name'])->exists()) {
					$validator->errors()->add('name', 'The name has existed');
				}
			});
		}
		
		if ($validator->fails()) {
			$errors = $validator->errors();
			$errors = json_decode($errors);
		
			return response()->json([
				'success' => false,
				'message' => $errors
			]);
		}
		
		$subject = $this->repository->save($request->all());
		
		if($subject == null) {
			abort(500);
		}
		
		return response()->json([
			'success' => true,
			'id' => $subject->id
		]);
	}
}