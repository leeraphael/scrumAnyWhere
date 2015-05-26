<?php namespace App\Http\Controllers;

use App\releasePlan;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class releasePlanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projectId = session('projectId');
		$releasePlans = releasePlan::where('projectId', '=', $projectId)->get();
		return view("releasePlans.index", compact('releasePlans'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("releasePlans.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{	
		$input = $request->all();
		$releasePlan = new releasePlan(['projectId'=>session('projectId'),
						                'name'=>$input['name'], 
						                'startDate'=>$input['startDate'], 
						                'endDate'=>$input['endDate']]);
		$releasePlan->save();

		return  redirect('releasePlan');	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
