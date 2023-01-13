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
        Schema::create('jour_horaire_heures', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_horaire_jour')->constrained('horaire_jours')->onDelete('cascade');
            $table->foreignId('id_horaire_heure')->constrained('horaire_heures')->onDelete('cascade');
            $table->foreignId('id_horaire')->constrained('horaires')->onDelete('cascade');
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
        Schema::dropIfExists('jour_horaire_heures');
    }
};