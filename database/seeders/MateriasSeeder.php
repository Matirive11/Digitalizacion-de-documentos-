<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;
use App\Models\Carrera;

class MateriasSeeder extends Seeder
{
    public function run(): void
    {
        $carreraId = Carrera::first()->id;

        // 🔹 1° AÑO
        $materias1 = [
            ['nombre' => 'Inglés I', 'anio' => 1, 'cuatrimestre' => 1],
            ['nombre' => 'Matemática', 'anio' => 1, 'cuatrimestre' => 1],
            ['nombre' => 'Algoritmos y Lógica', 'anio' => 1, 'cuatrimestre' => 1],
            ['nombre' => 'Arquitectura de Computadoras', 'anio' => 1, 'cuatrimestre' => 1],
            ['nombre' => 'Programación I', 'anio' => 1, 'cuatrimestre' => 2],
            ['nombre' => 'Estructuras de Datos', 'anio' => 1, 'cuatrimestre' => 2],
            ['nombre' => 'Sistemas Operativos', 'anio' => 1, 'cuatrimestre' => 2],
        ];

        // 🔹 2° AÑO
        $materias2 = [
            ['nombre' => 'Inglés II', 'anio' => 2, 'cuatrimestre' => 1],
            ['nombre' => 'Programación II', 'anio' => 2, 'cuatrimestre' => 1],
            ['nombre' => 'Programación Orientada a Objetos', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Sistemas Distribuidos', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Elementos de Costo y Contabilidad', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Análisis Matemático', 'anio' => 2, 'cuatrimestre' => 1],
            ['nombre' => 'Práctica Profesional I', 'anio' => 2, 'cuatrimestre' => 2],
        ];

        // 🔹 3° AÑO
        $materias3 = [
            ['nombre' => 'Investigación Operativa', 'anio' => 3, 'cuatrimestre' => 1],
            ['nombre' => 'Bases de Datos', 'anio' => 3, 'cuatrimestre' => 1],
            ['nombre' => 'Análisis y Diseño de Sistemas', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Redes de Ordenadores', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Práctica Profesional II', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Seminario de Sistemas', 'anio' => 3, 'cuatrimestre' => 2],
        ];

        foreach (array_merge($materias1, $materias2, $materias3) as $m) {
            Materia::create([
                'nombre' => $m['nombre'],
                'anio' => $m['anio'],
                'cuatrimestre' => $m['cuatrimestre'],
                'carrera_id' => $carreraId,
            ]);
        }
    }
}
