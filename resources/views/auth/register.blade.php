<x-guest-layout>
    <div class="auth-container bg-white rounded-lg shadow-lg p-8 max-w-md mx-auto mt-10">
        <h2 class="text-center text-2xl font-bold text-blue-800 mb-6">
            {{ __('Registro de Usuario') }}
        </h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="first_name" :value="__('Nombre')" />
                <x-text-input id="first_name" class="block mt-1 w-full"
                    type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Apellido -->
            <div class="mt-4">
                <x-input-label for="last_name" :value="__('Apellido')" />
                <x-text-input id="last_name" class="block mt-1 w-full"
                    type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- DNI -->
            <div class="mt-4">
                <x-input-label for="dni" :value="__('DNI')" />
                <x-text-input id="dni" class="block mt-1 w-full"
                    type="number" name="dni" :value="old('dni')" required autocomplete="off" />
                <x-input-error :messages="$errors->get('dni')" class="mt-2" />
            </div>

            <!-- Teléfono -->
            <div class="mt-4">
                <x-input-label for="telefono" :value="__('Teléfono')" />
                <x-text-input id="telefono" class="block mt-1 w-full"
                    type="number" name="telefono" :value="old('telefono')" required autocomplete="tel" />
                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>

            <!-- Correo Electrónico -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full"
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Botones -->
            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
                </a>

                <x-primary-button>
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
