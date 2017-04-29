<?php
namespace App\Http\Controllers;

use Repository\Speciality\ISpecialityRepository;
use Illuminate\Http\Request;
use App\Speciality;
use App\Subject;
use Repository\Subject\ISubjectRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SpecialityController extends Controller
{
	
	public function __construct(ISpecialityRepository $repository)
	{
		$this->repository = $repository;
		$this->view_url = 'admins.speciality';
	}
	
	public function index()
	{
		$param = [];
		$param['specialities'] = $this->repository->getAll();
		return $this->view('index', $param);
	}
	
	public function edit($id = -1, ISubjectRepository $subjectRepository) {
		$param = [];
		
		if ($id == -1) {
			$speciality = new Speciality();
		} else {
			$speciality = Speciality::findOrFail($id);
		}
		
		$param['speciality'] = $speciality;
		$param['subjects'] = $subjectRepository->getAll();
		
		if ($id == -1) {
			$param['selectedSubjects'] = array();
		} else {
			$param['selectedSubjects'] = Speciality::find($speciality->id)->subjectSpecialities;;
		}
		
		return $this->view('edit', $param);
	}
	
	public function save(Request $request) {
		$validates = [];
		$validates['name'] = 'required|max:45';
		$validates['subjects'] = 'required|max:45';
		
		$validator = Validator::make($request->all(), $validates);
		
		$name = '';
		if (!empty($request->id)) {
			$temp = DB::table('specialities')
			->where('id', '=', $request->id)
			->whereNull('deleted_at')
			->get();
			$name = $temp[0]->name;
		}
		
		if ($request->name <> $name) {
			$validator->after(function($validator) {
				$params = $validator->getData();
				if (Speciality::where('name', '=', $params['name'])->exists()) {
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
		
		$spec = $this->repository->save($request->all());
		
		if ($spec == null) {
			abort(500);
		}
		
		return response()->json([
			'success' => true,
			'id' => $spec->id
		]);
	}
	
	public function remove(Request $request) {
		$this->repository->remove($request['id']);
		
		return response()->json([
			'success' => true,
		]);
	}
}