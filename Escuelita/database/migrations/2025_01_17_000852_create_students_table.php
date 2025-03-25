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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('lastnameM', 100);
            $table->string('birthday', 10);
            $table->string('placeBirth', 100);
            $table->string('CURP', 18);
            $table->string('address', 100);
            $table->string('cp', 6);
            $table->string('municipality', 50);
            $table->string('phone', 30);
            $table->string('statusCivil', 50);
            $table->string('occupation', 100);
            $table->string('lastgrade', 50);
            $table->string('chronicDisease', 100)->nullable();
            $table->string('nameDisease', 100)->nullable();
            $table->string('phoneDisease', 30)->nullable();
            $table->unsignedBigInteger('id_estado');
            $table->timestamps();

            $table->foreign('id_estado')->references('id')->on('states');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
