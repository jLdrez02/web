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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('fecha', 8);
            $table->string('motivo', 100);
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_grupo');
            $table->timestamps();

            $table->foreign('id_alumno')->references('id')->on('students');
            $table->foreign('id_grupo')->references('id')->on('groups');
            $table->foreign('id_usuario')->references('id')->on('users');

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
