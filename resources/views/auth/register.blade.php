<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- DNI -->
        <div>
            <x-input-label for="persona_dni" :value="__('DNI')" />
            <x-text-input id="persona_dni" class="block mt-1 w-full" type="number" name="persona_dni" :value="old('persona_dni')" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('persona_dni')" class="mt-2" />
        </div>

        <!-- Correo Electrónico -->
        <div class="mt-4">
            <x-input-label for="correo_electronico" :value="__('Correo Electrónico')" />
            <x-text-input id="correo_electronico" class="block mt-1 w-full" type="email" name="correo_electronico" :value="old('correo_electronico')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('correo_electronico')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="contrasenia" :value="__('Contraseña')" />
            <x-text-input id="contrasenia" class="block mt-1 w-full" type="password" name="contrasenia" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('contrasenia')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="contrasenia_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="contrasenia_confirmation" class="block mt-1 w-full" type="password" name="contrasenia_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('contrasenia_confirmation')" class="mt-2" />
        </div>

        <!-- Estado (oculto por defecto, puedes manejarlo en el controlador) -->
        <input type="hidden" name="estado" value="1">

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
