<x-layout>
    <div class="flex justify-between">
        <x-titulo>Supervisores</x-titulo>
        <a href="{{ route('supervisor.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded-full font-bold py-2 px-4 text-center">Añadir Supervisor</a>
    </div>
    @forelse ($supervisores as $supervisor)
        <div class="mt-4">
            <a href="{{ route('supervisor.show', $supervisor->id) }}">
                <h2 class="bg-white border-4 text-blue-900 font-bold py-2 px-4 rounded-full hover:bg-blue-200 transition duration-300 ease-in-out">{{ $supervisor->nombre }}</h2>
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen supervisores cargados en la plataforma</h2>
    @endforelse
</x-layout>
