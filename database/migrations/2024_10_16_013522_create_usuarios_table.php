<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('persona_dni');
            $table->string('correo_electronico', 100);
            $table->string('contrasenia', 200);
            $table->timestamp('fecha_creacion');
            $table->tinyInteger('estado');
            $table->foreign('persona_dni')->references('dni')->on('persona');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
