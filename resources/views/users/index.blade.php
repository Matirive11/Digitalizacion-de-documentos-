<x-layout>
    <div class="flex justify-between">
        <x-titulo>Usuarios</x-titulo>
        <a href="{{ route('users.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded-full font-bold py-2 px-4 text-center">Agregar Usuario</a>
    </div>

    @forelse ($users as $user)
        <div class="mt-4">
            <a href="{{ route('users.show', $user->dni) }}">
                <h2 class="bg-white border-4 text-blue-900 font-bold py-2 px-4 rounded-full hover:bg-blue-200 transition duration-300 ease-in-out">
                    {{ $user->first_name }} {{ $user->last_name }}
                </h2>
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen usuarios registrados en la plataforma</h2>
    @endforelse
</x-layout>
