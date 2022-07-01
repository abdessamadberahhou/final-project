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
        Schema::create('operateur', function (Blueprint $table){
           $table->id();
           $table->string('nom_ope');
           $table->string('prenom_ope');
           $table->string('cin_ope',10);
           $table->date('date_nai_ope');
           $table->date('date_emb_ope');
           $table->string('num_tele_ope');
           $table->string('type_ope');
           $table->double('salaire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operateur');
    }
};
