<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table){
            $table->id('Id_residen');
            $table->string('Nom');
            $table->string('Prenom');
            $table->date('Date_nai');
            $table->string('CIN',10);
            $table->string('num_tele',10);
            $table->integer('nb_pers');
            $table->string('adresse');
            $table->date('date_ajout');
            $table->double('montant_a_payer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residents');
    }
};
