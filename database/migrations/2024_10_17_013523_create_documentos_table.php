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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->text('descripcion');
            $table->string('tipo_documento', 45);
            $table->date('fecha_subida');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('archivo_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categoria');
            $table->foreign('archivo_id')->references('id')->on('archivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
