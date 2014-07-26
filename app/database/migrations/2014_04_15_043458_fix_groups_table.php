<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('webgmsgroup', function(Blueprint $table)
		{
			$table->renameColumn('course', 'course_id');
			$table->renameColumn('groupno', 'group_number');
			$table->integer('min_size')->unsigned()->nullable();
			$table->integer('max_size')->unsigned()->nullable();

			$table->rename('groups');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('groups', function(Blueprint $table)
		{
			$table->dropColumn('max_size');
			$table->dropColumn('min_size');
			$table->renameColumn('group_number', 'groupno');
			$table->renameColumn('course_id', 'course');

			$table->rename('webgmsgroup');
		});
	}

}
