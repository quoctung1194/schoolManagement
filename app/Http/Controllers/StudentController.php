<?php
namespace App\Http\Controllers;

use Repository\Student\IStudentRepository;
use App\Student;
use Repository\Speciality\SpecialityRepository;
use Repository\Student\StudentRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Repository\Speciality\ISpecialityRepository;
use Repository\Classk\IClasskRepository;

class StudentController extends Controller
{
	
	public function __construct(IStudentRepository $repository)
	{
		$this->repository = $repository;
		$this->view_url = 'admins.student';
	}
	
	public function index()
	{
		$param = [];
		$param['students'] = $this->repository->getAll();
		return $this->view('index', $param);
	}
	
	public function edit($id = -1,
			ISpecialityRepository $specialityRepository,
			IClasskRepository $classRepository) {
		$param = [];
		
		if ($id == -1) {
			$student = new Student();
		} else {
			$student = Student::findOrFail($id);
		}
		
		$param['student'] = $student;
		
		$studentClassks = $classRepository->getClasskByStudent($student->id);
		$param['studentClassks'] = $studentClassks;
		
		//Load tất cả các khoa
		$specilities = $specialityRepository->getAll();
		$param['specilities'] = $specilities;
		
		if($id == -1) {
			//Load lớp từ khoa đầu tiên
			$param['classks'] = $classRepository->getClasskBySpecialiy($specilities[0]->id);
		} else {
			//Lấy ra khoa của lớp của học sinh hiện hành
			$specility = $student->classk->speciality;
			//Lấy ra tất cả các lớp thuộc khoa này
			$param['classks'] = $classRepository->getAll();
		}
		
		return $this->view('edit', $param);
	}
	
	public function save(Request $request) {
		$validates = [];
		$validates['last_name'] = 'required|max:45';
		$validates['first_name'] = 'required|max:45';
		$validates['id_number'] = 'required|max:50';
		
		$validator = Validator::make($request->all(), $validates);
		
		//Kiểm tra trùng MSSV
		$id_number = '';
		if (!empty($request->id)) {
			$temp = DB::table('students')
						->where('id', '=', $request->id)
						->whereNull('deleted_at')
						->get();
			$id_number = $temp[0]->id_number;
		}
		
		if ($request->id_number <> $id_number) {
			$validator->after(function($validator) {
				$params = $validator->getData();
				if (Student::where('id_number', '=', $params['id_number'])->exists()) {
					$validator->errors()->add('id_number', 'The Id student has existed');
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
		
		$student = $this->repository->save($request->all());
		
		if($student == null) {
			abort(500);
		}
		
		return response()->json([
			'success' => true,
			'id' => $student->id
		]);
	}
	
	public function remove(Request $request) {
		$this->repository->remove($request['id']);
		
		return response()->json([
			'success' => true,
		]);
	}
}