<x-layout>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="flex flex-col mb-4">
            <label for="dni">DNI:</label>
            <input type="number" name="dni" id="dni" required class="p-2 border border-gray-300">
        </div>

        <div class="flex flex-col mb-4">
            <label for="first_name">Nombre:</label>
            <input type="text" name="first_name" id="first_name" required class="p-2 border border-gray-300">
        </div>

        <div class="flex flex-col mb-4">
            <label for="last_name">Apellido:</label>
            <input type="text" name="last_name" id="last_name" required class="p-2 border border-gray-300">
        </div>

        <div class="flex flex-col mb-4">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" required class="p-2 border border-gray-300">
        </div>

        <div class="flex flex-col mb-4">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required class="p-2 border border-gray-300">
        </div>

        <div class="flex flex-col mb-4">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="p-2 border border-gray-300">
        </div>

        <div class="flex flex-col mb-4">
            <label for="roles">Rol:</label>
            <select name="roles[]" id="roles" class="p-2 border border-gray-300" required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Crear Usuario" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
