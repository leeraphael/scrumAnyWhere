<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class sprintPlan extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sprintPlans';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['releasePlanId', 
	                       'name',
	                       'manDay',
	                       'startDate',
	                       'endDate',
	                       'expectedManDay',
	                       'actualManDay'];

}
