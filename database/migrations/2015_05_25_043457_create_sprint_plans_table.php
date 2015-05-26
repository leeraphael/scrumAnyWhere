<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintPlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sprintPlans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');			
			$table->datetime('startDate')->nullable();
			$table->datetime('endDate')->nullable();			
			$table->datetime('expectedManDay')->nullable();
			$table->datetime('actualManDay')->nullable();
			$table->string('releasePlanId');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sprint_plans');
	}

}
