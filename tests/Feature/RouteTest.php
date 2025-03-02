<?php
use App\Models\User;

// 🟢 Prueba para rutas públicas
test('Comprobar que las rutas públicas son accesibles', function () {
    $this->get('/, /login, /register')->assertOk(); // 🔹 Corrección aquí
});
test('Comprobar que las rutas privadas estan protegidas', function(){
    $this->get('/admissions, /complete-profile, /dashboard, /profile, /archivo, /categoria, /rol, /tipo_archivo, /permiso, /notificacion, /documento, /firma_digital, /rol_permiso, /users')->assertStatus(302);
});
test('comprobar que se puede acceder al dashboard con un usuario registrado', function() {
    $admin = User::where('name', 'admin')->first();

    $this->actingAs($admin)
        ->get('/dashboard')
        ->assertOk();

});
