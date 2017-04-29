<?php
namespace Repository;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('Repository\\Speciality\\ISpecialityRepository', 'Repository\\Speciality\\SpecialityRepository');
		$this->app->bind('Repository\\Student\\IStudentRepository', 'Repository\\Student\\StudentRepository');
		$this->app->bind('Repository\\Classk\\IClasskRepository', 'Repository\\Classk\\ClasskRepository');
		$this->app->bind('Repository\\Subject\\ISubjectRepository', 'Repository\\Subject\\SubjectRepository');
		$this->app->bind('Repository\\StudentMark\\IStudentMarkRepository', 'Repository\\StudentMark\\StudentMarkRepository');
	}
}