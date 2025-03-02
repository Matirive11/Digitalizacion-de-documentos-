    <x-layout>
        <div class="flex justify-between">
            <x-titulo>Documentos</x-titulo>
            <a href="{{ route('documento.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded-full font-bold py-2 px-4 text-center">Crear Documento</a>
        </div>
        @forelse ($documentos as $documento)
            <div class="mt-4">
                <a href="{{ route('documento.show', $documento->id) }}">
                    <h2 class="bg-white border-4 text-blue-900 font-bold py-2 px-4 rounded-full hover:bg-blue-200 transition duration-300 ease-in-out">{{ $documento->titulo }}</h2>
                </a>
            </div>
        @empty
            <h2 class="text-lg">No existen documentos cargados en la plataforma</h2>
        @endforelse
    </x-layout>
