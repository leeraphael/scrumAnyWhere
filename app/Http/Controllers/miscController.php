<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class miscController extends Controller {

	public function timeline()
	{
		return view('misc.timeline');
	}

}
