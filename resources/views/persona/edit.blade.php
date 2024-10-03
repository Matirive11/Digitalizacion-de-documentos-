<x-layout>
    <x-titulo>Editar persona: {{ $persona['nombre'] }}</x-titulo>
    <form action="/persona/{{ $persona['dni'] }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex flex-col mb-4">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" value="{{ $persona['dni'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $persona['nombre'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="{{ $persona['apellido'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $persona['email'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="telefono">Numero de telefono:</label>
            <input type="number" name="telefono" id="telefono" value="{{ $persona['telefono'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $persona['fecha_nacimiento'] }}">
        </div>
        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
    </x-layout>
