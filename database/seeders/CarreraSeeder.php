<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        Carrera::firstOrCreate([
            'id' => 1
        ], [
            'nombre' => 'Tecnicatura en Análisis de Sistemas',
            'duracion' => '3 años'
        ]);
    }
}
