<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Superior Adventista de Misiones</title>
    @vite('resources/css/app.css') <!-- Si estás usando Vite -->

    <!-- Estilos internos para animación fade-in -->
    <style>
        .fade-in {
            animation: fadeIn 2s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-blue-300 min-h-screen flex justify-center items-center">
    <div class="bg-blue-500 w-full max-w-4xl text-white p-6 rounded-lg shadow-lg fade-in">
        <img src="{{ asset('images/logo.png') }}" alt="Logo ISAM" class="absolute top-6 right-6 w-16 h-16 object-contain">

        <header class="text-center mb-6">
            <h1 class="text-3xl font-bold">INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
        </header>

        <div class="bg-blue-700 text-center py-3 mb-6 rounded transition-transform duration-300 hover:bg-blue-600 fade-in">
            <h2 class="text-xl font-semibold">PLANILLA DE INSCRIPCIÓN AL NIVEL SUPERIOR</h2>
        </div>

        <div class="bg-white text-black p-6 rounded mb-6 transition-opacity duration-500 hover:bg-blue-100 fade-in">
            <p class="text-lg">
                Gracias por elegir esta casa de estudios donde podrá forjar su futuro. Sus aspiraciones de superación serán acompañadas por el personal de esta institución quien le dará las herramientas necesarias, desde su capacitación profesional y dedicación, para que alcance su meta y sea un profesional de éxito.
            </p>
        </div>

        <div class="text-center">
            <button class="bg-blue-800 text-white font-bold py-3 px-6 rounded transition-colors duration-300 hover:bg-blue-900">
                Comenzar Inscripción
            </button>
        </div>
    </div>
</body>
</html>
