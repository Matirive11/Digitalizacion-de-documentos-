<x-layout>
    <x-titulo>Documento: {{ $documento['titulo'] }}</x-titulo>
    <div class="mt-4">
        <p>Nombre: {{ $documento['nombre'] }}</p>
        <p>Descripcion: {{ $documento['descripcion'] }}</p>
        <p>Tipo de documento: {{ $documento['tipo_documento'] }}</p>
        <p>Usuario: {{ $documento['usuario_id'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
        <a href="/documento/{{ $documento['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar documento</a>
        <form method="POST" action="/documento/{{ $documento['id'] }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar documento</button>
        </form>
    </div>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el documento?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                formEliminar.submit();
            }
        });
    </script>
</x-layout>
