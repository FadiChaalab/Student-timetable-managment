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
        Schema::create('horaire_cursuses', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_cursus')->constrained('cursuses')->onDelete('cascade');
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
        Schema::dropIfExists('horaire_cursuses');
    }
};