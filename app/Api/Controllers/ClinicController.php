<?php

namespace Api\Controllers;

use App\Clinic;
use App\Http\Requests;
use Illuminate\Http\Request;
use Api\Requests\ClinicRequest;
use Api\Transformers\ClinicTransformer;

/**
 * @Resource('Dogs', uri='/dogs')
 */
class ClinicController extends BaseController
{

    public function __construct() 
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Show all dogs
     *
     * Get a JSON representation of all the dogs
     * 
     * @Get('/')
     */
    public function index()
    {
        return $this->collection(Clinic::all(), new ClinicTransformer);
    }

    /**
     * Store a new dog in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicRequest $request)
    {
        return Clinic::create($request->only(['FullName', 'facilitycode','State']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->item(Clinic::findOrFail($id), new ClinicTransformer);
    }

    /**
     * Update the dog in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicRequest $request, $id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->update($request->only(['FullName', 'facilitycode', 'State']));
        return $clinic;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Clinic::destroy($id);
    }
}
