<x-layout>
    <x-titulo>Crear archivo</x-titulo>
    <form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre del archivo:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="archivo">Selecciona un archivo:</label>
            <input type="file" name="archivo" id="archivo" accept=".pdf,image/*" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="id_tipo_archivo">Tipo de Archivo:</label>
            <select name="id_tipo_archivo" id="id_tipo_archivo" required>
                @foreach($tiposArchivos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
