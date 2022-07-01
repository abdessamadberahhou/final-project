<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperateurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operateur', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nom_ope', 150);
			$table->string('cin_ope', 10)->unique('cin_ope');
			$table->date('date_nai_ope');
			$table->date('date_emb_ope');
			$table->string('num_tele_ope', 10);
			$table->simple_array('type_ope');
			$table->float('salaire', 10, 0);
			$table->string('prenom_ope', 150)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operateur');
	}

}
