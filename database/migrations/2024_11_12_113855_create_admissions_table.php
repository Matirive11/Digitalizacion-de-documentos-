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
            $table->unsignedBigInteger('user_id');

            /*** 🟦 SECCIÓN 1: DATOS DEL SOLICITANTE ***/
            $table->string('apellido', 30);
            $table->string('nombre', 30);
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento', 50)->nullable();
            $table->string('provincia_nacimiento', 30)->nullable();
            $table->string('pais_nacimiento', 30)->nullable();
            $table->enum('tipo_documento', ['DNI', 'Pasaporte'])->nullable();
            $table->string('documento', 12)->nullable();
            $table->enum('genero', ['M', 'F'])->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('codigo_postal', 10)->nullable();
            $table->string('ciudad', 30)->nullable();
            $table->string('provincia', 30)->nullable();
            $table->string('pais', 30)->nullable();
            $table->string('telefono_fijo', 20)->nullable();
            $table->string('numero_telefono', 20)->nullable();
            $table->string('email', 50)->unique();
            $table->string('religion', 50)->nullable();
            $table->boolean('adventista')->nullable();
            $table->boolean('bautizado')->nullable();
            $table->string('iglesia', 50)->nullable();
            $table->enum('estado_civil', ['soltero', 'casado', 'viudo', 'divorciado', 'separado'])->nullable();
            $table->string('cuil', 15)->nullable();

            /*** 🟦 SECCIÓN 2: CARRERA Y NIVEL EDUCATIVO ***/
            $table->enum('carrera_interes', [
                'educacion_inicial', 'educacion_primaria', 'educacion_matematica', 'musica',
                'analista_sistemas', 'contable', 'enfermeria'
            ])->nullable();
            $table->enum('anio_estudio', ['1°', '2°', '3°', '4°'])->nullable();
            $table->enum('nivel_secundario', ['completo', 'proceso', 'incompleto'])->nullable();

            /*** 🟦 SECCIÓN 3: VIDA ESTUDIANTIL ***/
            $table->boolean('residencia_isam')->nullable();
            $table->boolean('residencia_no_isam')->nullable();
            $table->boolean('mayor_20')->nullable();
            $table->string('menor_20_vive_con', 50)->nullable();
            $table->string('nombre_tutor', 50)->nullable();
            $table->string('telefono_tutor', 20)->nullable();
            $table->string('direccion_tutor', 100)->nullable();
            $table->string('email_tutor', 50)->nullable();
            $table->string('vinculo_tutor', 30)->nullable();

            /*** 🟦 SECCIÓN 4: PROGRAMA DE FORMACIÓN PROFESIONAL ***/
            $table->boolean('beca_parcial')->nullable();
            $table->boolean('beca_total')->nullable();
            $table->boolean('prestamo_honor')->nullable();

            /*** 🟦 SECCIÓN 5: ¿CÓMO SUPO DEL ISAM? ***/
            $table->string('como_supo_isam', 100)->nullable();
            $table->string('nombre_recomendado', 50)->nullable();
            $table->text('razon_estudio')->nullable();

            /*** 🟦 SECCIÓN 6: SALUD DEL SOLICITANTE ***/
            $table->string('grupo_sanguineo', 5)->nullable();
            $table->string('factor_rh', 5)->nullable();
            $table->boolean('problema_salud')->nullable();
            $table->text('detalle_problema_salud')->nullable();
            $table->boolean('limitacion_fisica')->nullable();
            $table->text('detalle_limitacion_fisica')->nullable();
            $table->text('tratamiento_medico')->nullable();
            $table->string('obra_social', 50)->nullable();
            $table->string('nro_afiliado', 20)->nullable();
            $table->enum('rehabilitacion_sustancias', ['Nunca', 'No en el último año', 'Alguna vez este año'])->nullable();
            $table->enum('tratamiento_psicologico', ['Nunca', 'No en el último año', 'Alguna vez este año'])->nullable();

            /*** 🟦 SECCIÓN 7: PADRES DEL SOLICITANTE ***/
            // Datos del Padre
            $table->string('padre_nombre', 50)->nullable();
            $table->string('padre_apellido', 50)->nullable();
            $table->string('padre_direccion', 100)->nullable();
            $table->string('padre_cp', 10)->nullable();
            $table->string('padre_localidad', 30)->nullable();
            $table->string('padre_provincia', 30)->nullable();
            $table->string('padre_pais', 30)->nullable();
            $table->string('padre_telefono', 20)->nullable();
            $table->string('padre_email', 50)->nullable();
            $table->enum('padre_tipo_documento', ['DNI', 'Pasaporte'])->nullable();
            $table->string('padre_documento', 12)->nullable();
            $table->integer('padre_edad')->nullable();
            $table->string('padre_ocupacion', 50)->nullable();

            // Datos de la Madre
            $table->string('madre_nombre', 50)->nullable();
            $table->string('madre_apellido', 50)->nullable();
            $table->string('madre_direccion', 100)->nullable();
            $table->string('madre_cp', 10)->nullable();
            $table->string('madre_localidad', 30)->nullable();
            $table->string('madre_provincia', 30)->nullable();
            $table->string('madre_pais', 30)->nullable();
            $table->string('madre_telefono', 20)->nullable();
            $table->string('madre_email', 50)->nullable();
            $table->enum('madre_tipo_documento', ['DNI', 'Pasaporte'])->nullable();
            $table->string('madre_documento', 12)->nullable();
            $table->integer('madre_edad')->nullable();
            $table->string('madre_ocupacion', 50)->nullable();

            /*** 🟦 SECCIÓN 8: RESPONSABLE FINANCIERO ***/
            $table->enum('responsable_financiero_tipo', ['estudiante', 'padre', 'madre', 'otro'])->default('estudiante');
            $table->string('resp_financiero_nombre', 50)->nullable();
            $table->string('resp_financiero_apellido', 50)->nullable();
            $table->string('resp_financiero_direccion', 100)->nullable();
            $table->string('resp_financiero_cp', 10)->nullable();
            $table->string('resp_financiero_localidad', 30)->nullable();
            $table->string('resp_financiero_provincia', 30)->nullable();
            $table->string('resp_financiero_pais', 30)->nullable();
            $table->string('resp_financiero_telefono', 20)->nullable();
            $table->string('resp_financiero_email', 50)->nullable();
            $table->enum('resp_financiero_tipo_documento', ['DNI', 'Pasaporte'])->nullable();
            $table->string('resp_financiero_documento', 12)->nullable();
            $table->integer('resp_financiero_edad')->nullable();
            $table->string('resp_financiero_ocupacion', 50)->nullable();

            $table->timestamps();

            // Clave foránea con la tabla users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
