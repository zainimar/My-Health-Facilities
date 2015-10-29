<?php

namespace Api\Transformers;

use App\Clinic;
use League\Fractal\TransformerAbstract;

class ClinicTransformer extends TransformerAbstract
{
	public function transform(Clinic $clinic)
	{
		return [
			'FullName'  => $clinic->FullName,
			'facilitycode'	=> $clinic->facilitycode,
			'State' => $clinic->State
		];
	}
}