<x-layout>
    <x-titulo>Crear notificación</x-titulo>
    <form action="/notificacion" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo">
        </div>
        <div class="flex flex-col mb-4">
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" id="contenido"></textarea>
        </div>
        <div class="flex flex-col mb-4">
            <label for="usuario_id">Usuario:</label>
            <select name="usuario_id" id="usuario_id">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Crear notificación" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
