<?php namespace App\Http\Controllers;
use App\task;
use App\comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;

use Illuminate\Http\Request;

function scrumAnyWhereLog($action)
{
	$logDesc = session('username')." ".$action;
	$log = new comment(['username'=>session('username'),
		             	 'desc'=>$logDesc]);
	$log->save();
}

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
			$task->endDate = date('Y-m-d H:i:s');
		}
		$task->owner = $input['owner'];
		$task->save();

		scrumAnyWhereLog("moved Task <span class=\"logTag\">#".$input['taskId']."</span> to <span>". $input['status'] . "</span> area");
		return;
	}

	public function deleteTask(Request $request)
	{		
		$input = $request->all();
		$task = task::findOrFail($input['taskId']);
		$task->delete();
		return;
	}

	public function updateLog(Request $request)
	{		
		if (Session::has('lastLogId'))
		{
			
			$input = $request->all();
			$lastLogId = session('lastLogId');
			$log = comment::where('id', '>', $lastLogId)->first();			
			if(is_null($log))
			{
				return "";
			}
			session(['lastLogId'=> $log->id]);
			return $log->created_at.": ".$log->desc;
		}
		else
		{
			$input = $request->all();
			$log = comment::orderBy('created_at')->first();
			session(['lastLogId'=> $log->id]);
			return $log->created_at.": ".$log->desc;
		}		
	}

}
