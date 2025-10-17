@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center">📄 Mis Exámenes Inscriptos</h1>

    {{-- ✅ Mensajes --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('error') }}
        </div>
    @endif

    {{-- ⚠️ Si no hay inscripciones --}}
    @if($inscripciones->isEmpty())
        <p class="text-gray-600 text-center">Aún no te inscribiste a ningún examen.</p>
    @else
        {{-- 📚 Tarjetas de exámenes --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($inscripciones as $inscripcion)
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition border border-gray-100 flex flex-col justify-between">
                    
                    {{-- Nombre y materia --}}
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $inscripcion->materia->nombre ?? 'Materia no encontrada' }}
                        </h2>
                        <p class="text-sm text-gray-600 mb-2">
                            Estado actual: 
                            <span class="font-medium">
                                {{ $inscripcion->materia->estado ?? 'Sin estado' }}
                            </span>
                        </p>
                        <p class="text-xs text-gray-500">📅 Inscripto el: {{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion)->format('d/m/Y') }}</p>
                    </div>

                    {{-- Botón de baja --}}
                    <form action="{{ route('examenes.baja', $inscripcion->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('¿Seguro que deseas darte de baja de este examen?');" 
                          class="mt-6">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full bg-red-500 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-lg shadow transition">
                            ❌ Darse de baja
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    {{-- 🔙 Volver --}}
    <div class="text-center mt-8">
        <a href="{{ route('examenes.index') }}" class="inline-block text-blue-700 hover:underline font-medium">
            🔙 Volver a inscripción de exámenes
        </a>
    </div>
</div>
@endsection
