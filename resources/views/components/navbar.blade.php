<nav class="bg-white shadow-sm">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-14">
            <!-- LOGO PEQUEÑO -->
            <div class="flex items-center space-x-3">
                <!-- Asegurate de que images/logo.png no tenga mucho espacio blanco dentro del archivo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-6 max-h-10 w-auto object-contain block">
                <!-- Título pequeño opcional -->
                <span class="text-sm font-semibold text-gray-800 hidden sm:inline">Dashboard</span>
            </div>

            <!-- AVATAR / USUARIO -->
            <div class="flex items-center space-x-3 text-sm text-gray-600">
                <div class="hidden sm:block">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </div>
                <div class="h-8 w-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-700 font-semibold">
                    {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                </div>
            </div>
        </div>
    </div>
</nav>
