<nav class="bg-blue-800 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-xl font-bold">Dashboard</a>
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
