<x-layout>
    <div class="flex justify-between">
        <x-titulo>Documento</x-titulo>
        <a href="{{ route('documento.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded-full font-bold py-2 px-4 text-center">Crear documento</a>
    </div>

    @forelse ($documentos as $documento)  <!-- Usamos $documentos (plural) en la colección y $documento (singular) en cada iteración -->
        <div class="mt-4">
            <a href="/documento/{{ $documento->id }}">  <!-- Cambié $documento['id'] a $documento->id para usar notación de objetos -->
                <h2 class="bg-white border-4 text-blue-900 font-bold py-2 px-4 rounded-full hover:bg-blue-200 transition duration-300 ease-in-out">{{ $documento->Nombre }}</h2>  <!-- Cambié $documento['nombre'] a $documento->Nombre -->
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen documentos cargados en la plataforma</h2>
    @endforelse
</x-layout>
