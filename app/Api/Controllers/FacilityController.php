<?php

namespace Api\Controllers;

use App\Facility;
use App\Http\Requests;
use Illuminate\Http\Request;
use Api\Requests\FacilityRequest;
use Api\Transformers\FacilityTransformer;

/**
 * @Resource('Dogs', uri='/dogs')
 */
class FacilityController extends BaseController
{

    public function __construct() 
    {
        //$this->middleware('jwt.auth');
    }

    /**
     * Show all dogs
     *
     * Get a JSON representation of all the dogs
     * 
     * @Get('/')
     */
    public function index(Request $request)
    {
        //kalau nak return all tanpa parameter
        //return $this->collection(Facility::all(), new FacilityTransformer);

        //kalau nak return ade filtering parameter
        if ($request->has('nama')||$request->has('negeri')||$request->has('daerah')||$request->has('type'))
        {
            return $this->collection(Facility::where('fac_name','LIKE',"%".$request->get('nama')."%")
                ->where('fac_state',$request->get('negeri'))
                ->where('fac_district',$request->get('daerah'))
                ->where('fac_category',$request->get('type'))
                ->get(), new FacilityTransformer);
            //return $this->collection(Facility::where('fac_name','HOSPITAL SULTAN ISMAIL, PANDAN')->get(), new FacilityTransformer);
        
        }
        else
        {
            return $this->collection(Facility::all(), new FacilityTransformer);
        }
    }


    /**
     * Store a new dog in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityRequest $request)
    {
        return Facility::create($request->only(['fac_code','fac_name','fac_add','fac_postcode','fac_city','fac_district','fac_state','fac_telno','fac_faxNo','fac_hcategory','fac_ministry','fac_category' ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->item(Facility::findOrFail($id), new FacilityTransformer);
    }

    /**
     * Update the dog in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityRequest $request, $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->update($request->only(['fac_code','fac_name','fac_add','fac_postcode','fac_city','fac_district','fac_state','fac_telno','fac_faxNo','fac_hcategory','fac_ministry','fac_category' ]));
        return $facility;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Facility::destroy($id);
    }
}
