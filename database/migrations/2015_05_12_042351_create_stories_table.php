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
			$table->string('location');
			// Location:
			// 			1. Backlog
			// 			2. SandBox
			// 			3. IceBox
			// 			#4~#10 is dummy
			$table->string('status');
			// Status:
			// 			1. todo
			// 			2. go
			// 			3. done
			$table->datetime('startDate')->nullable();
			$table->datetime('endDate')->nullable();
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
