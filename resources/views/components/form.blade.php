<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Multi-sección</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .progress-bar {
            transition: width 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-4xl">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-800">INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
        </div>

        <!-- Barra de Progreso -->
        <div class="mb-4">
            <div class="h-2 bg-blue-200 rounded-full">
                <div id="progress" class="progress-bar h-full bg-blue-500 rounded-full" style="width: 0%;"></div>
            </div>
        </div>

        <!-- Contenido Dinámico del Formulario -->
        <form id="form" method="POST" action="{{ route('matriculation.store') }}">
            @csrf

            <!-- Contenedor de Slots (para las secciones del formulario) -->
            <div class="section-content mb-4">
                <!-- Sección 1 -->
                <div id="section1">
                    <h2 class="text-xl font-bold text-blue-800 mb-4">DATOS DEL SOLICITANTE</h2>
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <x-input-label for="last_name" :value="__('Apellido')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" required />
                        </div>
                        <div class="flex-1">
                            <x-input-label for="first_name" :value="__('Nombres')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" required />
                        </div>
                    </div>
                </div>

                <!-- Sección 2 -->
                <div id="section2" class="hidden">
                    <h2 class="text-xl font-bold text-blue-800 mb-4">DATOS DE CONTACTO</h2>
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <x-input-label for="phone" :value="__('Teléfono fijo')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" required />
                        </div>
                        <div class="flex-1">
                            <x-input-label for="cellphone" :value="__('Teléfono celular')" />
                            <x-text-input id="cellphone" class="block mt-1 w-full" type="text" name="cellphone" required />
                        </div>
                    </div>
                </div>

                <!-- Sección 3 -->
                <div id="section3" class="hidden">
                    <h2 class="text-xl font-bold text-blue-800 mb-4">OTROS DATOS</h2>
                    <div class="flex gap-4 mb-4">
                        <div>
                            <x-input-label :value="__('¿Es Adventista del 7mo Día?')" />
                            <div class="flex items-center gap-4 mt-1">
                                <label class="flex items-center">
                                    <input type="radio" name="adventist" value="yes" class="mr-2"> Sí
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="adventist" value="no" class="mr-2"> No
                                </label>
                            </div>
                        </div>
                        <div>
                            <x-input-label :value="__('¿Está bautizado?')" />
                            <div class="flex items-center gap-4 mt-1">
                                <label class="flex items-center">
                                    <input type="radio" name="baptized" value="yes" class="mr-2"> Sí
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="baptized" value="no" class="mr-2"> No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de Navegación -->
            <div class="flex justify-between">
                <button type="button" id="backButton" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600 hidden">Atrás</button>
                <button type="button" id="nextButton" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Siguiente</button>
                <button type="submit" id="submitButton" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 hidden">Enviar</button>
            </div>
        </form>
    </div>

    <!-- JavaScript para Controlar la Barra de Progreso y Navegación entre Secciones -->
    <script>
        const progressBar = document.getElementById('progress');
        const nextButton = document.getElementById('nextButton');
        const backButton = document.getElementById('backButton');
        const submitButton = document.getElementById('submitButton');

        const formSections = ["section1", "section2", "section3"];
        let currentSectionIndex = 0;

        function updateProgress() {
            const progressPercentage = ((currentSectionIndex + 1) / formSections.length) * 100;
            progressBar.style.width = `${progressPercentage}%`;
        }

        function showSection(index) {
            formSections.forEach((sectionId, i) => {
                const section = document.getElementById(sectionId);
                section.classList.toggle('hidden', i !== index);
            });

            backButton.classList.toggle('hidden', index === 0);
            nextButton.classList.toggle('hidden', index === formSections.length - 1);
            submitButton.classList.toggle('hidden', index !== formSections.length - 1);
        }

        nextButton.addEventListener('click', () => {
            if (currentSectionIndex < formSections.length - 1) {
                currentSectionIndex++;
                showSection(currentSectionIndex);
                updateProgress();
            }
        });

        backButton.addEventListener('click', () => {
            if (currentSectionIndex > 0) {
                currentSectionIndex--;
                showSection(currentSectionIndex);
                updateProgress();
            }
        });

        // Inicializar la primera sección y la barra de progreso
        showSection(currentSectionIndex);
        updateProgress();
    </script>
</body>
</html>
