@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">👨‍🏫 Gestión de Inscripciones</h1>

    {{-- ✅ Mensajes de éxito / error --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('error') }}
        </div>
    @endif

    {{-- ✅ Tabla de inscripciones --}}
    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl">
        <table class="min-w-full border-collapse text-sm text-gray-700">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">#</th>
                    <th class="py-3 px-4 text-left">Estudiante</th>
                    <th class="py-3 px-4 text-left">Materia</th>
                    <th class="py-3 px-4 text-center">Fecha de inscripción</th>
                    <th class="py-3 px-4 text-center">Estado actual</th>
                    <th class="py-3 px-4 text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inscripciones as $inscripcion)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $inscripcion->id }}</td>
                        <td class="py-3 px-4 font-medium">{{ $inscripcion->estudiante->name ?? 'Sin nombre' }}</td>
                        <td class="py-3 px-4">{{ $inscripcion->materia->nombre ?? 'Materia no encontrada' }}</td>
                        <td class="py-3 px-4 text-center">{{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion)->format('d/m/Y') }}</td>
                        
                        {{-- Estado con colores --}}
                        <td class="py-3 px-4 text-center">
                            @php
                                $color = match($inscripcion->estado) {
                                    'Aprobado' => 'bg-green-100 text-green-800',
                                    'Regular' => 'bg-blue-100 text-blue-800',
                                    'Libre' => 'bg-red-100 text-red-700',
                                    default => 'bg-gray-100 text-gray-700',
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $color }}">
                                {{ $inscripcion->estado }}
                            </span>
                        </td>

                        {{-- Formulario para cambiar estado --}}
                        <td class="py-3 px-4 text-center">
                            <form action="{{ route('admin.inscripciones.updateEstado', $inscripcion->id) }}" method="POST" class="inline-flex items-center space-x-2">
                                @csrf
                                <select name="estado" class="border rounded-lg px-2 py-1 text-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="Inscripto" {{ $inscripcion->estado == 'Inscripto' ? 'selected' : '' }}>Inscripto</option>
                                    <option value="Regular" {{ $inscripcion->estado == 'Regular' ? 'selected' : '' }}>Regular</option>
                                    <option value="Aprobado" {{ $inscripcion->estado == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                                    <option value="Libre" {{ $inscripcion->estado == 'Libre' ? 'selected' : '' }}>Libre</option>
                                </select>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                    💾 Guardar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">No hay inscripciones registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
