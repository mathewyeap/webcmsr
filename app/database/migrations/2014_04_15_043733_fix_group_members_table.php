<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixGroupMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('groupmember', function(Blueprint $table)
		{
			$table->renameColumn('groupid', 'group_id');
			$table->renameColumn('student', 'user_id');

			$table->rename('group_members');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('group_members', function(Blueprint $table)
		{
			$table->renameColumn('user_id', 'student');
			$table->renameColumn('group_id', 'groupid');

			$table->rename('groupmember');
		});
	}

}
