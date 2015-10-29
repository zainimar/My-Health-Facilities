<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
	//kalau nama table selain daripada nama class kena buat mcm kat bawah
	protected $table = 'lt_facilities'; // contoh kalau nama table lain..bole custom
	//untuk custom field/ colum selain dari created_at
	//const created_at = 'dtcreated';
	//const updated_at = false;
	public $timestamps = false;
	protected $primaryKey = 'facilitycode';
	public $incrementing = null;
    protected $fillable = [ 'FullName', 'facilitycode','State' ];
}
