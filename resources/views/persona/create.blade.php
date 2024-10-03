<x-layout>
    <x-titulo>Crear persona</x-titulo>
    <form action="/persona" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni">
        </div>
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="flex flex-col mb-4">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido">
        </div>
        <div class="flex flex-col mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="flex flex-col mb-4">
            <label for="telefono">Numero de telefono:</label>
            <input type="number" name="telefono" id="telefono">
        </div>
        <div class="flex flex-col mb-4">
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
        </div>
        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
    </x-layout>
