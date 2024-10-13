<x-layout>
    <x-titulo>Editar archivo: {{ $archivo['nombre'] }}</x-titulo>
    <form action="{{ route('archivo.update', $archivo['id']) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre del archivo:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $archivo['nombre'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" value="{{ $archivo['tipo'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="ruta">Ruta de almacenamiento:</label>
            <input type="text" name="ruta" id="ruta" value="{{ $archivo['ruta'] }}" readonly>
            <small>La ruta no puede ser editada.</small>
        </div>

        <div class="flex flex-col mb-4">
            <label for="id_tipo_archivo">ID Tipo de Archivo:</label>
            <input type="number" name="id_tipo_archivo" id="id_tipo_archivo" value="{{ $archivo['id_tipo_archivo'] }}">
        </div>

        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
