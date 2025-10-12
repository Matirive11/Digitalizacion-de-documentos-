<x-layout>
    <x-titulo>Crear usuario</x-titulo>
    <form action="/usuario" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="flex flex-col mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="flex flex-col mb-4">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="flex flex-col mb-4">
            <label for="rol">Rol:</label>
            <select name="rol" id="rol">
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
