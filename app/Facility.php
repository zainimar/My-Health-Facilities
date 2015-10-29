<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
	//kalau nama table selain daripada nama class kena buat mcm kat bawah
	protected $table = 'myhealth_facilities'; // contoh kalau nama table lain..bole custom
	//untuk custom field/ colum selain dari created_at
	//const created_at = 'dtcreated';
	//const updated_at = false;
	public $timestamps = false;
	protected $primaryKey = 'fac_code';
	public $incrementing = null;
    protected $fillable = ['fac_code','fac_name','fac_add','fac_postcode','fac_city','fac_district','fac_state','fac_telno','fac_faxNo','fac_hcategory','fac_ministry','fac_category' ];

	//create function utk lookup table
	public function state()
	{
		return $this->belongsTo('App\State', 'fac_state'); 
	}

}