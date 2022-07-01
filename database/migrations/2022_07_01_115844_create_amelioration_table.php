<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmeliorationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amelioration', function(Blueprint $table)
		{
			$table->integer('id_amel', true);
			$table->string('type_amel', 100);
			$table->string('batiment_amel', 50);
			$table->date('date_amel');
			$table->float('montant_amel', 10, 0);
			$table->text('description_amel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amelioration');
	}

}
