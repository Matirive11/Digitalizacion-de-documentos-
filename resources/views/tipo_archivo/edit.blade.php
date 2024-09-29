<x-layout>
    <x-titulo>Editar Tipo de archivo: {{ $tipoarchivo['nombre'] }}</x-titulo>
    <form action="/tipo_archivo/{{ $tipoarchivo['id'] }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex flex-col mb-4">
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="{{ $tipoarchivo['descripcion'] }}">
        </div>
        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
    </x-layout>
        