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

        $getMateriaId = fn($nombre) => Materia::where('nombre', $nombre)->value('id');

        $correlatividades = [
            // ===== 2º AÑO =====
            ['materia' => 'Inglés II', 'depende_de' => ['Inglés I']],
            ['materia' => 'Programación II', 'depende_de' => ['Programación I', 'Estructuras de Datos']],
            ['materia' => 'Programación Orientada a Objetos', 'depende_de' => ['Programación I']],
            ['materia' => 'Sistemas Distribuidos', 'depende_de' => ['Sistemas Operativos']],
            ['materia' => 'Elementos de Costo y Contabilidad', 'depende_de' => ['Matemática']],
            ['materia' => 'Análisis Matemático', 'depende_de' => ['Matemática']],
            ['materia' => 'Práctica Profesional I', 'depende_de' => ['Programación I', 'Estructuras de Datos']],

            // ===== 3º AÑO =====
            ['materia' => 'Investigación Operativa', 'depende_de' => ['Análisis Matemático']],
            ['materia' => 'Bases de Datos', 'depende_de' => ['Estructuras de Datos']],
            ['materia' => 'Análisis y Diseño de Sistemas', 'depende_de' => ['Programación II', 'Estructuras de Datos']],
            ['materia' => 'Redes de Ordenadores', 'depende_de' => ['Sistemas Distribuidos']],
            ['materia' => 'Práctica Profesional II', 'depende_de' => ['Práctica Profesional I', 'Análisis y Diseño de Sistemas']],
            ['materia' => 'Seminario de Sistemas', 'depende_de' => ['Análisis y Diseño de Sistemas']],
        ];

        foreach ($correlatividades as $data) {
            $materiaId = $getMateriaId($data['materia']);
            if (!$materiaId) continue;

            foreach ($data['depende_de'] as $nombreCorrelativa) {
                $correlativaId = $getMateriaId($nombreCorrelativa);
                if ($correlativaId) {
                    DB::table('correlatividades')->insert([
                        'materia_id' => $materiaId,
                        'correlativa_id' => $correlativaId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        $this->command->info('✅ Correlatividades cargadas correctamente según el Plan TSAS 2023.');
    }
}
