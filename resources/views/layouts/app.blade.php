<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- ✅ Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- ✅ Evita parpadeo de secciones ocultas -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100 min-h-screen flex flex-col">

    {{-- ✅ Barra de navegación --}}
    @include('layouts.navigation')

    {{-- ✅ Contenido principal --}}
    <main class="flex-grow p-6 pt-28 transition-all duration-300">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    {{-- ✅ (Opcional) Footer --}}
    {{-- 
    <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600">
        © {{ date('Y') }} Instituto Superior Adventista de Misiones
    </footer> 
    --}}

    {{-- ✅ Script de guardado automático del formulario --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");
            if (!form) return;

            const storageKey = "formularioInscripcion";

            // 🧠 Restaurar datos guardados
            const savedData = JSON.parse(localStorage.getItem(storageKey) || "{}");
            for (const [key, value] of Object.entries(savedData)) {
                const field = form.elements[key];
                if (field) {
                    if (field.type === "checkbox") {
                        field.checked = value;
                    } else if (field.type === "radio") {
                        if (field.value === value) field.checked = true;
                    } else {
                        field.value = value;
                    }
                }
            }

            // 💾 Guardar automáticamente los datos
            form.addEventListener("input", () => {
                const data = Object.fromEntries(new FormData(form).entries());
                form.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                    data[cb.name] = cb.checked;
                });
                localStorage.setItem(storageKey, JSON.stringify(data));
            });

            // 🧹 Limpiar almacenamiento al enviar correctamente
            form.addEventListener("submit", () => {
                localStorage.removeItem(storageKey);
            });
        });
    </script>

</body>
</html>
