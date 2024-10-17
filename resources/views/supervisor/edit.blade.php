<x-layout>
    <x-titulo>Editar supervisor: {{ $supervisor['Especialidad'] }}</x-titulo>
    <form action="/supervisor/{{ $supervisor['id'] }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex flex-col mb-4">
            <label for="Especialidad">Especialidad:</label>
            <input type="text" name="Especialidad" id="Especialidad" value="{{ $supervisor['Especialidad'] }}">
        </div>
        <div class="flex flex-col mb-4">
            <label for="Fecha_contratacion">Fecha de contratación:</label>
            <input type="date" name="Fecha_contratacion" id="Fecha_contratacion" value="{{ $supervisor['Fecha_contratacion'] }}">
        </div>
        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>

