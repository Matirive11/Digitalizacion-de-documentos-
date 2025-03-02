<x-layout>
    <div class="flex justify-between items-center mb-4">
        <x-titulo>Usuarios</x-titulo>
        <a href="{{ route('users.create') }}"
           class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
            <!-- Icono de agregar usuario -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Agregar Usuario
        </a>
    </div>

    @if($users->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full table-auto bg-white border border-gray-300 shadow-md rounded-lg">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-100 transition duration-300">
                        <td class="py-3 px-6">{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td class="py-3 px-6">{{ $user->email }}</td>
                        <td class="py-3 px-6 flex justify-center gap-4">
                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-7 4h8M9 8h1m4 0h1m-5 4h1m4 0h1M5 3h14a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                                </svg>
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15.5A3.5 3.5 0 1 0 12 8a3.5 3.5 0 0 0 0 7.5zm8.5-3.5c0-.3 0-.7-.1-1l2.1-1.6-2.1-3.6-2.4.8a6.7 6.7 0 0 0-1.6-.9l-.4-2.5h-4l-.4 2.5a6.7 6.7 0 0 0-1.6.9l-2.4-.8-2.1 3.6 2.1 1.6c-.1.3-.1.7-.1 1s0 .7.1 1l-2.1 1.6 2.1 3.6 2.4-.8c.5.4 1 .7 1.6.9l.4 2.5h4l.4-2.5c.6-.2 1.1-.5 1.6-.9l2.4.8 2.1-3.6-2.1-1.6c.1-.3.1-.7.1-1z"/>
                                </svg>
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h2 class="text-lg text-center text-gray-700">No existen usuarios registrados en la plataforma</h2>
    @endif
</x-layout>
