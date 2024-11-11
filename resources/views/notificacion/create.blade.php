<x-layout>
    <x-titulo>Crear notificación</x-titulo>
    <form action="/notificacion" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo">
        </div>
        <div class="flex flex-col mb-4">
            <label for="mensaje">mensaje:</label>
            <textarea name="mensaje" id="mensaje"></textarea>
        </div>
        </div>
        <input type="submit" value="Crear notificación" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
