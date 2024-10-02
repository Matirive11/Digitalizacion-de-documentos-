<x-layout>
    <x-titulo>Editar permiso: {{ $permiso['nombre'] }}</x-titulo>
    <form action="/rol/{{ $permiso['id'] }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $permiso['nombre'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="instructor">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="{{ $permiso['descripcion'] }}">
        </div>
        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
    </x-layout>
