<x-layout>
    <x-titulo>Crear Tipo de archivo</x-titulo>
    <form action="/tipo_archivo" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion">
        </div>
        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
    </x-layout>
    