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
        Schema::create('instance_module_cursuses', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_module_cursus')->constrained('module_cursuses')->onDelete('cascade');
            $table->foreignId('id_semester_au')->constrained('semester_aus')->onDelete('cascade');
            $table->foreignId('id_ecole')->constrained('ecoles')->onDelete('cascade');
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
        Schema::dropIfExists('instance_module_cursuses');
    }
};