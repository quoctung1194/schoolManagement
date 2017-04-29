<?php
namespace Repository\Student;

interface IStudentRepository
{
	public function getAll();
	public function save($params);
	public function remove($id);
}