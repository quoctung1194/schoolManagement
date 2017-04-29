<?php
namespace Repository\StudentMark;

interface IStudentMarkRepository
{
	public function getUncompletedSubjects();
	public function saveCompletedSubjects($params);
	public function getRequirementSubjects();
	public function displayMarkByStudent($student);
}