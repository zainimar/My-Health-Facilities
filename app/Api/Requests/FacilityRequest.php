<?php

namespace Api\Requests;

use App\Http\Requests\Request;

class FacilityRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
	    	'fac_code' => 'required',
	    	'fac_name' => 'required',
	    	'fac_add' => 'required',
	    	'fac_postcode' => 'required',
	    	'fac_city' => 'required',
	    	'fac_district' => 'required',
	    	'fac_state' => 'required',
	    	'fac_telno' => 'required',
	    	'fac_faxNo' => 'required',
	    	'fac_hcategory' => 'required',
	    	'fac_ministry' => 'required',
	    	'fac_category' => 'required'
    	];
	}
}