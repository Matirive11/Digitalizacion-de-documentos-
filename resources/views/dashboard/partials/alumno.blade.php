<div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-600">
    <header class="text-center mb-4">
        <h2 class="text-xl font-bold text-blue-700">PLANILLA DE INSCRIPCIÓN AL NIVEL SUPERIOR</h2>
    </header>

    @if(empty($inscripcion))
        <p class="text-gray-700 text-center mb-4">No has iniciado tu inscripción.</p>
        <div class="text-center">
            <a href="{{ route('complete-profile') }}" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-md hover:bg-blue-700 transition duration-300">
                Comenzar Inscripción
            </a>
        </div>
    @else
        <p class="text-gray-700 text-center mb-4"><strong>Estado de Inscripción:</strong> En proceso</p>
        <p class="text-gray-700 text-center mb-4"><strong>Datos Ingresados:</strong> {{ json_encode($inscripcion->toArray()) }}</p>
    @endif
</div>
