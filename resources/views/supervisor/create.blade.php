<x-layout>
    <x-titulo>Crear Supervisor</x-titulo>
    <form action="/supervisor" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="Especialidad">Especialidad:</label>
            <input type="text" name="Especialidad" id="Especialidad">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Fecha_contratacion">Fecha de contratacion:</label>
            <input type="date" name="Fecha_contratacion" id="Fecha_contratacion">
        </div>
        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
    </x-layout>
