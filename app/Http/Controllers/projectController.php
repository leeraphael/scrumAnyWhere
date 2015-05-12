<?php namespace App\Http\Controllers;

use App\Project;
use App\story;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

function showProjectStory($id)
{
	$project = project::findOrFail($id);
	$stories = story::where('projectId', '=', $project->id)->get();
	return view('projects.show', compact('project', 'stories'));
}

class projectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();
		return view('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{		
		$input = $request->all();
		$project = new project(['name'=>$input['name']]);
		$project->save();
		
		return  redirect('project');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return showProjectStory($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{		
		$project = project::findOrFail($id);
		return view('projects.edit', compact('project'));	
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
		$project = project::findOrFail($id);
		$project->name = $input['name'];
		$project->save();

		return showProjectStory($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$project = project::findOrFail($id);
		$project->delete();
		return redirect('project');
	}

}
