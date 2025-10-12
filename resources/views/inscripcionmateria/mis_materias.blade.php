@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-700">Mis Materias Inscriptas</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($materias->isEmpty())
        <p class="text-gray-600">No estás inscripto en ninguna materia.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($materias as $materia)
                <div class="p-4 border rounded-lg bg-white shadow">
                    <strong>{{ $materia->nombre }}</strong>
                    <p class="text-sm text-gray-600">Año: {{ $materia->anio }}</p>

                    <form action="{{ route('inscripcionmateria.baja', $materia->id) }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-1 rounded">
                            Darse de baja
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('inscripcionmateria.index') }}" class="inline-block mt-6 text-blue-700 hover:underline">
        🔙 Volver a inscribirme
    </a>
</div>
@endsection
