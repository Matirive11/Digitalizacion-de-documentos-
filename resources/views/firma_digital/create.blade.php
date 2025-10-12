<x-layout>
    <x-titulo>Agregar firma digital</x-titulo>
    <form action="/firma-digital" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre de la firma:</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="flex flex-col mb-4">
            <label for="archivo_firma">Subir firma digital:</label>
            <input type="file" name="archivo_firma" id="archivo_firma">
        </div>
        <div class="flex flex-col mb-4">
            <label for="usuario_id">Usuario:</label>
            <select name="usuario_id" id="usuario_id">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Agregar firma" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
