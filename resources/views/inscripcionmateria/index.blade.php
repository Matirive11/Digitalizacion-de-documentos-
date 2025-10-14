@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">📚 Inscripción a Materias</h1>

    {{-- ✅ Mensaje de éxito --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Formulario --}}
    <form action="{{ route('inscripcionmateria.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-lg">
        @csrf

        @php
            // Agrupamos las materias por año
            $agrupadas = collect($materiasDisponibles)->groupBy(fn($item) => $item['materia']->anio . '° año');
        @endphp

        @foreach($agrupadas as $grupo => $materias)
            <h2 class="text-xl font-semibold text-blue-700 mt-6 mb-4 border-b pb-2">{{ $grupo }}</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($materias as $item)
                    <div class="p-4 border rounded-xl shadow-sm bg-gray-50 hover:shadow-md transition">
                        <strong class="block text-lg text-gray-800">{{ $item['materia']->nombre }}</strong>

                        {{-- Estado actual --}}
                        @if($item['estado'])
                            <p class="mt-3">
                                <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ ucfirst($item['estado']) }}
                                </span>
                            </p>
                        @elseif($item['puede_inscribirse'])
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" name="materias[]" value="{{ $item['materia']->id }}" class="mr-2 rounded border-gray-300 focus:ring-blue-500">
                                <span class="text-gray-800">Inscribirme</span>
                            </label>
                        @else
                            <p class="mt-3">
                                <span class="inline-block bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">
                                    ❌ No cumple correlativas
                                </span>
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach

        {{-- Botón principal --}}
        <div class="text-center mt-8">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition">
                Confirmar inscripción
            </button>
        </div>
    </form>

    {{-- Enlace a materias inscriptas --}}
    <div class="text-center mt-8">
        <a href="{{ route('inscripcionmateria.misMaterias') }}" class="text-blue-700 hover:underline font-medium">
            📘 Ver mis materias inscriptas
        </a>
    </div>
</div>
@endsection
