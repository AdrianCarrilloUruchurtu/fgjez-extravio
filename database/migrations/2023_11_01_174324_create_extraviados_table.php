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
        Schema::create('extraviados', function (Blueprint $table) {
            $table->id();

            $table->string('Nombre');
            $table->string('INE');
            $table->string('CURP');
            $table->string('FechaNacimiento');
            $table->string('Correo');

            $table->string('DocumentoExtraviado');
            $table->string('Estatus')->default('En revisión');
            $table->string('Descripcion');
            $table->string('FechaExtravio');
            $table->string('Lugar');
            $table->string('DescripcionHechos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extraviados');
    }
};
