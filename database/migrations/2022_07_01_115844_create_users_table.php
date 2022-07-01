<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('CIN', 10)->nullable();
			$table->string('phone', 13)->nullable();
			$table->string('avatar')->default('default.jpg');
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password');
			$table->date('date_naissance');
			$table->string('genre');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps(10);
			$table->string('profile_path', 250)->nullable();
			$table->integer('role_as')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
