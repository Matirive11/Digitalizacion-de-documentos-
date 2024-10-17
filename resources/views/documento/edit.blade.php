<x-layout>
    <x-titulo>Editar documento: {{ $documento['Especialidad'] }}</x-titulo>
    <form action="/documento/{{ $documento['id'] }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="flex flex-col mb-4">
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="{{ $documento['documento'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Tipo_documento">Tipo de documento:</label>
            <input type="text" name="Tipo_documento" id="Tipo_documento" value="{{ $documento['Tipo_documento'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Fecha_subida">Fecha de subida:</label>
            <input type="date" name="Fecha_subida" id="Fecha_subida" value="{{ $documento['Fecha_subida'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Estado">Estado:</label>
            <select name="Estado" id="Estado" value="{{ $documento['Estado'] }}">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
