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
        Schema::create('salle_materiels', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('id_salle')->constrained('salles')->onDelete('cascade');
            $table->foreignId('id_materiel')->constrained('materiels')->onDelete('cascade');
            $table->integer('mobilite');
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
        Schema::dropIfExists('salle_materiels');
    }
};