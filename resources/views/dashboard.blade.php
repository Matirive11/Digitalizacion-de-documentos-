<<<<<<< HEAD
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar />

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-700">Bienvenido, {{ Auth::user()->first_name }}</h1>

        <div class="flex flex-col gap-6">
            <!-- Tarjeta de Información del Usuario -->
            <div class="bg-white p-6 rounded-lg shadow-md">

                <h2 class="text-xl font-semibold text-gray-800 mb-2">Información del Usuario</h2>

                <p class="text-gray-600">Nombre completo: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                <p class="text-gray-600">Email: {{ Auth::user()->email }}</p>
                <p class="text-gray-600"><strong>Rol:</strong> {{ Auth::user()->getRoleNames()->first() }}</p>
            </div>

            <!-- 🚀 Contenido Personalizado Según el Rol -->
            @if(Auth::user()->hasRole('admin'))
                @include('dashboard.partials.admin')
            @elseif(Auth::user()->hasRole('supervisor'))
                @include('dashboard.partials.supervisor')
            @else
                @include('dashboard.partials.alumno')
            @endif
        </div>
    </div>

</body>
</html>
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
