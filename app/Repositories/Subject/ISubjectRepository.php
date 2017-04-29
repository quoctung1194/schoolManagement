<?php
namespace Repository\Subject;

interface ISubjectRepository
{
	public function getSubjectsBySpeciality($specialityId);
	public function getAll();
	public function remove($id);
	public function save($params);
}