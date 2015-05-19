<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('storyId');
			$table->string('name');
			$table->longText('desc')->nullable();
			$table->string('manDay')->nullable();
			$table->string('status')->nullable();			
			// Status:
			// 			1. todo
			// 			2. go
			// 			3. done
			$table->string('owner')->nullable();	
			$table->string('color')->nullable();	
			// type:
			// 			1. yellow: #fdf28a
			// 			2. blue: b6dcff
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
		Schema::drop('tasks');
	}

}
