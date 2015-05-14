<?php namespace App\Http\Controllers;
use App\Project;
use App\Story;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
function getProject()
{
	//TODO get project list from DB
	$project = ['8']; 
	return $project;
}
class scrumBoardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$project = getProject()[0];
		$dataSet = [];
		$stories = story::where('projectId', '=', '8')->get();
		foreach($stories as $story){
			$tasksTodo = task::where('storyId', '=', $story->id)
					    	   ->Where('status', 'todo')
			                   ->get();
			$tasksGo = task::where('storyId', '=', $story->id)
					    	   ->Where('status', 'go')
			                   ->get();
			$tasksDone = task::where('storyId', '=', $story->id)
					    	   ->Where('status', 'done')
			                   ->get();
			array_push($dataSet, ['story'=>$story, 
				                  'tasksTodo'=>$tasksTodo,
				                  'tasksGo'=>$tasksGo,
				                  'tasksDone'=>$tasksDone]);
		}
		return view('pages.scrumBoard', compact('dataSet'));
	}
}
