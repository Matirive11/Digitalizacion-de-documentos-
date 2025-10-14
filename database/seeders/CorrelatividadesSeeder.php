<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;
use Illuminate\Support\Facades\DB;

class CorrelatividadesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('correlatividades')->truncate();

        $get = fn($nombre) => Materia::where('nombre', $nombre)->value('id');

        $relaciones = [

            // ===== 1° AÑO =====
            ['materia' => 'Ingles I', 'depende_de' => []],
            ['materia' => 'Matematica', 'depende_de' => []],
            ['materia' => 'Logica', 'depende_de' => []],
            ['materia' => 'Organizacion de Computadoras', 'depende_de' => []],
            ['materia' => 'Sistemas operativos', 'depende_de' => ['']],
            ['materia' => 'Algoritmos', 'depende_de' => ['']],
            ['materia' => 'Estructuras de Datos', 'depende_de' => ['']],
            ['materia' => 'Programacion I', 'depende_de' => ['']],
            ['materia' => 'Practica profesional de laboratorio', 'depende_de' => ['']],

            // ===== 2° AÑO =====
            ['materia' => 'Inglés II', 'depende_de' => ['Ingles I']],
            ['materia' => 'Metodologia de la investigacion', 'depende_de' => ['']],
            ['materia' => 'Cosmovision y antropologia biblica', 'depende_de' => ['']],
            ['materia' => 'Etica y deotologia profesional', 'depende_de' => ['']],
            ['materia' => 'Teoria de las organizaciones', 'depende_de' => ['']],
            ['materia' => 'Analisis matematico', 'depende_de' => ['Matematica','Logica']],
            ['materia' => 'Elementos de Costo y Contabilidad', 'depende_de' => ['']],
            ['materia' => 'Sistemas distribuidos', 'depende_de' => ['Sistemas operativos']],
            ['materia' => 'Programacion orientada a objetos', 'depende_de' => ['Estructura de datos','Sistemas operativos']],
            ['materia' => 'Sistemas de informacion', 'depende_de' => ['Estructura de datos']],
            ['materia' => 'Programacion II', 'depende_de' => ['Programacion I']],
            ['materia' => 'Practica profesional I', 'depende_de' => ['']],
            ['materia' => 'Formacion integral en salud y familia', 'depende_de' => ['']],
            ['materia' => 'Perspectiva escatologica de la salvacion', 'depende_de' => ['']],

            // ===== 3° AÑO =====
            ['materia' => 'Estadistica', 'depende_de' => ['Matematica','Logica']],
            ['materia' => 'Productividad y calidad total', 'depende_de' => ['Metodologia de la investigacion']],
            ['materia' => 'Comunicaciones', 'depende_de' => ['Sistemas distribuidos']],
            ['materia' => 'Derecho de la informatica', 'depende_de' => ['']],
            ['materia' => 'Analisis y disenio de sistemas', 'depende_de' => ['Programacion orientada a objetos', 'Programacion II']],
            ['materia' => 'Investigacion operativa', 'depende_de' => ['Sistemas distribuidos','Sistemas de informacion','Programacion orientada a objetos']],
            ['materia' => 'Base de datos', 'depende_de' => ['Sistemas distribuidos']],
            ['materia' => 'Redes de ordenadores', 'depende_de' => ['']],
            ['materia' => 'Practica profesional II', 'depende_de' => ['Practica profesional I']],
            ['materia' => 'Seminarios de sistemas', 'depende_de' => ['Sistemas de informacion']],
            ['materia' => 'Fe y ciencia', 'depende_de' => ['']],
            ['materia' => 'Liderazgo para el servicio', 'depende_de' => ['']],
        ];

        foreach ($relaciones as $r) {
            $materiaId = $get($r['materia']);
            if (!$materiaId) continue;

            foreach ($r['depende_de'] as $dep) {
                $depId = $get($dep);
                if ($depId) {
                    DB::table('correlatividades')->insert([
                        'materia_id' => $materiaId,
                        'correlativa_id' => $depId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        $this->command->info('✅ Todas las correlatividades del Plan TSAS 2023 fueron cargadas correctamente.');
    }
}
