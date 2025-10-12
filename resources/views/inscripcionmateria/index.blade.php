@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-700">Inscripción a Materias</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('inscripcionmateria.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($materiasDisponibles as $item)
                <div class="p-3 border rounded-md shadow-sm bg-gray-50">
                    <strong>{{ $item['materia']->nombre }}</strong>
                    <p class="text-sm text-gray-600">Año: {{ $item['materia']->anio }}</p>

                    @if($item['estado'])
                        <p class="text-blue-600 mt-2">Estado: {{ ucfirst($item['estado']) }}</p>
                    @elseif($item['puede_inscribirse'])
                        <label class="inline-flex items-center mt-2">
                            <input type="checkbox" name="materias[]" value="{{ $item['materia']->id }}" class="mr-2">
                            <span>Inscribirme</span>
                        </label>
                    @else
                        <p class="text-red-500 mt-2">No cumple correlativas</p>
                    @endif
                </div>
            @endforeach
        </div>

        <button type="submit" class="mt-4 bg-blue-600 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded">
            Confirmar inscripción
        </button>
    </form>

    <a href="{{ route('inscripcionmateria.misMaterias') }}" class="inline-block mt-6 text-blue-700 hover:underline">
        📘 Ver mis materias inscriptas
    </a>
</div>
@endsection
