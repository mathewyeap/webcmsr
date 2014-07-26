<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseAliases extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_aliases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('alias');

			$table->integer('course_id')->unsigned();

			$table->timestamps();

			$table->foreign('course_id')->references('id')->on('courses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_aliases');
	}

}
