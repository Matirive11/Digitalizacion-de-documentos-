<x-layout>
    <x-titulo>Crear permiso</x-titulo>
    <form action="/permiso" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="flex flex-col mb-4">
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion">
        </div>
        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
    </x-layout>
