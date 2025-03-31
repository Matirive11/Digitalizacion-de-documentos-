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
        <form id="form" method="POST" action="{{ route('inscripciones.store') }}">
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
    document.addEventListener("DOMContentLoaded", function () {
    cargarProgreso(); // Cargar datos guardados al iniciar

    function guardarProgreso() {
        let formData = {};

        // Capturar todos los tipos de campos (input, select, textarea)
        document.querySelectorAll("#form input, #form select, #form textarea").forEach(input => {
            if (input.type === "checkbox") {
                // Guardar checkbox como true o false
                formData[input.name] = input.checked;
            } else if (input.type === "radio") {
                // Guardar la opción seleccionada de un grupo de radio
                if (input.checked) {
                    formData[input.name] = input.value;
                }
            } else {
                // Guardar input normales y selects
                formData[input.name] = input.value;
            }
        });

        // Guardar en LocalStorage
        localStorage.setItem("formulario_admision", JSON.stringify(formData));
        console.log("📝 Progreso guardado en LocalStorage.");
    }

    function cargarProgreso() {
        let datosGuardados = localStorage.getItem("formulario_admision");

        if (datosGuardados) {
            let formData = JSON.parse(datosGuardados);

            document.querySelectorAll("#form input, #form select, #form textarea").forEach(input => {
                if (formData.hasOwnProperty(input.name)) {
                    if (input.type === "checkbox") {
                        // Restaurar checkbox
                        input.checked = formData[input.name];
                    } else if (input.type === "radio") {
                        // Restaurar radio buttons
                        if (input.value === formData[input.name]) {
                            input.checked = true;
                        }
                    } else {
                        // Restaurar inputs normales y selects
                        input.value = formData[input.name];
                    }
                }
            });

            console.log("📌 Progreso restaurado desde LocalStorage.");
        }
    }

    // Detectar cambios y guardar en LocalStorage
    document.querySelectorAll("#form input, #form select, #form textarea").forEach(input => {
        input.addEventListener("change", guardarProgreso);
        input.addEventListener("input", guardarProgreso);
    });

    // Borrar el progreso cuando el usuario envía el formulario
    document.querySelector("#form").addEventListener("submit", function () {
        localStorage.removeItem("formulario_admision");
        console.log("✅ Datos eliminados de LocalStorage tras el envío.");
    });

    // Botón opcional para borrar el progreso manualmente
    document.getElementById("limpiarProgreso")?.addEventListener("click", function () {
        localStorage.removeItem("formulario_admision");
        document.querySelectorAll("#form input, #form select, #form textarea").forEach(input => {
            if (input.type === "checkbox" || input.type === "radio") {
                input.checked = false;
            } else {
                input.value = "";
            }
        });
        alert("🗑️ El progreso del formulario ha sido eliminado.");
    });
});

const progressBar = document.getElementById('progress');
const nextButton = document.getElementById('nextButton');
const backButton = document.getElementById('backButton');
const submitButton = document.getElementById('submitButton');

const formSections = ["section1", "section2", "section3", "section4", "section5", "section6", "section7", "section8"];
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

    console.log(`📌 Mostrando Sección: ${formSections[currentSectionIndex]}`);
}

function validarSeccionActual() {
    // Obtener la sección actual basada en currentSectionIndex
    const currentSectionId = formSections[currentSectionIndex];
    const currentSection = document.getElementById(currentSectionId);
    if (!currentSection) {
        console.error(`❌ No se encontró la sección actual: ${currentSectionId}`);
        return false;
    }

    // Filtrar solo los campos dentro de la sección actual
    const inputs = currentSection.querySelectorAll('input[required], select[required]');

    let isValid = true;

    inputs.forEach(input => {
        console.log(`🔍 Validando campo en ${currentSectionId}: ${input.name}, Valor: ${input.value}`);

        if (input.type === "radio") {
            const radioGroup = currentSection.querySelector(`input[name="${input.name}"]:checked`);
            if (!radioGroup) {
                isValid = false;
                input.classList.add('border-red-500');
                console.log(`❌ Falta seleccionar opción en: ${input.name}`);
            }
        } else if (input.tagName === "SELECT") {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('border-red-500');
                console.log(`❌ Falta seleccionar opción en: ${input.name}`);
            } else {
                input.classList.remove('border-red-500');
            }
        } else {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('border-red-500');
                console.log(`❌ Falta completar el campo: ${input.name}`);
            } else {
                input.classList.remove('border-red-500');
            }
        }
    });

    if (!isValid) {
        console.log(`⚠️ La sección ${currentSectionId} tiene errores.`);
    } else {
        console.log(`✅ La sección ${currentSectionId} está completa.`);
    }

    return isValid;
}


nextButton.addEventListener('click', () => {
    console.log(`➡️ Intentando avanzar de sección ${currentSectionIndex} a ${currentSectionIndex + 1}`);

    if (validarSeccionActual()) {
        currentSectionIndex++;
        showSection(currentSectionIndex);
        updateProgress();
    } else {
        alert("Por favor, completa todos los campos obligatorios en esta sección antes de continuar.");
    }
});

backButton.addEventListener('click', () => {
    if (currentSectionIndex > 0) {
        console.log(`⬅️ Retrocediendo de sección ${currentSectionIndex} a ${currentSectionIndex - 1}`);
        currentSectionIndex--;
        showSection(currentSectionIndex);
        updateProgress();
    }
});

submitButton.addEventListener('click', (event) => {
    if (!validarSeccionActual()) {
        event.preventDefault();
        alert("Completa todos los campos antes de enviar el formulario.");
    } else {
        console.log("✅ Formulario enviado correctamente.");
    }
});

// Inicializar la primera sección y la barra de progreso
showSection(currentSectionIndex);
updateProgress();

</script>

</body>
</html>
