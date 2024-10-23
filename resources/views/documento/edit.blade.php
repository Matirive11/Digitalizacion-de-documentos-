<x-layout>
    <x-titulo>Editar documento: {{ $documento['nombre'] }}</x-titulo>
    <form action="{{ route('documento.update', $documento['id']) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $documento['nombre'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" value="{{ $documento['tipo'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="ruta">Ruta de almacenamiento:</label>
            <input type="text" name="ruta" id="ruta" value="{{ $documento['ruta'] }}" readonly>
            <small>La ruta no puede ser editada.</small>
        </div>

        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
