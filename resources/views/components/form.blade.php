<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Multi-sección</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/estilos.css'])
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

            <!-- Contenedor de Slots para las secciones del formulario -->
            <div class="section-content mb-4">
                <!-- El desarrollador define el contenido de cada sección con estos slots -->
                <div id="section1">
                    {{ $section1 ?? '' }}
                </div>
                <div id="section2" class="hidden">
                    {{ $section2 ?? '' }}
                </div>
                <div id="section3" class="hidden">
                    {{ $section3 ?? '' }}
                </div>
                <div id="section4" class="hidden">
                    {{ $section4 ?? '' }}
                </div>
                <div id="section5" class="hidden">
                    {{ $section5 ?? '' }}
                </div>
                <div id="section6" class="hidden">
                    {{ $section6 ?? '' }}
                </div>
                <div id="section7" class="hidden">
                    {{ $section7 ?? '' }}
                </div>
                <div id="section8" class="hidden">
                    {{ $section8 ?? '' }}
                </div>
            </div>

            <!-- Botones de Navegación al Pie -->
            <div class="flex justify-between items-center mt-6">
                <!-- Botón de Atrás -->
                <button type="button" id="backButton" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600 hidden">Atrás</button>

                <!-- Botones de Confirmar y Siguiente a la derecha -->
                <div class="flex gap-4">
                    <button type="button" id="nextButton" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Siguiente</button>
                    <button type="submit" id="submitButton" class="bg-blue-800 text-white p-2 rounded hover:bg-blue-900 hidden">Confirmar y Continuar</button>
                </div>
            </div>

        </form>
    </div>

    <!-- JavaScript para Controlar la Barra de Progreso y Navegación entre Secciones -->
    <script>
        const progressBar = document.getElementById('progress');
        const nextButton = document.getElementById('nextButton');
        const backButton = document.getElementById('backButton');
        const submitButton = document.getElementById('submitButton');

        const formSections = ["section1", "section2", "section3", "section4","section5", "section6", "section7", "section8"];
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
        const currentSection = document.getElementById(formSections[currentSectionIndex]);
        const inputs = currentSection.querySelectorAll('input[required], select[required]');

        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('border-red-500'); // Resaltar en rojo
                isValid = false;
            } else {
                input.classList.remove('border-red-500');
            }
        });

        if (isValid) {
            currentSectionIndex++;
            showSection(currentSectionIndex);
            updateProgress();
        } else {
            alert("Por favor, completa todos los campos obligatorios antes de continuar.");
        }
    });

        backButton.addEventListener('click', () => {
            if (currentSectionIndex > 0) {
                currentSectionIndex--;
                showSection(currentSectionIndex);
                updateProgress();
            }
        });
        submitButton.addEventListener('click', (event) => {
            console.log("Formulario enviado"); // Verifica si se ejecuta al hacer clic
        });
        // Inicializar la primera sección y la barra de progreso
        showSection(currentSectionIndex);
        updateProgress();
    </script>
</body>
</html>
