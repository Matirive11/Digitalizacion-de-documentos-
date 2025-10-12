<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles (si no existen)
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        $supervisorRole = Role::firstOrCreate(['name' => 'supervisor', 'guard_name' => 'web']);

        // Crear permisos básicos
        $permissions = [
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',
            'ver roles',
            'crear roles',
            'editar roles',
            'eliminar roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Asignar permisos a roles
        $adminRole->syncPermissions(Permission::all());
        $supervisorRole->syncPermissions(['ver usuarios', 'editar usuarios']);
        $userRole->syncPermissions(['ver usuarios']);

        // Crear usuario administrador predeterminado
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'Principal',
                'dni' => 99999999,
                'telefono' => 123456789,
                'password' => Hash::make('admin123'),
                'estado' => true,
            ]
        );
        $admin->assignRole($adminRole);

        $this->command->info("✅ Roles, permisos y usuarios creados correctamente.");
        $this->command->warn("🔑 Usuario administrador: admin@example.com / Contraseña: admin123");
    }
}
