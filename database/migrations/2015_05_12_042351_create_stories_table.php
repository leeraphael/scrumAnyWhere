<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projectId');
			$table->string('name');
			$table->longText('desc')->nullable();
			$table->string('manDay')->nullable();
			$table->string('status')->nullable();
			// Status:
			// 			1. todo
			// 			2. go
			// 			3. done
			$table->datetime('startDate')->nullable();
			$table->datetime('doneDate')->nullable();
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
		Schema::drop('stories');
	}

}
