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
        Schema::create('module_cursuses', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_cursus')->constrained('cursuses')->onDelete('cascade');
            $table->foreignId('id_module_plan_etude')->constrained('module_plan_etudes')->onDelete('cascade');
            $table->foreignId('id_semester')->constrained('semesters')->onDelete('cascade');
            $table->string('commentaire');
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
        Schema::dropIfExists('module_cursuses');
    }
};