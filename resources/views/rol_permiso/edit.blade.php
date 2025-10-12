<x-layout>
    <x-titulo>Editar usuario: {{ $usuario['nombre'] }}</x-titulo>
    <form action="{{ route('usuario.update', $usuario['id']) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $usuario['nombre'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $usuario['email'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="rol">Rol:</label>
            <input type="text" name="rol" id="rol" value="{{ $usuario['rol'] }}">
        </div>

        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
