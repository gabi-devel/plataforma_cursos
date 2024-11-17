<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumnos_examenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('examen_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('resultado')->default(0); // Puntuación del examen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumnos_examenes');
    }
};
