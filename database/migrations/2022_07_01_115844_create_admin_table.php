<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin', function(Blueprint $table)
		{
			$table->integer('id_admin', true);
			$table->string('email_admin', 150)->unique('email_admin');
			$table->string('username_admin', 60)->unique('username_admin');
			$table->string('cin_admin', 10)->unique('cin_admin');
			$table->string('nom_admin', 150);
			$table->string('prenom_admin', 150);
			$table->date('date_nais_admin');
			$table->string('password_admin', 150);
			$table->dateTime('dernier_con_admine');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin');
	}

}
