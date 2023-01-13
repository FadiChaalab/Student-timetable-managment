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
        Schema::create('salles', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('description');
            $table->integer('capacity');
            $table->string('planification');
            $table->foreignId('id_bloc')->constrained('blocs')->onDelete('cascade');
            $table->foreignId('id_etage')->constrained('etages')->onDelete('cascade');
            $table->foreignId('id_type_salle')->constrained('type_salles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salles');
    }
};