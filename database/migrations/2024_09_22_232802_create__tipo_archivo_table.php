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
<<<<<<< HEAD
        Schema::create('Tipo_archivo', function (Blueprint $table) {
=======
        Schema::create('tipo_archivo', function (Blueprint $table) {
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
            $table->id();
            $table->string('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_tipo_archivo');
    }
};
