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
        Schema::create('cursuses', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_plan_etude')->constrained('plan_etudes')->onDelete('cascade');
            $table->foreignId('id_au')->constrained('aus')->onDelete('cascade');
            $table->foreignId('id_filiere_niveau')->constrained('filiere_niveaux')->onDelete('cascade');
            $table->foreignId('id_type_cursus')->constrained('type_cursuses')->onDelete('cascade');
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
        Schema::dropIfExists('cursuses');
    }
};