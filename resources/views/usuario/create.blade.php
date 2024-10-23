<x-layout>
    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf

        <div class="flex flex-col mb-4">
            <label for="persona_dni">DNI:</label>
            <input type="number" name="persona_dni" id="persona_dni" required class="p-2 border border-gray-300">
        </div>

        <div class="flex flex-col mb-4">
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" name="correo_electronico" id="correo_electronico" required class="p-2 border border-gray-300">
        </div>

        <div class="flex flex-col mb-4">
            <label for="contrasenia">Contraseña:</label>
            <input type="password" name="contrasenia" id="contrasenia" required class="p-2 border border-gray-300">
        </div>
        <div class="flex flex-col mb-4">
            <label for="rol_id">Rol:</label>
            <select name="rol_id" id="rol_id" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Crear Usuario" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
