<x-layout>
    <div class="flex justify-between">
        <x-titulo>Tipo de Archivo</x-titulo>
        <a href="{{ route('tipo_archivo.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded font-bold">Crear tipo de archivo</a>
    </div>
    @forelse ($tipoarchivo as $tipo)
        <div class="mt-4">
            <a href="/tipo_archivo/{{ $tipo['id'] }} ">
                <h2 class= "bg-blue-600 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-700 transition duration-300 ease-in-out">Descripcion: {{ $tipo['descripcion'] }}</h2>
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen tipos de archivos cargados en la plataforma</h2>
    @endforelse
    </x-layout>
    