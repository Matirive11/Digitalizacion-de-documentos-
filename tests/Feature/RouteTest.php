<?php

// 🟢 Prueba para rutas públicas
test('las rutas públicas son accesibles', closure: function () {
    $this->get('/')->assertOk(); // 🔹 Corrección aquí
});


