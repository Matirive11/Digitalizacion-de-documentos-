<<<<<<< HEAD
<form action="{{ route('archivo.store') }}" method="POST" class="my-10" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="archivo">Archivo</label>
            {{-- El tipo de input para subir archivos es file --}}
            <input type="file" name="archivo" id="archivo">
            @error('archivo')
                <p class="text-red-800">{{ $message }}</p>
            @enderror
            @if (session('exito'))
            <p>{{ session('exito') }}</p>
        @endif
        </div>
        <div class="mt-5">
            <input type="submit" value="Guardar" class="p-3 text-blue-900 bg-blue-200 rounded">
        </div>
    </form>
=======
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
>>>>>>> 97f71c4 (Primer commit - proyecto Laravel Digitalizacion)
