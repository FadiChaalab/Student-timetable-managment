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
        Schema::create('instance_module_cursus_enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_enseignant')->constrained('enseignants')->onDelete('cascade');
            $table->foreignId('id_i_m_c')->constrained('instance_module_cursuses')->onDelete('cascade');
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
        Schema::dropIfExists('instance_module_cursus_enseignants');
    }
};