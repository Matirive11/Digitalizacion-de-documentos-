@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    @if(Auth::user()->isAdmin())
        {{-- 🧠 DASHBOARD ADMIN --}}
        <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center">👨‍💼 Panel del Administrador</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Perfil del admin --}}
            <div class="p-6 bg-white rounded-xl shadow">
                <h2 class="text-xl font-semibold mb-2">Bienvenido, {{ Auth::user()->name }}</h2>
                <p class="text-gray-600 mb-4">{{ Auth::user()->email }}</p>

                <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold mb-4">
                    Rol: ADMIN
                </span>

                <div class="flex gap-2">
                    <a href="{{ route('profile.edit') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        Editar perfil
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>

            {{-- Acciones del admin --}}
            <div class="p-6 bg-white rounded-xl shadow">
                <h2 class="text-xl font-semibold mb-4">📚 Gestión académica</h2>
                <div class="flex flex-col gap-3">
                    <a href="{{ route('admin.inscripciones.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow text-center">
                        Ver Inscripciones de Usuarios
                    </a>
                    <a href="{{ route('materias.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow text-center">
                        Administrar Materias
                    </a>
                </div>
            </div>
        </div>

        {{-- 📋 Listado de alumnos --}}
        <div class="mt-10 p-6 bg-white rounded-xl shadow">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">📋 Lista de Alumnos Inscritos</h2>

            @if(isset($alumnos) && $alumnos->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nombre</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">DNI</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Estado</th>
                                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($alumnos as $alumno)
                                <tr>
                                    <td class="px-4 py-2">{{ $alumno->first_name }} {{ $alumno->last_name }}</td>
                                    <td class="px-4 py-2">{{ $alumno->dni }}</td>
                                    <td class="px-4 py-2">{{ $alumno->email }}</td>
                                    <td class="px-4 py-2">
                                        <span class="px-3 py-1 rounded-full text-sm font-medium 
                                            @if(optional($alumno->admission)->estado === 'pendiente') bg-yellow-100 text-yellow-700
                                            @elseif(optional($alumno->admission)->estado === 'aprobado') bg-green-100 text-green-700
                                            @elseif(optional($alumno->admission)->estado === 'rechazado') bg-red-100 text-red-700
                                            @else bg-gray-100 text-gray-700 @endif">
                                            {{ ucfirst(optional($alumno->admission)->estado ?? 'Sin estado') }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('admin.inspeccionar', $alumno->id) }}" 
                                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg shadow">
                                            Inspeccionar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">No hay alumnos registrados aún.</p>
            @endif
        </div>

    @else
        {{-- 🧑‍🎓 DASHBOARD USUARIO --}}
        <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center">📘 Panel del Estudiante</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Perfil del usuario --}}
            <div class="p-6 bg-white rounded-xl shadow text-center">
                <div class="mb-4">
                    @if(Auth::user()->foto)
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto de perfil"
                             class="w-24 h-24 rounded-full mx-auto object-cover border">
                    @else
                        <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto flex items-center justify-center text-gray-500">
                            Sin foto
                        </div>
                    @endif
                </div>

                <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-gray-600">{{ Auth::user()->email }}</p>

                <div class="flex justify-center gap-3 mt-4">
                    <a href="{{ route('profile.edit') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
                        Editar perfil
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>

            {{-- Acciones del usuario --}}
            <div class="p-6 bg-white rounded-xl shadow text-center">
                <h2 class="text-xl font-semibold mb-3">Planilla de Inscripción al Nivel Superior</h2>

                @if(isset($inscripcion) && $inscripcion)
                    <p class="text-gray-700 mb-4">
                        Estado:
                        <span class="px-3 py-1 rounded-full text-sm font-semibold 
                            @if($inscripcion->estado === 'pendiente') bg-yellow-100 text-yellow-700
                            @elseif($inscripcion->estado === 'aprobado') bg-green-100 text-green-700
                            @elseif($inscripcion->estado === 'rechazado') bg-red-100 text-red-700
                            @else bg-gray-100 text-gray-700 @endif">
                            {{ ucfirst($inscripcion->estado) }}
                        </span>
                    </p>

                    {{-- Botones según estado --}}
                    @if($inscripcion->estado === 'pendiente')
                        <a href="{{ route('admissions.edit', $inscripcion->id) }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                            ✏️ Editar Inscripción
                        </a>
                    @else
                        <a href="{{ route('admission.create') }}" 
                           class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow">
                            Nueva Inscripción
                        </a>
                    @endif
                @else
                    <p class="text-gray-500 mb-4">Aún no iniciaste tu inscripción.</p>
                    <a href="{{ route('admission.create') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        📝 Comenzar Inscripción
                    </a>
                @endif
            </div>
        </div>
    @endif

    {{-- Mensajes de éxito o error --}}
    @if (session('success'))
        <div class="mt-4 bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mt-4 bg-red-100 text-red-800 px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif

</div>
@endsection
