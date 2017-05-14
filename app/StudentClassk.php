<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClassk extends Model
{
	use SoftDeletes;
	
	protected $fillable = array(
		'id',
	);
	
	public function classk()
	{
		return $this->belongsTo('App\Classk');
	}
	
	public function student()
	{
		return $this->belongsTo('App\Student');
	}
}