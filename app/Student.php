<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
	use SoftDeletes;
	
	protected $fillable = array(
		'id',
	);
	
	public function classk()
	{
		return $this->belongsTo('App\Classk');
	}
	
	public function marks()
	{
		return $this->hasMany('App\StudentMark');
	}
}