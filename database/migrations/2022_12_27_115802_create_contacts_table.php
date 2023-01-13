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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('to');
            $table->string('from');
            $table->string('subject');
            $table->longText('message');
            $table->integer('read')->default(0);
            $table->integer('trash')->default(0);
            $table->integer('star')->default(0);
            $table->integer('important')->default(0);
            $table->foreignId('id_sender')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_reciever')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('contacts');
    }
};