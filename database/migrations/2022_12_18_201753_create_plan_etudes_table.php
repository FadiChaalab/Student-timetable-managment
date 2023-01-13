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
        Schema::create('plan_etudes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->foreignId('id_ecole')->constrained('ecoles')->onDelete('cascade');
            $table->foreignId('id_filiere')->constrained('filieres')->onDelete('cascade');
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
        Schema::dropIfExists('plan_etudes');
    }
};