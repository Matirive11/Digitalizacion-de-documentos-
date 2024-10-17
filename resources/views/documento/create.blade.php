<x-layout>
    <x-titulo>Crear Documento</x-titulo>
    <form action="/documento" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="Nombre" id="nombre" required>
        </div>
        <div class="flex flex-col mb-4">
            <label for="descripcion">Descripción:</label>
            <input type="text" name="Descripcion" id="descripcion" required>
        </div>
        <div class="flex flex-col mb-4">
            <label for="Tipo_documento">Tipo de documento:</label>
            <input type="file" name="Tipo_documento" id="Tipo_documento" required>
        </div>
        <div class="flex flex-col mb-4">
            <label for="Fecha_subida">Fecha de subida:</label>
            <input type="date" name="Fecha_subida" id="Fecha_subida" required>
        </div>
        <div class="flex flex-col mb-4">
            <label for="Estado">Estado:</label>
            <select name="Estado" id="Estado" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
