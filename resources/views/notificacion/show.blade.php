<x-layout>
    <x-titulo>Notificación: {{ $notificacion['titulo'] }}</x-titulo>
    <div class="mt-4">
        <p>ID: {{ $notificacion['id'] }}</p>
        <p>Título: {{ $notificacion['titulo'] }}</p>
        <p>Contenido: {{ $notificacion['contenido'] }}</p>
        <p>Usuario: {{ $notificacion['usuario_id'] }}</p>
        <p>Fecha de creación: {{ $notificacion['created_at'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
        <a href="/notificacion/{{ $notificacion['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar notificación</a>
        <form method="POST" action="/notificacion/{{ $notificacion['id'] }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar notificación</button>
        </form>
    </div>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar la notificación?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                formEliminar.submit();
            }
        });
    </script>
</x-layout>
