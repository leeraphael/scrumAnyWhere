<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class story extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stories';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['projectId', 'name'];
}
