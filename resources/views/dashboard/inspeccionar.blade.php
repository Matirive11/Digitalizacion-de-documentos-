@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">
        👨‍🎓 Inspeccionar Alumno: 
        <span class="text-blue-600">{{ $alumno->name }}</span>
    </h2>

    <form action="{{ route('admin.actualizarAlumno', $alumno->id) }}" method="POST" class="space-y-8">
        @csrf

        {{-- 🔹 Estado de la solicitud --}}
        <div class="bg-white shadow-md rounded-xl p-6">
            <label class="block text-gray-700 font-semibold mb-2">📄 Estado de la Solicitud:</label>
            <select name="estado_formulario" 
                    class="border border-gray-300 rounded-lg px-4 py-2 w-full max-w-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="pendiente" {{ $admission->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="aprobado" {{ $admission->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="rechazado" {{ $admission->estado == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>

        {{-- 🔹 Materias agrupadas por año --}}
        @php
            $materiasPorAnio = $materias->groupBy('materia.anio');
        @endphp

        @foreach ($materiasPorAnio as $anio => $grupo)
            <div class="bg-white shadow-lg rounded-xl p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <span class="text-blue-600 text-2xl">📘</span> 
                    Materias de {{ $anio ?? 'Año sin definir' }}° Año
                </h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-gray-700 border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left">Materia</th>
                                <th class="py-3 px-4 text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupo as $inscripcion)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="py-3 px-4 font-medium">
                                        {{ $inscripcion->materia->nombre ?? 'Sin nombre' }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <select name="materias[{{ $inscripcion->id }}]" 
                                            class="px-3 py-1 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                            <option value="Inscripto" {{ $inscripcion->estado == 'Inscripto' ? 'selected' : '' }}>Inscripto</option>
                                            <option value="Regular" {{ $inscripcion->estado == 'Regular' ? 'selected' : '' }}>Regular</option>
                                            <option value="Aprobado" {{ $inscripcion->estado == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                                            <option value="Libre" {{ $inscripcion->estado == 'Libre' ? 'selected' : '' }}>Libre</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

        {{-- 🔹 Botón de guardado --}}
        <div class="text-center">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold shadow-md transition">
                💾 Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection
