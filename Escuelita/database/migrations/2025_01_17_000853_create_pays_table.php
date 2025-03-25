<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->string('motivo', 100);
            $table->string('mes', 10);
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_alumno')->references('id')->on('students');
            $table->foreign('id_usuario')->references('id')->on('users');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pays');
    }
};
