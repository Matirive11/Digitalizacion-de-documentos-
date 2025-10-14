<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de Usuario') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-8">

                <!-- Encabezado: Imagen y botón de cerrar sesión -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-6">
                        <div class="relative group">
                            <!-- Imagen de perfil -->
                            <img id="photoPreview"
                                src="{{ $user->profile_photo_path ? asset('storage/'.$user->profile_photo_path) : 'https://ui-avatars.com/api/?name='.urlencode($user->first_name ?? 'U') }}"
                                alt="Foto de perfil"
                                class="w-28 h-28 rounded-full object-cover border-2 border-gray-300 shadow-md group-hover:opacity-75 transition">

                            <!-- Botón de cambiar foto (asociado al input oculto dentro del form principal) -->
                            <label for="profile_photo"
                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full text-white text-sm opacity-0 group-hover:opacity-100 cursor-pointer transition">
                                Cambiar foto
                            </label>
                        </div>
                    </div>

                    <!-- Botón de Cerrar sesión -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow-md transition">
                            Cerrar sesión
                        </button>
                    </form>
                </div>

                <!-- Formulario principal de edición -->
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <!-- Input oculto para cargar la foto -->
                    <input id="profile_photo" name="profile_photo" type="file" accept="image/*"
                        class="hidden" onchange="previewPhoto(event)">

                    <!-- Información personal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="first_name" :value="__('Nombre')" />
                            <x-text-input id="first_name" name="first_name" type="text"
                                class="mt-1 block w-full" value="{{ old('first_name', $user->first_name) }}" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="last_name" :value="__('Apellido')" />
                            <x-text-input id="last_name" name="last_name" type="text"
                                class="mt-1 block w-full" value="{{ old('last_name', $user->last_name) }}" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="telefono" :value="__('Teléfono')" />
                            <x-text-input id="telefono" name="telefono" type="text"
                                class="mt-1 block w-full" value="{{ old('telefono', $user->telefono) }}" />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email"
                                class="mt-1 block w-full" value="{{ old('email', $user->email) }}" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Carrera y año -->
                    @if($admission)
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="carrera" :value="__('Carrera')" />
                                <x-text-input id="carrera" type="text" class="mt-1 block w-full bg-gray-100" disabled
                                    value="{{ $admission->career->nombre ?? 'No asignada' }}" />
                            </div>

                            <div>
                                <x-input-label for="anio" :value="__('Año actual')" />
                                <x-text-input id="anio" type="text" class="mt-1 block w-full bg-gray-100" disabled
                                    value="{{ $admission->anio ?? 'No especificado' }}" />
                            </div>
                        </div>
                    @endif

                    <!-- Botón Guardar -->
                    <div class="mt-6 flex items-center gap-4">
                        <x-primary-button>{{ __('Guardar cambios') }}</x-primary-button>

                        @if (session('status') === 'Perfil actualizado correctamente.')
                            <p x-data="{ show: true }" x-show="show" x-transition
                                x-init="setTimeout(() => show = false, 3000)"
                                class="text-sm text-green-600">
                                {{ __('Perfil actualizado correctamente.') }}
                            </p>
                        @endif
                    </div>
                </form>

                <!-- Sección: Cambiar contraseña -->
                <div class="mt-10 border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Cambiar contraseña</h3>

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="current_password" :value="__('Contraseña actual')" />
                            <x-text-input id="current_password" name="current_password" type="password"
                                class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Nueva contraseña')" />
                            <x-text-input id="password" name="password" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirmar nueva contraseña')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <x-primary-button>{{ __('Actualizar contraseña') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para vista previa de foto -->
    <script>
        function previewPhoto(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('photoPreview').src = reader.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
</x-app-layout>
