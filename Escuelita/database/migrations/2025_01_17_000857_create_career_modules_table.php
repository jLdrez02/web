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
        Schema::create('career_modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_career');
            $table->unsignedBigInteger('id_module');
            $table->timestamps();

            $table->foreign('id_career')->references('id')->on('careers');
            $table->foreign('id_module')->references('id')->on('modules');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_modules');
    }
};
