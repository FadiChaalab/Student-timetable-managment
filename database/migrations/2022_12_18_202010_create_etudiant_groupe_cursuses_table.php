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
        Schema::create('etudiant_groupe_cursuses', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_groupe_cursus')->constrained('groupe_cursuses')->onDelete('cascade');
            $table->foreignId('id_etudiant')->constrained('etudiants')->onDelete('cascade');
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
        Schema::dropIfExists('etudiant_groupe_cursuses');
    }
};