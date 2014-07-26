<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('webcmsuser', function(Blueprint $table)
		{
			$table->renameColumn('familyname', 'family_name');
			$table->renameColumn('givenname', 'given_name');
			$table->renameColumn('sortname', 'sort_name');
			$table->renameColumn('displayname', 'display_name');
			$table->renameColumn('homephone', 'home_phone');
			$table->renameColumn('mobphone', 'mobile');
			$table->renameColumn('homepage', 'home_page');
			// $table->timestamp('last_login');

			$table->rename('users');	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->renameColumn('family_name', 'familyname');
			$table->renameColumn('given_name', 'givenname');
			$table->renameColumn('sort_name', 'sortname');
			$table->renameColumn('display_name', 'displayname');
			$table->renameColumn('home_phone', 'homephone');
			$table->renameColumn('mobile', 'mobphone');
			$table->renameColumn('home_page', 'homepage');
			// $table->dropColumn('last_login');

			$table->rename('webcmsuser');
		});
	}

}
