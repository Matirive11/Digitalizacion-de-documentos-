<x-layout>
    <div class="flex justify-between">
        <x-titulo>Usuario</x-titulo>
        <a href="{{ route('usuario.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded-full font-bold py-2 px-4 text-center">Crear Usuario</a>
    </div>
    @forelse ($usuario as $usuarios)  <!-- $usuario se refiere a la lista de usuarios -->
        <div class="mt-4">
            <a href="/usuario/{{ $usuarios['id'] }}">  <!-- Cambié a $usuarios -->
                <h2 class="bg-white border-4 text-blue-900 font-bold py-2 px-4 rounded-full hover:bg-blue-200 transition duration-300 ease-in-out">{{ $usuarios['Correo_electronico'] }}</h2>  <!-- Cambié a $usuarios -->
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen usuarios cargados en la plataforma</h2>
    @endforelse
</x-layout>


