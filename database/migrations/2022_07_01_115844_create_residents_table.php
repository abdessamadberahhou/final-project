<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('residents', function(Blueprint $table)
		{
			$table->integer('Id_resident', true);
			$table->string('Nom', 50);
			$table->string('Prenom', 50);
			$table->date('Date_nai');
			$table->string('CIN', 9)->unique('CIN');
			$table->string('num_tele', 14);
			$table->integer('nb_pers');
			$table->string('adresse', 50);
			$table->date('date_ajout')->nullable();
			$table->float('montant_a_payer', 10, 0)->default(120);
			$table->integer('num_apt')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('residents');
	}

}
