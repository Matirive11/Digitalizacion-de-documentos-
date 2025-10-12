<x-layout>
    <x-titulo>Editar notificación: {{ $notificacion['titulo'] }}</x-titulo>
    <form action="{{ route('notificacion.update', $notificacion['id']) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col mb-4">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $notificacion['titulo'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" id="contenido">{{ $notificacion['contenido'] }}</textarea>
        </div>

        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
