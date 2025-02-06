<?php

use function Pest\Laravel\get;

// 🟢 Prueba para rutas públicas
test('las rutas públicas son accesibles', function ($url) {
    get($url)->assertOk(); // 🔹 Corrección aquí
})->with([
    '/',
]);

// 🔴 Prueba para rutas privadas
test('las rutas privadas requieren autenticación', function ($url) {
    get($url)->assertRedirect('/login'); // 🔹 Corrección aquí
})->with([
    '/dashboard',
]);
