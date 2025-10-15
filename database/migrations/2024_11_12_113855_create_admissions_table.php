<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();

            // Relación con el usuario
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // === SECCIÓN 1: Datos del solicitante ===
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->date('fecha_nacimiento')->nullable();

            // ✅ estos campos no deben repetirse
            $table->string('documento')->unique()->nullable();
            $table->string('cuil')->unique()->nullable();
            $table->string('email')->unique()->nullable();

            $table->enum('estado_civil', ['soltero', 'casado', 'viudo', 'divorciado', 'separado'])->nullable();
            $table->enum('genero', ['M', 'F'])->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('numero_telefono')->unique()->nullable();
            $table->string('telefono_alternativo')->unique()->nullable();
            $table->string('nivel_educativo')->nullable();
            $table->string('carrera_interes')->nullable();

            // === SECCIÓN 2 ===
            $table->string('nivel_secundario')->nullable();

            // === SECCIÓN 3 ===
            $table->boolean('solicita_residencia')->nullable();
            $table->boolean('mayor_20')->nullable();
            $table->string('nombre_conviviente')->nullable();
            $table->string('telefono_conviviente')->unique()->nullable();
            $table->string('direccion_conviviente')->nullable();
            $table->string('vinculo_familiar')->nullable();

            // === SECCIÓN 4 ===
            $table->boolean('beca_parcial')->nullable();
            $table->boolean('beca_total')->nullable();
            $table->boolean('no_quiero_beca')->nullable();

            // === SECCIÓN 5 ===
            $table->json('fuente_informacion')->nullable();
            $table->string('referente_nombre')->nullable();
            $table->text('razon_eleccion')->nullable();

            // === SECCIÓN 6 ===
            $table->string('blood_type')->nullable();
            $table->string('rh_factor')->nullable();
            $table->boolean('health_problem')->nullable();
            $table->text('health_problem_description')->nullable();
            $table->boolean('physical_limitation')->nullable();
            $table->text('physical_limitation_description')->nullable();
            $table->text('medical_treatment_description')->nullable();
            $table->string('social_security_description')->nullable();
            $table->string('affiliate_number')->nullable();
            $table->string('substance_treatment')->nullable();
            $table->string('psychological_treatment')->nullable();

            // === SECCIÓN 7: Padres ===
            $table->string('father_first_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('father_address')->nullable();
            $table->string('father_phone')->unique()->nullable();
            $table->string('father_email')->unique()->nullable();
            $table->string('father_document_number')->unique()->nullable();
            $table->string('father_occupation')->nullable();

            $table->string('mother_first_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_address')->nullable();
            $table->string('mother_phone')->unique()->nullable();
            $table->string('mother_email')->unique()->nullable();
            $table->string('mother_document_number')->unique()->nullable();
            $table->string('mother_occupation')->nullable();

            // === SECCIÓN 8: Responsable financiero ===
            $table->string('financial_first_name')->nullable();
            $table->string('financial_last_name')->nullable();
            $table->string('financial_address')->nullable();
            $table->string('financial_postal_code')->nullable();
            $table->string('financial_locality')->nullable();
            $table->string('financial_province')->nullable();
            $table->string('financial_country')->nullable();
            $table->string('financial_phone')->unique()->nullable();
            $table->string('financial_email')->unique()->nullable();
            $table->string('financial_document_type')->nullable();
            $table->string('financial_document_number')->unique()->nullable();
            $table->integer('financial_age')->nullable();
            $table->string('financial_occupation')->nullable();

            // === NUEVO CAMPO ===
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');

            $table->timestamps();

            // ✅ Prevención de duplicados: un usuario solo puede tener una inscripción
            $table->unique('user_id', 'unique_user_admission');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
