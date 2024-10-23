<x-layout>
    <x-titulo>Editar supervisor: {{ $supervisor['nombre'] }}</x-titulo>
    <form action="{{ route('supervisor.update', $supervisor['id']) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $supervisor['nombre'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $supervisor['email'] }}">
        </div>

        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
