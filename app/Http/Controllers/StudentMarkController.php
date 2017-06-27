<?php
namespace App\Http\Controllers;

use Repository\StudentMark\IStudentMarkRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Speciality;
use App\Teacher;

class StudentMarkController extends Controller
{
	public function __construct(IStudentMarkRepository $repository)
	{
		$this->repository = $repository;
		$this->view_url = 'admins.studentMark';
	}
	
	public function index()
	{
		$unCompletedSubjects = $this->repository->getUncompletedSubjects();		
		$params['unCompletedSubjects'] = $unCompletedSubjects;

		// get Speciality
		$specialities = Speciality::all();
		$params['specialities'] = $specialities;

		// get Teacher
		$teachers = Teacher::all();
		$params['teachers'] = $teachers;

		return $this->view('index', $params);
	}
	
	public function save(Request $request)
	{
		$this->repository->saveCompletedSubjects($request->all());
		
		return response()->json([
			'success' => true,
		]);
	}
	
	public function report(Request $request)
	{
		include app_path('Frameworks/PHPExcel/PHPExcel.php');
		include app_path('Frameworks/PHPExcel/PHPExcel/IOFactory.php');
		
		$objPHPExcel = new \PHPExcel();
		// Set properties
		$objPHPExcel->getProperties()->setCreator("quoctung1194")
		->setLastModifiedBy("quoctung1194")
		->setTitle("quoctung1194")
		->setSubject("quoctung1194")
		->setDescription("quoctung1194")
		->setKeywords("quoctung1194")
		->setCategory("quoctung1194");
		$objPHPExcel->getActiveSheet()->setTitle('quoctung1194');
		
		$result = $this->repository->getRequirementSubjects($request->spe);
		//Tạo header
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'MSSV')
		->setCellValue('B1', 'Họ Tên')
		->setCellValue('C1', 'Môn Học')
		->setCellValue('D1', 'Hoàn thành');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		//Gán dữ liệu
		for($i = 0; $i < count($result); $i++)
		{
			$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(0, $i + 2, $result[$i]->student->id_number);
			$full_name = $result[$i]->student->first_name . $result[$i]->student->last_name;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(1, $i + 2, $full_name);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(2, $i + 2, $result[$i]->subject->name);
			if($result[$i]->completedDate != null)
			{
				$final = "Đã hoàn thành - (" . $result[$i]->completedDate . ")";
			}
			else
			{
				$final = 'Chưa hoàn thành';
			}
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(3, $i + 2, $final);
		}
		
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="report.xlsx"');
		$objWriter->save('php://output');
	}
	
	public function pdf($student_marks, Request $request)
	{
		require_once app_path('Frameworks/html2pdf/vendor/autoload.php');
		
		//Xử lý tách chuỗi params
		$studentMarks = explode(",", $student_marks);
		$array_id = array();
		foreach ($studentMarks as $studentMark)
		{
			$informations = explode("-", $studentMark);
			$student_id =  $informations[0];
			if(!in_array($student_id, $array_id))
			{
				$array_id[] = $student_id;
			}
		}
		
		$student_list = Student::whereIn('id', $array_id)->get();
		$result = "";
		$count = 1;
		foreach($student_list as $student)
		{
			$full_name = $student->first_name . ' ' . $student->last_name;
			$id_number = $student->id_number;
			$speciality = $student->classk->speciality->name;
			
			$result .= "
				<tr>
	                <td valign='center' style='text-align: center; width: 10%; height: 50px; border-top: 1px'>
						<p class='text'>" .$count++. "</p>
					</td>
					<td valign='center' style='text-align: center; width: 40%; height: 50px; border-left: 1px; border-top: 1px'>
						<p class='text'>" .$full_name. "</p>
					</td>
					<td valign='center' style='text-align: center; width: 15%; height: 50px; border-left: 1px; border-top: 1px'>
						<p class='text'>" .$id_number. "</p>
					</td>
					<td valign='center' style='text-align: center; width: 15%; height: 50px; border-left: 1px; border-top: 1px'>
						<p class='text'>".$speciality. "</p>
					</td>
					<td valign='center' style='text-align: center; width: 20%; height: 50px; border-left: 1px; border-top: 1px'>
						<p class='text'></p>
					</td>
	            </tr>		
			";
		}
		
		$content = "
		<style type=\"text/css\">
			.text {
				font-size: 18px
			}
		</style>
					
		<page style='font-family: freeserif'>
	        <table style=\"width: 100%; border: 0px;\">
	        	<tr>
	                <td style=\"text-align: center; width: 100%\">
					<h1>Form Tham Dự Khóa Học</h1>
					</td>
	            </tr>
	        </table>
		    
			<table cellspacing='0' style=\"width: 750px; border: 1px;\">
	        	<tr>
	                <td valign='top' style=\"width: 70%; height: 50px ;border-right: 1px; \">
						<div class='text'>
						<u><i>Nội dung đào tạo:</i></u> " . $request->content . "
						</div>
					</td>
					<td valign='top' style=\"width: 30%;\">
						<div class='text'>
						<u><i>Ngày:</i></u> "  . $request->date .  "
						</div>
					</td>
	            </tr>
				<tr>
	                <td valign='top' style=\"width: 70%; height: 50px; border-top: 1px; border-right: 1px; \">
						<div class='text'>
						<u><i>Giáo viên:</i></u> "  . $request->teacher .  "
						</div>
					</td>
					<td valign='top' style=\"width: 30%; border-top: 1px;\">
						<div class='text'>
						<u><i>Địa điểm:</i></u> " . $request->location . "
						</div>
					</td>
	            </tr>
	        </table>
			
			<table style=\"width: 100%; border: 0px;\">
	        	<tr>
	                <td style=\"text-align: center; width: 100%\">
					<p> Vui lòng ký tên xác nhận Anh / Chị sẽ đã được hướng dẫn và hiểu những nội dung được đào tạo</p>
					</td>
	            </tr>
	        </table>
			
			<table cellspacing='0' style=\"width: 750px; border: 1px; margin-top: 30px \">
	        	<tr>
	                <td valign='center' style='text-align: center; width: 10%; height: 50px;'>
						<p class='text'><b>STT</b></p>
					</td>
					<td valign='center' style='text-align: center; width: 40%; height: 50px; border-left: 1px;'>
						<p class='text'><b>Tên Sinh Viên</b></p>
					</td>
					<td valign='center' style='text-align: center; width: 15%; height: 50px; border-left: 1px;'>
						<p class='text'><b>MSSV</b></p>
					</td>
					<td valign='center' style='text-align: center; width: 15%; height: 50px; border-left: 1px;'>
						<p class='text'><b>Khoa</b></p>
					</td>
					<td valign='center' style='text-align: center; width: 20%; height: 50px; border-left: 1px;'>
						<p class='text'><b>Chữ ký</b></p>
					</td>
	            </tr>
				{$result}
	        </table>
		</page>
		";
		
		$html2pdf = new \HTML2PDF('P','A4','en');
		$html2pdf->WriteHTML($content);
		$html2pdf->setDefaultFont('arialunicid0');
		$html2pdf->Output('exemple.pdf');		
	}
}