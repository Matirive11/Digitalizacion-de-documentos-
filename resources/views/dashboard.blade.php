<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Encabezado -->
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-800">
                    👋 Bienvenido, {{ Auth::user()->first_name }}
                </h1>
                <p class="text-gray-500 text-sm">Nos alegra verte de nuevo. Aquí tienes un resumen de tu cuenta.</p>
            </div>

            <!-- Información del Usuario -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Información</h3>
                    <p class="text-gray-600"><strong>Nombre:</strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                    <p class="text-gray-600"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p class="text-gray-600"><strong>Rol:</strong>
                        <span class="bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded-full">
                            {{ Auth::user()->getRoleNames()->first() }}
                        </span>
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Estado</h3>
                    <p class="text-gray-600 mb-4">Cuenta activa.</p>
                    <div class="flex gap-3">
                        <a href="{{ route('profile.edit') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                            Editar perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Planilla Única -->
            <div class="bg-white p-8 rounded-2xl shadow-md border-l-4 border-blue-600 max-w-3xl mx-auto">
                <header class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-blue-700">PLANILLA DE INSCRIPCIÓN AL NIVEL SUPERIOR</h2>
                </header>

                @if(empty($inscripcion))
                    <div class="text-center">
                        <p class="text-gray-700 mb-6">No has iniciado tu inscripción.</p>
                        <a href="{{ route('complete-profile') }}"
                        class="inline-block bg-blue-600 text-white font-semibold py-2.5 px-6 rounded-md hover:bg-blue-700 transition duration-300">
                            Comenzar Inscripción
                        </a>
                    </div>
                @else
                    <div class="text-center mb-6">
                        <p class="text-gray-700 mb-2"><strong>Estado:</strong> En proceso</p>
                        <p class="text-gray-700 mb-4">
                            <strong>Datos:</strong> {{ json_encode($inscripcion->toArray()) }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                        <a href="{{ route('inscripcionmateria.index') }}"
                        class="text-center bg-blue-600 hover:bg-blue-800 text-white font-semibold py-3 rounded-md shadow-md transition duration-200">
                            Inscribirme a Materias
                        </a>

                        <a href="{{ route('inscripcionmateria.misMaterias') }}"
                        class="text-center bg-green-600 hover:bg-green-800 text-white font-semibold py-3 rounded-md shadow-md transition duration-200">
                            Ver Mis Materias
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
