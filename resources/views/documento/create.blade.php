<x-layout>
    <x-titulo>Crear documento</x-titulo>
    <form action="/documento" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="titulo">Título del documento:</label>
            <input type="text" name="titulo" id="titulo">
        </div>
        <div class="flex flex-col mb-4">
            <label for="archivo">Archivo del documento:</label>
            <input type="file" name="archivo" id="archivo">
        </div>
        <div class="flex flex-col mb-4">
            <label for="tipo_documento">Tipo de documento:</label>
            <select name="tipo_documento" id="tipo_documento">
                @foreach($tiposDocumento as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Subir documento" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
