@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Listado de Inscripciones</h1>

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Carrera de Interés</th>
                    <th class="border px-4 py-2">Estado</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscripciones as $inscripcion)
                    <tr>
                        <td class="border px-4 py-2">{{ $inscripcion->nombre }} {{ $inscripcion->apellido }}</td>
                        <td class="border px-4 py-2">{{ $inscripcion->email }}</td>
                        <td class="border px-4 py-2">{{ $inscripcion->carrera_interes }}</td>
                        <td class="border px-4 py-2">{{ $inscripcion->estado_solicitud ?? 'Pendiente' }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('inscripciones.show', $inscripcion->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
