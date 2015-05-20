<?php namespace App\Http\Controllers;
use App\task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class webServiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function updateTask(Request $request)
	{		
		$input = $request->all();
		$task = task::findOrFail($input['taskId']);
		$task->status = $input['status'];
		if($input['status'] == "go")
		{
			$task->startDate = date('Y-m-d H:i:s');
		}
		elseif ($input['status'] == "done") {
			$task->doneDate = date('Y-m-d H:i:s');
		}
		$task->owner = $input['owner'];
		$task->save();

		return;
	}

	public function deleteTask(Request $request)
	{		
		$input = $request->all();
		$task = task::findOrFail($input['taskId']);
		$task->delete();
		return;
	}

}
