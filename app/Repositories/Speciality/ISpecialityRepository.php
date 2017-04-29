<?php
namespace Repository\Speciality;

interface ISpecialityRepository 
{
	public function getAll();
	public function getSpeciality($id);
	public function getSpecialitiesBySubject($subjectId);
	public function save($params);
	public function remove($id);
}