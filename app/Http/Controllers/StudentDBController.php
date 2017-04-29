<?php
namespace App\Http\Controllers;

use Repository\StudentMark\IStudentMarkRepository;
use App\Student;
use Illuminate\Http\Request;

class StudentDBController extends Controller
{
	public function __construct(IStudentMarkRepository $repository)
	{
		$this->repository = $repository;
		$this->view_url = 'studentDB';
	}
	
	public function index(Request $request)
	{
		$params = array();
		$params['studentMark'] = array();
		$params['studentId'] = $request->id_number;
		
		if(!empty($request->id_number))
		{
			$students = Student::where('id_number', $request->id_number)->get();
			if(count($students) > 0)
			{
				$params['studentMark'] = $this->repository->displayMarkByStudent($students[0]);
			}
		}

		return $this->view('index', $params);
	}
}