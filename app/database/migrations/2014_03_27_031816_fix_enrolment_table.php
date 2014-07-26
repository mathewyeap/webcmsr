<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixEnrolmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enrolments', function(Blueprint $table)
		{
			$table->renameColumn('student', 'user_id');
			$table->renameColumn('course', 'course_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('enrolments', function(Blueprint $table)
		{
			$table->renameColumn('user_id', 'student');
			$table->renameColumn('course_id', 'course');
		});
	}

}
