<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo ISAM" class="w-24 h-24 object-contain mb-3">
            <h1 class="text-2xl font-bold text-blue-800">INICIAR SESIÓN</h1>
        </div>

        <!-- Card -->
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                  type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                               name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-700 hover:underline" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <div class="flex flex-col items-center">
                    <x-primary-button class="w-full justify-center bg-blue-700 hover:bg-blue-800">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>

                    @if (Route::has('register'))
                        <p class="mt-4 text-sm text-gray-600">
                            ¿No tienes una cuenta?
                            <a href="{{ route('register') }}" class="text-blue-700 hover:underline">
                                Regístrate aquí
                            </a>
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
