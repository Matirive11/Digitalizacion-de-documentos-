<x-layout>
    <x-titulo>Crear Usuario</x-titulo>
    <form action="/usuario" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="Correo_electronico">Correo Electrónico:</label>
            <input type="text" name="Correo_electronico" id="Correo_electronico">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Contrasenia">Contraseña:</label>
            <input type="password" name="Contrasenia" id="Contrasenia">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Fecha_creacion">Fecha de creación:</label>
            <input type="date" name="Fecha_creacion" id="Fecha_creacion">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Estado">Estado:</label>
            <select name="Estado" id="Estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>

