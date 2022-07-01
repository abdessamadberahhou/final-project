<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeFactSecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('type_fact_seco', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('type_facture_sec', 250)->unique('type_facture_sec');
			$table->string('nom_type_sec', 150);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('type_fact_seco');
	}

}
