<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admission;
use Illuminate\Support\Facades\Hash;

class FakeAdmissionSeeder extends Seeder
{
    public function run()
    {
        // Crear un usuario falso
        $user = User::create([
            'first_name' => 'Juan',
            'last_name' => 'Pérez',
            'dni' => 40123456,
            'telefono' => 1133344455,
            'email' => 'juan.perez@example.com',
            'password' => Hash::make('password123'),
            'estado' => 1,  // Activo
        ]);

        // Crear la admisión asociada a ese usuario
        Admission::create([
            'user_id' => $user->id,
            'apellido' => 'Pérez',
            'nombre' => 'Juan',
            'fecha_nacimiento' => '2000-05-15',
            'lugar_nacimiento' => 'Buenos Aires',
            'provincia_nacimiento' => 'Buenos Aires',
            'pais_nacimiento' => 'Argentina',
            'tipo_documento' => 'DNI',
            'documento' => '40123456',
            'genero' => 'M',
            'direccion' => 'Av. Siempre Viva 742',
            'codigo_postal' => '1001',
            'ciudad' => 'Buenos Aires',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            'telefono_fijo' => '011-1234-5678',
            'numero_telefono' => '11-9876-5432',
            'email' => 'juan.perez@example.com',
            'religion' => 'Cristianismo',
            'adventista' => true,
            'bautizado' => false,
            'iglesia' => 'Iglesia Central',
            'estado_civil' => 'soltero',
            'cuil' => '20-40123456-9',

            // Carrera y educación
            'carrera_interes' => 'analista_sistemas',
            'anio_estudio' => '1°',
            'nivel_secundario' => 'completo',

            // Vida estudiantil
            'residencia_isam' => false,
            'residencia_no_isam' => true,
            'mayor_20' => false,
            'menor_20_vive_con' => 'Padres',
            'nombre_tutor' => 'María López',
            'telefono_tutor' => '11-5555-5555',
            'direccion_tutor' => 'Calle Falsa 123',
            'email_tutor' => 'maria.lopez@example.com',
            'vinculo_tutor' => 'Madre',

            // Becas y préstamos
            'beca_parcial' => true,
            'beca_total' => false,
            'prestamo_honor' => false,

            // Información sobre ISAM
            'como_supo_isam' => 'Por un amigo',
            'nombre_recomendado' => 'Pedro González',
            'razon_estudio' => 'Quiero mejorar mis oportunidades laborales',

            // Salud
            'grupo_sanguineo' => 'O+',
            'factor_rh' => '+',
            'problema_salud' => false,
            'detalle_problema_salud' => null,
            'limitacion_fisica' => false,
            'detalle_limitacion_fisica' => null,
            'tratamiento_medico' => 'Ninguno',
            'obra_social' => 'OSDE',
            'nro_afiliado' => '12345678',
            'rehabilitacion_sustancias' => 'Nunca',
            'tratamiento_psicologico' => 'Nunca',

            // Datos del padre
            'padre_nombre' => 'Carlos Pérez',
            'padre_apellido' => 'Pérez',
            'padre_direccion' => 'Calle 123',
            'padre_cp' => '1001',
            'padre_localidad' => 'Buenos Aires',
            'padre_provincia' => 'Buenos Aires',
            'padre_pais' => 'Argentina',
            'padre_telefono' => '11-3333-3333',
            'padre_email' => 'carlos.perez@example.com',
            'padre_tipo_documento' => 'DNI',
            'padre_documento' => '30123456',
            'padre_edad' => 50,
            'padre_ocupacion' => 'Contador',

            // Datos de la madre
            'madre_nombre' => 'María López',
            'madre_apellido' => 'López',
            'madre_direccion' => 'Calle 123',
            'madre_cp' => '1001',
            'madre_localidad' => 'Buenos Aires',
            'madre_provincia' => 'Buenos Aires',
            'madre_pais' => 'Argentina',
            'madre_telefono' => '11-4444-4444',
            'madre_email' => 'maria.lopez@example.com',
            'madre_tipo_documento' => 'DNI',
            'madre_documento' => '32123456',
            'madre_edad' => 48,
            'madre_ocupacion' => 'Docente',

            // Responsable financiero
            'resp_financiero_nombre' => 'Carlos Pérez',
            'resp_financiero_apellido' => 'Pérez',
            'resp_financiero_direccion' => 'Calle 123',
            'resp_financiero_cp' => '1001',
            'resp_financiero_localidad' => 'Buenos Aires',
            'resp_financiero_provincia' => 'Buenos Aires',
            'resp_financiero_pais' => 'Argentina',
            'resp_financiero_telefono' => '11-3333-3333',
            'resp_financiero_email' => 'carlos.perez@example.com',
            'resp_financiero_tipo_documento' => 'DNI',
            'resp_financiero_documento' => '30123456',
            'resp_financiero_edad' => 50,
            'resp_financiero_ocupacion' => 'Contador',
        ]);

        echo "Usuario y admisión creados correctamente.\n";
    }
}
