<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Completa tu Perfil</h2>

        <form method="POST" action="{{ route('profile.store') }}">
            @csrf

            <!-- Dirección -->
            <div class="mb-4">
                <x-input-label for="address" :value="__('Dirección')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <x-input-label for="phone" :value="__('Teléfono')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-4">
                <x-input-label for="birthdate" :value="__('Fecha de Nacimiento')" />
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>

            <!-- Otros campos adicionales según tus necesidades -->
            <!-- Por ejemplo, campo de género -->
            <div class="mb-4">
                <x-input-label for="gender" :value="__('Género')" />
                <select id="gender" name="gender" class="block mt-1 w-full">
                    <option value="male">Masculino</option>
                    <option value="female">Femenino</option>
                    <option value="other">Otro</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Botón de Enviar -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Guardar Perfil') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
