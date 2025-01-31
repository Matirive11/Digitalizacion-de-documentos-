<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User; // Asegúrate de importar el modelo User

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $supervisorRole = Role::firstOrCreate(['name' => 'supervisor']);

        // Buscar el usuario con ID 1
        $user = User::find(1);

        // Asignar el rol de admin si el usuario existe
        if ($user) {
            $user->assignRole($adminRole);
        } else {
            $this->command->info('No se encontró un usuario con ID 1 para asignar el rol de admin.');
        }
    }
}
