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
        Schema::create('firma_digital', function (Blueprint $table) {
            $table->id();
            $table->text('firma');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('documento_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('documento_id')->references('id')->on('documentos');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firma_digitals');
    }
};