<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class releasePlan extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'releasePlans';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['projectId', 
	                       'name',
	                       'manDay',
	                       'startDate',
	                       'endDate'];
}
