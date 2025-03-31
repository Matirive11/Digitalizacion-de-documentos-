<x-layout title="Detalles de la Admisión">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Solicitud de Admisión #{{ $admission->id }}</h2>
            <a href="{{ route('inscripciones.downloadPdf', $admission->id) }}"
               class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 shadow-md">
                Descargar PDF
            </a>
        </div>

        <div class="mt-4">
            <p><strong>Nombre:</strong> {{ $admission->user->first_name ?? 'N/A' }} {{ $admission->user->last_name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $admission->user->email ?? 'N/A' }}</p>
            <p><strong>Teléfono:</strong> {{ $admission->numero_telefono ?? 'N/A' }}</p>
            <p><strong>Carrera de Interés:</strong> {{ $admission->carrera_interes ?? 'No especificado' }}</p>
            <p><strong>Estado:</strong>
                @if ($admission->estado === 'Aprobado')
                <span class="bg-green-600 text-white px-2 py-1 rounded">Aprobado</span>
            @elseif ($admission->estado === 'En Observación')
                <span class="bg-orange-500 text-white px-2 py-1 rounded">En Observación</span>
            @elseif ($admission->estado === 'Rechazada')
                <span class="bg-red-600 text-white px-2 py-1 rounded">Rechazada</span>
            @else
                <span class="bg-gray-500 text-white px-2 py-1 rounded">Pendiente</span>
            @endif

            </p>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('inscripciones.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                Volver a la Lista
            </a>
            <a href="{{ route('inscripciones.edit', $admission->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Editar
            </a>
            <form action="{{ route('inscripciones.destroy', $admission->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta admisión?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                    Eliminar
                </button>
            </form>
        </div>
        <div class="mt-6 p-6 bg-gray-100 rounded-lg shadow-md">
            <h3 class="text-lg font-bold text-blue-800 mb-4">Documentos Adjuntos</h3>

            @if ($admission->user->documentos->isEmpty())
                <p class="text-red-600">No se han adjuntado documentos.</p>
            @else
                <ul class="list-disc list-inside">
                    @foreach ($admission->user->documentos as $documento)
                        <li>
                            <strong>{{ $documento->descripcion }}:</strong>
                            <a href="{{ asset(str_replace('public/', 'storage/', $documento->archivo->ruta)) }}"
                               target="_blank" class="text-blue-600 underline">
                                Ver {{ $documento->nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
         <!-- Formulario de Estado y Observaciones -->
         <div class="mt-6 bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-bold text-gray-800 mb-4">📌 Actualizar Estado y Observaciones</h3>
            <form action="{{ route('admissions.updateState', $admission->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Selección de Estado -->
                <div class="mb-4">
                    <label for="estado" class="block font-semibold text-gray-700">Estado:</label>
                    <select name="estado" id="estado" class="w-full p-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                        <option value="Pendiente" {{ $admission->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En Observación" {{ $admission->estado == 'En Observación' ? 'selected' : '' }}>En Observación</option>
                        <option value="Aprobado" {{ $admission->estado == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                        <option value="Rechazado" {{ $admission->estado == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                    </select>
                </div>

                <!-- Observaciones -->
                <div class="mb-4">
                    <label for="observaciones" class="block font-semibold text-gray-700">Observaciones:</label>
                    <textarea name="observaciones" id="observaciones" class="w-full p-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300" rows="3">{{ $admission->observaciones }}</textarea>
                </div>

                <!-- Botón Guardar -->
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow-md">
                    💾 Guardar Cambios
                </button>
            </form>
        </div>
    </div>


</x-layout>
