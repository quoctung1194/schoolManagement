<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectSpeciality extends Model
{
	protected $fillable = array(
		'id',
	);
	
	public function speciality()
	{
		return $this->belongsTo('App\Speciality');
	}
	
	public function subject()
	{
		return $this->belongsTo('App\Subject');
	}
}