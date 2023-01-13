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
        Schema::create('preference_module_horaire_enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_enseignant')->constrained('enseignants')->onDelete('cascade');
            $table->foreignId('id_jhh')->constrained('jour_horaire_heures')->onDelete('cascade');
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
        Schema::dropIfExists('preference_module_horaire_enseignants');
    }
};