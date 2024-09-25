<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Barra de Progreso</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .progress-bar {
            transition: width 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-xl font-semibold mb-4">Formulario de Registro</h2>

        <div class="mb-4">
            <div class="h-2 bg-blue-200 rounded-full">
                <div id="progress" class="progress-bar h-full bg-blue-500 rounded-full" style="width: 0%;"></div>
            </div>
        </div>

        <form id="form">
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                <input type="number" id="edad" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Enviar</button>
        </form>
    </div>

    <script>
        const form = document.getElementById('form');
        const progressBar = document.getElementById('progress');
        const inputs = form.querySelectorAll('input');

        function updateProgress() {
            const filledInputs = Array.from(inputs).filter(input => input.value).length;
            const totalInputs = inputs.length;
            const progressPercentage = (filledInputs / totalInputs) * 100;

            progressBar.style.width = `${progressPercentage}%`;
        }

        inputs.forEach(input => {
            input.addEventListener('input', updateProgress);
        });
    </script>
</body>
</html>


