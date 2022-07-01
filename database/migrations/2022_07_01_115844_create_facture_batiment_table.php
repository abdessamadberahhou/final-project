<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureBatimentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facture_batiment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('type_facture', 150);
			$table->string('reference_facture', 50)->nullable()->unique('reference_facture');
			$table->date('date_ajout');
			$table->float('montant', 10, 0);
			$table->string('batiment', 15);
			$table->integer('Id_res')->nullable()->default(0);
			$table->string('statut', 150)->nullable()->default('non payé');
			$table->date('date_payment')->nullable();
			$table->string('num_recu', 150)->nullable()->unique('num_recu');
			$table->string('nom_res', 250)->nullable();
			$table->string('nom_ope', 150)->nullable();
			$table->integer('id_ope')->nullable();
			$table->string('type_fact_sec', 150)->nullable()->default('0');
			$table->integer('num_apt')->nullable()->default(0);
			$table->string('description_amelioration', 1500)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facture_batiment');
	}

}
