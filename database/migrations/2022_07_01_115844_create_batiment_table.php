<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatimentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batiment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('nb_apt')->nullable();
			$table->text('adresse')->nullable();
			$table->integer('nb_hab')->nullable();
			$table->date('date_cons');
			$table->text('femme_men');
			$table->text('nom_bat')->nullable();
			$table->integer('nb_apt_habite')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('batiment');
	}

}
