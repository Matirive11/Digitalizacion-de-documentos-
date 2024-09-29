<x-layout>
<div class="flex justify-between">
    <x-titulo>Categorias</x-titulo>
    <a href="{{ route('categoria.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded font-bold">Crear categoria</a>
</div>
@forelse ($categorias as $categoria)
    <div class="mt-4">
        <a href="/categoria/{{ $categoria['id'] }}">
            <h2 class="bg-blue-600 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-700 transition duration-300 ease-in-out">{{ $categoria['nombre'] }}</h2>
        </a>
    </div>
@empty
    <h2 class="text-lg">No existen categorias cargadas en la plataforma</h2>
@endforelse
</x-layout>
