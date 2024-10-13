<x-layout>
    <div class="flex justify-between">
        <x-titulo>Archivos</x-titulo>
        <a href="{{ route('archivo.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded-full font-bold py-2 px-4 text-center">Subir archivo</a>
    </div>
    @forelse ($archivos as $archivo)
        <div class="mt-4">
            <a href="{{ route('archivo.show', $archivo->id) }}">
                <h2 class="bg-white border-4 text-blue-900 font-bold py-2 px-4 rounded-full hover:bg-blue-200 transition duration-300 ease-in-out">{{ $archivo->nombre }}</h2>
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen archivos cargados en la plataforma</h2>
    @endforelse
</x-layout>
