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
        Schema::create('facture_batiment', function (Blueprint $table){
           $table->id();
           $table->string('type_facture');
           $table->string('reference_facture')->unique();
           $table->date('date_ajout');
           $table->double('montant');
           $table->string('batiment');
           $table->integer('Id_res');
           $table->string('statut');
           $table->date('date_payment');
           $table->string('num_recu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facture_batiment');
    }
};
