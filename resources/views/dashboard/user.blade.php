<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- 👤 Encabezado --}}
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        @if($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" 
                                 alt="Foto de perfil" 
                                 class="w-28 h-28 rounded-full shadow-md object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'Usuario') }}&background=4F46E5&color=fff&size=128" 
                                 alt="Avatar" 
                                 class="w-28 h-28 rounded-full shadow-md object-cover">
                        @endif
                    </div>

                    <h2 class="text-3xl font-bold text-gray-800 mb-2">
                        👋 Bienvenido, {{ $user->name ?? 'Usuario' }}
                    </h2>
                </div>

                {{-- 🧾 Información Personal + Estado --}}
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    {{-- Información Personal --}}
                    <div class="bg-white rounded-xl shadow p-6">
                        <h3 class="text-xl font-semibold text-blue-600 mb-4">Información Personal</h3>
                        <p><strong>Nombre:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Rol:</strong> 
                            <span class="bg-blue-100 text-blue-700 text-sm px-2 py-1 rounded">
                                {{ $user->getRoleNames()->first() ?? 'Sin rol' }}
                            </span>
                        </p>
                    </div>

                    {{-- Estado de cuenta --}}
                    <div class="bg-white rounded-xl shadow p-6">
                        <h3 class="text-xl font-semibold text-blue-600 mb-4">Estado de cuenta</h3>
                        <p><strong>Cuenta activa:</strong> 
                            @if($user->estado)
                                <span class="text-green-600 font-semibold">✅ Sí</span>
                            @else
                                <span class="text-red-600 font-semibold">❌ No</span>
                            @endif
                        </p>

                        <div class="mt-4 flex gap-3">
                            <a href="{{ route('profile.edit') }}" 
                               class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Editar perfil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- 📝 Planilla de inscripción --}}
                <div class="bg-white rounded-xl shadow p-6 text-center">
                    <h3 class="text-2xl font-semibold text-blue-700 mb-3">
                        PLANILLA DE INSCRIPCIÓN AL NIVEL SUPERIOR
                    </h3>

                    @if($tieneInscripcion)
                        <p class="text-gray-700 mb-4">
                            
                        </p>

                        {{-- Estado --}}
                        <div class="mb-4">
                            <strong>Estado de tu inscripción:</strong>
                            <span class="ml-2 px-3 py-1 rounded-full text-white
                                @if($estadoInscripcion === 'pendiente') bg-yellow-500
                                @elseif($estadoInscripcion === 'aprobada') bg-green-600
                                @elseif($estadoInscripcion === 'rechazada') bg-red-600
                                @else bg-gray-500 @endif">
                                {{ ucfirst($estadoInscripcion) }}
                            </span>
                        </div>

                        {{-- Botones --}}
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('inscripcionmateria.index') }}" 
                               class="px-6 py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700">
                                📘 Ir a inscripción de materias
                            </a>

                            {{-- Permitir editar si está pendiente --}}
                            @if($estadoInscripcion === 'pendiente' && $inscripcion)
                                <a href="{{ route('admission.edit', $inscripcion->id) }}" 
                                   class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                                    ✏️ Editar inscripción
                                </a>
                            @endif
                        </div>
                    @else
                        <p class="text-gray-500 mb-4">
                            No has iniciado tu inscripción.
                        </p>
                        <a href="{{ route('complete-profile') }}" 
                           class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                            ✏️ Comenzar inscripción
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
