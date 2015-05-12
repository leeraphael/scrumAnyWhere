<?php namespace App\Http\Controllers;

use App\Task;
use App\story;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class taskController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = task::all();
		return view('tasks.index', compact('tasks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$storyId = $request->all()['storyId'];
		$story = story::findOrFail($storyId);
			
		return view('tasks.create', compact('story'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{		
		$input = $request->all();
		$task = new task(['storyId'=>$input['storyId'],'name'=>$input['name']]);
		$task->save();
		
		$storyId = $input['storyId'];
		// collect story data
		$story = story::findOrFail($storyId);
		// collect task data
		$tasks = task::where('storyId', '=', $story->id)->get();

		if(!empty($input['continue']))     return view('tasks.create', compact('story'));		
		elseif (!empty($input['storyId'])) return view('stories.show', compact('story', 'tasks'));		
		else                               return redirect('task');		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = task::findOrFail($id);
		return view('tasks.show', compact('task'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$task = task::findOrFail($id);
		return view('tasks.edit', compact('task'));	
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
		$task = task::findOrFail($id);
		$task->name = $input['name'];
		$task->save();

		return redirect('task');
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

		$task = task::findOrFail($id);
		$task->delete();

		$storyId = $task->storyId;
		// collect story data
		$story = story::findOrFail($storyId);
		// collect task data
		$tasks = task::where('storyId', '=', $story->id)->get();
	
		if (!empty($input['back'])) return view('stories.show', compact('story', 'tasks'));		
		else                        return redirect('task');		
	}
}
