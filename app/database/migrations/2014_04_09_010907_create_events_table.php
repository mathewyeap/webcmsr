<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name');
			$table->text('description');
			$table->text('location');
			$table->smallInteger('capacity')->unsigned();
			$table->timestamp('begins_at');
			$table->timestamp('rsvp_deadline');

			$table->integer('course_id')->unsigned();
			$table->integer('creator_id')->unsigned();
			
			$table->timestamps();

			$table->foreign('course_id')->references('id')->on('courses');
			$table->foreign('creator_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}