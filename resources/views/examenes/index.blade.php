@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center">📝 Inscripción a Exámenes</h1>

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

    {{-- 🛡️ Verificación segura de la variable --}}
    @php
        $materias = $materiasDisponibles ?? collect();
    @endphp

    {{-- ⚠️ Si no hay materias disponibles --}}
    @if($materias->isEmpty())
        <div class="text-center p-8 bg-yellow-50 rounded-lg">
            <p class="text-yellow-700 text-lg">🎉 ¡Excelente! Ya estás inscripto a todas las materias disponibles.</p>
            <p class="text-gray-600 mt-2">Revisa tus exámenes inscriptos en la sección correspondiente.</p>
        </div>
    @else
        {{-- 📚 Lista de materias disponibles --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($materias as $inscripcionMateria)
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition border border-gray-100 flex flex-col justify-between">
                    
                    {{-- Título y estado --}}
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $inscripcionMateria->materia->nombre }}
                        </h2>
                        
                        <span class="inline-block px-3 py-1 text-sm font-medium rounded-full
                            @if($inscripcionMateria->estado === 'Regular') bg-blue-100 text-blue-700
                            @elseif($inscripcionMateria->estado === 'Libre') bg-yellow-100 text-yellow-700
                            @else bg-gray-100 text-gray-700
                            @endif">
                            Estado: {{ $inscripcionMateria->estado }}
                        </span>
                    </div>

                    {{-- Botón de inscripción --}}
                    <form method="POST" action="{{ route('examenes.store') }}" class="mt-6">
                        @csrf
                        <input type="hidden" name="materia_id" value="{{ $inscripcionMateria->materia_id }}">
                        <button type="submit" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow transition flex items-center justify-center">
                            ✏️ Inscribirme al Examen
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    {{-- 🔗 Navegación --}}
    <div class="flex justify-center gap-4 mt-8">
        <a href="{{ route('examenes.misExamenes') }}" 
           class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow font-medium transition">
            📄 Ver mis exámenes inscriptos
        </a>
        <a href="{{ route('dashboard') }}" 
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg shadow font-medium transition">
            🔙 Volver al Dashboard
        </a>
    </div>
</div>
@endsection