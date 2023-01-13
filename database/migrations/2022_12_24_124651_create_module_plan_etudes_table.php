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
        Schema::create('module_plan_etudes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->float('coefficient');
            $table->foreignId('id_plan_etude')->constrained('plan_etudes')->onDelete('cascade');
            $table->foreignId('id_filiere_niveau')->constrained('filiere_niveaux')->onDelete('cascade');
            $table->foreignId('id_semester')->constrained('semesters')->onDelete('cascade');
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
        Schema::dropIfExists('module_plan_etudes');
    }
};