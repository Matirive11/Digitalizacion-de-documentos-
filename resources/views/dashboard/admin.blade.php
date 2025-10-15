@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">👨‍🏫 Panel de Administración</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl">
        <table class="min-w-full border-collapse text-sm text-gray-700">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">#</th>
                    <th class="py-3 px-4 text-left">Estudiante</th>
                    <th class="py-3 px-4 text-center">Estado Solicitud</th>
                    <th class="py-3 px-4 text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumnos as $alumno)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $alumno->id }}</td>
                        <td>{{ $alumno->first_name }} {{ $alumno->last_name }}</td>
                        <td class="py-3 px-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                @if(optional($alumno->admission)->estado == 'aprobado') bg-green-100 text-green-800
                                @elseif(optional($alumno->admission)->estado == 'rechazado') bg-red-100 text-red-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst(optional($alumno->admission)->estado ?? 'pendiente') }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('admin.inspeccionar', $alumno->id) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded text-sm font-semibold">
                                🔍 Inspeccionar
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">No hay alumnos con solicitudes.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
