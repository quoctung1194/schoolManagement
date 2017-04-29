<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classk extends Model
{
	use SoftDeletes;
	
	protected $fillable = array(
		'id',
	);
	
	public function speciality()
	{
		return $this->belongsTo('App\Speciality');
	}
}