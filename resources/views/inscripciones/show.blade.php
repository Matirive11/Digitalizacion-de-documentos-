<x-layout title="Detalles de la Admisión">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-800">Solicitud de Admisión #{{ $admission->id }}</h2>

        <div class="mt-4">
            <p><strong>Nombre:</strong> {{ $admission->user->first_name ?? 'N/A' }} {{ $admission->user->last_name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $admission->user->email ?? 'N/A' }}</p>
            <p><strong>Teléfono:</strong> {{ $admission->numero_telefono ?? 'N/A' }}</p>
            <p><strong>Carrera de Interés:</strong> {{ $admission->carrera_interes ?? 'No especificado' }}</p>
            <p><strong>Estado:</strong>
                @if ($admission->estado ?? false)
                    <span class="bg-green-500 text-white px-2 py-1 rounded">Aprobada</span>
                @else
                    <span class="bg-yellow-500 text-white px-2 py-1 rounded">Pendiente</span>
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
    </div>
</x-layout>
