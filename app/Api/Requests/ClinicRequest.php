<?php

namespace Api\Requests;

use App\Http\Requests\Request;

class ClinicRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
	    	'FullName' => 'required|max:100',
	    	'facilitycode' => 'required|max:20',
	    	'State' => 'required'
    	];
	}
}