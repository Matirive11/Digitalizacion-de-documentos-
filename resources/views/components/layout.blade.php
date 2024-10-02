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
    <!-- Contenedor principal -->
    <div class="pt-20 container mx-auto">
        <div class="bg-white shadow-md rounded-md p-6">
           {{$slot}}
        </div>
    </div>

</body>
</html>
