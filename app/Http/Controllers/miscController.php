<?php namespace App\Http\Controllers;

use App\story;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class miscController extends Controller {

	public function timeline()
	{
		return view('misc.timeline');
	}

	public function backlog()
	{
		$projectId = session('projectId');
		$stories = story::where('projectId', '=', $projectId)->get();

		return view('misc.backlog', compact('stories'));
	}

}
