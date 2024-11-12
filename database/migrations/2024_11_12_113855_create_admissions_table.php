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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('email')->unique();
            $table->string('numero_telefono')->nullable();
            $table->string('telefono_alternativo')->nullable();
            $table->string('documento')->nullable();
            $table->enum('estado_civil', ['soltero', 'casado', 'viudo', 'divorciado', 'separado'])->nullable();
            $table->string('cuil')->nullable();
            $table->enum('genero', ['M', 'F'])->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais')->nullable();
            $table->string('nivel_educativo')->nullable();
            $table->string('carrera_interes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};

