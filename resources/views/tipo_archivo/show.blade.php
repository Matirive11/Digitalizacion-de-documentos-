<x-layout>
    <x-titulo>Tipo de Archivo: {{ $tipoarchivo['nombre'] }}</x-titulo>
    <div class="mt-4">
        <h2 >{{ $tipoarchivo['descripcion'] }}</h2>
    </div>
    <div class="mt-6 flex gap-x-6">
            <a href="/tipo_archivo/{{ $tipoarchivo['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar el tipo de archivo</a>
            <form method="POST" tipoarchivo="/tipo_archivo/{{ $tipoarchivo['id'] }}" id="form-eliminar">
                @csrf
                @method('DELETE')
                <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar el tipo de archivo</button>
            </form>
    </div>
    </x-layout>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            // Desactivar el envio automatico del formulario
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el tipo de archivo?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                // Enviar el formulario para que sea procesado
                formEliminar.submit();
            }
        });
    </script>
    
    