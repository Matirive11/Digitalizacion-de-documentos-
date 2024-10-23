<x-layout>
    <x-titulo>Supervisor: {{ $supervisor['usuario_id'] }}</x-titulo>
    <div class="mt-4">
        <p>Usuario: {{ $supervisor['usuario_id'] }}</p>
        <p>Área de supervisión: {{ $supervisor['area_id'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
        <a href="/supervisor/{{ $supervisor['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar supervisor</a>
        <form method="POST" action="/supervisor/{{ $supervisor['id'] }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar supervisor</button>
        </form>
    </div>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el supervisor?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                formEliminar.submit();
            }
        });
    </script>
</x-layout>
