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
                <p class="text-gray-700 mb-4">
                    Estado:
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                        En proceso
                    </span>
                </p>

                <div class="flex justify-center gap-4">
                    <a href="{{ route('inscripcionmateria.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        Inscribirme a Materias
                    </a>
                    <a href="{{ route('inscripcionmateria.mismaterias') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
                        Ver Mis Materias
                    </a>
                </div>
            </div>
        </div>
    @endif

</div>
@endsection
