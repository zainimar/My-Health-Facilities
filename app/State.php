<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	//kalau nama table selain daripada nama class kena buat mcm kat bawah
	protected $table = 'lt_state'; // contoh kalau nama table lain..bole custom
	//untuk custom field/ colum selain dari created_at
	//const created_at = 'dtcreated';
	//const updated_at = false;
	public $timestamps = false;
	protected $primaryKey = 'cd_state';
	public $incrementing = null;
    protected $fillable = ['cd_state','desc_state'];

	//create function utk lookup table
	public function facilities()
	{
		return $this->hasMany('App\Facility','fac_state','cd_state'); 
	}
}