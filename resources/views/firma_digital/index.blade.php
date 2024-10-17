<x-layout>
    <div class="flex justify-between">
        <x-titulo>Firmas Digitales</x-titulo>
        <a href="{{ route('firma_digital.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded-full font-bold py-2 px-4 text-center">Añadir Firma Digital</a>
    </div>
    @forelse ($firmas as $firma)
        <div class="mt-4">
            <a href="{{ route('firma_digital.show', $firma->id) }}">
                <h2 class="bg-white border-4 text-blue-900 font-bold py-2 px-4 rounded-full hover:bg-blue-200 transition duration-300 ease-in-out">{{ $firma->archivo }}</h2>
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen firmas digitales cargadas en la plataforma</h2>
    @endforelse
</x-layout>
