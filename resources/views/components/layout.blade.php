<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Mi Aplicación') }}</title>
    <!-- Importar Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-50 text-gray-800">

    <!-- Barra de navegación -->
    <nav class="bg-blue-600 text-white p-4 fixed w-full shadow-lg z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold">
                {{ config('app.name', 'Mi Aplicación') }}
            </a>
            <ul class="flex space-x-6">
                <li><a href="{{ url('/about') }}" class="hover:text-blue-300">Acerca de</a></li>
                <li><a href="{{ url('/services') }}" class="hover:text-blue-300">Servicios</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:text-blue-300">Contacto</a></li>
                <li><a href="{{ url('/login') }}" class="hover:text-blue-300">Iniciar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="pt-20 container mx-auto">
        <div class="bg-white shadow-md rounded-md p-6">
           {{$slot}}
        </div>
    </div>

</body>
</html>
