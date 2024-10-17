<x-layout>
    <x-titulo>Editar usuario: {{ $usuario['Especialidad'] }}</x-titulo>
    <form action="/usuario/{{ $usuario['id'] }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex flex-col mb-4">
            <label for="Correo_electronico">Correo Electronico:</label>
            <input type="text" name="Correo_electronico" id="Correo_electronico" value="{{ $usuario['Correo_electronico'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Contrasenia">Contraseña:</label>
            <input type="password" name="Contrasenia" id="Contrasenia" value="{{ $usuario['Contrasenia'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Fecha_creacion">Fecha de Creación:</label>
            <input type="date" name="Fecha_creacion" id="Fecha_creacion" value="{{ $usuario['Fecha_creacion'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Estado">Estado:</label>
            <select name="Estado" id="Estado" value="{{ $usuario['Estado'] }}">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
