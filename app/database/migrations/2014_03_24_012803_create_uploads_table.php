<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('uploads', function(Blueprint $table) {
			$table->increments('id');
			$table->text('display_name');
			$table->text('path');
			$table->text('mime_type');
			$table->integer('size')->unsigned();
			$table->integer('uploader_id')->unsigned();
			$table->timestamps();

			$table->foreign('uploader_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('uploads');
	}

}
