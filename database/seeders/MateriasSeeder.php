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

        $materias = [
            // 🔹 1° AÑO
            ['nombre' => 'Ingles I', 'anio' => 1, 'cuatrimestre' => 1],
            ['nombre' => 'Matematica', 'anio' => 1, 'cuatrimestre' => 2],
            ['nombre' => 'Logica', 'anio' => 1, 'cuatrimestre' => 2],
            ['nombre' => 'Organizacion de Computadoras', 'anio' => 1, 'cuatrimestre' => 1],
            ['nombre' => 'Sistemas operativos', 'anio' => 1, 'cuatrimestre' => 2],
            ['nombre' => 'Algoritmos', 'anio' => 1, 'cuatrimestre' => 1],
            ['nombre' => 'Estructuras de Datos', 'anio' => 1, 'cuatrimestre' => 2],
            ['nombre' => 'Programacion I', 'anio' => 1, 'cuatrimestre' => 2],
            ['nombre' => 'Practica profesional de laboratorio', 'anio' => 1, 'cuatrimestre' => 2],

            // 🔹 2° AÑO
            ['nombre' => 'Inglés II', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Metodologia de la investigacion', 'anio' => 2, 'cuatrimestre' => 1],
            ['nombre' => 'Cosmovision y antropologia biblica', 'anio' => 2, 'cuatrimestre' => 1],
            ['nombre' => 'Etica y deotologia profesional', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Teoria de las organizaciones', 'anio' => 2, 'cuatrimestre' => 1],
            ['nombre' => 'Analisis matematico', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Elementos de Costo y Contabilidad', 'anio' => 2, 'cuatrimestre' => 1],
            ['nombre' => 'Sistemas distribuidos', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Programacion orientada a objetos', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Sistemas de informacion', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Programacion II', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Practica profesional I', 'anio' => 2, 'cuatrimestre' => 2],
            ['nombre' => 'Formacion integral en salud y familia', 'anio' => 2, 'cuatrimestre' => 1],
            ['nombre' => 'Perspectiva escatologica de la salvacion', 'anio' => 2, 'cuatrimestre' => 2],


            // 🔹 3° AÑO
            ['nombre' => 'Estadistica', 'anio' => 3, 'cuatrimestre' => 1],
            ['nombre' => 'Productividad y calidad total', 'anio' => 3, 'cuatrimestre' => 1],
            ['nombre' => 'Comunicaciones', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Derecho de la informatica', 'anio' => 3, 'cuatrimestre' => 1],
            ['nombre' => 'Analisis y disenio de sistemas', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Investigacion operativa', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Base de datos', 'anio' => 3, 'cuatrimestre' => 1],
            ['nombre' => 'Redes de ordenadores', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Practica profesional II', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Seminarios de sistemas', 'anio' => 3, 'cuatrimestre' => 2],
            ['nombre' => 'Fe y ciencia', 'anio' => 3, 'cuatrimestre' => 1],
            ['nombre' => 'Liderazgo para el servicio', 'anio' => 3, 'cuatrimestre' => 2],

        
        ];

        foreach ($materias as $m) {
            Materia::updateOrCreate(
                ['nombre' => $m['nombre']],
                [
                    'anio' => $m['anio'],
                    'cuatrimestre' => $m['cuatrimestre'],
                    'carrera_id' => $carreraId,
                ]
            );
        }

        $this->command->info('✅ Materias del Plan TSAS 2023 cargadas correctamente.');
    }
}
