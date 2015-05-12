<?php namespace App\Http\Controllers;

use App\story;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class storyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stories = story::all();
		return view('stories.index', compact('stories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('stories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{		

		$input = $request->all();
		//TODO rework the projectId
		$story = new story(['projectId'=>'1','name'=>$input['name']]);
		$story->save();
		
		if(!empty($input['continue']))
		{
			return  view('stories.create');
		}
		else
		{
			return  redirect('story');
		}		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$story = story::findOrFail($id);
		return view('stories.show', compact('story'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$story = story::findOrFail($id);
		return view('stories.edit', compact('story'));	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();
		$story = story::findOrFail($id);
		$story->name = $input['name'];
		$story->save();

		return redirect('story');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$story = story::findOrFail($id);
		$story->delete();
		return redirect('story');
	}
}
