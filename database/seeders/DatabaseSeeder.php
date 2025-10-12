<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
=======
    public function run(): void
    {
        $this->call([
            CarreraSeeder::class,
            MateriasSeeder::class,
            CorrelatividadesSeeder::class,
            RoleSeeder::class,
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
        ]);
    }
}
