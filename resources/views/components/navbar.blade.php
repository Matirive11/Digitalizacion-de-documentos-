<nav class="bg-[#003466] text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Imagen alineada a la izquierda -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo ISAM" class="w-12 h-12 object-contain">
            <a href="#" class="text-xl font-bold">Área Principal</a>
        </div>

        <!-- Menú de navegación -->
        <ul class="flex space-x-4">
            <li><a href="{{ route('home') }}" class="hover:text-gray-300">Inicio</a></li>
            <li><a href="{{ route('profile.edit') }}" class="hover:text-gray-300">Perfil</a></li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:text-gray-300">Cerrar Sesión</button>
            </form>
        </ul>
    </div>
</nav>
