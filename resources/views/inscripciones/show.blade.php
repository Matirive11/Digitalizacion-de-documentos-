@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Detalles de la Inscripción</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <p><strong>Nombre:</strong> {{ $inscripcion->nombre }} {{ $inscripcion->apellido }}</p>
            <p><strong>Email:</strong> {{ $inscripcion->email }}</p>
            <p><strong>Carrera de Interés:</strong> {{ $inscripcion->carrera_interes }}</p>
            <p><strong>Estado:</strong> {{ $inscripcion->estado_solicitud ?? 'Pendiente' }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $inscripcion->fecha_nacimiento }}</p>
            <p><strong>Teléfono:</strong> {{ $inscripcion->numero_telefono }}</p>
            <p><strong>Nacionalidad:</strong> {{ $inscripcion->nacionalidad }}</p>

            <a href="{{ route('inscripciones.index') }}" class="bg-gray-500 text-white px-3 py-1 rounded mt-4">Volver</a>
        </div>
    </div>
@endsection
