<div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-600">
    <header class="text-center mb-4">
        <h2 class="text-xl font-bold text-blue-700">PLANILLA DE INSCRIPCIÓN AL NIVEL SUPERIOR</h2>
    </header>

    @if(empty($inscripcion))
        <p class="text-gray-700 text-center mb-4">No has iniciado tu inscripción.</p>
        <div class="text-center">
            <a href="{{ route('complete-profile') }}"
               class="bg-blue-600 text-white font-bold py-2 px-6 rounded-md hover:bg-blue-700 transition duration-300">
                Comenzar Inscripción
            </a>
        </div>
    @else
        <div class="text-center mb-4">
            <p class="text-gray-700 mb-2">
                <strong>Estado de Inscripción:</strong> En proceso
            </p>
            <p class="text-gray-700 mb-4">
                <strong>Datos Ingresados:</strong> {{ json_encode($inscripcion->toArray()) }}
            </p>
        </div>

        <hr class="my-4">

        <!-- 🔹 Botones de materias -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
            <a href="{{ route('inscripcionmateria.index') }}"
               class="text-center bg-blue-600 hover:bg-blue-800 text-white font-semibold py-3 rounded-md shadow-md transition duration-200">
                Inscribirme a Materias
            </a>

            <a href="{{ route('inscripcionmateria.misMaterias') }}"
               class="text-center bg-green-600 hover:bg-green-800 text-white font-semibold py-3 rounded-md shadow-md transition duration-200">
                Ver Mis Materias
            </a>
        </div>
    @endif
</div>
