<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
	protected $fillable = array(
		'id',
	);
	
	public function subject()
	{
		return $this->belongsTo('App\Subject');
	}
}