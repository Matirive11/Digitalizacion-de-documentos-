<x-layout>
<x-titulo>Categoria: {{ $categoria['nombre'] }}</x-titulo>
<div class="mt-4">
    <h2>{{ $categoria['nombre'] }}</h2>
    <p>Descripcion: {{ $categoria['descripcion'] }}</p>
</div>
<div class="mt-6 flex gap-x-6">
        <a href="/categoria/{{ $categoria['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar la categoria</a>
        <form method="POST" action="/categoria/{{ $categoria['id'] }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar la categoria</button>
        </form>
</div>
</x-layout>
<script>
    let botonEliminar = document.querySelector("#boton-eliminar");
    botonEliminar.addEventListener("click", function(e) {
        // Desactivar el envio automatico del formulario
        e.preventDefault();
        let confirmacion = confirm("¿Está seguro que desea eliminar la categoria?");
        if(confirmacion) {
            let formEliminar = document.querySelector("#form-eliminar");
            // Enviar el formulario para que sea procesado
            formEliminar.submit();
        }
    });
</script>

