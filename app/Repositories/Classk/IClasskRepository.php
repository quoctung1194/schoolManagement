<?php
namespace Repository\Classk;

interface IClasskRepository
{
	public function getClasskBySpecialiy($specialityId);
	public function getClasskByStudent($studentId);
	public function getAll();
	public function save($params);
	public function remove($id);
}