<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasePlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('release_plans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->datetime('startDate')->nullable();
			$table->datetime('endDate')->nullable();
			$table->string('projectId');
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
		Schema::drop('release_plans');
	}

}
