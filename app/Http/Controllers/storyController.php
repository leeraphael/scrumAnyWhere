<?php namespace App\Http\Controllers;

use App\task;
use App\story;
use App\project;
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
	public function create(Request $request)
	{
		$projectId = $request->all()['projectId'];
		$project = project::findOrFail($projectId);
			
		return view('stories.create', compact('project'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{	
		$input = $request->all();
		$story = new story(['projectId'=>$input['projectId'],'name'=>$input['name']]);
		$story->save();
		
		$projectId = $request->all()['projectId'];
		// collect project data
		$project = project::findOrFail($projectId);
		// collect project data
		$stories = story::where('projectId', '=', $project->id)->get();

		if(!empty($input['continue']))       return view('stories.create', compact('project'));
		elseif (!empty($input['projectId'])) return view('projects.show', compact('project', 'stories'));
		else                                 return  redirect('story');	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// collect project data
		$story = story::findOrFail($id);
		// collect project data
		//$stories = story::all();
		$tasks = task::where('storyId', '=', $story->id)->get();
		return view('stories.show', compact('story', 'tasks'));
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
	public function destroy($id, Request $request)
	{
		$input = $request->all();

		$story = story::findOrFail($id);
		$story->delete();

		$projectId = $story->projectId;
		// collect project data
		$project = project::findOrFail($projectId);
		// collect project data
		$stories = story::where('projectId', '=', $project->id)->get();

		if (!empty($input['back'])) return view('projects.show', compact('project', 'stories'));
		else                        return redirect('story');	
	}
}
