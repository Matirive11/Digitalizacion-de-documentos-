<x-layout>
    <x-titulo>documento: {{ $documento['nombre'] }}</x-titulo>
    <div class="mt-4">
        <h2>{{ $documento['nombre'] }}</h2>
        <p>descripcion: {{ $documento['descripcion'] }}</p>
        <p>tipo_documento: {{ $documento['tipo_documento'] }}</p>
        <p>Estado: {{ $documento['Estado'] }}</p>
        <p>Fecha_subida: {{ $documento['Fecha_subida'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
            <a href="/documento/{{ $documento['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar el documento</a>
            <form method="POST" documento="/documento/{{ $documento['id'] }}" id="form-eliminar">
                @csrf
                @method('DELETE')
                <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar el documento</button>
            </form>
    </div>
    </x-layout>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            // Desactivar el envio automatico del formulario
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el documento?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                // Enviar el formulario para que sea procesado
                formEliminar.submit();
            }
        });
    </script>
