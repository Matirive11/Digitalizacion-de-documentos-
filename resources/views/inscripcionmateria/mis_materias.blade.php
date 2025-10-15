@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center">📘 Mis Materias Inscriptas</h1>

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

    {{-- ✅ Si no tiene materias --}}
    @if($materias->isEmpty())
        <p class="text-gray-600 text-center">No estás inscripto en ninguna materia.</p>
    @else
        {{-- 📂 Filtros de estado --}}
        <div class="flex flex-wrap justify-center gap-3 mb-6">
            <button onclick="filtrarMaterias('todas')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg transition">Todas</button>
            <button onclick="filtrarMaterias('Inscripto')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg transition">Inscripto</button>
            <button onclick="filtrarMaterias('Regular')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg transition">Regular</button>
            <button onclick="filtrarMaterias('Aprobado')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg transition">Aprobado</button>
            <button onclick="filtrarMaterias('Libre')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg transition">Libre</button>
        </div>

        {{-- 📚 Materias --}}
        <div id="materiasGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($materias as $inscripcion)
                <div class="p-6 border rounded-xl bg-white shadow hover:shadow-lg transition relative materia-item" data-estado="{{ $inscripcion->estado }}">

                    {{-- Nombre de materia --}}
                    <h2 class="text-lg font-semibold text-gray-800">{{ $inscripcion->materia->nombre ?? 'Sin nombre' }}</h2>
                    <p class="text-sm text-gray-600">Año: {{ $inscripcion->materia->anio ?? 'No especificado' }}</p>

                    {{-- Fecha de inscripción --}}
                    <p class="text-xs text-gray-500 mt-1">📅 Inscripto el: {{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion)->format('d/m/Y') }}</p>

                    {{-- Estado visual --}}
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                            @if($inscripcion->estado === 'Aprobado') bg-green-100 text-green-700
                            @elseif($inscripcion->estado === 'Regular') bg-blue-100 text-blue-700
                            @elseif($inscripcion->estado === 'Libre') bg-red-100 text-red-700
                            @else bg-gray-100 text-gray-600
                            @endif">
                            {{ ucfirst($inscripcion->estado) }}
                        </span>
                    </div>

                    {{-- ✅ Botones --}}
                    <div class="mt-5 flex flex-col gap-2">
                        {{-- Descargar certificado si está aprobado --}}
                        @if($inscripcion->estado === 'Aprobado')
                            <a href="{{ route('inscripcionmateria.certificado', $inscripcion->id) }}" 
                               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-center">
                                📄 Descargar Certificado
                            </a>
                        @endif

                        {{-- Darse de baja (solo si está inscripto) --}}
                        @if($inscripcion->estado === 'Inscripto')
                            <form action="{{ route('inscripcionmateria.baja', $inscripcion->materia_id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas darte de baja de {{ $inscripcion->materia->nombre }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full bg-red-500 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow transition">
                                    Darse de baja
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Volver a inscripción --}}
    <div class="text-center mt-8">
        <a href="{{ route('inscripcionmateria.index') }}" class="inline-block text-blue-700 hover:underline font-medium">
            🔙 Volver a inscribirme
        </a>
    </div>
</div>

{{-- 🔎 Script para filtrar por estado --}}
<script>
    function filtrarMaterias(estado) {
        const materias = document.querySelectorAll('.materia-item');
        materias.forEach(materia => {
            if (estado === 'todas' || materia.dataset.estado === estado) {
                materia.style.display = 'block';
            } else {
                materia.style.display = 'none';
            }
        });
    }
</script>
@endsection
