<?php

namespace Api\Transformers;

use App\Facility;
use League\Fractal\TransformerAbstract;

class FacilityTransformer extends TransformerAbstract
{
	public function transform(Facility $facility)
	{
		return [

			'Kod Fasiliti' => $facility->fac_code,
	    	'Nama Fasiliti' => $facility->fac_name,
	    	'Alamat' => $facility->fac_add,
	    	'Daerah' => $facility->fac_district,
	    	'Poskod' => $facility->fac_postcode,
	    	'Bandar' => $facility->fac_city,
	    	
	    	//'fac_state' => $facility->fac_state,
	    	'Negeri' => [
	    		'cd_state' => $facility->state->cd_state,
	    		'desc_state' => $facility->state->desc_state
			],
	    	'No. Telefon' => $facility->fac_telno,
	    	'No. Fax' => $facility->fac_faxNo,
	    	'Kategori Hospital' => $facility->fac_hcategory,
	    	'Kementerian' => $facility->fac_ministry,
	    	'Kategori' => $facility->fac_category
		];
	}
}