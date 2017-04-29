<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
	use SoftDeletes;
	
	protected $fillable = array(
		'id',
	);
	
	public function subjectSpecialities() {
		return $this->hasMany('App\SubjectSpeciality');
	}
}