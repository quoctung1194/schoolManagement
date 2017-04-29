<?php
namespace App\Http\Controllers;

use Repository\Speciality\ISpecialityRepository;
use Repository\Classk\IClasskRepository;
use App\Classk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ClasskController extends Controller
{
	
	public function __construct(IClasskRepository $repository)
	{
		$this->repository = $repository;
		$this->view_url = 'admins.classk';
	}
	
	public function json($speciality_id)
	{
		$list = $this->repository->getClasskBySpecialiy($speciality_id);
		
		return response()->json([
			'list' => $list,
		]);
	}
	
	public function index() {
		$param = [];
		$param['classks'] = $this->repository->getAll();
		return $this->view('index', $param);
	}
	
	public function edit($id = -1,
			ISpecialityRepository $specialityRepository) {
		$param = [];
		
		if ($id == -1) {
			$classk = new Classk();
		} else {
			$classk = Classk::findOrFail($id);
		}
		
		$param['classk'] = $classk;
		//Load tất cả các khoa
		$specilities = $specialityRepository->getAll();
		$param['specilities'] = $specilities;
		
		return $this->view('edit', $param);
	}
	
	public function save(Request $request) {
		$validates = [];
		$validates['name'] = 'required|max:45';
		
		$validator = Validator::make($request->all(), $validates);
		
		if ($validator->fails()) {
			$errors = $validator->errors();
			$errors = json_decode($errors);
		
			return response()->json([
				'success' => false,
				'message' => $errors
			]);
		}
		
		$classk = $this->repository->save($request->all());
		
		if ($classk == null) {
			abort(500);
		}
		
		return response()->json([
			'success' => true,
			'id' => $classk->id
		]);
	}
	
	public function remove(Request $request) {
		$this->repository->remove($request['id']);
		
		return response()->json([
			'success' => true,
		]);
	}
}