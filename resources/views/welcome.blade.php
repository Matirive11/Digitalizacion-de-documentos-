<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Superior Adventista de Misiones</title>
<<<<<<< HEAD
    @vite('resources/css/app.css') <!-- Si estás usando Vite -->
</head>
<body class="bg-white min-h-screen flex justify-center items-center">
    <div class="bg-white border-4 black-blue-800 w-full max-w-4xl text-blue-600 p-6 rounded-lg shadow-xl fade-in">
        <img src="{{ asset('images/logo.png') }}" alt="Logo ISAM" class="absolute top-6 right-6 w-16 h-16 object-contain">
=======
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen flex justify-center items-center">
    <div class="bg-white border-4 black-blue-800 w-full max-w-4xl text-blue-600 p-6 rounded-lg shadow-xl fade-in">
        <img src="{{ asset(path: 'images/logo.png') }}" alt="Logo ISAM" class="absolute top-6 right-6 w-16 h-16 object-contain">
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)

        <header class="text-center mb-6">
            <h1 class="text-3xl font-bold uppercase">INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
        </header>

        <div class="bg-blue-700 text-center py-3 mb-6 rounded transition-transform duration-300">
            <h2 class="text-xl font-semibold text-white">PLANILLA DE INSCRIPCIÓN AL NIVEL SUPERIOR</h2>
        </div>

        <div class="bg-white text-black p-6 rounded mb-6 transition-opacity duration-500 ">
            <p class="text-lg">
                Gracias por elegir esta casa de estudios donde podrá forjar su futuro. Sus aspiraciones de superación serán acompañadas por el personal de esta institución quien le dará las herramientas necesarias, desde su capacitación profesional y dedicación, para que alcance su meta y sea un profesional de éxito.
            </p>
        </div>

        <div class="text-center">
<<<<<<< HEAD
            <button class="bg-blue-800 text-white font-bold py-3 px-6 rounded transition-colors duration-300 hover:bg-blue-900">
                Comenzar Inscripción
            </button>
        </div>
    </div>
</body>
</html>
=======
            @auth
            <a href="{{ route('complete-profile') }}" class="bg-blue-800 text-white font-bold py-3 px-6 rounded transition-colors duration-300 hover:bg-blue-900">
                Comenzar Inscripcion
            </a>
            @else
                <a href="{{ route('login') }}" class="bg-blue-800 text-white font-bold py-3 px-6 rounded transition-colors duration-300 hover:bg-blue-900">
                    Inicia Sesión o Registrarse
                </a>
            @endauth
        </div>

    </div>
</body>

>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
